<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Raynath_Theme
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="content-area">
            <div class="primary-content">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post page-post'); ?>>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('raynath-featured'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <header class="entry-header">
                                <h1 class="post-title"><?php the_title(); ?></h1>
                                
                                <?php if ( get_the_modified_date() !== get_the_date() ) : ?>
                                    <div class="post-meta">
                                        <span class="updated">
                                            <?php _e( 'Last updated:', 'raynath-theme' ); ?>
                                            <time class="entry-date updated" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">
                                                <?php echo esc_html( get_the_modified_date() ); ?>
                                            </time>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </header>

                            <div class="entry-content">
                                <?php
                                the_content();

                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'raynath-theme' ),
                                    'after'  => '</div>',
                                ) );
                                ?>
                            </div>

                            <?php if ( get_edit_post_link() ) : ?>
                                <footer class="entry-footer">
                                    <?php
                                    edit_post_link(
                                        sprintf(
                                            wp_kses(
                                                __( 'Edit <span class="screen-reader-text">%s</span>', 'raynath-theme' ),
                                                array(
                                                    'span' => array(
                                                        'class' => array(),
                                                    ),
                                                )
                                            ),
                                            get_the_title()
                                        ),
                                        '<span class="edit-link">',
                                        '</span>'
                                    );
                                    ?>
                                </footer>
                            <?php endif; ?>
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