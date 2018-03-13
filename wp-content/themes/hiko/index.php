<?php get_header(); ?>

	<div id="content">

 	<?php get_sidebar(); ?>

	<hr>

		<div id="inner-content" class="row">

		    <main id="main" class="medium-10 large-10 small-centered columns" role="main">

			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php //To see additional archive styles, visit the /parts directory
					get_template_part( 'parts/loop', 'archive-grid' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>

		    </main>

				<p style="text-align: center;">Template: index.php</p>

		</div>
	</div>

<?php get_footer(); ?>
