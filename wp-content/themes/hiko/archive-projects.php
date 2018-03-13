<?php get_header(); ?>

	<div id="content">

		<header class="archive-header medium-10 large-10 small-centered columns" >
			<img src="<?php echo get_template_directory_uri() . '/assets/images/branding-assets/dwp_projectlogo_bg.svg'?>" alt="projects page">
			<h3 class="page-title">
				<?php	esc_html_e( post_type_archive_title(), 'jointswp' ); ?>
			</h3>
			<div class="taxonomy-description project-background">
				<p><?php echo esc_html_e( get_post_type_object( 'projects' )->description, 'jointswp' ); ?></p>
		</div>
		</header>

		<?php get_search_form(); ?>

		<div id="inner-content">

		    <main id="main" class="archive-thumb-container" role="main">

		    	<?php
					$first_post = true;
					if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php if ($first_post){
						// Apply splash thumbnail template if first post
						get_template_part( 'parts/loop', 'archive-splash' );
						$first_post = false;
					}else{
						// For test, apply general thumbnail template
						get_template_part( 'parts/loop', 'archive-grid' );
					} ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>

			</main>
    </div>
	</div>
	<!-- <p style="clear: both; text-align: center;">Template: archive-projects.php</p> -->

<?php get_footer(); ?>
