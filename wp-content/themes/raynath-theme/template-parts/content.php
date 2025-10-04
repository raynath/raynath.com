<?php
/**
 * Template part for displaying posts
 *
 * @package Raynath_Theme
 */

?>

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
            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="post-title">', '</h1>' );
            else :
                the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;

            if ( 'post' === get_post_type() ) :
                ?>
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
                <?php
            endif;
            ?>
        </header>

        <div class="entry-content">
            <?php
            if ( is_singular() ) {
                the_content( sprintf(
                    wp_kses(
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'raynath-theme' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'raynath-theme' ),
                    'after'  => '</div>',
                ) );
            } else {
                the_excerpt();
            }
            ?>
        </div>

        <footer class="entry-footer">
            <?php if ( ! is_singular() ) : ?>
                <a href="<?php the_permalink(); ?>" class="read-more">
                    <?php _e( 'Read More', 'raynath-theme' ); ?> 
                    <span class="screen-reader-text">"<?php the_title(); ?>"</span>
                </a>
            <?php endif; ?>

            <?php raynath_entry_footer(); ?>
        </footer>
    </div>
</article>