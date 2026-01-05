<?php
/**
 * Theme functions and definitions
 *
 * @package Devrix
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme setup
 */
function devrix_setup() {
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add theme support for automatic feed links
    add_theme_support('automatic-feed-links');
    
    // Add theme support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'devrix'),
        'footer' => __('Footer Menu', 'devrix'),
    ));
    
    // Set content width
    $GLOBALS['content_width'] = 1200;
}
add_action('after_setup_theme', 'devrix_setup');

/**
 * Enqueue compiled assets from dist folder
 */
function devrix_enqueue_assets() {
    $is_dev = wp_get_environment_type() === 'development';
    
    // Enqueue CSS
    if ($is_dev) {
        wp_enqueue_style(
            'devrix-style',
            get_template_directory_uri() . '/dist/css/master.css',
            array(),
            filemtime(get_template_directory() . '/dist/css/master.css')
        );
    } else {
        wp_enqueue_style(
            'devrix-style',
            get_template_directory_uri() . '/dist/css/master.min.css',
            array(),
            filemtime(get_template_directory() . '/dist/css/master.min.css')
        );
    }
    
    // Enqueue JavaScript
    if ($is_dev) {
        wp_enqueue_script(
            'devrix-scripts',
            get_template_directory_uri() . '/dist/scripts/bundle.js',
            array(),
            filemtime(get_template_directory() . '/dist/scripts/bundle.js'),
            true
        );
    } else {
        wp_enqueue_script(
            'devrix-scripts',
            get_template_directory_uri() . '/dist/scripts/bundle.min.js',
            array(),
            filemtime(get_template_directory() . '/dist/scripts/bundle.min.js'),
            true
        );
    }
    
    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'devrix_enqueue_assets', 20);
 
 
/**
 * Fallback menu if no menu is assigned
 */
function devrix_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'devrix') . '</a></li>';
    wp_list_pages(array(
        'title_li' => '',
    ));
    echo '</ul>';
}

