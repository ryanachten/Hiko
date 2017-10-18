<?php get_header(); ?>

	<div id="content" class="row">



		<header class="archive-header medium-10 large-10 small-centered columns" >
			<?php echo get_avatar( $post->post_author ); ?>
			<h1 class="page-title">
				<?php the_author_meta( 'display_name', $post->post_author ); ?>
			</h1>
			<div class="taxonomy-description">
				<?php the_author_meta( 'description', $post->post_author ); ?>
			</div>
			<div class="author-social-container">
					<a class="author-social-icon" href="mailto:<?php
					the_author_meta( 'user_email', $post->post_author ); ?>">
						<i class="fi-mail"></i>
					</a>
					<?php
						$author_web = get_the_author_meta( 'url', $post->post_author );
						if( !empty($author_web) ): ?>
							<a class="author-social-icon" href="<?php
							the_author_meta( 'url', $post->post_author ); ?>">
								<i class="fi-web"></i>
							</a>
					<?php endif; ?>
			</div>
		</header>

		<hr>

		<h3 class="text-center">Featured Projects</h3>

		<div id="inner-content" class="row">

		    <main id="main" class="medium-10 large-10 small-centered columns" role="main">

					<?php

						// assign posts to the return from the ACF Relationship field type
						$posts = get_field( 'featured_projects', 'user_'.$post->post_author );
						if( $posts ):	?>

							<?php
								// Need custom index tracker since this doesn't work
								// work directly with wp_query->current_index
								// process below based on loop-archive-grid.php
								$grid_columns = 3;
								$current_index = 0;
							?>

							<?php foreach ($posts as $post): ?>

								<!-- Check for the start of new row -->
								<?php if( 0 === ( $current_index  ) % $grid_columns ): ?>

								    <div class="row archive-grid" data-equalizer>

								<?php endif; ?>

								<?php setup_postdata($post); ?>

								<?php get_template_part( 'parts/loop', 'custom-grid' ); ?>

								<!-- If the next post exceeds the grid_columns or at the end of the posts, close off the row -->
								<?php if( 0 === ( $current_index + 1 ) % $grid_columns
									||  ( $current_index + 1 ) ===  3 ): ?>

									</div>  <!--End row -->

								<?php endif; ?>

								<?php
									$current_index++;
								?>

					    <?php endforeach; ?>

					   	<?php wp_reset_postdata(); ?>

			    <?php endif; ?>

			</main> <!-- end #main -->



	    </div> <!-- end #inner-content -->

	</div> <!-- end #content -->
	<p style="text-align: center;">Template: author.php</p>

<?php get_footer(); ?>
