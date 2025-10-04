<?php
/**
 * Raynath Theme Customizer
 *
 * @package Raynath_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function raynath_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'raynath_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'raynath_customize_partial_blogdescription',
        ) );
    }

    // Add theme options section
    $wp_customize->add_section( 'raynath_theme_options', array(
        'title'    => __( 'Theme Options', 'raynath-theme' ),
        'priority' => 130,
    ) );

    // Add custom header background color
    $wp_customize->add_setting( 'raynath_header_bg_color', array(
        'default'           => '#667eea',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'raynath_header_bg_color', array(
        'label'    => __( 'Header Background Color', 'raynath-theme' ),
        'section'  => 'raynath_theme_options',
        'settings' => 'raynath_header_bg_color',
    ) ) );

    // Add custom accent color
    $wp_customize->add_setting( 'raynath_accent_color', array(
        'default'           => '#667eea',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'raynath_accent_color', array(
        'label'    => __( 'Accent Color', 'raynath-theme' ),
        'section'  => 'raynath_theme_options',
        'settings' => 'raynath_accent_color',
    ) ) );

    // Add footer text
    $wp_customize->add_setting( 'raynath_footer_text', array(
        'default'           => __( 'Welcome to Raynath.com, your local community hub for Atlantic, Iowa and surrounding areas.', 'raynath-theme' ),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'raynath_footer_text', array(
        'label'    => __( 'Footer Description', 'raynath-theme' ),
        'section'  => 'raynath_theme_options',
        'type'     => 'textarea',
        'settings' => 'raynath_footer_text',
    ) );
}
add_action( 'customize_register', 'raynath_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function raynath_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function raynath_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function raynath_customize_preview_js() {
    wp_enqueue_script( 'raynath-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'raynath_customize_preview_js' );

/**
 * Add custom CSS for theme options.
 */
function raynath_customize_css() {
    $header_bg_color = get_theme_mod( 'raynath_header_bg_color', '#667eea' );
    $accent_color = get_theme_mod( 'raynath_accent_color', '#667eea' );
    ?>
    <style type="text/css">
        .site-header {
            background: <?php echo esc_attr( $header_bg_color ); ?> !important;
        }
        
        .read-more,
        .comment-reply-link,
        .search-form .search-submit,
        .comment-form .form-submit input,
        .back-to-home .button {
            background: <?php echo esc_attr( $accent_color ); ?> !important;
        }
        
        .read-more:hover,
        .comment-reply-link:hover,
        .search-form .search-submit:hover,
        .comment-form .form-submit input:hover,
        .back-to-home .button:hover {
            background: <?php echo esc_attr( $accent_color ); ?> !important;
            opacity: 0.9;
        }
        
        .widget-title {
            border-bottom-color: <?php echo esc_attr( $accent_color ); ?> !important;
        }
        
        .post-title a:hover,
        .widget a:hover,
        .footer-widget a:hover {
            color: <?php echo esc_attr( $accent_color ); ?> !important;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'raynath_customize_css' );