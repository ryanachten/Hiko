<?php

// changing the logo link from wordpress.org to your site
function joints_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function joints_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_filter('login_headerurl', 'joints_login_url');
add_filter('login_headertitle', 'joints_login_title');


/* Override default WP login scene styles */
function customise_login_styles(){

  // Use main style sheet for login an define via scss
  wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.css', array('google-fonts'), time(), 'all' );

  ?><style>
    #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/branding-assets/dwp_mainlogo.svg);
    }
  </style><?php
}
add_action( 'login_enqueue_scripts', 'customise_login_styles' );
