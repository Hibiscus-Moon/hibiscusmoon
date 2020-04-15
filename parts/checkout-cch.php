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

<div class="pagesection25 fs14">
    <p><strong><i class="fas fa-check" aria-hidden="true"></i> 21 Day Refund Policy -</strong> We're fully invested in your transformation and you can feel secure in knowing that there is a guarantee in place: You can take this course for a full 21 days. If you do the homework and participate in our Facebook Group and don't feel I've delivered on my promises here, we'll happily refund your tuition. <a href="https://hibiscusmooncrystalacademy.com/enrollment-policies-student-waiver-form/" target="_blank">Click here for full details.</a></p>

	<p><strong><i class="fas fa-check" aria-hidden="true"></i> Security &amp; Privacy Policy -</strong> All personal information you submit is encrypted and secure. We will not share or trade online information that you provide us. <a href="https://hibiscusmooncrystalacademy.com/privacy-policy/" target="_blank">Click here for full details.</a></p>

	<p><strong><i class="fas fa-check" aria-hidden="true"></i> Email -</strong> <a href="mailto:support@hibiscusmoon.com" target="_blank">support@hibiscusmoon.com</a></p>
</div>