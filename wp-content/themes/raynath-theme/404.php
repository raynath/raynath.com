<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Raynath_Theme
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="primary-content">
                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'raynath-theme' ); ?></h1>
                    </header>

                    <div class="page-content">
                        <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'raynath-theme' ); ?></p>

                        <?php get_search_form(); ?>

                        <div class="error-404-widgets">
                            <div class="widget">
                                <h2 class="widget-title"><?php _e( 'Most Used Categories', 'raynath-theme' ); ?></h2>
                                <ul>
                                    <?php
                                    wp_list_categories( array(
                                        'orderby'    => 'count',
                                        'order'      => 'DESC',
                                        'show_count' => 1,
                                        'title_li'   => '',
                                        'number'     => 10,
                                    ) );
                                    ?>
                                </ul>
                            </div>

                            <div class="widget">
                                <h2 class="widget-title"><?php _e( 'Archives', 'raynath-theme' ); ?></h2>
                                <ul>
                                    <?php
                                    wp_get_archives( array(
                                        'type'  => 'monthly',
                                        'limit' => 12,
                                    ) );
                                    ?>
                                </ul>
                            </div>

                            <div class="widget">
                                <h2 class="widget-title"><?php _e( 'Recent Posts', 'raynath-theme' ); ?></h2>
                                <ul>
                                    <?php
                                    $recent_posts = wp_get_recent_posts( array(
                                        'numberposts' => 5,
                                        'post_status' => 'publish'
                                    ) );
                                    
                                    foreach( $recent_posts as $post_item ) : ?>
                                        <li>
                                            <a href="<?php echo get_permalink( $post_item['ID'] ); ?>">
                                                <?php echo $post_item['post_title']; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="back-to-home">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button">
                                <?php _e( 'Back to Home', 'raynath-theme' ); ?>
                            </a>
                        </div>
                    </div>
                </section>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<style>
.error-404-widgets {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin: 2rem 0;
}

.error-404-widgets .widget {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
}

.error-404-widgets .widget ul {
    list-style: none;
}

.error-404-widgets .widget li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
}

.error-404-widgets .widget li:last-child {
    border-bottom: none;
}

.error-404-widgets .widget a {
    color: #555;
    text-decoration: none;
    transition: color 0.3s ease;
}

.error-404-widgets .widget a:hover {
    color: #667eea;
}

.back-to-home {
    text-align: center;
    margin-top: 2rem;
}

.back-to-home .button {
    display: inline-block;
    padding: 1rem 2rem;
    background: #667eea;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.back-to-home .button:hover {
    background: #5a6fd8;
}
</style>

<?php get_footer(); ?>