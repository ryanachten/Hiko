<!-- <p > -->
	<h6 class="byline">
		<strong><?php
			if( function_exists( 'coauthors_posts_links' ) ){
				coauthors_posts_links();
			}else{
				the_author_posts_link();
			}
		?></strong>
		<span class="byline-divider">/</span> <?php the_time('F j') ?>
	</h6>
	<!-- <small>  </small> -->
<!-- </p> -->
