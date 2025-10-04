<?php
/**
 * Template part for displaying search results
 *
 * @package Raynath_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post search-result'); ?>>
    
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