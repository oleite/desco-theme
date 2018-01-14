<!doctype html>
<html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<? bloginfo('charset'); ?>">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php endif; ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

		<!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">-->
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>


		<i id="nox" class="fa fa-3x fa-lightbulb-o" aria-hidden="true"></i>

		<div class="sidenav sidenav-closed">
			<div class="sidenav-container">
				<div class="sidenav-scroll">
					<a class="js-toggleSidenav sidenav-close">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
					<?php get_sidebar(); ?>
					
				</div>
			</div>
		</div>





      <header class="header-container">
			<a class="js-toggleSidenav sidenav-open">
				<i class="fa fa-2x fa-bars" aria-hidden="true"></i>
			</a>

         <nav id="top-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' )); ?>
         </nav>
			<div class="header">
				<a class="logo" href="<?php home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/desco_ext_smaller.svg" alt="">
				</a>
			</div>
      </header>
