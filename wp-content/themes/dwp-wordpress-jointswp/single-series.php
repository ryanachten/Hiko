<!-- Template used for displaying the Series pages -->
<?php get_header(); ?>

<div id="content">

	<div id="inner-content">

		<main id="main" class="small-12 small-centered" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

			</main> <!-- end #main -->

			 <section id="series-parts-container" class="medium-12 large-12 small-centered columns">

				<h3 id="series-parts-title">Series Parts</h3>
				<h4 class="subheader">Check out that articles which make up this series:</h4>
				<!-- get posts for series parts and loop through posts
			 		defined in functions.php-->
				<?php	loop_custom_grid( 'series_parts', false, 4 ); ?>

			</section>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<hr>

<!-- Check to see if there are article Citations -->
<?php $article_citations = get_field('citations', $post->ID );
	if( $article_citations ):?>
		<!-- <hr> -->
		<section id="article-citecontainer" class="small-10 medium-10 large-8 small-centered">

			<h5 id="article-citetitle">References &amp; Citations:</h5>
			<?php	echo $article_citations; ?>

	 </section>
<?php endif; ?>

<!-- Get metadata links -->
<?php get_template_part( 'parts/single', 'metalinks' ); ?>

<p style="text-align: center;">Template: single-series.php</p>

<?php get_footer(); ?>
