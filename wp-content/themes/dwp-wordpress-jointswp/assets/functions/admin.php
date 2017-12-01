<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

/************* DASHBOARD WIDGETS *****************/
// Disable default dashboard widgets
function remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );   // Right Now
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );   // Activity box
	remove_action('welcome_panel', 'wp_welcome_panel'); //Welcome panel
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Recent Comments
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );  // Incoming Links
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );   // Plugins
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );  // Quick Press
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );  // Recent Drafts
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );   // WordPress blog
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );   // Other WordPress News
	// use 'dashboard-network' as the second parameter to remove widgets from a network dashboard.
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );
/*
For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

// RSS Dashboard Widget
function joints_rss_dashboard_widget() {
	if(function_exists('fetch_feed')) {
		include_once(ABSPATH . WPINC . '/feed.php');               // include the required file
		$feed = fetch_feed('http://jointswp.com/feed/rss/');        // specify the source feed
		$limit = $feed->get_item_quantity(5);                      // specify number of items
		$items = $feed->get_items(0, $limit);                      // create an array of items
	}
	if ($limit == 0) echo '<div>' . __( 'The RSS Feed is either empty or unavailable.', 'jointswp' ) . '</div>';   // fallback message
	else foreach ($items as $item) { ?>

	<h4 style="margin-bottom: 0;">
		<a href="<?php echo $item->get_permalink(); ?>" title="<?php echo mysql2date(__('j F Y @ g:i a', 'jointswp'), $item->get_date('Y-m-d H:i:s')); ?>" target="_blank">
			<?php echo $item->get_title(); ?>
		</a>
	</h4>
	<p style="margin-top: 0.5em;">
		<?php echo substr($item->get_description(), 0, 200); ?>
	</p>
	<?php }
}

// Calling all custom dashboard widgets
function joints_custom_dashboard_widgets() {
	wp_add_dashboard_widget('joints_rss_dashboard_widget', __('Custom RSS Feed (Customize in admin.php)', 'jointswp'), 'joints_rss_dashboard_widget');
	/*
	Be sure to drop any other created Dashboard Widgets
	in this function and they will all load.
	*/
}
// removing the dashboard widgets
// adding any custom widgets
add_action('wp_dashboard_setup', 'joints_custom_dashboard_widgets');

/************* CUSTOMIZE ADMIN *******************/
// Custom Backend Footer
function joints_custom_admin_footer() {
	_e('<span id="footer-thankyou">Developed by <a href="#" target="_blank">Your Site Name</a></span>.', 'jointswp');
}

// adding it to the admin area
add_filter('admin_footer_text', 'joints_custom_admin_footer');



/* Restrict admin/dashboard menus (both top and side)
for simpler UI and efficient UX */
function dashboard_restrict_sidemenu(){
	// Check user permissions (restrictions not applied to admin)
	if( !current_user_can( 'manage_options' ) ){
		remove_menu_page( 'upload.php' ); //media option
		// Note: editors (lecturers/tutors lose ability for editing pages here)
		remove_menu_page( 'edit.php?post_type=page' ); //pages option
		remove_menu_page( 'edit-comments.php' ); //comments option
		remove_menu_page( 'tools.php' ); //tools option
	}
}
add_action( 'admin_menu', 'dashboard_restrict_sidemenu' );

function dashboard_restrict_topmenu( $wp_admin_bar ){
	// Check user permissions (restrictions not applied to admin)
	if( !current_user_can( 'manage_options' ) ){
		$wp_admin_bar->remove_node( 'comments' ); //comments option
		$wp_admin_bar->remove_node( 'wp-logo' ); //wp logo option
	}
}
add_action( 'admin_bar_menu', 'dashboard_restrict_topmenu', 999);


/* Enqueue main style sheet for access in admin pages */
function override_default_admin_styles(){
	wp_register_style( 'site-css', get_template_directory_uri() . '/assets/css/style.css', array(), time(), 'all' );
  wp_enqueue_style( 'site-css' );
}
add_action( 'admin_enqueue_scripts', 'override_default_admin_styles');


/* Override default icon set with branding where needed */
function override_admin_menu_icons() {
	$branding_asset_dir = get_template_directory_uri() . '/assets/images/branding-assets/';
	echo '<style>
   	.menu-icon-post div.wp-menu-image:before {
   		background-image: url( ' . $branding_asset_dir . 'dwp_bloglogo_bg.svg);
     }
		.menu-icon-projects div.wp-menu-image:before {
		 	background-image: url( ' . $branding_asset_dir . 'dwp_projectlogo_bg.svg);
			}
		.menu-icon-series div.wp-menu-image:before {
			background-image: url( ' . $branding_asset_dir . 'dwp_serieslogo_bg.svg);
		 }

		 #wpadminbar #wp-admin-bar-site-name > .ab-item:before {
 			background-image: url( ' . $branding_asset_dir . 'dwp_mainlogo.svg)!important;
 		 }
     </style>';
}
add_action( 'admin_head', 'override_admin_menu_icons', 999 );
