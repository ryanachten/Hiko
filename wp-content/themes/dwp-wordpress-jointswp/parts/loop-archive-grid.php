<?php
// Adjust the amount of rows in the grid
$grid_columns = 4; ?>

<?php if( 0 === ( $wp_query->current_post  )  % $grid_columns ): ?>

    <div class="archive-grid" data-equalizer> <!--Begin Row:-->

<?php endif; ?>

		<!--Item: -->
		<div class="article-thumbnail large-3 medium-6 columns panel" data-equalizer-watch>

			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">

				<!-- If post has a thumnail, add to section bg-img -->
				<?php if( has_post_thumbnail() ): ?>
					<section class="archive-grid featured-image" itemprop="articleBody" style="background-image: url('<?php
						echo esc_url( get_the_post_thumbnail_url($post->ID, 'medium') );
					?>');">
					</section> <!-- end article section -->
				<?php endif; ?>

				<header class="article-header">
					<header class="article-header">
						<?php if( get_post_type() == 'projects'):  ?>
							<h4 class="article-title project-background">
						<?php elseif( get_post_type() == 'series'):  ?>
							<h4 class="article-title series-background">
						<?php elseif( get_post_type() == 'post'):  ?>
							<h4 class="article-title blog-background">
						<?php endif; ?>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
					<?php get_template_part( 'parts/content', 'byline' ); ?>
				</header> <!-- end article header -->

				<section class="article-body entry-content" itemprop="articleBody">
					<?php the_excerpt(); ?>
					<!-- '<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>' -->
				</section> <!-- end article section -->

			</article> <!-- end article -->

		</div>

<?php if( 0 === ( $wp_query->current_post + 1 )  % $grid_columns ||  ( $wp_query->current_post + 1 ) ===  $wp_query->post_count ): ?>

   </div>  <!--End Row: -->

<?php endif; ?>
