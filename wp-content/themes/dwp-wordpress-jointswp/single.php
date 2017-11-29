<?php get_header(); ?>

<div id="content">

	<?php //get_sidebar(); ?>

	<div id="inner-content">

		<main id="main" class="small-12 small-centered" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<hr>

<!-- Get metadata links -->
<?php get_template_part( 'parts/single', 'metalinks' ); ?>

<!-- Article pagigination using the nextpage quicktag -->
<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>

<p style="text-align: center;">Template: single.php</p>

<!-- Comments not allowed on frontend of site - uncomment if requirement changes -->
<?php // comments_template(); ?>

<?php get_footer(); ?>
