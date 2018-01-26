<?php
/*
	====================
		ENQUEUE
	====================
*/
	require get_template_directory() . '/inc/function-admin.php'; //Admin panel
	require get_template_directory() . '/inc/widgets.php';

	function desco_enqueue() {
		wp_enqueue_script('jquery');

		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

		wp_enqueue_style('generalstyle', get_template_directory_uri().'/css/desco.css', array(), false, 'all');
		wp_enqueue_script('generaljs', get_template_directory_uri().'/js/desco.js', array(), false, true);
	}
	add_action('wp_enqueue_scripts', 'desco_enqueue');

	function desco_login_stylesheet() {
	    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/style-login.css' );
	    //wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
	}
	add_action( 'login_enqueue_scripts', 'desco_login_stylesheet' );
// Google Fonts
	function google_fonts() {

		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Lato', array());

	}
	add_action('wp_enqueue_scripts', 'google_fonts' );


/*
	====================
		THEME SETUP
	====================
*/
	function desco_theme_setup() {
			add_theme_support('title-tag'); //permite que o WordPress gerencie a tag title automaticamente
			add_theme_support('menus'); //suporte de menus (ex.: navbar)
			add_theme_support( 'post-thumbnails' );

			register_nav_menu('primary','Navegação Primária do Cabeçário');
			register_nav_menu('user','Navegação do usuário');
			register_nav_menu('footer1','Footer nav #1');
		}
	add_action('after_setup_theme', 'desco_theme_setup');

	function desco_sidenav_init(){
		register_sidebar(array(
			'name' => 'Sidenav',
			'id' => 'sidenav',
			'description' => 'Dynamic left sidebar',
			'before_widget' => '<section id="%1$s" class="desco-widget %2$s">',
			'after_widget' => "</section>",
			'before_title' => '<h2 class="widget-title">',
			'after_title' => "</h2>"
		));
	}
	add_action('widgets_init','desco_sidenav_init');


/*
	====================
		BLOG LOOP CUSTOM FUNCTIONS
	====================
*/

	function desco_posted_date() {
		$posted_on = human_time_diff( get_the_time('U') , current_time('timestamp') );

		return '<span class="posted-on"><a href="' . esc_url(get_permalink()) . '">' . $posted_on . ' atrás</a></span>';
	}
	
	function desco_posted_tags() {
		$tags = get_the_tag_list( '<div class="tag-list">', '', '</div>');

		return $tags;
	}

	function desco_posted_comments_number() {
		$comments = get_comments_number();

		if ($comments > 0){
			$output = '<span class="comments-number">' . $comments . ' <i class="fa fa-comments-o" aria-hidden="true"></i></span>';
		}

		return $output;
	}

	function desco_edit_post_button() {
		edit_post_link( __( '[editar]', 'textdomain' ), '<span>', '</span>', null, 'edit-post-btn' );
	}
