<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="row">

			<main id="main" class="large-10 medium-10 columns small-centered" role="main">

				<article id="content-not-found">

					<header class="fourofour-header">
						<h1 class="text-center"><?php _e( 'Epic 404 - Article Not Found', 'jointswp' ); ?></h1>
					</header> <!-- end article header -->

					<section class="fourofour-content text-center">
						<h3 class="subheader"><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'jointswp' ); ?></h3>
					</section> <!-- end article section -->

					<section class="search">
					    <!-- <p><?php //get_search_form(); ?></p> -->
							<?php get_sidebar(); ?>
					</section> <!-- end search section -->

				</article> <!-- end article -->

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

		<hr>

	</div> <!-- end #content -->

<?php get_footer(); ?>
