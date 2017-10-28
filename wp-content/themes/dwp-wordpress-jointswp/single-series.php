<!-- Template used for displaying the Series pages -->
<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="row">

		<main id="main" class="small-11 medium-10 large-8  columns small-centered" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

			</main> <!-- end #main -->

			 <section class="medium-12 large-12 small-centered columns">

			<!-- get posts for series parts and loop through posts
		 		defined in functions.php-->
			<?php	loop_custom_grid( 'series_parts', false, 4 ); ?>

			</section>

	</div> <!-- end #inner-content -->
	<p style="text-align: center;">Template: single-series.php</p>

</div> <!-- end #content -->

<?php get_footer(); ?>
