<?php get_header(); ?>

	<div id="content" class="row">

		<header class="archive-header medium-10 large-10 small-centered columns" >
			<h1 class="page-title">
				<?php $seriesObj = get_post_type_object( 'series' );
				echo ucfirst( $seriesObj->name ); ?>
			</h1>
			<div class="taxonomy-description">
				<?php	echo $seriesObj->description; ?>
		</div>
		</header>

		<?php get_sidebar(); ?>

		<hr>

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
	<p style="text-align: center;">Template: archive-series.php</p>

<?php get_footer(); ?>
