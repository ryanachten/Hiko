<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> >

  <nav id="main-navigation" class="main-navigation" role="main-navigation">
    <?php
    $args = [
      'theme_location' => 'main-menu'
    ];
    wp_nav_menu($args); ?>
  </nav>
