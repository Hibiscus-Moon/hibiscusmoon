<?php


function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );


/**
 * Library files.
 */
$files = array(
	'scripts', 		// Handle scripts, styles, fonts, etc
	'woocommerce' 	// WooCommerce related template hooks
);
foreach ( $files as $file ) {
	require 'inc/'.$file.'.php';
}
