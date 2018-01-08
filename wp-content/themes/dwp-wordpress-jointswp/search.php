<!-- Template used for displaying search queries -->

<title><?php
	// Overrides the default title tag which doesn't work for custom filter
	echo wp_title('', false) . '&ndash; ' . get_bloginfo( 'name' ); ?>
</title>

<?php get_header(); ?>

	<div id="content">

		<header class="archive-header medium-10 large-10 small-centered columns" >
			<h2><?php _e('Showing results for:', 'jointswp'); ?></h2>
		</header>

		<?php get_search_form(); ?>


		<div id="inner-content">

		    <main id="main" class="medium-12 large-12 small-centered columns archive-thumb-container" role="main">

		    	<?php if (have_posts()) : ?>
					<hr class="search__divider">
					<?php while (have_posts()) : the_post(); ?>

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
	<p style="clear: both; text-align: center;">Template: search.php</p>

<?php get_footer(); ?>
