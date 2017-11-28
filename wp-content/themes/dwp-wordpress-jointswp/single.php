<?php get_header(); ?>

<div id="content">

	<?php //get_sidebar(); ?>

	<div id="inner-content">

		<main id="main" class="small-12 small-centered" role="main">

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
				<section id="article-relatedseries-container" class="small-10 small-centered">
					<?php if( $series ): ?>
						<h4>Featured in the following Series:</h4>
							<?php foreach( $series as $series_post ): ?>
								<a href="<?php echo get_permalink( $series_post->ID ); ?>">
									<div class="article-relatedseries-thumb" style="background-image: url(<?php echo get_the_post_thumbnail_url($series_post->ID); ?>);">

										<h5><?php echo get_the_title( $series_post->ID ); ?></h5>

									</div>

								</a>
							<?php endforeach; ?>
					<?php endif; ?>
				</section>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

		<p style="text-align: center;">Template: single.php</p>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
