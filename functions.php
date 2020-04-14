<?php

function theme_enqueue_styles() {
	wp_enqueue_style( 'g_hmca-fonts', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&family=Montserrat:wght@400;600&display=swap', array(), null );

	wp_enqueue_style( 'a_hmca-fonts', 'https://use.typekit.net/tle0ejp.css', array(), null );

	wp_enqueue_style( 'style-guide', get_stylesheet_directory_uri() . '/css/styleguide.css', array(), false);
	
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

