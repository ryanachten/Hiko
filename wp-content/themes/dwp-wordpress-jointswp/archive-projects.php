<?php get_header(); ?>

	<div id="content">

		<header class="archive-header medium-12 large-12 small-centered columns" >
			<h1 class="page-title">
				<?php	post_type_archive_title(); ?>
			</h1>
			<div class="taxonomy-description">
				<p><?php	echo get_post_type_object( 'projects' )->description; ?></p>
		</div>
		</header>

		<?php get_sidebar(); ?>

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
	<div class="">
		<p style="text-align: center;">Template: archive-projects.php</p>
	</div>	

<?php get_footer(); ?>
