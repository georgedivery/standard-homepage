'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const cleanCSS = require('gulp-clean-css');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const terser = require('gulp-terser');
const imagemin = require('gulp-imagemin').default || require('gulp-imagemin');
const imageminGifsicle = require('imagemin-gifsicle').default || require('imagemin-gifsicle');
const imageminMozjpeg = require('imagemin-mozjpeg').default || require('imagemin-mozjpeg');
const imageminOptipng = require('imagemin-optipng').default || require('imagemin-optipng');
const imageminSvgo = require('imagemin-svgo').default || require('imagemin-svgo');
const plumber = require('gulp-plumber');
const newer = require('gulp-newer');
const fs = require('fs');

/**
 * Unify all scripts to work with source and destination paths.
 * For more custom paths, please add them in this object
 */
const paths = {
  source: {
    scripts: 'src/scripts/',
    sass: 'src/sass/',
    images: 'src/images/',
    fonts: 'src/fonts/'
  },
  destination: {
    scripts: 'dist/scripts/',
    css: 'dist/css/',
    images: 'dist/images/',
    fonts: 'dist/fonts/'
  }
};

gulp.task('sass', function () {
  return gulp
    .src(paths.source.sass + '**/*.scss')
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer({
      overrideBrowserslist: ['> 0%'],
      cascade: false
    })]))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.destination.css));
});

gulp.task('cssmin', function () {
  const cssFile = paths.destination.css + 'master.css';
  // Check if CSS file exists, if not, skip this task
  if (!fs.existsSync(cssFile)) {
    console.log('master.css does not exist yet, skipping CSS minification.');
    return Promise.resolve();
  }
  
  return gulp
    .src(cssFile, { allowEmpty: true })
    .pipe(plumber())
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(cleanCSS({ compatibility: 'ie8' }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.destination.css));
});

// The files to be watched for minifying. If more dev js files are added this
// will have to be updated.
gulp.task('minifyScripts', function () {
  // Add separate folders if required.
  return gulp
    .src([
      paths.source.scripts + 'vendor/*.js',
      paths.source.scripts + 'scripts.js'
    ])
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(babel({
      presets: [
        ['@babel/preset-env', {
          targets: {
            ie: '5'
          }
        }]
      ]
    }))
    .pipe(concat('bundle.min.js'))
    .pipe(terser({
      compress: {
        drop_console: false
      },
      mangle: true,
      format: {
        comments: false
      }
    }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.destination.scripts));
});

gulp.task('optimizeImages', function () {
  // Check if images directory exists, if not, skip this task
  if (!fs.existsSync(paths.source.images)) {
    console.log('Images directory does not exist, skipping image optimization.');
    return Promise.resolve();
  }
  
  // Add separate folders if required.
  return gulp
    .src(paths.source.images + '**/*', { allowEmpty: true })
    .pipe(plumber())
    .pipe(newer(paths.destination.images))
    .pipe(imagemin([
      imageminGifsicle({ interlaced: true }),
      imageminMozjpeg({ quality: 80, progressive: true }),
      imageminOptipng({ optimizationLevel: 5 }),
      imageminSvgo({
        plugins: [
          { removeViewBox: true },
          { cleanupIDs: false }
        ]
      })
    ]))
    .pipe(gulp.dest(paths.destination.images));
});

gulp.task('optimizeFonts', function () {
  return gulp
    .src(paths.source.fonts + '*')
    .pipe(gulp.dest(paths.destination.fonts));
});

// What will be run with simply writing '$ gulp'
gulp.task('watch', function () {
  gulp.watch(paths.source.sass + '**/*.scss', gulp.series('sass'));
  gulp.watch(paths.source.scripts + '**/*.js', gulp.series('minifyScripts'));
  gulp.watch(paths.source.images + '*', gulp.series('optimizeImages'));

  // Once the CSS file is build, minify it.
  gulp.watch(paths.destination.css + 'master.css', gulp.series('cssmin'));
});

// Build task (runs all tasks once)
// cssmin must run after sass completes, so we use series for that dependency
gulp.task('build', gulp.series(
  gulp.parallel('sass', 'minifyScripts', 'optimizeImages', 'optimizeFonts'),
  'cssmin'
));

// Default task
gulp.task('default', gulp.series('build', 'watch'));

