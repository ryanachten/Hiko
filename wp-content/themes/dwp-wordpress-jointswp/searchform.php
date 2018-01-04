<div class="row large-12 medium-12 small-centered ">

	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

		<!-- Post type archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Type</h4>
			<select class="" name="post_type">
				<?php // See if post type search term exists in url
				$selected_posttype = get_query_var('post_type');?>
				<option value="" <?php //if postype hasn't been defined in query, it will return an array of 3 types
				if ( !is_array($selected_posttype) || count($selected_posttype) > 1) { echo 'selected'; } ?> >--</option>
				<option value="post" <?php if (is_array($selected_posttype)
					&& $selected_posttype[0] === "post"
					&& count($selected_posttype) === 1)
					{ echo "selected"; } ?>>Blog Post</option>
				<option value="projects" <?php if (is_array($selected_posttype)
					&& $selected_posttype[0] === "projects"
					&& count($selected_posttype) === 1)
				{ echo "selected"; } ?>>Project</option>
				<option value="series"<?php if (is_array($selected_posttype)
				&& $selected_posttype[0] === "series"
				&& count($selected_posttype) === 1)
				{ echo "selected"; } ?>>Series</option>
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

					// getMonthRange declared in Functions.php
					$dates = getMonthRange(strtotime('Nov 2012'), strtotime("-1 month")); //TODO: change this to something more practical before deployment

					foreach ($dates as $date):?>
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
			<select class="" name="course-check">
				<?php
				// See if course search term exists in url
				$selected_course = get_query_var('course-check');?>
				<option value="" <?php //If no course is in the url, set empty a selected
				if (empty($selected_course)) { echo 'selected';	} ?>>--</option>
				<?php
				$courses_fieldObj = get_field_object('course_check');

				$courses = $courses_fieldObj['choices'];
				foreach ($courses as $value => $label):	?>
					<option value="<?php echo $value; ?>"
						<?php if ($value === $selected_course){ echo 'selected'; } ?>>
						<?php echo $label; ?>
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

			<h4>Keyword</h4>
			<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'jointswp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointswp' ) ?>" />
		</div>

		<!-- Filter submission -->
		<div class="">
				<input type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Search', 'jointswp' ) ?>" />
		</div>


	</form>
</div>
