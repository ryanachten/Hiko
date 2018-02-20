<?php
function register_project_series_types() {

	/**
	 * Post Type: Projects.
	 */

	$labels = array(
		"name" => __( "Projects", "" ),
		"singular_name" => __( "Project", "" ),
		"menu_name" => __( "Projects", "" ),
	);

	$args = array(
		"label" => __( "Projects", "" ),
		"labels" => $labels,
		"description" => "Individual and collaborative digital works",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "projects", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "revisions", "author" ),
		"taxonomies" => array( "category", "post_tag", "courses" ),
	);

	register_post_type( "projects", $args );

	/**
	 * Post Type: Series.
	 */

	$labels = array(
		"name" => __( "Series", "" ),
		"singular_name" => __( "Series", "" ),
		"menu_name" => __( "Series", "" ),
	);

	$args = array(
		"label" => __( "Series", "" ),
		"labels" => $labels,
		"description" => "Digital works comprised of multiple parts",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "series", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "revisions", "author" ),
		"taxonomies" => array( "category", "post_tag", "courses" ),
	);

	register_post_type( "series", $args );
}

add_action( 'init', 'register_project_series_types' );

function register_courses_tax() {

	/**
	 * Taxonomy: Courses.
	 */

	$labels = array(
		"name" => __( "Courses", "" ),
		"singular_name" => __( "Course", "" ),
	);

	$args = array(
		"label" => __( "Courses", "" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Courses",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'courses_tax', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "courses_tax", array( "post", "projects", "series" ), $args );
}

add_action( 'init', 'register_courses_tax' );


?>
