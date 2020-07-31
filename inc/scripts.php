<?php 

function hmca_script_version() {
	return '1.1.5.11';
}

function hmca_enqueue_styles() {
	$dir = get_stylesheet_directory_uri();
	$ver = hmca_script_version();
//	wp_enqueue_style( 'g_hmca-fonts', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&family=Montserrat:wght@400;600&display=swap', array(), null );
	// wp_enqueue_style( 'a_hmca-fonts', 'https://use.typekit.net/tle0ejp.css', array(), null );
	wp_enqueue_style( 'style-guide', $dir . '/css/styleguide.css', array(), $ver );
//	wp_enqueue_style( 'style-guide', $dir . '/css/styleguide.css', array('fusion-dynamic-css'), '1.1.5.4' );
	wp_enqueue_style( 'child-style', $dir . '/style.css', array( 'avada-stylesheet' ), $ver );
}
add_action( 'wp_enqueue_scripts', 'hmca_enqueue_styles', 99 );





function hmca_enqueue_aerocheckout_styles() {

//	if ( get_post_type( get_the_ID() ) == 'wfacp_checkout' ) {
//	if ( is_singular( 'wfacp_checkout' ) ) {
	if ( is_single() && ( get_post_type() == 'wfacp_checkout' ) ) {
		$dir = get_stylesheet_directory_uri();
		wp_enqueue_style( 'hmcafonts', $dir . '/css/fonts.css', array(), '1.0' );
		wp_enqueue_style( 'styleguide', $dir . '/css/styleguide.css', array(), '1.1.5.8' );
	}
}
// add_action( 'wp_enqueue_scripts', 'hmca_enqueue_aerocheckout_styles', 999 );




function hmca_upsell_add_styles( $styles ) {

	$dir = get_stylesheet_directory_uri() . '/css/';

	$styles['hmca-fonts-css']             = array(
		'path'      => $dir . 'fonts.css',
		'version'   => '1.0',
		'in_footer' => false,
		'supports'  => array(
			'customizer',
			'customizer-preview',
			'offer',
			'offer-page',
		),
	);
	$styles['hmca-styleguide-css'] = array(
		'path'      => $dir . 'styleguide.css',
		'version'   => '1.0',
		'in_footer' => false,
		'supports'  => array(
			'customizer',
			'customizer-preview',
			'offer',
			'offer-page',
		),
	);

	return $styles;
}
add_filter( 'wfocu_assets_styles', 'hmca_upsell_add_styles' ) ;
