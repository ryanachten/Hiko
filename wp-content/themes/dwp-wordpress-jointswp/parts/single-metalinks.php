<!-- Provides metadata links for single posts (blog/project/series) -->

<?php
$article_categories = get_the_category();
$article_courses = get_the_terms( $post->ID, 'courses' );
$article_tags = get_the_tags();
//Check to see if any Series are associated with Post/Project
//via ACF Relationship reverse query
$series = get_posts( array(
	'post_type' => 'series',
	'meta_query' => array(
		array(
			'key' => 'series_parts', //name of the ACF Relantionship
			'value' => '"' . get_the_ID() . '"', //get ID of post as string
			'compare' => 'LIKE' // use meta_query LIKE to to match ID against db value in serialized array
		)
	)
));


$categoriesToShow = false;
if (!empty( $article_categories ) && $article_categories[0]->name !== 'Uncategorised') {
	$categoriesToShow = true;
}

// Prevents the metadata box being present if there is no metadata to show
if( $categoriesToShow ||
		!empty( $article_tags ) ||
		!empty( $article_courses ) ||
		!empty( $series )): ?>

	<!-- Article metadata section -->
	<section id="article-metacontainer" class="small-10 medium-10 large-8 small-centered">

		<h5>Article Information:</h5>

		<!-- Article tags -->
		<p class="tags">
			<?php the_tags('<h6 class="tags-title"><strong>' . __( 'Keywords:', 'jointswp' ) . '</strong></h6> ', ', ', ''); ?>
		</p>

		<!-- Article categories -->
		<p class="categories">
			<?php
				// Prevent empty strings or simply 'Uncategorised' presenting category section
				if( !empty( $article_categories ) && $article_categories[0]->name !== 'Uncategorised' ):?>
					<h6 class="categories-title"><strong><?php _e('Categories:', 'jointswp'); ?></strong></h6>
					<?php the_category(', '); ?>
				<?php endif; ?>
		</p>

		<!-- Article courses -->
		<p class="courses">
			<?php  //access ACF Taxonomy field
				 if( !empty( $article_courses ) ): ?>
					<h6 class="courses-title"><strong><?php _e('Courses:', 'jointswp');?></strong></h6>
					<?php the_terms($post->ID, 'courses', '', '<br>', '' ); ?>
				<?php endif; ?>
		</p>

		<!-- If the Post/Project is associated with a Series
		link to the Series -->
		<?php if( $series ): ?>

			<section id="article-relatedseries-container" class="small-10 small-centered">

				<h5><?php _e('Featured in the following', 'jointswp'); ?> <a href="<?php echo get_post_type_archive_link( 'series' ); ?>"><?php _e('Series') ?></a>:</h5>

					<?php foreach( $series as $series_post ): ?>
						<a href="<?php echo get_permalink( $series_post->ID ); ?>">
							<div class="article-relatedseries-thumb" style="background-image: url(<?php echo get_the_post_thumbnail_url($series_post->ID); ?>);">

								<h5 class="article-relatedseries-title"><?php esc_html_e( get_the_title( $series_post->ID ), 'jointswp' ); ?></h5>

							</div>
						</a>
					<?php endforeach; ?>

			</section>

		<?php endif; ?>

	</section>

<?php endif; ?>
