<?php get_header(); ?>

	<div id="content">

		<header class="archive-header medium-10 large-10 small-centered columns" >
			<?php //Title formatting for Course archive
			if ( is_tax( 'courses' ) ): ?>
					<h3 class="page-title"><?php _e( 'Course:', 'jointswp' ); ?></h3>
					<h2 class="subheader"><?php esc_html_e( single_term_title() );?></h2>
			<?php //Title formatting for Date archive
			elseif ( is_date() ): ?>
					<h3 class="page-title"><?php _e( 'Date Archive:', 'jointswp' ); ?></h3>
					<h2 class="subheader"><?php esc_html_e( get_the_date( 'F, Y' ) );?></h2>
			<?php //Title formatting for Category archive
			elseif ( is_category() ): ?>
						<h3 class="page-title"><?php _e( 'Category:', 'jointswp' ); ?></h3>
						<h2 class="subheader"><?php esc_html_e( single_term_title() ); ?></h2>
			<?php //Title formatting for Tag archive
			elseif ( is_tag() ): ?>
						<h3 class="page-title"><?php _e( 'Articles Tagged With:', 'jointswp' ); ?></h3>
						<h2 class="subheader"><?php esc_html_e( single_term_title(), 'jointswp' ); ?></h2>
			<?php //Fallback for other stuff
			else: ?>
				<h2><?php _e( the_archive_title(), 'jointswp' ); ?></h2>
			<?php endif; ?>


		<?php _e( the_archive_description('<div class="taxonomy-description">', '</div>'), 'jointswp' );?>
		</header>

		<?php get_search_form(); ?>

		<hr>

		<div id="inner-content">

		    <main id="main" class="archive-thumb-container" role="main">

		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php //To see additional archive styles, visit the /parts directory
					get_template_part( 'parts/loop', 'archive-grid' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>

			</main>
	  </div>
	</div>
	<!-- <p style="clear: both; text-align: center;">Template: archive.php</p> -->

<?php get_footer(); ?>
