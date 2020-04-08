<div class="carttestimonials generaltestimonials">

	<?php $query_args_two = array(
		'post_type' => array( 'hmcatestimonials' ),
		'posts_per_page' => 5,
		'tax_query' => array(
			array(
				'taxonomy' => 'testimonialproducts',
				'field'    => 'slug',
				'terms'    => 'general',
			),
		),
		'order' => 'ASC',
		'orderby' => 'rand',
	);

	$query_two = new WP_Query( $query_args_two );

	if ( $query_two->have_posts() ) { 

		while ( $query_two->have_posts() ) {
			$query_two->the_post(); ?>

			<div class="single-cart-testimonial">
				<span class="single-quote">"<?php echo get_post_meta(get_the_ID(), "hmcatestimonials_quote", true); ?>"</span>
		    	<h6>- <?php the_title(); ?></h6>
		    </div>

		<?php }
	 	/* Restore original Post Data */
		wp_reset_postdata();
	} else {
		// no posts found
	} ?>
</div>
