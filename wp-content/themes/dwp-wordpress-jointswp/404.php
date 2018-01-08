<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="row">

			<main id="main" class="large-12 medium-10 columns small-centered" role="main">

				<article id="content-not-found">

					<header class="fourofour-header">
						<h1 class="text-center"><?php _e( 'Epic 404 - Page Not Found', 'jointswp' ); ?></h1>
					</header> <!-- end article header -->

					<section class="fourofour-content text-center">
						<h3 class="subheader"><?php _e( 'Sorry! The page you were looking for was not found, how about searching for it below?', 'jointswp' ); ?></h3>
						<?php get_search_form() ?>
					</section> <!-- end article section -->

					<h3 class="subheader text-center"><?php _e( '...Or check out one of these articles:', 'jointswp' ); ?></h3>
					<!-- Provides latest article thumbnails -->
					<section class="fourofour-content archive-thumb-container">
						<?php
							$args = array(
								'numberposts' => 4,
								'post_type'   => ['post','projects','series']
								);

							$latest_projects = get_posts( $args );

							if($latest_projects){
									foreach ( $latest_projects as $post ){
											setup_postdata( $post );
											get_template_part( 'parts/loop', 'custom-grid' );
										}
									wp_reset_postdata();
							}
						?>
					</section>

				</article> <!-- end article -->

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
