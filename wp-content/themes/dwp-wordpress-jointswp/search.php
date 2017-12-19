<!-- Template used for displaying search queries -->

<?php get_header(); ?>

	<div id="content">

		<header class="archive-header medium-10 large-10 small-centered columns" >
			<h3 class="page-title"><?php _e('Search', 'jointswp'); ?></h3>
			<h2 class="subheader"> <?php _e('Showing results for:', 'jointswp'); ?> <em>'<?php esc_attr_e( get_search_query() ); ?>'</em></h2>
		</header>

		<?php get_search_form(); ?>

		<hr>

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
	<p style="clear: both; text-align: center;">Template: search.php</p>

<?php get_footer(); ?>
