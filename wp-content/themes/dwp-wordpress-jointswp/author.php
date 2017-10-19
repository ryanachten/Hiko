<?php
	function get_custom_grid($field, $grid_columns){
		global $post;
		$posts = get_field( $field, 'user_'.$post->post_author );

			if( $posts ){
					$current_index = 0;

				foreach ($posts as $post){

					if( 0 === ( $current_index  ) % $grid_columns ){
						echo '<div class="row archive-grid" data-equalizer>';
					}

					setup_postdata($post);

					get_template_part( 'parts/loop', 'custom-grid' );

					if( 0 === ( $current_index + 1 ) % $grid_columns
						||  ( $current_index + 1 ) ===  3 ){
								echo '</div>';
						}

					$current_index++;

				}
				wp_reset_postdata();

			}
} ?>

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

		<div id="inner-content" class="row">

		    <section id="featured-posts" class="featured-article medium-10 large-10 small-centered columns" role="region">

					<h3 class="text-center">Featured Posts</h3>

					<?php	get_custom_grid('featured_posts', 3); ?>

				</section>

				<hr>

				<section id="featured-projects" class="featured-article medium-10 large-10 small-centered columns" role="region">

					<h3 class="text-center">Featured Projects</h3>

					<?php	get_custom_grid('featured_projects', 3); ?>

				</section>

				<hr>

				<section id="featured-series" class="featured-article medium-10 large-10 small-centered columns" role="region">

					<h3 class="text-center">Featured Series</h3>

					<?php	get_custom_grid('featured_series', 3); ?>

				</section>

				
	    </div> <!-- end #inner-content -->

	</div> <!-- end #content -->
	<p style="text-align: center;">Template: author.php</p>

<?php get_footer(); ?>
