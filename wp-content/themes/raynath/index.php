<?php get_header(); ?>

<section class="entry">
  <div class="container">
    <?php if (have_posts()) : ?>
      <div class="post-list">
        <?php while (have_posts()) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>" class="thumb">
                <?php the_post_thumbnail('large'); ?>
              </a>
            <?php endif; ?>
            <div class="content">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p class="meta"><?php echo get_the_date(); ?></p>
              <div><?php the_excerpt(); ?></div>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
      <div class="pagination">
        <?php the_posts_pagination(); ?>
      </div>
    <?php else : ?>
      <p><?php esc_html_e('No posts found.', 'raynath'); ?></p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
