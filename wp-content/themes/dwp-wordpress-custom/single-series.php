<!-- Template for custom field type Series pages -->
<?php get_header(); ?>

  <div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

      <!-- The Loop through posts -->
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <header class="entry-header">

             <?php the_title( '<h2>','</h2>'); ?>
             <?php the_post_thumbnail( 'full' ); ?>

          </header>

          <div class="entry-content">

            <?php the_content(); ?>

          </div>

        </article>


      <?php endwhile; endif; ?>

      <p>Template: single-series.php</p>

    </main>

  </div>

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
