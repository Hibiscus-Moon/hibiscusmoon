<?php 

function hmca_enqueue_styles() {
	$dir = get_stylesheet_directory_uri();
	wp_enqueue_style( 'g_hmca-fonts', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&family=Montserrat:wght@400;600&display=swap', array(), null );
	wp_enqueue_style( 'a_hmca-fonts', 'https://use.typekit.net/tle0ejp.css', array(), null );
	wp_enqueue_style( 'style-guide', $dir . '/css/styleguide.css', array(), false );
	wp_enqueue_style( 'child-style', $dir . '/style.css', array( 'avada-stylesheet' ) );
}
add_action( 'wp_enqueue_scripts', 'hmca_enqueue_styles' );
