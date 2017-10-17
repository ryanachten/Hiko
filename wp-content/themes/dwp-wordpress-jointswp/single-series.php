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

						<?php foreach ($posts as $post): ?>

							<?php setup_postdata($post); ?>

							<!-- Thumbnail styles from loop-archive-grid.php
								TODO: move into template part to keep DRY
							-->
							<div class="large-4 medium-4 columns panel" data-equalizer-watch>

								<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">

									<!-- If post has a thumnail, add to section bg-img -->
									<?php if( has_post_thumbnail() ): ?>
										<section class="archive-grid featured-image" itemprop="articleBody" style="background-image: url('<?php
											echo esc_url( get_the_post_thumbnail_url($post->ID, 'medium') );
										?>');">
										</section> <!-- end article section -->
									<?php endif; ?>

									<header class="article-header">
										<h3 class="title">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
										<?php get_template_part( 'parts/content', 'byline' ); ?>
									</header> <!-- end article header -->

									<section class="entry-content" itemprop="articleBody">
										<?php the_excerpt(); ?>
										<!-- '<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>' -->
									</section> <!-- end article section -->

								</article> <!-- end article -->

							</div>

				    <?php endforeach; ?>

				   	<?php wp_reset_postdata(); ?>

		    <?php endif; ?>

				</section>

	</div> <!-- end #inner-content -->
	<p style="text-align: center;">Template: single-series.php</p>

</div> <!-- end #content -->

<?php get_footer(); ?>
