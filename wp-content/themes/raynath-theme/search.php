<?php
/**
 * The template for displaying search results pages
 *
 * @package Raynath_Theme
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="primary-content">
                <?php if ( have_posts() ) : ?>
                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
                            printf(
                                esc_html__( 'Search Results for: %s', 'raynath-theme' ),
                                '<span>' . get_search_query() . '</span>'
                            );
                            ?>
                        </h1>
                    </header>

                    <div class="posts-container">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                                
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('raynath-thumbnail'); ?>
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
                                            <?php _e( 'Read More', 'raynath-theme' ); ?> 
                                            <span class="screen-reader-text">"<?php the_title(); ?>"</span>
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
                            <h1 class="page-title"><?php _e( 'Nothing Found', 'raynath-theme' ); ?></h1>
                        </header>

                        <div class="page-content">
                            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'raynath-theme' ); ?></p>
                            
                            <?php get_search_form(); ?>
                            
                            <div class="search-suggestions">
                                <h3><?php _e( 'Search Suggestions:', 'raynath-theme' ); ?></h3>
                                <ul>
                                    <li><?php _e( 'Make sure all words are spelled correctly', 'raynath-theme' ); ?></li>
                                    <li><?php _e( 'Try different keywords', 'raynath-theme' ); ?></li>
                                    <li><?php _e( 'Try more general keywords', 'raynath-theme' ); ?></li>
                                    <li><?php _e( 'Try fewer keywords', 'raynath-theme' ); ?></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>