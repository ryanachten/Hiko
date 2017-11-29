<article id="post-<?php the_ID(); ?>" <?php post_class('frontpage-hero-section'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header>

		<!-- Splash image -->
		<section class="article-hero-image"
		style="background-image: url('<?php
			echo esc_url( get_the_post_thumbnail_url( $post->ID, 'medium') ); ?>');">

			<!-- Splash description -->
			<div class="article-hero-description small-12 large-6 row">

				<div>
					<!-- Title background based on post type -->
					<?php if ( get_post_type() == 'projects' ): ?>
							<h1 class="entry-title single-title project-background" itemprop="headline"><?php the_title(); ?></h1>
					<?php elseif ( get_post_type() == 'series' ): ?>
							<h1 class="entry-title single-title series-background" itemprop="headline"><?php the_title(); ?></h1>
					<?php elseif ( get_post_type() == 'post' ): ?>
							<h1 class="entry-title single-title blog-background" itemprop="headline"><?php the_title(); ?></h1>
					<?php endif; ?>
				</div>

				<?php get_template_part( 'parts/content', 'byline' ); ?>
			</div>
		</section>

	</header>

	<!-- Article content -->
  <section class="entry-content small-11 medium-10 large-8 small-centered" itemprop="articleBody">
		<?php the_content(); ?>
	</section>

</article> <!-- end article -->
