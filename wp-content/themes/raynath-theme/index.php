<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="primary-content">
                <?php if ( have_posts() ) : ?>
                    
                    <?php if ( is_home() && ! is_front_page() ) : ?>
                        <header class="page-header">
                            <h1 class="page-title"><?php single_post_title(); ?></h1>
                        </header>
                    <?php endif; ?>

                    <div class="posts-container">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                                
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('large'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="post-content">
                                    <header class="entry-header">
                                        <h2 class="post-title">
                                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        
                                        <div class="post-meta">
                                            <span class="posted-on">
                                                <time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                                    <?php echo esc_html( get_the_date() ); ?>
                                                </time>
                                            </span>
                                            
                                            <?php if ( get_the_author() ) : ?>
                                                <span class="byline">
                                                    by <span class="author vcard">
                                                        <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                                                            <?php echo esc_html( get_the_author() ); ?>
                                                        </a>
                                                    </span>
                                                </span>
                                            <?php endif; ?>
                                            
                                            <?php if ( has_category() ) : ?>
                                                <span class="cat-links">
                                                    in <?php the_category( ', ' ); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </header>

                                    <div class="entry-summary">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <footer class="entry-footer">
                                        <a href="<?php the_permalink(); ?>" class="read-more">
                                            Read More <span class="screen-reader-text">"<?php the_title(); ?>"</span>
                                        </a>
                                    </footer>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>

                    <?php
                    // Pagination
                    the_posts_pagination( array(
                        'prev_text' => __( 'Previous', 'raynath-theme' ),
                        'next_text' => __( 'Next', 'raynath-theme' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'raynath-theme' ) . ' </span>',
                    ) );
                    ?>

                <?php else : ?>
                    <section class="no-results not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php _e( 'Nothing here', 'raynath-theme' ); ?></h1>
                        </header>

                        <div class="page-content">
                            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
                                <p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'raynath-theme' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
                            <?php elseif ( is_search() ) : ?>
                                <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'raynath-theme' ); ?></p>
                                <?php get_search_form(); ?>
                            <?php else : ?>
                                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'raynath-theme' ); ?></p>
                                <?php get_search_form(); ?>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>