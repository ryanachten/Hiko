<div class="row large-12 medium-12 small-centered ">

	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">


		<!-- Tag archive select -->
		<!-- <div class=" small-centered columns">

			<input type="text" name="keyword" placeholder="keyword" value="<?php echo get_search_query() ?>">
		</div> -->

		<!-- Post type archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Type</h4>
			<select class="" name="post_type">
				<option value="" selected>--</option>
				<option value="post">Blog Post</option>
				<option value="projects">Project</option>
				<option value="series">Series</option>
			</select>
		</div>

		<!-- Date archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Date</h4>
			<select class="" name="date">
				<option value="" selected>--</option>
				<?php
					$args = array( 'format' => 'custom',
				 					'before' => '', 'after' => ',', 'echo'=> false);
					$dates = wp_get_archives( $args );
					// splits the string result on the , separator
					$dates = explode(',', $dates);
					$monthsYears = [];
					foreach ($dates as $date) {
						echo '<option>' . $date . '</option>';
					}
				 ?>
			</select>
		</div>

		<!-- Course archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Course</h4>
			<select class="" name="courses">
				<option value="" selected>--</option>
					<?php $args = array( 'taxonomy' => 'courses' );
					$courses = get_terms( $args );
					foreach ($courses as $course): ?>
						<option class="" value="<?php echo $course->slug ?>" name="<?php echo $course->slug ?>">
							<?php echo $course->name ?>
						</option>
					<?php endforeach; ?>
			</select>
		</div>

		<!-- Category archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Category</h4>
			<select class="" name="category_name">
				<option value="" selected>--</option>
				<?php $categories = get_categories();
				 foreach ($categories as $category): ?>
					 <option class="" value="<?php echo $category->name ?>" name="<?php echo $category->name ?>">
						 <?php echo $category->slug?>
					 </option>
				 <?php endforeach; ?>
			</select>
		</div>

		<!-- <div class="">
			<input type="submit" name="filter-submit" value="filter" class="search-submit button">
		</div> -->

		<!-- Default search field  -->
		<div class="filter-mode small-10 medium-3">


			<h4>Keyword(s)</h4>
			<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'jointswp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointswp' ) ?>" />
		</div>


		<input type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Search', 'jointswp' ) ?>" />

	</form>
</div>
