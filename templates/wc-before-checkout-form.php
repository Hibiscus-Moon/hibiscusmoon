<?php
/**
 * WooCommerce before checkout form template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       https://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.1.0
 */

global $woocommerce;
?>

<ul class="woocommerce-side-nav woocommerce-checkout-nav">
	<li class="is-active"><a data-name="col-1" href="#"><?php esc_attr_e( 'Billing Address', 'Avada' ); ?></a></li>
	<?php if ( WC()->cart->needs_shipping() && ! wc_ship_to_billing_address_only() ) : ?>
		<li><a data-name="col-2" href="#"><?php esc_attr_e( 'Shipping Address', 'Avada' ); ?></a></li>
	<?php elseif ( apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) ) : ?>
		<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>
			<li><a data-name="col-2" href="#"><?php esc_attr_e( 'Additional Information', 'Avada' ); ?></a></li>
		<?php endif; ?>
	<?php endif; ?>

	<li><a data-name="order_review" href="#"><?php esc_html_e( 'Review &amp; Payment', 'Avada' ); ?></a></li>

	<img src="https://hibiscusmooncrystalacademy.com/wp-content/uploads/2019/12/hibiscus-moon-guarantee.png" style="width: 200px; max-width: 100%;display: table;">
	<?php 
		$cat_in_cart = false;
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		    if ( has_term( 'certified-crystal-healer', 'product_cat', $cart_item['product_id'] ) ) {
		        $cat_in_cart = true;
		        break;
		    }
		}
	 
	   	if ( $cat_in_cart ) { ?>
	    	<div class="carttestimonials">
				<div class="single-cart-testimonial" style="margin: 25px auto; background: #f1f1f1;padding: 15px;line-height: 1.3;">
			    	<span class="single-quote">"<?php echo get_post_meta(52432, "hmcatestimonials_quote", true); ?>"</span>
			    	<h6 style="margin: 0">- <strong><?php echo get_the_title(52432); ?></strong></h6>
			    </div>
			    <div class="single-cart-testimonial" style="margin: 25px auto;background: #f1f1f1;padding: 15px;line-height: 1.3;">
			    	<span class="single-quote">"<?php echo get_post_meta(52433, "hmcatestimonials_quote", true); ?>"</span>
			    	<h6 style="margin: 0">- <strong><?php echo get_the_title(52433); ?></strong></h6>
			    </div>
			    <div class="single-cart-testimonial" style="margin: 25px auto;background: #f1f1f1;padding: 15px;line-height: 1.3;">
			    	<span class="single-quote">"<?php echo get_post_meta(52433, "hmcatestimonials_quote", true); ?>"</span>
			    	<h6 style="margin: 0">- <strong><?php echo get_the_title(52429); ?></strong></h6>
			    </div>
			</div>
	    <?php }
	?>
</ul>



<div class="woocommerce-content-box avada-checkout">
