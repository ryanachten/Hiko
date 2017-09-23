<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<?php
			// If co-authors are present, pull in their avatars
			if( function_exists( 'get_coauthors' ) ):
				$coauthors = get_coauthors();
				foreach( $coauthors as $coauthor): ?>
					<div class="coauthor-avatar">
						<?php echo coauthors_get_avatar( $coauthor, 65 ); ?>
					</div>
				<?php endforeach; else:
					// If co-authors not are present, pull in author avatar
					echo get_avatar( $post->post_author );
				endif;
		?>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">

		<!-- If post has a thumnail, add to section bg-img -->
		<?php if( has_post_thumbnail() ): ?>
		  <section class="articleBody featured-image" itemprop="articleBody" style="background-image: url('<?php
		    echo esc_url( get_the_post_thumbnail_url($post->ID, 'medium') );
		  ?>');">
		  </section> <!-- end article section -->
		<?php endif; ?>

		<?php the_content(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->
