<div id="topwidgets" class="sidebar row large-12 medium-12 small-centered " role="complementary">

	<?php if ( is_active_sidebar( 'topwidgets' ) ) : ?>

		<?php dynamic_sidebar( 'topwidgets' ); ?>

		<!-- Date archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Date</h4>
			<select class="" name="date">
				<option value="" disabled selected>Select a date</option>
				<?php
					//returns the dates in option tags
					$args = array( 'format' => 'option' );
					wp_get_archives( $args );
				 ?>
			</select>
		</div>

		<!-- Course archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Course</h4>
			<select class="" name="courses">
				<option value="" disabled selected>Select a course</option>
					<?php $args = array( 'taxonomy' => 'courses' );
					$courses = get_terms( $args );
					foreach ($courses as $course): ?>
						<option class="" name="<?php echo $course->name ?>">
							<?php echo $course->name ?>
						</option>
					<?php endforeach; ?>
			</select>
		</div>

		<!-- Category archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Category</h4>
			<select class="" name="categories">
				<option value="" disabled selected>Select a category</option>
				<?php $categories = get_categories();
				 foreach ($categories as $category): ?>
					 <option class="" name="<?php echo $category->name ?>">
						 <?php echo $category->name ?>
					 </option>
				 <?php endforeach; ?>
			</select>
		</div>

		<!-- Tag archive select -->
		<div class="filter-mode small-10 medium-3 small-centered columns">
			<h4>Keyword</h4>
			<input type="text" name="keyword" placeholder="keyword">
		</div>


	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->

	<div class="alert help">
		<p><?php _e( 'Please activate some Widgets.', 'jointswp' );  ?></p>
	</div>

	<?php endif; ?>

</div>
