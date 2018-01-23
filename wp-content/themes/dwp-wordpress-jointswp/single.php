<?php get_header(); ?>

<div id="content">

	<?php //get_sidebar(); ?>

	<div id="inner-content" class="article-content">

		<main id="main" class="small-12 small-centered" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

<!-- Check to see if there are article Citations -->
<?php $article_citations = get_field('citations', $post->ID );
	if( $article_citations ):?>
		<hr>
		<section id="article-citecontainer" class="small-10 medium-10 large-8 small-centered">

			<h5 id="article-citetitle"><?php _e( 'References &amp; Citations', 'jointswp'); ?>:</h5>
			<?php	echo $article_citations; ?>

	 </section>
<?php endif; ?>

<!-- Get metadata links -->
<?php get_template_part( 'parts/single', 'metalinks' ); ?>

<!-- Article pagigination using the nextpage quicktag -->
<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>

<p style="text-align: center;">Template: single.php</p>

<!-- Comments not allowed on frontend of site - uncomment if requirement changes -->
<?php // comments_template(); ?>

</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
