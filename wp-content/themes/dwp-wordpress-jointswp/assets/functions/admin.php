<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.


/* Enqueue main style sheet for access in admin pages */
function override_default_admin_styles(){
	//  Load Google Fonts
	wp_enqueue_style('google-fonts', "https://fonts.googleapis.com/css?family=Exo+2|Roboto|Roboto+Slab|Signika", array(), time(), 'all');

	wp_register_style( 'dwp-font', get_template_directory_uri() . '/assets/css/dwp-branding-font/css/dwp_branding.css', array(), time(), 'all' );

	wp_register_style( 'site-css', get_template_directory_uri() . '/assets/css/admin.css', array('google-fonts', 'dwp-font'), time(), 'all' );
  wp_enqueue_style( 'site-css' );

	// User to setup dashboard custom elements using jQuery
	wp_register_script( 'dashboard_custom_setup',  get_template_directory_uri() . '/assets/js/scripts/admin_customsetup.js', array(), time(), false);
	wp_enqueue_script('dashboard_custom_setup');

}
add_action( 'admin_enqueue_scripts', 'override_default_admin_styles');


// Adds .dashboard to body to allow making style changes to just
// dashboard
function dashboard_class_check(){
	$current_screen = get_current_screen();
	if($current_screen->id == 'dashboard'){
		echo '<script>
						jQuery(document).ready(function(){
							console.log("testing");
							jQuery(document.body).addClass("dashboard");
						});

					</script>';
	}
}
add_action( 'admin_head', 'dashboard_class_check' );


/* Hides update notices for users other than admin */
function hide_update_notice() {
    // $current_user = wp_get_current_user();
    if (!current_user_can('manage_options')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_notices', 'hide_update_notice', 1 );


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

/* Returns a list of recent posts based on type and status */
function get_dashboard_recentposts($post_type, $post_status){

	$current_user = wp_get_current_user();

	$args = array(
		// use user_login to get posts assigned via Co Author plugin
		'author_name' => $current_user->user_login,
		'post_type' => $post_type,
		'numberposts' => 3,
		'post_status' => $post_status
	);
	$blogposts = get_posts($args);

	foreach ($blogposts as $blogpost) {
		echo '<li><a href="'. get_the_permalink($blogpost->ID).'">'.esc_html__( $blogpost->post_title, 'jointswp' ).'</a></li>';
	}
	echo '</ul>';
}

function dashboard_blogposts_widget(){

	// Blog Section Logo
	echo "<div class='dashboard-post-widget'>";

	echo '<div class="dashboard-post-recentsection">
	<h4>'. __('Drafted', 'jointswp').'</h4><ul>';
		get_dashboard_recentposts('post', 'draft');
	echo '</div>';

	echo '<div class="dashboard-post-recentsection">
	<h4>'. __('Published', 'jointswp').'</h4><ul>';
		get_dashboard_recentposts('post', 'publish');
	echo '</div>';

	echo "</div>";
}

function dashboard_project_widget(){

	// Blog Section Logo
	echo "<div class='dashboard-post-widget'>";

	echo '<div class="dashboard-post-recentsection">
	<h4>'. __('Drafted', 'jointswp').'</h4><ul>';
		get_dashboard_recentposts('projects', 'draft');
	echo '</div>';

	echo '<div class="dashboard-post-recentsection">
	<h4>'. __('Pending', 'jointswp').'</h4><ul>';
		get_dashboard_recentposts('projects', 'pending');
	echo '</div>';

	echo '<div class="dashboard-post-recentsection">
	<h4>'. __('Published', 'jointswp').'</h4><ul>';
		get_dashboard_recentposts('projects', 'publish');
	echo '</div>';

	echo "</div>";
}

function dashboard_series_widget(){

	// Blog Section Logo
	echo "<div class='dashboard-post-widget'>";

	echo '<div class="dashboard-post-recentsection">
	<h4>'. __('Drafted', 'jointswp').'</h4><ul>';
		get_dashboard_recentposts('series', 'draft');
	echo '</div>';

	echo '<div class="dashboard-post-recentsection">
	<h4>'. __('Pending', 'jointswp').'</h4><ul>';
		get_dashboard_recentposts('series', 'pending');
	echo '</div>';

	echo '<div class="dashboard-post-recentsection">
	<h4>'. __('Published', 'jointswp').'</h4><ul>';
		get_dashboard_recentposts('series', 'publish');
	echo '</div>';

	echo "</div>";
}

// Calling all custom dashboard widgets
function joints_custom_dashboard_widgets() {
	/*
	Be sure to drop any other created Dashboard Widgets
	in this function and they will all load.
	*/
	wp_add_dashboard_widget('dashboard_blogposts_widget', __('Blog Posts', 'jointswp'), 'dashboard_blogposts_widget');

	wp_add_dashboard_widget('dashboard_project_widget', __('Projects', 'jointswp'), 'dashboard_project_widget');

	wp_add_dashboard_widget('dashboard_series_widget', __('Series', 'jointswp'), 'dashboard_series_widget');
}
// removing the dashboard widgets
// adding any custom widgets
add_action('wp_dashboard_setup', 'joints_custom_dashboard_widgets');


/* Restrict admin/dashboard menus (both top and side)
for simpler UI and efficient UX */
function dashboard_restrict_sidemenu(){
	// Check user permissions (restrictions not applied to admin)
	if( !current_user_can( 'manage_options' ) ){
		// remove_menu_page( 'upload.php' ); //media option
		remove_menu_page( 'edit.php?post_type=page' ); //pages option - Note: editors (lecturers/tutors lose ability for editing pages here)
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


/* Reorder side menu */
function custom_side_menu_order(){
	return array(
			'index.php', //dashboard
			'separator1', // *space*
			'edit.php', //blog posts
			'edit.php?post_type=projects', //project posts?
			'edit.php?post_type=series', //series posts?
			'separator2', // *space*
			'upload.php', //media
			'profile.php', //profile
			'users.php', //users
	 );
}
add_filter( 'custom_menu_order', 'custom_side_menu_order' );
add_filter( 'menu_order', 'custom_side_menu_order' );


/* Add logo to dashboard splash header */
function add_dashboard_header_logo(){
	$branding_asset_dir = get_template_directory_uri() . '/assets/images/branding-assets/';
	echo '<style>
   	#dashboard_splashHeaderImg {
   		background-image: url( ' . $branding_asset_dir . 'dwp_mainlogo.svg);
     }
		 </style>';
}
add_action( 'admin_head', 'add_dashboard_header_logo');


/* Add logo to dashboard splash header */
function add_widget_header_logos(){
	$branding_asset_dir = get_template_directory_uri() . '/assets/images/branding-assets/';
	echo '<style>
   	#blogpost_widget_headerImg {
   		background-image: url( ' . $branding_asset_dir . 'dwp_bloglogo_bg.svg);
     }
		 #project_widget_headerImg{
			 background-image: url( ' . $branding_asset_dir . 'dwp_projectlogo_bg.svg);
		 }
		 #series_widget_headerImg{
			 background-image: url( ' . $branding_asset_dir . 'dwp_serieslogo_bg.svg);
		 }
		 </style>';
}
add_action( 'admin_head', 'add_widget_header_logos');


