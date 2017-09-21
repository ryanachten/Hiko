<?php get_header(); ?>

	<div id="content" class="row">



		<header class="archive-header medium-10 large-10 small-centered columns" >
			<?php echo get_avatar( $post->post_author ); ?>
			<h1 class="page-title">
				<?php the_author_meta( 'display_name', $post->post_author ); ?>
			</h1>
			<div class="taxonomy-description">
				<?php the_author_meta( 'description', $post->post_author ); ?>
			</div>
		</header>

		<hr>

		<h3 class="text-center">Recent Articles:</h3>

		<div id="inner-content" class="row">

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
	<p style="text-align: center;">Template: author.php</p>

<?php get_footer(); ?>
