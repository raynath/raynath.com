<?php
/**
 * Raynath Theme functions and definitions
 */

if (!defined('RAYNATH_VERSION')) {
    $theme = wp_get_theme();
    define('RAYNATH_VERSION', $theme->get('Version'));
}

function raynath_setup() {
    // Enable essential theme supports
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        'style', 'script', 'navigation-widgets'
    ]);

    register_nav_menus([
        'primary' => __('Primary Menu', 'raynath'),
    ]);
}
add_action('after_setup_theme', 'raynath_setup');

function raynath_enqueue_assets() {
    // Main stylesheet (style.css) so WP can detect the theme
    wp_enqueue_style('raynath-style', get_stylesheet_uri(), [], RAYNATH_VERSION);

    // Additional theme styles
    wp_enqueue_style(
        'raynath-theme',
        get_stylesheet_directory_uri() . '/assets/css/theme.css',
        ['raynath-style'],
        RAYNATH_VERSION
    );

    // Placeholder for future JS
    // wp_enqueue_script('raynath-scripts', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], RAYNATH_VERSION, true);
}
add_action('wp_enqueue_scripts', 'raynath_enqueue_assets');
