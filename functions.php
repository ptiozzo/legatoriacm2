<?php

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {

  $clean_src = remove_query_arg( 'ver', $src );
  $path      = wp_parse_url( $src, PHP_URL_PATH );

  if ( $modified_time = @filemtime( untrailingslashit( ABSPATH ) . $path ) ) {
      $src = add_query_arg( 'ver', $modified_time, $clean_src );
  } else {
      $src = add_query_arg( 'ver', time(), $clean_src );
  }
  return $src;
}
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 99999999);

remove_action('wp_head', 'wp_generator');



/*  Theme setup
/* ------------------------------------ */
if ( ! function_exists( 'legcm2_setup' ) ) {
	function legcm2_setup() {
		add_theme_support( "title-tag" );
		// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );
		// Enable featured image
		add_theme_support( 'post-thumbnails' );

		// Custom menu areas
		register_nav_menus( array(
			'menu-principale' => esc_html__( 'Menu principale', 'legcm2' ),
			'menu-social' => esc_html__( 'Menu social', 'legcm2' ),
		) );
	}
}
add_action( 'after_setup_theme', 'legcm2_setup' );

if ( ! function_exists( 'legcm2_styles_scripts' ) ) {
	function legcm2_styles_scripts() {
		//wp_enqueue_script;
		wp_enqueue_style( 'legcm2-sourcesanspro','//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700');
		wp_enqueue_style( 'legcm2-fontfavole','//fonts.googleapis.com/css?family=Annie+Use+Your+Telescope&display=swap');
	  wp_enqueue_style( 'legcm2', get_template_directory_uri().'/style.css',array(),filemtime(get_template_directory() . '/style.css'),'all');

    wp_enqueue_script('jquery');
		wp_enqueue_script( 'legcm2-scripts', get_template_directory_uri() . '/assets/js/script.js','','',true);
    wp_enqueue_script( 'legcm2-darkMode', get_template_directory_uri() . '/assets/js/darkMode.js','','',true);
		wp_enqueue_script( 'legcm2-fontawsome-js', '//kit.fontawesome.com/befb91387f.js','','',true);

	}
}
add_action( 'wp_enqueue_scripts', 'legcm2_styles_scripts' );



 ?>
