<?php get_header(); ?>

<?php
$background_image_url = '';
if (has_post_thumbnail()) {
  $background_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];
} else {
  $background_image_url = get_stylesheet_directory_uri() . '/assets/images/hero.jpg';
}
?>

<section class="hero" style="<?php echo $background_image_url ? 'background-image:url(' . esc_url($background_image_url) . ');' : ''; ?>">
  <div class="inner">
    <h1><?php bloginfo('name'); ?></h1>
    <?php if (get_bloginfo('description')) : ?>
      <p class="tagline"><?php bloginfo('description'); ?></p>
    <?php endif; ?>
  </div>
</section>

<section class="entry">
  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_footer(); ?>
