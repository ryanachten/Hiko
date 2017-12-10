<h6 class="byline">
	<!-- Projects Icon -->
	<?php if( get_post_type() == 'projects' ): ?>
		<img class="byline-typeicon" src="<?php echo get_template_directory_uri() . '/assets/images/branding-assets/dwp_projectlogo_bg.svg'?>" alt="projects page">
		<!-- Series Icon -->
	<?php elseif( get_post_type() == 'series' ): ?>
		<img class="byline-typeicon" src="<?php echo get_template_directory_uri() . '/assets/images/branding-assets/dwp_serieslogo_bg.svg'?>" alt="series page">
	<?php elseif( get_post_type() == 'post' ): ?>
		<img class="byline-typeicon" src="<?php echo get_template_directory_uri() . '/assets/images/branding-assets/dwp_bloglogo_bg.svg'?>" alt="blog page">
	<?php endif; ?>

	<!-- Author credits -->
	<?php
		if( function_exists( 'coauthors_posts_links' ) ){
			coauthors_posts_links( null, ' & ', null, null, true );
		}else{
			the_author_posts_link();
		}	?>
</h6>

<!-- Article date -->
<p class="byline-date"><?php _e( the_time('F j, Y'), 'jointswp' );?></p>
