<?php get_header(); ?>

<div id="content">

	<?php //get_sidebar(); ?>

	<div id="inner-content" class="row">

		<main id="main" class="small-11 medium-10 large-8  columns small-centered" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>

					<!-- Check to see if any Series are associated with Post/Project
					via ACF Relationship reverse query -->
					<?php $series = get_posts( array(
						'post_type' => 'series',
						'meta_query' => array(
							array(
								'key' => 'series_parts', //name of the ACF Relantionship
								'value' => '"' . get_the_ID() . '"', //get ID of post as string
								'compare' => 'LIKE' // use meta_query LIKE to to match ID against db value in serialized array
							)
						)
					)); ?>
					<!-- If the Post/Project is associated with a Series
				link to the Series -->
					<?php if( $series ): ?>
						<p><strong>Featured in the following Series:</strong></p>
						<ul>
							<?php foreach( $series as $series_post ): ?>
								<li>
									<a href="<?php echo get_permalink( $series_post->ID ); ?>">
										<?php echo get_the_title( $series_post->ID ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

		<p style="text-align: center;">Template: single.php</p>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
