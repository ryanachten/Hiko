<?php get_header(); ?>

	<div id="content">

		<header class="archive-header medium-10 large-10 small-centered columns" >
			<img src="<?php echo get_template_directory_uri() . '/assets/images/branding-assets/dwp_serieslogo_bg.svg'?>" alt="series page">
			<h3 class="page-title">
				<?php	esc_html_e( post_type_archive_title(), 'jointswp' ); ?>
			</h3>
			<div class="taxonomy-description series-background">
				<p><?php echo esc_html_e( get_post_type_object( 'series' )->description, 'jointswp' ); ?></p>
		</div>
		</header>

		<?php get_sidebar(); ?>
		

		<div id="inner-content">

		    <main id="main" class="medium-12 large-12 small-centered columns" role="main">

		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>

			</main> <!-- end #main -->



	    </div> <!-- end #inner-content -->

	</div> <!-- end #content -->
	<p style="clear: both; text-align: center;">Template: archive-series.php</p>

<?php get_footer(); ?>
