<!-- Content template used for multiple posts - pulled in via home.php -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">

     <?php the_title( '<h2><a href="'.esc_url( get_permalink() ).'">', '</a></h2>'); ?>

     <div class="byline">
      <?php esc_html_e( 'Author: ' ); ?><?php the_author_posts_link(); ?>
     </div>

  </header>

  <div class="entry-content">

    <?php the_excerpt(); ?>

  </div>

</article>
