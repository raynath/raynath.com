<?php
/**
 * The template for displaying all single posts
 *
 * @package Raynath_Theme
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="primary-content">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post single-post'); ?>>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('raynath-featured'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <header class="entry-header">
                                <h1 class="post-title"><?php the_title(); ?></h1>
                                
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

                            <div class="entry-content">
                                <?php
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
                                ?>
                            </div>

                            <footer class="entry-footer">
                                <?php if ( has_tag() ) : ?>
                                    <div class="tags-links">
                                        <span class="tags-title"><?php _e( 'Tags:', 'raynath-theme' ); ?></span>
                                        <?php the_tags( '', ', ', '' ); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="post-navigation">
                                    <?php
                                    the_post_navigation( array(
                                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'raynath-theme' ) . '</span> <span class="nav-title">%title</span>',
                                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'raynath-theme' ) . '</span> <span class="nav-title">%title</span>',
                                    ) );
                                    ?>
                                </div>
                            </footer>
                        </div>
                    </article>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>