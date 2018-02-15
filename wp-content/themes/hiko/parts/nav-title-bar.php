<?php
// Adjust the breakpoint of the title-bar by adjusting this variable
$breakpoint = "medium"; ?>

<div class="title-bar" data-responsive-toggle="top-bar-menu" data-hide-for="<?php echo $breakpoint ?>">
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title"><a href="<?php echo home_url(); ?>">
    <span id="top-bar-menu-logotype"><?php bloginfo('name'); ?></span></a></div>
</div>

<div class="top-bar" id="top-bar-menu">
	<div class="top-bar-left show-for-<?php echo $breakpoint ?>">
		<ul class="menu">
			<li><a href="<?php echo home_url(); ?>">
        <img id="top-bar-menu-logo" src="<?php echo get_template_directory_uri() . '/assets/images/branding-assets/dwp_mainlogo.svg'?>" alt="Home">
        <span id="top-bar-menu-logotype"><?php bloginfo('name'); ?></span></a>
      </li>
		</ul>
	</div>
	<div class="top-bar-right">
		<?php joints_top_nav(); ?>
	</div>
</div>
