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
				<?php // See if post type search term exists in url
				$selected_posttype = get_query_var('post_type');?>
				<option value="" <?php //if postype hasn't been defined in query, it will return an array of 3 types
				if ( count($selected_posttype) > 1) { echo 'selected'; } ?> >--</option>
				<option value="post" <?php if ($selected_posttype[0] === "post") { echo "selected"; } ?>>Blog Post</option>
				<option value="projects" <?php if ($selected_posttype[0] === "projects") { echo "selected"; } ?>>Project</option>
				<option value="series"<?php if ($selected_posttype[0] === "series") { echo "selected"; } ?>>Series</option>
			</select>
		</div>

		<!-- Date archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Date</h4>
			<select class="" name="date">
				<?php // See if date search term exists in url
				$selected_date = sanitize_text_field( get_query_var('date') ); ?>
				<option value="" <?php //If no course is in the url, set empty a selected
				if (empty($selected_date)) { echo 'selected';	} ?>>--</option>
				<?php
					// wp_get_archives as an array workaround
					$args = array( 'format' => 'custom',
				 					'before' => '', 'after' => ',', 'echo'=> false);
					$dates = wp_get_archives( $args );
					// splits the string result on the , separator
					$dates = explode(',', $dates);

					foreach ($dates as $date):?>
						<?php $date = sanitize_text_field($date) ?>
						<?php //exclude the empty val at the end of array
						if (!empty($date)) :?>
							<option <?php if ($date === $selected_date) {
								echo "selected"; } ?>> <?php echo $date ?></option>
						<?php	endif; ?>
					<?php endforeach; ?>
					}
				 ?>
			</select>
		</div>

		<!-- Course archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Course</h4>
			<select class="" name="courses">
				<?php
				// See if course search term exists in url
				$selected_course = sanitize_text_field( get_query_var('courses') );?>
				<option value="" <?php //If no course is in the url, set empty a selected
				if (empty($selected_course)) { echo 'selected';	} ?>>--</option>
				<?php $args = array( 'taxonomy' => 'courses' );
				$courses = get_terms( $args );
				foreach ($courses as $course):
					$courseSlug = sanitize_text_field($course->slug)?>
					<option class="" value="<?php echo $courseSlug ?>" name="<?php echo $courseSlug ?>"
						<?php
						// if the course slug matches the url var, select this option
						if ($courseSlug === $selected_course){ echo 'selected'; } ?> >
						<?php esc_html_e(	$course->name) ?>
					</option>

					<?php endforeach; ?>
			</select>
		</div>

		<!-- Category archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Category</h4>
			<select class="" name="category_name">
				<?php // See if cat search term exists in url
				$selected_cat = sanitize_text_field( get_query_var('category_name') );	?>
				<option value=""
				<?php //If no cat is in the url, set empty a selected
				if ( empty($selected_cat) ) {
					echo 'selected';	} ?>>--</option>

				<?php $categories = get_categories();
				 foreach ($categories as $category): ?>
				 	<?php $catSlug = sanitize_text_field($category->slug); ?>
					 <option class="" value="<?php echo $catSlug ?>" name="<?php echo $catSlug ?>"
						 <?php // if the cat name matches the url var, select this option
						  if (strtolower($catSlug) === strtolower($selected_cat)){
							 echo 'selected'; } ?>
						 >
						 <?php echo $category->name?>
					 </option>
				 <?php endforeach; ?>
			</select>
		</div>


		<!-- Keyword search field  -->
		<div class="filter-mode small-10 medium-3">

			<h4>Keyword(s)</h4>
			<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'jointswp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointswp' ) ?>" />
		</div>


		<input type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Search', 'jointswp' ) ?>" />

	</form>
</div>
