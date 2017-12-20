<div id="post-not-found" class="hentry">

	<?php if ( is_search() ) : ?>

		<header class="search-noresults-header">
			<h1><?php _e( 'Oops, no results found!', 'jointswp' );?></h1>
		</header>

		<section class="entry-content">
			<h3 class="text-center subheader"><?php _e( 'How about searching for something else?', 'jointswp' );?></h3>
		</section>

		<!-- <footer class="article-footer">
			<p><?php _e( 'This is the error message in the parts/content-missing.php template.', 'jointswp' ); ?></p>
		</footer> -->

	<?php else: ?>

		<header class="article-header">
			<h1><?php _e( 'Oops, Post Not Found!', 'jointswp' ); ?></h1>
		</header>

		<section class="entry-content">
			<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'jointswp' ); ?></p>
		</section>

		<section class="search">
		    <p><?php get_search_form(); ?></p>
		</section> <!-- end search section -->

		<footer class="article-footer">
		  <p><?php _e( 'This is the error message in the parts/content-missing.php template.', 'jointswp' ); ?></p>
		</footer>

	<?php endif; ?>

</div>
