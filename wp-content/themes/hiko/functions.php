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
require_once(get_template_directory().'/assets/functions/editor-styles.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php');

// Use this as a template for custom post types
// require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
require_once(get_template_directory().'/assets/functions/login.php');

// Customize the WordPress admin
require_once(get_template_directory().'/assets/functions/admin.php');


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


/* Series Advanced Custom Field Relationship query
only make available posts / projects owned by the current user */
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


/* Equalised thumbnails, looped outside of The Loop for
ACF Relaitonship fields
@param string $field - field to pull from admin UI
@param boolean $user_field - whether or not this is a user field
@param int $grid_columns - number of columns for thumbnail grid */
function loop_custom_grid( $field, $user_field, $grid_columns ){
	global $post;
	// assign posts to the return from the ACF Relationship field type
	if( $user_field ){
		$posts = get_field( $field, 'user_'.$post->post_author );
	}
	else{
		$posts = get_field( $field );
	}

	if ($posts) {
		foreach ($posts as $post){
			setup_postdata($post);

			get_template_part( 'parts/loop', 'custom-grid' );
		}
	}
}


/* Restrict file types able to uploaded to the media manager
to only image files */
function allowed_media_upload_mimetypes( $mimes ){
	$allowed_mimes = array(
	    'jpg|jpeg|jpe' => 'image/jpeg',
	    'gif' => 'image/gif',
	    'png' => 'image/png',
	    'bmp' => 'image/bmp',
	    'tif|tiff' => 'image/tiff'
	);
	return $allowed_mimes;
}
add_filter( 'upload_mimes', 'allowed_media_upload_mimetypes' );

/* Overwrite media uploads file size cap to 5MB
for users other than admin */
function media_upload_filesize_cap( $size ){
	// Check user permissions (!=admin)
	if( !current_user_can( 'manage_options' ) ){
		// Size param needs to be in bytes
		// i.e. 5,242,880 bytes binary = 5MB
		$size = 1024 * 1024 * 5;
	}
	return $size;
}
add_filter( 'upload_size_limit', 'media_upload_filesize_cap' );


/* Remove Author role capability to publish their own posts
need to submit for review by Editor instead */
function remove_author_publish_cap(){
	// access author class instance
	$author = get_role( 'author' );
	// set publish_post capability to false
	$author->add_cap( 'publish_posts', false );
}
add_action( 'admin_init', 'remove_author_publish_cap' );


/* Restrict Authors to only be able to access media which they have uploaded */
function show_current_user_attachments( $query = array() ) {

	// Checks to see if user role is lower than editor
	if( !current_user_can('edit_others_pages') ){

		// Alters media query to only those associated w/ user id
		$user_id = get_current_user_id();
    if( $user_id ) {
        $query['author'] = $user_id;
    }
	}
  return $query;
}
add_filter( 'ajax_query_attachments_args', 'show_current_user_attachments', 10, 1 );


// ****POTENTIAL BULLSHIT*****
function register_search_query_vars( $vars ){
	 $vars[] = 'date'; //register 'date' to be accessible via url
	 $vars[] = 'post_type';
	 $vars[] = 'course-check';

	 return $vars;
}
add_filter( 'query_vars', 'register_search_query_vars');


// might conflict with the other pre_query I have here
function search_pre_get_posts( $query ){

	// If user is not requesting admin page
	if ( !is_admin() &&
		// and if it is the main query
		$query->is_main_query() &&
		// and if it is the search page being displayed
		is_search() ||
		// ...or the tag archive page
		is_tag() ||
		// ...or the category archive page
		is_category() )
		{
			// continue with query
		}
		else{
			// Otherwise, exit
			return;
		}

		// For general filter results, exclude irrelavant types such as pages
		$cur_post_type = get_query_var('post_type');
		if ($cur_post_type) {
			switch ($cur_post_type) {
				case 'post':
					// echo "type: post";
					$query->set( 'post_type', ['post'] );
					break;
				case 'projects':
					// echo "type: projects";
					$query->set( 'post_type', ['projects'] );
					break;
				case 'series':
					// echo "type: series";
					$query->set( 'post_type', ['series'] );
					break;

				default:
					$query->set( 'post_type', [ 'post', 'projects', 'series' ] );
					break;
			}
		// If on the blog archive page, set to only posts
		}else if (is_home() ) {
			$query->set( 'post_type', ['post'] );
		}
		else{
			$query->set( 'post_type', [ 'post', 'projects', 'series' ] );
		}

		$courses = get_query_var('courses_tax');
		if ($courses) {
			// echo 'Courses: ' . $courses .'<br>';
			$query->set('tax_query', array(
						array(
							'taxonomy' => 'courses_tax',
							'field'    => 'slug',
							'terms'    => $courses,
						),
					)
				);
		}


	$date = get_query_var('date');
	if ($date) {
		$date = explode(' ', $date);
		$month = date('n', strtotime($date[0])); //convert month from string to number (no 0's preceding)
		$year = $date[1];
		// echo 'Month: ' . $month . ' Year: ' . $year .'<br>';
		$query->set('date_query', array(
				array(
					'year'  => $year,
					'month' => $month
				),
			));
	}

	$category = get_query_var('category_name');
	if ($category) {
		// echo 'category: ' . $category .'<br>';
		$query->set('category_name', $category);
	}

	// print_r($query);

}
add_action( 'pre_get_posts', 'search_pre_get_posts', 999 );


/* Get list of months outside of using date_archive (which can only account for one post type at a time).
Used in the searchform date filter.
$start - start date of range
$end - end date of range
$ret - return array of date strings */
function getMonthRange( $start, $end ){

	$current = $start;
	$ret = array();

	// date iteration method via: https://gist.github.com/daithi-coombes/9779776
	while( $current<$end ){
		$next = date('Y-M-01', $current) . "+1 month";
		$current = strtotime($next);
		$ret[] = $current;
	}
	$ret = array_reverse($ret);

	// convert timestamp into expected date format array
	foreach ($ret as $key => $value) {
		$ret[$key] = date('F Y', $value);
	}
	return $ret;
}
