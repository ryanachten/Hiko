<?php

// THEME SUPPORT
add_theme_support( 'title-tag' ); // handle title in seperate php file
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image',
                    'quote', 'status', 'video', 'audio', 'chat'] ); //types of posts enabled
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' ); //helps with site metadata
// customize support
add_theme_support( 'custom-background' );
add_theme_support( 'custom-logo' );
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'starter-content' ); //provides starter content to users

//Load in CSS
function dwpcustomtheme_enqueue_styles(){ //namespace w/ theme textdomain to avoid conflicts
  wp_enqueue_style( 'main-fonts-css', 'https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i|Roboto:400,400i,700,700i"', [], '', 'all' );
  wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', ['main-fonts-css'], time() ); //TODO: change version arg from timecode

}
add_action( 'wp_enqueue_scripts', 'dwpcustomtheme_enqueue_styles' ); //add theme css to wp build cycle

// Register menu locations
register_nav_menus( array(
  'main-menu' => esc_html__( 'Main Menu', 'dwpcustomtheme' ), //add additional menus here
) );

?>
