<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Raynath_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<aside id="secondary" class="sidebar widget-area">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
    
    <!-- Default sidebar content if no widgets are active -->
    <?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
        <div class="widget">
            <h2 class="widget-title"><?php _e( 'About Raynath', 'raynath-theme' ); ?></h2>
            <p><?php _e( 'Welcome to Raynath.com, your local community hub for Atlantic, Iowa and surrounding areas. Stay connected with local news, events, and community updates.', 'raynath-theme' ); ?></p>
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
                        <span class="post-date"><?php echo get_the_date( '', $post_item['ID'] ); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="widget">
            <h2 class="widget-title"><?php _e( 'Categories', 'raynath-theme' ); ?></h2>
            <ul>
                <?php wp_list_categories( array(
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'show_count' => true,
                    'title_li' => '',
                    'number' => 10,
                ) ); ?>
            </ul>
        </div>

        <div class="widget">
            <h2 class="widget-title"><?php _e( 'Archives', 'raynath-theme' ); ?></h2>
            <ul>
                <?php wp_get_archives( array(
                    'type' => 'monthly',
                    'limit' => 12,
                ) ); ?>
            </ul>
        </div>

        <div class="widget">
            <h2 class="widget-title"><?php _e( 'Search', 'raynath-theme' ); ?></h2>
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>
</aside><!-- #secondary -->