<?php get_header(); ?>

<div id="content">

	<?php //get_sidebar(); ?>

	<div id="inner-content" class="row">

		<main id="main" class="large-8 medium-8 columns small-centered" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

		<p style="text-align: center;">Template: single.php</p>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
