<!-- Base template used by pages -->

<?php get_header(); ?>

  <div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

      <!-- The Loop through posts -->
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'page' ); ?>

      <?php endwhile; endif; ?>

      <p>Template: page.php</p>

    </main>

  </div>

  <?php get_sidebar(); ?>

<?php get_footer(); ?>