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

      <header class="header-container">
         <nav id="main-nav">
				<?php wp_nav_menu( array(
					'theme_location'  => 'navbar',
					'menu'            => '',
					'container'       => 'div',
					'container_class' => 'menu-{menu-slug}-container',
					'container_id'    => '',
					'menu_class'      => 'menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => '',
				) ); ?>
         </nav>
			<div class="header">
				<img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/desco_ext_smaller.svg" alt="">
					<i id="nox" class="fa fa-3x fa-lightbulb-o" aria-hidden="true"></i>
			</div>
      </header>
