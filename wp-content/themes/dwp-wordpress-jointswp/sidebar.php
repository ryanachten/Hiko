<div id="topwidgets" class="sidebar row" role="complementary">

	<?php if ( is_active_sidebar( 'topwidgets' ) ) : ?>

		<?php dynamic_sidebar( 'topwidgets' ); ?>

	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->

	<div class="alert help">
		<p><?php _e( 'Please activate some Widgets.', 'jointswp' );  ?></p>
	</div>

	<?php endif; ?>

</div>