/************* PROFILE *******************/

/* Remove 'Personal Options' section from user profile admin
i.e. visual editor, colour scheme, keyboard shortcuts, toolbar, language */
if ( ! function_exists( 'cor_remove_personal_options' ) ) {
	remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

	//Removes the leftover 'Visual Editor', 'Keyboard Shortcuts' and 'Toolbar' options.
	add_action( 'admin_head', function () {

			ob_start( function( $subject ) {

					$subject = preg_replace( '#<h[0-9]>'.__("Personal Options").'</h[0-9]>.+?/table>#s', '', $subject, 1 );
					return $subject;
			});
	});

	add_action( 'admin_footer', function(){

			ob_end_flush();
	});
}
add_action( 'admin_head-user-edit.php', 'cor_profile_subject_start' );
add_action( 'admin_footer-user-edit.php', 'cor_profile_subject_end' );


/************* POSTS *******************/

/* Removes unnecessary metaboxes from post scenes */
function remove_post_metaboxes(){

	// Removes discussion section
	remove_meta_box('commentstatusdiv', 'post', 'normal');
	// Removes comment section
	remove_meta_box('commentsdiv', 'post', 'normal');
}
add_action( 'admin_menu', 'remove_post_metaboxes' );

/* Rearranges order of metaboxes */
function reorder_post_metaboxes( $order ){

	return array(
				// normal (full width) metaboxes
        'normal' => join(
            ",",
            array(
							'postexcerpt', // Excerpt
							'acf_1378', // Series components
							'acf_1500', // Citations
							'revisionsdiv', // Revisions
							'coauthorsdiv', // Authors
            )
        ),
				// sidebar metaboxes
				'side' => join(
						",",
						array(
							'submitdiv', // Publish status box
							'postimagediv', // Featured image
							'acf_1384', // Courses
						)
				)
    );
}
add_filter( 'get_user_option_meta-box-order_post', 'reorder_post_metaboxes' );
add_filter( 'get_user_option_meta-box-order_projects', 'reorder_post_metaboxes' );
add_filter( 'get_user_option_meta-box-order_series', 'reorder_post_metaboxes' );
