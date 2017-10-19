<?php
// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php');


// Remove 4.2 Emoji Support
// require_once(get_template_directory().'/assets/functions/disable-emoji.php');

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/assets/functions/editor-styles.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php');

// Use this as a template for custom post types
// require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/functions/login.php');

// Customize the WordPress admin
// require_once(get_template_directory().'/assets/functions/admin.php');


// Change the default length of excerpts to be shorter
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Add markdown support to custom post types (projects and series)
add_action( 'init', 'init_project_markdown_support' );
function init_project_markdown_support(){
	add_post_type_support( 'projects', 'wpcom-markdown' );
}
add_action( 'init', 'init_series_markdown_support' );
function init_series_markdown_support(){
	add_post_type_support( 'series', 'wpcom-markdown' );
}


// Change default query to include custom page types
add_action( 'pre_get_posts', function( $query )
{
		if(	!is_admin() // Only target front end queries
				&& $query->is_main_query() // Only target the main query
				&& !$query->is_post_type_archive([ 'projects', 'series' ]) // Don't apply modified query to CPT archives
				&& is_archive() // Restrict custom query to only archive pages
		 ){
			 $query->set( 'post_type', [ 'post', 'projects', 'series' ] );
		 }
});


// Series Advanced Custom Field Relationship query
// only make available posts / projects owned by the current user
function series_relationship_query( $args, $field, $post_id ){

	$current_user = wp_get_current_user();
	// use user_login to get posts assigned via Co Author plugin
	$args[ 'author_name' ] = $current_user->user_login;

	return $args;
}
add_filter('acf/fields/relationship/query/name=series_parts', 'series_relationship_query', 10, 3);


function profile_relationship_query( $args, $field, $post_id ){

	$current_user = wp_get_current_user();
	// use user_login to get posts assigned via Co Author plugin
	$args[ 'author_name' ] = $current_user->user_login;
	// only make available projects which have a status of published
	$args[ 'post_status' ] = 'publish';

	return $args;
}
add_filter('acf/fields/relationship/query/name=featured_projects', 'profile_relationship_query', 10, 3);
add_filter('acf/fields/relationship/query/name=featured_series', 'profile_relationship_query', 10, 3);
add_filter('acf/fields/relationship/query/name=featured_posts', 'profile_relationship_query', 10, 3);
