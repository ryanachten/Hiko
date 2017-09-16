<!-- Check to see if this sidebar is active before executing -->
<?php
  if( ! is_active_sidebar( 'main-sidebar' ) ){
      return;
  }
?>

<aside id="secondary" class="widget-area" role="complementary">

  <?php dynamic_sidebar( 'main-sidebar' ); ?>

</aside>
