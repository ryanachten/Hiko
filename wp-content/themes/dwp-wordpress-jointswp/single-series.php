<!-- Template used for displaying the Series pages -->
<?php get_header(); ?>

<div id="content">

	<?php //get_sidebar(); ?>

	<div id="inner-content" class="row">

		<main id="main" class="small-11 medium-10 large-8  columns small-centered" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

				</main> <!-- end #main -->

				 <section class="medium-10 large-10 small-centered columns">

				<?php

					// assign posts to the return from the ACF Relationship field type
					$posts = get_field( 'series_parts' );
					if( $posts ):	?>

						<?php
							// Need custom index tracker since this doesn't work
							// work directly with wp_query->current_index
							// process below based on loop-archive-grid.php
							$grid_columns = 3;
							$current_index = 0;
						?>

						<?php foreach ($posts as $post): ?>

							<!-- Check for the start of new row -->
							<?php if( 0 === ( $current_index  ) % $grid_columns ): ?>

							    <div class="row archive-grid" data-equalizer>

							<?php endif; ?>

							<?php setup_postdata($post); ?>

							<?php get_template_part( 'parts/loop', 'custom-grid' ); ?>

							<!-- If the next post exceeds the grid_columns or at the end of the posts, close off the row -->
							<?php if( 0 === ( $current_index + 1 ) % $grid_columns
								||  ( $current_index + 1 ) ===  3 ): ?>

								</div>  <!--End row -->

							<?php endif; ?>

							<?php
								$current_index++;
							?>

				    <?php endforeach; ?>

				   	<?php wp_reset_postdata(); ?>

		    <?php endif; ?>

				</section>

	</div> <!-- end #inner-content -->
	<p style="text-align: center;">Template: single-series.php</p>

</div> <!-- end #content -->

<?php get_footer(); ?>
