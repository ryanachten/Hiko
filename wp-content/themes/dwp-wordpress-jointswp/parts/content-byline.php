<p class="byline">
	<h6 class="subheader">
		<?php
			if( function_exists( 'coauthors_posts_links' ) ){
				coauthors_posts_links();
			}else{
				the_author_posts_link();
			}			
		?>
	</h6>
	<small> <?php the_time('F j, Y') ?> </small>
</p>
