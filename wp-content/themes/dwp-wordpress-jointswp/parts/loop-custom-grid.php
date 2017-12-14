<!-- Custom blog/project/series thumbnail grid
to be used outside of The Loop alongside custom
index tracking

Based on loop-archive-grid -->
		<!--Item: -->
		<div class="article-thumbnail large-3 medium-6 columns panel" data-equalizer-watch>

			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">

				<!-- If post has a thumnail, add to section bg-img -->
				<?php if( has_post_thumbnail() ): ?>
					<a class="article-thumb-link" href="<?php the_permalink(); ?>" aria-label="Click to read article">
						<section class="archive-grid featured-image" itemprop="articleBody" style="background-image: url('<?php
							echo esc_url( get_the_post_thumbnail_url($post->ID, 'medium') );
						?>');">
						</section> <!-- end article section -->
					</a>
				<?php endif; ?>

				<header class="article-header">
					<?php if( get_post_type() == 'projects'):  ?>
						<h4 class="article-title project-background">
					<?php elseif( get_post_type() == 'series'):  ?>
						<h4 class="article-title series-background">
					<?php elseif( get_post_type() == 'post'):  ?>
						<h4 class="article-title blog-background">
					<?php endif; ?>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php esc_html_e( the_title(), 'jointswp' ); ?></a></h4>
					<?php get_template_part( 'parts/content', 'byline' ); ?>
				</header> <!-- end article header -->

				<section class="entry-content" itemprop="articleBody">
					<?php esc_html_e( the_excerpt() ); ?>
				</section> <!-- end article section -->

			</article> <!-- end article -->

		</div>
