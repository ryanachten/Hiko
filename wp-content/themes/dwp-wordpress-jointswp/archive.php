<?php get_header(); ?>

	<div id="content">

		<header class="archive-header medium-10 large-10 small-centered columns" >
			<!-- Title formatting for Course archive -->
			<?php if ( is_tax( 'courses' ) ): ?>
					<h2>Course:</h2>
					<h3 class="page-title subheader"><?php single_term_title();?></h3>
			<!-- Title formatting for Date archive -->
			<?php elseif ( is_date() ): ?>
					<h2>Date Archive:</h2>
					<h3 class="page-title subheader"><?php echo get_the_date( 'F, Y' );?></h3>
			<!-- Fallback for other stuff -->
			<?php else: ?>
				<h2><?php the_archive_title(); ?></h2>
			<?php endif; ?>


		<?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
		</header>

		<?php get_sidebar(); ?>

		<hr>

		<div id="inner-content">

		    <main id="main" class="medium-10 large-10 small-centered columns" role="main">

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
	<p style="clear: both; text-align: center;">Template: archive.php</p>

<?php get_footer(); ?>
