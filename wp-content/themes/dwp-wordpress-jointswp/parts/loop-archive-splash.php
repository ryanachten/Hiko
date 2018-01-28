<header class="archive-splash article-hero-section">
	<!-- Splash image -->

	<!-- Splash description -->
	<section class="article-hero-image small-11 medium-11 large-11"
	style="background-image: url('<?php
		echo esc_url( get_the_post_thumbnail_url( $post->ID, 'full') ); ?>');">

		<div class="article-hero-description small-centered small-11 large-11 row">
				<?php get_template_part( 'parts/content', 'byline' ); ?>

				<!-- Title background based on post type -->
				<?php if ( get_post_type() == 'projects' ): ?>
					<h1 class="entry-title single-title project-background" itemprop="headline">
				<?php elseif ( get_post_type() == 'series' ): ?>
					<h1 class="entry-title single-title series-background" itemprop="headline">
				<?php elseif ( get_post_type() == 'post' ): ?>
					<h1 class="entry-title single-title blog-background" itemprop="headline">
				<?php endif; ?>
						<a href="<?php the_permalink() ?>"><?php esc_html_e( the_title(), 'jointswp' ); ?></a>
					</h1>
		<?php if( !empty(get_the_excerpt()) ) : ?>
			<div class="archive-splash-excerpt">
				<p> <?php echo get_the_excerpt(); ?></p>
			</div>
		<?php endif; ?>
		</div>
	</section>
</header>
