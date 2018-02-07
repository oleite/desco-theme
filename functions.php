<?php
/*
	====================
		ENQUEUE
	====================
*/
	require get_template_directory() . '/inc/function-admin.php'; //Admin panel
	require get_template_directory() . '/inc/widgets.php';
	require get_template_directory() . '/inc/ajax.php';

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
			add_theme_support( 'html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption') ); //Activate HTML5 features

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

	function desco_posted_badges($before = '', $separador = ' ', $after = '')	{
		$output = $before;

		if (has_tag('18')) {
			$output .= '<span class="badge badge-age badge-age-18">18+</span>' . $separador;
		}
		if (has_tag('16')) {
			$output .= '<span class="badge badge-age badge-age-16">16+</span>' . $separador;
		}

		return $output . $after;
	}

	function desco_edit_post_button() {
		edit_post_link( __( '[editar]', 'textdomain' ), '<span>', '</span>', null, 'edit-post-btn' );
	}


	//Barra de navegação entre páginas da seção de comentários
	function desco_get_post_comments_navigation() {
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			require( 'inc/templates/desco-comments-nav.php' );
		}
	}


	/**
	 * Search Form
	 */

	function desco_search_form( $form ) {
	    $form = '
			<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
				<div>
					<button type="submit" id="searchsubmit">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
					<input type="text" value="' . get_search_query() . '" name="s" id="s" />
				</div>
			</form>
		 ';

	    return $form;
	}

	add_filter( 'get_search_form', 'desco_search_form', 100 );



	/**
	 * Automatically add IDs to headings such as <h2></h2>
	 */

	function auto_id_headings( $content ) {
		$content = preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
			if ( ! stripos( $matches[0], 'id=' ) ) :
				$matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $matches[3] . $matches[4];
			endif;
			return $matches[0];
		}, $content );
	    return $content;
	}
	add_filter( 'the_content', 'auto_id_headings' );
