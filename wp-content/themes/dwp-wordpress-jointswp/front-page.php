<?php get_header(); ?>

<section class="frontpage-hero-section small-12 small-centered columns" >

	<?php
		$args = array(
			'numberposts' => 1,
			'post_type'   => 'projects'
			);

		$latest_posts = get_posts( $args );

		if( $latest_posts ): foreach( $latest_posts as $post ):?>
						<?php setup_postdata( $post ); ?>
						<?php if( has_post_thumbnail() ): ?>
							<section class="frontpage-hero-post"
							style="background-image: url('<?php
								echo esc_url( get_the_post_thumbnail_url( $post->ID, 'medium') ); ?>');">

								<div class="frontpage-hero-description small-centered small-11 large-11 row">
										<?php get_template_part( 'parts/content', 'byline' ); ?>
										<h1 class="title">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
												<?php the_title(); ?>
											</a>
										</h1>
										<?php the_excerpt(); ?>
								</div>
							</section>
						<?php endif; ?>
					<?php endforeach;?>
				<?php wp_reset_postdata();  ?>
	<?php endif; ?>


</section>

	<div id="content">

		<div id="inner-content">

		    <main id="main" class="small-12 small-centered columns frontpage-content" role="main">

					<!-- Start of latest blog post section -->
					<section class="frontpage-sections small-12 columns" data-equalizer>

						<div class="frontpage-section-header">
							<!-- Link to blog archive page -->
							<a href="<?php echo get_post_type_archive_link( 'post' ); ?>">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/branding-assets/dwp_bloglogo_bg.svg'?>" alt="projects page">
								<h4 class="section-title">Blog</h4>
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
								<h4 class="section-title">Projects</h4>
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
								<h4 class="section-title">Series</h4>
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

				</main> <!-- end #main -->

	    </div> <!-- end #inner-content -->

	</div> <!-- end #content -->
	<div class="small-12">
			<p style="text-align: center;">Template: front-page.php</p>
	</div>


<?php get_footer(); ?>
