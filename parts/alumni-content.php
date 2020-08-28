<?php

	$id = get_the_ID();

	$desc 		= get_post_meta( $id, 'hmcaalumni_description', true );
	$business 	= get_post_meta( $id, 'hmcaalumni_business', true );
	$location 	= get_post_meta( $id, 'hmcaalumni_location', true );
//	$email 		= get_post_meta( $id, 'hmcaalumni_email', true );
	$phone 		= get_post_meta( $id, 'hmcaalumni_phone', true );
	$website 	= get_post_meta( $id, 'hmcaalumni_website', true );
	$facebook 	= get_post_meta( $id, 'hmcaalumni_facebook', true );
	$twitter 	= get_post_meta( $id, 'hmcaalumni_twitter', true );
	$advanced 	= get_post_meta ( $id, 'hmcaalumni_featured', true ); ?>

	<div class="panel-body toggle-content fusion-clearfix black" style="margin-bottom: 35px;">
		
		<?php if ($advanced) { ?>
			<h5 class="bold" style="margin: 0;"><?php the_title(); ?>, Advanced Crystal Master</h5>
		<?php } else { ?>
			<h5 class="bold black" style="margin: 0;"><?php the_title(); ?>, Certified Crystal Healer</h5>
		<?php } ?>

		<?php if ( $desc) {
			echo $desc;
			echo '<br />';
		} 
		if ( $business) {
			echo '<strong>Business:</strong> ';
			echo $business;
			echo '<br />';
		} 
		if ( $location) {
			echo '<strong>Location:</strong> ';
			echo $location;
			echo '<br />';
		} 
	/*
	 	if ( $email) {
			echo '<strong>Email:</strong> ';
			echo '<a href="mailto:';
			echo $email;
			echo '">';
			echo $email;
			echo '</a><br />';
		} 
	*/
		if ( $phone) {
			echo '<strong>Phone:</strong> ';
			echo $phone;
			echo '<br />';
		} 
		if ( $website) {
			echo '<strong>Website:</strong> ';
			echo '<a href="http:';
			echo $website;
			echo '" target="_blank">';
			echo $website;
			echo '</a><br />';
		} 
		if ( $facebook) {
			echo '<strong>Facebook:</strong> ';
			echo '<a href="https://facebook.com/';
			echo $facebook;
			echo '" target="_blank">';
			echo $facebook;
			echo '</a><br />';
		} 
		if ( $twitter) {
			echo '<strong>Twitter:</strong> ';
			echo '<a href="https://twitter.com/';
			echo $twitter;
			echo '" target="_blank">';
			echo $twitter;
			echo '</a>';
		} ?>
	</div>