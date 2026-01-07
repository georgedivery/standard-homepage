# Devrix WordPress Theme

## 📦 Full Project Archive

Full project archive - the folder should be extracted into a project folder:

**Archive link:** [https://drive.google.com/file/d/170AHP1YP9EPFZbNYbkthbl1gHviBKN4z/view?usp=sharing](https://drive.google.com/file/d/170AHP1YP9EPFZbNYbkthbl1gHviBKN4z/view?usp=sharing)

**The database** is located in the `sync` folder.

### 🔄 Quick URL Replacement in Database

Here is a snippet for quickly replacing URLs in the database:

```sql
UPDATE wp_options SET option_value = replace(option_value, 'http://localhost/DevriX', 'http://devrix.test') WHERE option_name = 'home' OR option_name = 'siteurl';
UPDATE wp_posts SET post_content = replace(post_content, 'http://localhost/DevriX', 'http://devrix.test');
UPDATE wp_postmeta SET meta_value = replace(meta_value,'http://localhost/DevriX','http://devrix.test');
UPDATE wp_posts SET guid = REPLACE (guid, 'http://localhost/DevriX', 'http://devrix.test');
```

---

Custom WordPress theme built from scratch without Elementor or Gutenberg dependencies. This theme includes a modern build process using Gulp for asset compilation and optimization.

## 📁 Project Structure

```
devrix/
├── src/ 
│   ├── sass/ 
│   │   ├── _variables.scss 
│   │   ├── _reset.scss 
│   │   ├── _responsive.scss   
│   │   ├── master.scss 
│   │   └── components/  
│   │       ├── _header.scss
│   │       ├── _navigation.scss
│   │       ├── _footer.scss
│   │       ├── _buttons.scss
│   │       ├── _forms.scss
│   │       ├── _posts.scss
│   │       ├── _sidebar.scss
│   │       ├── _pagination.scss
│   │       ├── _comments.scss
│   │       ├── _utilities.scss
│   │       └── _container.scss
│   ├── scripts/ 
│   │   ├── scripts.js 
│   │   └── vendor/ 
│   ├── images/ 
│   └── fonts/ 
│
├── dist/ 
│   ├── css/ 
│   ├── scripts/ 
│   ├── images/ 
│   └── fonts/ 
│
├── gulpfile.js 
├── package.json 
└── functions.php 
```

## 🚀 Getting Started

### Prerequisites

- Node.js (v14 or higher)
- npm (comes with Node.js)
- WordPress installation
 
###   Commands

- `npm install --legacy-peer-deps`  
- `npm run build` - Compile all assets once (Sass, JavaScript, images, fonts)
- `npm run watch` - Start watch mode (automatically recompiles on file changes)
- `npm run lint:sass` - Lint SCSS files for code quality

### What Each Command Does

**`npm run build`:**
- Compiles SCSS to CSS (with autoprefixer)
- Creates minified CSS version
- Transpiles JavaScript (ES6 → ES5 for IE5 support)
- Bundles and minifies JavaScript
- Optimizes images
- Copies fonts

**`npm run watch`:**
- Watches for changes in `src/` folder
- Automatically recompiles changed files
- CSS changes trigger automatic minification

**`npm run lint:sass`:**
- Checks SCSS files for code quality issues
- Uses stylelint with standard-scss configuration

## 🛠️ Build Process

### Sass/SCSS Processing

1. **Compilation:** SCSS files are compiled to CSS
2. **Autoprefixer:** Automatically adds vendor prefixes for browser compatibility
3. **Source Maps:** Generated for easier debugging
4. **Minification:** Creates `.min.css` version for production

**File Structure:**
- `master.scss` - Main entry point (imports all components)
- `_variables.scss` - All theme variables (colors, fonts, spacing, breakpoints)
- `_reset.scss` - CSS reset and base typography
- `components/` - Modular component styles

### JavaScript Processing

1. **Transpilation:** ES6+ code is transpiled to ES5 (IE5 compatible)
2. **Bundling:** Vendor files are prepended to main scripts
3. **Minification:** Creates `bundle.min.js` for production

**File Structure:**
- `scripts.js` - Main JavaScript file
- `vendor/` - Third-party libraries (loaded first)

### Image Optimization

- Images from `src/images/` are optimized and copied to `dist/images/`
- Only processes new/changed images (using `gulp-newer`)
- Supports: JPEG, PNG, GIF, SVG

### Fonts

- Fonts from `src/fonts/` are copied to `dist/fonts/`
- No processing, just copying

## 🎨 Working with Styles

### Adding New Styles

1. **Create a new component:**
   ```scss
   // src/sass/components/_my-component.scss
   @use '../variables' as *;
   
   .my-component {
     padding: $spacing-md;
     color: $color-text;
   }
   ```

2. **Import in master.scss:**
   ```scss
   @use 'components/my-component';
   ```
  
### Adding JavaScript

1. **Edit `src/scripts/scripts.js`** for main functionality
2. **Add vendor libraries** to `src/scripts/vendor/` folder
3. Files are automatically bundled in order: vendor files first, then `scripts.js`

### Vendor Libraries

Place third-party libraries in `src/scripts/vendor/`. They will be:
- Transpiled to ES5
- Prepended to main scripts
- Included in the final bundle

## 🖼️ Working with Images

1. Place images in `src/images/`
2. Run build or watch - images are automatically optimized
3. Optimized images appear in `dist/images/`

**Supported formats:** JPEG, PNG, GIF, SVG

## 🔧 Configuration

### Gulp Configuration

Edit `gulpfile.js` to customize:
- File paths
- Build tasks
- Optimization settings

### Stylelint Configuration

Edit `.stylelintrc.json` to customize:
- Linting rules
- Code style preferences

### Babel Configuration

JavaScript transpilation targets IE5. To change, edit `gulpfile.js`:
```javascript
targets: {
  ie: '5'  // Change browser support here
}
```

## 📱 WordPress Integration

### Enqueued Assets

The theme automatically enqueues:
- **Development:** `master.css` and `bundle.js` (unminified)
- **Production:** `master.min.css` and `bundle.min.js` (minified)

Detection is based on `wp_get_environment_type()`.
  
### Build Errors

**Sass compilation errors:**
- Check for syntax errors in SCSS files
- Ensure all variables are imported with `@use '../variables' as *;`

**JavaScript errors:**
- Check browser console for runtime errors
- Verify Babel transpilation completed successfully

**Image optimization errors:**
- Ensure images are in supported formats
- Check file permissions

### Common Issues

**"Module not found" errors:**
```bash
npm install --legacy-peer-deps
```

**Watch mode not detecting changes:**
- Restart watch process
- Check file permissions

**CSS not updating:**
- Clear browser cache
- Check if `dist/css/master.css` was updated
- Verify watch mode is running

## 📚 Best Practices

1. **Always edit files in `src/`**, never in `dist/`
2. **Use variables** from `_variables.scss` for consistency
3. **Keep components modular** - one component per file
4. **Run linting** before committing: `npm run lint:sass`
5. **Test in production mode** before deploying

## 🚢 Deployment

1. Run final build:
   ```bash
   npm run build
   ```

2. Commit `dist/` folder (or configure CI/CD to build)

3. Deploy theme to WordPress

**Note:** The `dist/` folder should be included in version control for production deployments, or built on the server/CI.
 