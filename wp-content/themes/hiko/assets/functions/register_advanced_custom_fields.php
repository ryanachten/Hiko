<?php

/* Registers Advanced Custom Fields to avoid the need
for GUI settings assignment */

function register_acf_custom_fields(){

  // Hide ACF interface
  define('ACF_LITE', true);

  if(function_exists("register_field_group"))
  {
    register_field_group(array (
      'id' => 'acf_author',
      'title' => 'Author',
      'fields' => array (
        array (
          'key' => 'field_59f3f3c960352',
          'label' => 'Featured Posts',
          'name' => 'featured_posts',
          'type' => 'relationship',
          'instructions' => 'Select up to 4 Blog Posts to feature on your profile',
          'return_format' => 'object',
          'post_type' => array (
            0 => 'post',
          ),
          'taxonomy' => array (
            0 => 'all',
          ),
          'filters' => array (
            0 => 'search',
          ),
          'result_elements' => array (
            0 => 'featured_image',
            1 => 'post_type',
            2 => 'post_title',
          ),
          'max' => 4,
        ),
        array (
          'key' => 'field_59f3f47538752',
          'label' => 'Featured Projects',
          'name' => 'featured_projects',
          'type' => 'relationship',
          'instructions' => 'Select up to 4 Projects to feature on your profile',
          'return_format' => 'object',
          'post_type' => array (
            0 => 'projects',
          ),
          'taxonomy' => array (
            0 => 'all',
          ),
          'filters' => array (
            0 => 'search',
          ),
          'result_elements' => array (
            0 => 'featured_image',
            1 => 'post_type',
            2 => 'post_title',
          ),
          'max' => 4,
        ),
        array (
          'key' => 'field_59f3f48c38753',
          'label' => 'Featured Series',
          'name' => 'featured_series',
          'type' => 'relationship',
          'instructions' => 'Select up to 4 Series to feature on your profile',
          'return_format' => 'object',
          'post_type' => array (
            0 => 'series',
          ),
          'taxonomy' => array (
            0 => 'all',
          ),
          'filters' => array (
            0 => 'search',
          ),
          'result_elements' => array (
            0 => 'featured_image',
            1 => 'post_type',
            2 => 'post_title',
          ),
          'max' => 4,
        ),
      ),
      'location' => array (
        array (
          array (
            'param' => 'ef_user',
            'operator' => '==',
            'value' => 'all',
            'order_no' => 0,
            'group_no' => 0,
          ),
        ),
      ),
      'options' => array (
        'position' => 'normal',
        'layout' => 'no_box',
        'hide_on_screen' => array (
        ),
      ),
      'menu_order' => 0,
    ));
    register_field_group(array (
      'id' => 'acf_featured-post',
      'title' => 'Featured Post',
      'fields' => array (
        array (
          'key' => 'field_5a2da93143a1a',
          'label' => 'Featured Article',
          'name' => 'landing_featured_article',
          'type' => 'relationship',
          'instructions' => 'Select the Blog Post, Project, or Series to be featured on the hero splash of the landing page',
          'required' => 1,
          'return_format' => 'object',
          'post_type' => array (
            0 => 'post',
            1 => 'projects',
            2 => 'series',
          ),
          'taxonomy' => array (
            0 => 'all',
          ),
          'filters' => array (
            0 => 'search',
            1 => 'post_type',
          ),
          'result_elements' => array (
            0 => 'featured_image',
            1 => 'post_type',
            2 => 'post_title',
          ),
          'max' => 1,
        ),
      ),
      'location' => array (
        array (
          array (
            'param' => 'page',
            'operator' => '==',
            'value' => '1064',
            'order_no' => 0,
            'group_no' => 0,
          ),
        ),
      ),
      'options' => array (
        'position' => 'acf_after_title',
        'layout' => 'no_box',
        'hide_on_screen' => array (
        ),
      ),
      'menu_order' => 0,
    ));
    register_field_group(array (
      'id' => 'acf_references',
      'title' => 'References',
      'fields' => array (
        array (
          'key' => 'field_5a299b318b7af',
          'label' => 'Citations',
          'name' => 'citations',
          'type' => 'wysiwyg',
          'default_value' => '',
          'toolbar' => 'basic',
          'media_upload' => 'no',
        ),
      ),
      'location' => array (
        array (
          array (
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'series',
            'order_no' => 0,
            'group_no' => 0,
          ),
        ),
        array (
          array (
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'projects',
            'order_no' => 0,
            'group_no' => 1,
          ),
        ),
        array (
          array (
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'post',
            'order_no' => 0,
            'group_no' => 2,
          ),
        ),
      ),
      'options' => array (
        'position' => 'normal',
        'layout' => 'no_box',
        'hide_on_screen' => array (
        ),
      ),
      'menu_order' => 0,
    ));
    register_field_group(array (
      'id' => 'acf_series',
      'title' => 'Series',
      'fields' => array (
        array (
          'key' => 'field_59f3f1865ba02',
          'label' => 'Series Components',
          'name' => 'series_parts',
          'type' => 'relationship',
          'instructions' => 'Add Blog Posts and Projects which comprise this series',
          'required' => 1,
          'return_format' => 'object',
          'post_type' => array (
            0 => 'post',
            1 => 'projects',
            2 => 'series',
          ),
          'taxonomy' => array (
            0 => 'all',
          ),
          'filters' => array (
            0 => 'search',
            1 => 'post_type',
          ),
          'result_elements' => array (
            0 => 'featured_image',
            1 => 'post_type',
            2 => 'post_title',
          ),
          'max' => '',
        ),
      ),
      'location' => array (
        array (
          array (
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'series',
            'order_no' => 0,
            'group_no' => 0,
          ),
        ),
      ),
      'options' => array (
        'position' => 'normal',
        'layout' => 'no_box',
        'hide_on_screen' => array (
        ),
      ),
      'menu_order' => 0,
    ));
  }
}

register_acf_custom_fields();
