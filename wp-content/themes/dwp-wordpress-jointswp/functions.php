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


// Change default query to include custom page types
// add_action( 'pre_get_posts', function( $query )
// {
// 		if(	!is_admin() // Only target front end queries
// 				&& $query->is_main_query() // Only target the main query
// 				&& !$query->is_post_type_archive([ 'projects', 'series' ]) // Don't apply modified query to CPT archives
// 				&& is_archive() // Restrict custom query to only archive pages
// 		 ){
// 			 $query->set( 'post_type', [ 'post', 'projects', 'series' ] );
// 		 }
// });

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

	if( $posts ){
		// Need custom index tracker since this doesn't work
		// work directly with wp_query->current_index
		// process below based on loop-archive-grid.php
		$current_index = 0;

		foreach ($posts as $post){

			// Check for the start of new row
			if( 0 === ( $current_index  ) % $grid_columns ){
				echo '<div class="row archive-grid" data-equalizer>';
			}

			setup_postdata($post);

			get_template_part( 'parts/loop', 'custom-grid' );

			// If the next post exceeds the grid_columns or at the end of the posts, close off the row
			if( 0 === ( $current_index + 1 ) % $grid_columns
				||  ( $current_index + 1 ) ===  $grid_columns ){
						echo '</div>';
				}

			$current_index++;
		}
		wp_reset_postdata();
	}
}


/* Courses custom taxonomy registration
majority of rules outputed via CPT UI with customisations for role permissions
interfaces with ACF 'Courses' Taxonomy field */
function register_courses_taxonomy() {

	$labels = array(
		"name" => __( "Courses", "" ),
		"singular_name" => __( "Course", "" ),
		"menu_name" => __( "Courses", "" ),
	);

	$args = array(
		"label" => __( "Courses", "" ),
		"labels" => $labels,
		"public" => false, //set to false to prevent default search field appearing
		"publicly_queryable" => true, //set to true to enable search access
		// Assign custom tax capabilties per role permissions
		'capabilities' => array(
      'manage_terms'=> 'manage_categories',
      'edit_terms'=> 'manage_categories',
      'delete_terms'=> 'manage_categories',
      'assign_terms' => 'edit_posts'
    ),
		"hierarchical" => false,
		"label" => "Courses",
		"show_ui" => false, //need to have this also set to false to prevent showing in UI
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'courses', 'with_front' => true,  'hierarchical' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "courses", array( "post", "projects", "series" ), $args );
}
add_action( 'init', 'register_courses_taxonomy' );


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

	 return $vars;
}
add_filter( 'query_vars', 'register_search_query_vars');


// might conflict with the other pre_query I have here
function search_pre_get_posts( $query ){

	// global $wp_query;
	// var_dump($wp_query->query_vars);


	// exit query if user is requesting admin page
	if ( is_admin() ||
		// or query if it is not main query
		!$query->is_main_query() ||
		// or if it is not an archive page
		!is_archive() ||
		// or if it is not an cpt archive page
		!is_post_type_archive([ 'projects', 'series' ]) ||
		// or if it is not the blog archive
		!is_home() )
		{
			return;
		}

		// For general filter results, exclude irrelavant types such as pages
		// TODO: add extra conditions for type archives
		$cur_post_type = get_query_var('post_type');
		if ($cur_post_type) {
			// echo "post_type" . $cur_post_type;
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


	$courses = get_query_var('courses');
	if ($courses) {
		echo 'Courses: ' . $courses .'<br>';
		$query->set('tax_query', array(
					array(
						'taxonomy' => 'courses',
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

}
add_action( 'pre_get_posts', 'search_pre_get_posts', 999 );
