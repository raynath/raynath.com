<?php
/**
 * 420.school Theme functions and definitions
 *
 * @package 420school
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'SCHOOL420_VERSION', '1.0.0' );

/**
 * Theme setup
 */
function school420_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '420school' ),
	) );
}
add_action( 'after_setup_theme', 'school420_setup' );

/**
 * Enqueue styles
 */
function school420_enqueue_assets() {
	$theme = wp_get_theme();
	$version = $theme ? $theme->get( 'Version' ) : SCHOOL420_VERSION;

	// Main theme stylesheet (required by WP for themes)
	wp_enqueue_style( 'school420-style', get_stylesheet_uri(), array(), $version );
}
add_action( 'wp_enqueue_scripts', 'school420_enqueue_assets' );

