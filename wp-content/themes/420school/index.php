<?php
/**
 * Main template file
 *
 * @package 420school
 */

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', get_post_type() );
	endwhile;

	// Posts navigation
	the_posts_navigation();
else :
	get_template_part( 'template-parts/content', 'none' );
endif;

get_footer();

