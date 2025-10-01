<?php
/**
 * Front page template
 *
 * @package 420school
 */

get_header();
?>
	<section class="front-hero">
		<h1>2023 Atlantic, Iowa</h1>
		<figure class="front-image">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/PXL_20231209_050307132.jpg' ); ?>" alt="Atlantic, Iowa 2023" />
		</figure>
	</section>
<?php
get_footer();

