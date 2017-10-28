<?php get_header(); ?>

	<div id="content">

		<header class="archive-header medium-10 large-10 small-centered columns" >
			<img src="<?php echo get_template_directory_uri() . '/assets/images/branding-assets/dwp_bloglogo_bg.svg'?>" alt="blog page">
			<h2 class="page-title"><?php wp_title( '', true, '');?></h2>
		<?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
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
	<p style="text-align: center;">Template: home.php</p>

<?php get_footer(); ?>
