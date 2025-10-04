<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php _e( 'Skip to content', 'raynath-theme' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="site-branding">
                <?php
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </h1>
                    <?php
                else :
                    ?>
                    <p class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </p>
                    <?php
                endif;
                $raynath_description = get_bloginfo( 'description', 'display' );
                if ( $raynath_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $raynath_description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="menu-toggle-text"><?php _e( 'Menu', 'raynath-theme' ); ?></span>
                    <span class="menu-toggle-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'raynath_default_menu',
                ) );
                ?>
            </nav>
        </div>
    </header>

    <?php
    // Default menu fallback function
    function raynath_default_menu() {
        echo '<ul class="nav-menu">';
        echo '<li><a href="' . home_url() . '">Home</a></li>';
        echo '<li><a href="' . home_url('/about') . '">About</a></li>';
        echo '<li><a href="' . home_url('/contact') . '">Contact</a></li>';
        echo '</ul>';
    }
    ?>