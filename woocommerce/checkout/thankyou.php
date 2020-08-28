<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div id="" class="woocommerce-order">
	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>
			<?php 
			$cch_purchase = false;
			// echo'<pre>';print_r($order);echo'</pre>';
			$order_items = $order->get_items();
			$cchproducts = array( '27820', '27821', '27822', '49951', '49952' );

			foreach ( $order_items as $item ) {
				$product_id = $item['product_id'];
				if ( in_array( $product_id, $cchproducts ) ) {
					$cch_purchase = true;
				}
			}
			?>

			<?php if ( $cch_purchase ) : ?>

				<div class="fusion-layout-column">
					<div class="fusion-column-content-centered hmca-thankyou-column" style="">
						<div class="fusion-column-content" style="margin-bottom: 30px">
							<h2 class="center" style="margin-bottom: 0">Welcome to the<span class="fwb"> Certifed Crystal Practitioner<span style="font-size: 60%">™</span> </span> Course, <?php echo $order->data['billing']['first_name']; ?>!</h2>
							<p class="center" style="margin: 60px 0 20px;">You'll receive several emails with details about your purchase and registration - but don't worry, sometimes it takes ten minutes or so for the emails to get sent out!</p>
							<p class="center" style="margin: 0 0 20px;">If you haven't received confirmation within an hour, please <a href="/contact-me/#ContactSupport">contact us</a>. Thank you!</p>
							<p class="center" style="margin: 0 0 60px;">Crystal Blessings,<br/><img src="https://hibiscusmooncrystalacademy.com/wp-content/uploads/2018/01/Signature.jpeg" alt="Hibiscus Moon"></p>
							<button onclick="fireConfetti();" class="button center" style="margin: 0 auto 40px">Pop More Confetti!</button>
						</div>
					</div>
				</div>
				<div style="width: 100%; clear: both"></div>
				<style type="text/css">
					.hmca-thankyou-column {
						min-height: calc(100vh - 240px);
						margin-bottom: 60px;
					}
					@media only screen and (max-width: 975px) {
						.hmca-thankyou-column {
							min-height: calc(100vh - 170px);
						}
					}
				</style>

				<script src="<?php echo get_stylesheet_directory_uri() ?>/js/confetti/confetti.js?v=<?php echo time() ?>"></script>
				<script type="text/javascript">
					function fireConfetti() {
						startConfetti();
						setTimeout(function(){ stopConfetti(); }, 12000);
					}
					fireConfetti();
				</script>

			<?php else : ?>
				<h3><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you! Your order has been received. ', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h3>
				<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Now keep your eyes on your inbox for your receipt as well as details on how to access your purchase.</p>
			<?php endif; ?>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
