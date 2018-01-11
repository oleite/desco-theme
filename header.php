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
         <nav id="secondary-nav">
				<ul>
					<li class="active"><a href="http://desconceito.com">Home</a></li>
					<li><a href="http://desconceito.com/sobre">Sobre</a></li>
					<li><a href="http://desconceito.com/autores">Autores</a></li>
					<li><a href="http://desconceito.com/envie-um-texto">Envie um texto</a></li>
					<li><a href="http://desconceito.com/contato">Contato</a></li>
				</ul>
         </nav>
			<div class="header">
				<img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/desco_ext_smaller.svg" alt="">
				<nav id="main-nav">
					<ul>
						<li class="active"><a href="http://desconceito.com">Home</a></li>
						<li><a href="http://desconceito.com/sobre">Sobre</a></li>
						<li><a href="http://desconceito.com/autores">Autores</a></li>
						<li><a href="http://desconceito.com/envie-um-texto">Envie um texto</a></li>
						<li><a href="http://desconceito.com/contato">Contato</a></li>
					</ul>
				</nav>
				<a id="nox">
					<i class="fa fa-lightbulb-o" aria-hidden="true"></i>
					Apagar a luz
				</a>
			</div>
      </header>
