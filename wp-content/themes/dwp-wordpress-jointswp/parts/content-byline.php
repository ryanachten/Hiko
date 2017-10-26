<!-- <p > -->
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
		<strong>
		<?php
			if( function_exists( 'coauthors_posts_links' ) ){
				coauthors_posts_links();
			}else{
				the_author_posts_link();
			}	?>
		</strong>
		<span class="byline-divider">/</span> <?php the_time('F j') ?>
	</h6>
	<!-- <small>  </small> -->
<!-- </p> -->
