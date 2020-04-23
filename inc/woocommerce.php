<?php 

// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );


function hmca_woo_template() {

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

	if ( is_single() && 'product' == get_post_type() ) {
		global $post;
		global $avada_woocommerce;

		$template = get_post_meta( $post->ID, 'hmca_wcp_template', true );

		if ( empty( $template ) )
			return;

		switch ( $template ) {
			case 'simple_gf':

				remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
				remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 10 );
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
			//	remove_action( 'woocommerce_after_single_product_summary', array( 'Avada_Woocommerce', 'output_related_products' ), 15 );
				remove_action( 'woocommerce_after_single_product_summary', array( $avada_woocommerce, 'output_related_products' ), 15 );

				break;
			
			default:
				# code...
				break;
		}

	}

}
add_action( 'wp', 'hmca_woo_template' );

add_filter( 'body_class', function( $classes ) {
	if ( is_single() && 'product' == get_post_type() ) {
		global $post;
		$template = get_post_meta( $post->ID, 'hmca_wcp_template', true );

		if ( empty( $template ) )
			return $classes;

		$class = 'hmca_wcp_template--' . $template;
		return array_merge( $classes, array( $class ) );
	}
	return $classes;
} );
