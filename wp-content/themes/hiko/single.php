<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="article-content">

		<main id="main" class="small-12 small-centered" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main>

<?php //Check to see if there are article Citations
	$article_citations = get_field('citations', $post->ID );
	if( $article_citations ):?>
		<hr>
		<section id="article-citecontainer" class="small-10 medium-10 large-8 small-centered">

			<h5 id="article-citetitle"><?php _e( 'References &amp; Citations', 'jointswp'); ?>:</h5>
			<?php	echo $article_citations; ?>

	 </section>
<?php endif; ?>

<?php //Get metadata links
get_template_part( 'parts/single', 'metalinks' ); ?>

<?php //Article pagigination using the nextpage quicktag
wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>

<!-- <p style="text-align: center;">Template: single.php</p> -->

</div>

</div>

<?php get_footer(); ?>
