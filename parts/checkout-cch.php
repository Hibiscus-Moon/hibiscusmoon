<div class="carttestimonials cchtestimonials">

	<?php $query_args_one = array(
		'post_type' => array( 'hmcatestimonials' ),
		'posts_per_page' => 5,
		'tax_query' => array(
			array(
				'taxonomy' => 'testimonialproducts',
				'field'    => 'slug',
				'terms'    => 'certified-crystal-healer',
			),
		),
		'order' => 'ASC',
		'orderby' => 'rand',
	);

	$query_one = new WP_Query( $query_args_one );

	if ( $query_one->have_posts() ) { 

		while ( $query_one->have_posts() ) {
			$query_one->the_post(); ?>

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
