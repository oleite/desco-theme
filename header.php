<!doctype html>
<html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<? bloginfo('charset'); ?>">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="profile" href="//gmpg.org/xfn/11" />
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php endif; ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div class="testbox">

		</div>
		<div class="header-tools">
			<i id="nox" class="fa fa-lightbulb-o" aria-hidden="true"></i>
			<img id="logged-avatar" class="js-toggleSidenav" src="<?php echo get_avatar_url(get_current_user_id()); ?>">
			<i id="sidenav-open" class="fa fa-bars js-toggleSidenav" aria-hidden="true"></i>
		</div>

		<div id="page-overlay" class="fade-in-2"></div>

		<div class="sidenav sidenav-closed nox">
			<a class="sidenav-close">
				<i class="fa fa-times" aria-hidden="true"></i>
			</a>
			<div class="sidenav-container fade-in-2">

				<?php get_sidebar(); ?>

			</div>
		</div>



      <header class="header-container">
         <nav id="top-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' )); ?>
         </nav>
			<div class="header">
				<a class="logo" href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/desco_ext_smaller.svg" alt="">
				</a>
			</div>
      </header>



		<div id="wrapper">
