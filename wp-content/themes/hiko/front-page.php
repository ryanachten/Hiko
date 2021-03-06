<?php get_header(); ?>

	<?php	//Gets post assigned via ACF Relationship field
	$featured_article = get_field('landing_featured_article');
		if( $featured_article ): ?>
			<?php //assign featured post to post global
			$post = $featured_article[0];
				setup_postdata( $post ); ?>

				<section class="frontpage-hero-post"
				style="background-image: url('<?php
					echo esc_url( get_the_post_thumbnail_url( $post->ID, 'full') ); ?>');">

					<div class="frontpage-hero-description small-centered small-11 large-11 row">
							<?php get_template_part( 'parts/content', 'byline' ); ?>

						<?php //Style title based on post type
						if (get_post_type() == 'post'): ?>
							<h1 class="blog-title">
						<?php elseif (get_post_type() == 'projects'): ?>
							<h1 class="project-title">
						<?php elseif (get_post_type() == 'series'): ?>
							<h1 class="series-title">
						<?php endif; ?>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php esc_html_e(	the_title(), 'jointswp' ); ?>
								</a>
							</h1>
							<h5 class="fontpage-splash-excerpt subheader"><?php esc_html_e( get_the_excerpt(), 'jointswp' ); ?></h5>
					</div>

				</section>

			<?php wp_reset_postdata();  ?>
	<?php endif; ?>


	<div id="content">

		<div id="inner-content">

		    <main id="main" class="small-12 small-centered columns frontpage-content" role="main">

					<!-- Start of latest blog post section -->
					<section class="frontpage-sections small-12" data-equalizer>

						<div class="frontpage-section-header">
							<!-- Link to blog archive page -->
							<a href="<?php echo get_post_type_archive_link( 'post' ); ?>">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/branding-assets/dwp_bloglogo_bg.svg'?>" alt="projects page">
								<h4 class="section-title"><?php _e('Blog', 'jointswp'); ?></h4>
							</a>
						</div>

			    	<?php
							$args = array(
								'numberposts' => 4,
								'post_type'   => 'post'
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

					<!-- Start of latest project post section -->
					<section class="frontpage-sections small-12 columns" data-equalizer>

						<div class="frontpage-section-header">
							<!-- Link to project archive page -->
							<a href="<?php echo get_post_type_archive_link( 'projects' ); ?>">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/branding-assets/dwp_projectlogo_bg.svg'?>" alt="projects page">
								<h4 class="section-title"><?php _e('Projects', 'jointswp'); ?></h4>
							</a>
						</div>

			    	<?php
							$args = array(
								'numberposts' => 4,
								'post_type'   => 'projects'
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

					<!-- Start of latest series post section -->
					<section class="frontpage-sections small-12 columns" data-equalizer>
						<div class="frontpage-section-header">
							<!-- Link to series archive page -->
							<a href="<?php echo get_post_type_archive_link( 'series' ); ?>">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/branding-assets/dwp_serieslogo_bg.svg'?>" alt="">
								<h4 class="section-title"><?php _e('Series', 'jointswp');?></h4>
							</a>
						</div>

			    	<?php
							$args = array(
								'numberposts' => 4,
								'post_type'   => 'series'
								);

							$latest_series = get_posts( $args );

							if($latest_series){
									foreach ( $latest_series as $post ){
											setup_postdata( $post );
											get_template_part( 'parts/loop', 'custom-grid' );
										}
									wp_reset_postdata();
							}
						?>
					</section>
				</main>
	    </div>
	</div>
	<!-- <p style="text-align: center;">Template: front-page.php</p> -->


<?php get_footer(); ?>
