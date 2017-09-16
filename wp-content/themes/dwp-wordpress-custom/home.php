<!-- Template used by either front page or blog depending on front page settings -->

<?php get_header(); ?>

  <div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

      <h1><?php wp_title( '' ); ?></h1>

      <!-- The Loop through posts -->
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'posts' ); ?>

      <?php endwhile; else : ?>

        <?php get_template_part('template-parts/content', 'none'); ?>

      <?php endif; ?>

      <?php echo paginate_links(); ?>

      <p>Template: home.php</p>

    </main>

  </div>

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
