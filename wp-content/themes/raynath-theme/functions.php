<?php
/**
 * Raynath Theme functions and definitions
 *
 * @package Raynath_Theme
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function raynath_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Set custom image sizes
    add_image_size( 'raynath-featured', 800, 400, true );
    add_image_size( 'raynath-thumbnail', 300, 200, true );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'menu-1' => esc_html__( 'Primary', 'raynath-theme' ),
    ) );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'raynath_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );

    // Add support for responsive embedded content.
    add_theme_support( 'responsive-embeds' );

    // Add support for wide alignment.
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'raynath_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function raynath_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'raynath_content_width', 640 );
}
add_action( 'after_setup_theme', 'raynath_content_width', 0 );

/**
 * Register widget areas.
 */
function raynath_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'raynath-theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'raynath-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'raynath-theme' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here for the first footer column.', 'raynath-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'raynath-theme' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here for the second footer column.', 'raynath-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'raynath-theme' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here for the third footer column.', 'raynath-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'raynath_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function raynath_scripts() {
    wp_enqueue_style( 'raynath-style', get_stylesheet_uri(), array(), '1.0.0' );
    
    wp_enqueue_script( 'raynath-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'raynath_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom excerpt length.
 */
function raynath_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'raynath_excerpt_length', 999 );

/**
 * Custom excerpt more.
 */
function raynath_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'raynath_excerpt_more' );

/**
 * Add custom CSS for mobile menu.
 */
function raynath_mobile_menu_css() {
    ?>
    <style>
    .main-navigation .menu-toggle {
        display: none;
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        padding: 0.5rem;
    }
    
    .menu-toggle-icon {
        display: flex;
        flex-direction: column;
        gap: 3px;
    }
    
    .menu-toggle-icon span {
        width: 25px;
        height: 3px;
        background: white;
        transition: all 0.3s ease;
    }
    
    .main-navigation.toggled .menu-toggle-icon span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }
    
    .main-navigation.toggled .menu-toggle-icon span:nth-child(2) {
        opacity: 0;
    }
    
    .main-navigation.toggled .menu-toggle-icon span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }
    
    @media (max-width: 768px) {
        .main-navigation .menu-toggle {
            display: block;
        }
        
        .main-navigation .nav-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: rgba(102, 126, 234, 0.95);
            flex-direction: column;
            padding: 1rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .main-navigation.toggled .nav-menu {
            display: flex;
        }
        
        .main-navigation .nav-menu li {
            width: 100%;
        }
        
        .main-navigation .nav-menu a {
            display: block;
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .main-navigation .nav-menu li:last-child a {
            border-bottom: none;
        }
    }
    </style>
    <?php
}
add_action( 'wp_head', 'raynath_mobile_menu_css' );

/**
 * Add theme support for custom colors.
 */
function raynath_custom_colors() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => __( 'Primary Blue', 'raynath-theme' ),
            'slug'  => 'primary-blue',
            'color' => '#667eea',
        ),
        array(
            'name'  => __( 'Secondary Purple', 'raynath-theme' ),
            'slug'  => 'secondary-purple',
            'color' => '#764ba2',
        ),
        array(
            'name'  => __( 'Dark Blue', 'raynath-theme' ),
            'slug'  => 'dark-blue',
            'color' => '#2c3e50',
        ),
        array(
            'name'  => __( 'Light Gray', 'raynath-theme' ),
            'slug'  => 'light-gray',
            'color' => '#f8f9fa',
        ),
    ) );
}
add_action( 'after_setup_theme', 'raynath_custom_colors' );