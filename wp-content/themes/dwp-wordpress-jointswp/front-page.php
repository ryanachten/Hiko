<?php get_header(); ?>

	<div id="content" class="row">

		<header class="archive-header medium-12 small-centered columns" >

			<?php
				$args = array(
					'numberposts' => 1,
					'post_type'   => 'post'
					);

				$latest_posts = get_posts( $args );

				if( $latest_posts ): foreach( $latest_posts as $post ):?>
								<?php setup_postdata( $post ); ?>
								<?php if( has_post_thumbnail() ): ?>
									<section class="featured-post featured-image"
									style="background-image: url('<?php
										echo esc_url( get_the_post_thumbnail_url( $post->ID, 'medium') ); ?>');">

										<div class="featured-post description small-12 medium-6 row">
											<div class="small-12 large-5">
												<h3 class="title">
													<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
													<?php get_template_part( 'parts/content', 'byline' ); ?>
												</h3>


											</div>

											<div class="small-12 large-5"> <?php the_excerpt(); ?> </div>
										</div>
									</section>
								<?php endif; ?>
							<?php endforeach;?>
						<?php wp_reset_postdata();  ?>
			<?php endif; ?>


		</header>

		<?php get_sidebar(); ?>

		<div id="inner-content" class="row">

		    <main id="main" class="medium-12 large-12 small-centered columns row" role="main">

					<h3 class="text-center">Projects</h3>
					<hr>
					<section class="frontpage-sections medium-12 large-12 columns row">
			    	<?php
							$args = array(
								'numberposts' => 2,
								'post_type'   => 'projects'
								);

							$latest_projects = get_posts( $args );

							if($latest_projects){
									foreach ( $latest_projects as $post ){
											setup_postdata( $post );
											get_template_part( 'parts/loop', 'frontpage-grid' );
										}
									wp_reset_postdata();
							}
						?>
					</section>

					<h3 class="text-center">Series</h3>
					<hr>
					<section class="frontpage-sections medium-12 large-12 columns row">
			    	<?php
							$args = array(
								'numberposts' => 2,
								'post_type'   => 'series'
								);

							$latest_series = get_posts( $args );

							if($latest_series){
									foreach ( $latest_series as $post ){
											setup_postdata( $post );
											get_template_part( 'parts/loop', 'frontpage-grid' );
										}
									wp_reset_postdata();
							}
						?>
					</section>

				</main> <!-- end #main -->

	    </div> <!-- end #inner-content -->

	</div> <!-- end #content -->
	<p style="text-align: center;">Template: front-page.php</p>

<?php get_footer(); ?>
