/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 */

( function( $ ) {
    // Site title and description.
    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).text( to );
        } );
    } );
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).text( to );
        } );
    } );

    // Header text color.
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( to ) {
            if ( 'blank' === to ) {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                } );
            } else {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'auto',
                    'position': 'relative'
                } );
                $( '.site-title a, .site-description' ).css( {
                    'color': to
                } );
            }
        } );
    } );

    // Header background color.
    wp.customize( 'raynath_header_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-header' ).css( 'background', to );
        } );
    } );

    // Accent color.
    wp.customize( 'raynath_accent_color', function( value ) {
        value.bind( function( to ) {
            $( '.read-more, .comment-reply-link, .search-form .search-submit, .comment-form .form-submit input, .back-to-home .button' ).css( 'background', to );
            $( '.widget-title' ).css( 'border-bottom-color', to );
        } );
    } );

    // Footer text.
    wp.customize( 'raynath_footer_text', function( value ) {
        value.bind( function( to ) {
            $( '.footer-widget p' ).first().text( to );
        } );
    } );
} )( jQuery );