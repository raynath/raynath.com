<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Raynath_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function raynath_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter( 'body_class', 'raynath_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function raynath_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'raynath_pingback_header' );

/**
 * Customize the excerpt length.
 */
function raynath_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'raynath_custom_excerpt_length', 999 );

/**
 * Customize the excerpt more string.
 */
function raynath_custom_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'raynath_custom_excerpt_more' );

/**
 * Add custom CSS for pagination.
 */
function raynath_pagination_styles() {
    ?>
    <style>
    .page-numbers {
        display: inline-block;
        padding: 0.5rem 1rem;
        margin: 0 0.25rem;
        background: white;
        color: #667eea;
        text-decoration: none;
        border-radius: 5px;
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }
    
    .page-numbers:hover,
    .page-numbers.current {
        background: #667eea;
        color: white;
        border-color: #667eea;
    }
    
    .page-numbers.prev,
    .page-numbers.next {
        font-weight: bold;
    }
    
    .pagination {
        text-align: center;
        margin: 2rem 0;
    }
    </style>
    <?php
}
add_action( 'wp_head', 'raynath_pagination_styles' );

/**
 * Add custom CSS for comments.
 */
function raynath_comments_styles() {
    ?>
    <style>
    .comment-list {
        list-style: none;
        padding: 0;
    }
    
    .comment {
        background: white;
        margin-bottom: 1rem;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
    
    .comment-author {
        font-weight: bold;
        color: #2c3e50;
    }
    
    .comment-meta {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }
    
    .comment-content {
        line-height: 1.6;
    }
    
    .comment-reply-link {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.5rem 1rem;
        background: #667eea;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
    }
    
    .comment-reply-link:hover {
        background: #5a6fd8;
    }
    
    .comment-form {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        margin-top: 2rem;
    }
    
    .comment-form input,
    .comment-form textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 1rem;
        font-family: inherit;
    }
    
    .comment-form input:focus,
    .comment-form textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.2);
    }
    
    .comment-form .form-submit input {
        background: #667eea;
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    
    .comment-form .form-submit input:hover {
        background: #5a6fd8;
    }
    </style>
    <?php
}
add_action( 'wp_head', 'raynath_comments_styles' );

/**
 * Add custom CSS for search form.
 */
function raynath_search_form_styles() {
    ?>
    <style>
    .search-form {
        display: flex;
        gap: 0.5rem;
        margin: 1rem 0;
    }
    
    .search-form .search-field {
        flex: 1;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-family: inherit;
    }
    
    .search-form .search-field:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.2);
    }
    
    .search-form .search-submit {
        padding: 0.75rem 1.5rem;
        background: #667eea;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    
    .search-form .search-submit:hover {
        background: #5a6fd8;
    }
    </style>
    <?php
}
add_action( 'wp_head', 'raynath_search_form_styles' );