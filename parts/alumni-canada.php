<?php $canadaterms = get_terms( array(
	    'taxonomy' => 'alumnilocations',
	    'hide_empty' => true,
	    'parent' => '8107'
	) ); ?>

	<div class="accordian fusion-accordian">
		<div class="panel-group" id="accordion-11111-1">
		<?php foreach ( $canadaterms as $term ) { ?>
			<?php $panelnumber = rand(); ?>
			<div class="fusion-panel panel-default fusion-toggle-no-divider fusion-toggle-boxed-mode">
				<div class="panel-heading">
					<h4 class="panel-title toggle">
						<a data-toggle="collapse" data-parent="#accordion-11111-1" data-target="#<?php echo $panelnumber; ?>" href="#<?php echo $panelnumber; ?>" class="active">
							<div class="fusion-toggle-icon-wrapper"><i class="fa-fusion-box"></i></div>
							<div class="fusion-toggle-heading"><?php echo $term->name; ?></div>
						</a>
					</h4>
				</div>
				<div id="<?php echo $panelnumber; ?>" class="panel-collapse collapse" style="height: auto;">

				<?php $query_args_one = array(
					'post_type' => array( 'hmcaalumni' ),
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'alumnilocations',
							'field'    => 'slug',
							'terms'    => $term->name,
						),
					),
				);
			
				$alumni_query_one = new WP_Query( $query_args_one );
				if ( $alumni_query_one->have_posts() ) { ?>
					<?php while ( $alumni_query_one->have_posts() ) {
						$alumni_query_one->the_post();
						$alumnidescription = get_post_meta( get_the_ID(), 'hmcaalumni_description', true );
						$alumnibusiness = get_post_meta( get_the_ID(), 'hmcaalumni_business', true );
						$alumnilocation = get_post_meta( get_the_ID(), 'hmcaalumni_location', true );
						$alumniemail = get_post_meta( get_the_ID(), 'hmcaalumni_email', true );
						$alumniphone = get_post_meta( get_the_ID(), 'hmcaalumni_phone', true );
						$alumniwebsite = get_post_meta( get_the_ID(), 'hmcaalumni_website', true );
						$alumnifacebook = get_post_meta( get_the_ID(), 'hmcaalumni_facebook', true );
						$alumnitwitter = get_post_meta( get_the_ID(), 'hmcaalumni_twitter', true );
						$alumniadvanced = get_post_meta ( get_the_ID(), 'hmcaalumni_featured', true ); ?>

						<div class="panel-body toggle-content fusion-clearfix black" style="margin-bottom: 35px;">

							<?php if ($alumniadvanced) { ?>
								<h5 class="bold" style="margin: 0;"><?php the_title(); ?>, Advanced Crystal Master</h5>
							<?php } else { ?>
								<h5 class="bold black" style="margin: 0;"><?php the_title(); ?>, Certified Crystal Healer</h5>
							<?php } ?>

							<?php if($alumnidescription) {
								echo $alumnidescription;
								echo '<br />';
							} ?>
							<?php if($alumnibusiness) {
								echo '<strong>Business:</strong> ';
								echo $alumnibusiness;
								echo '<br />';
							} ?>
							<?php if($alumnilocation) {
								echo '<strong>Location:</strong> ';
								echo $alumnilocation;
								echo '<br />';
							} ?>
							<?php if($alumniemail) {
								echo '<strong>Email:</strong> ';
								echo '<a href="mailto:';
								echo $alumniemail;
								echo '">';
								echo $alumniemail;
								echo '</a><br />';
							} ?>
							<?php if($alumniphone) {
								echo '<strong>Phone:</strong> ';
								echo $alumniphone;
								echo '<br />';
							} ?>
							<?php if($alumniwebsite) {
								echo '<strong>Website:</strong> ';
								echo '<a href="http:';
								echo $alumniwebsite;
								echo '" target="_blank">';
								echo $alumniwebsite;
								echo '</a><br />';
							} ?>
							<?php if($alumnifacebook) {
								echo '<strong>Facebook:</strong> ';
								echo '<a href="https://facebook.com/';
								echo $alumnifacebook;
								echo '" target="_blank">';
								echo $alumnifacebook;
								echo '</a><br />';
							} ?>
							<?php if($alumnitwitter) {
								echo '<strong>Twitter:</strong> ';
								echo '<a href="https://twitter.com/';
								echo $alumnitwitter;
								echo '" target="_blank">';
								echo $alumnitwitter;
								echo '</a>';
							} ?>
						</div>
					<?php } ?>
		<?php /* Restore original Post Data */
				wp_reset_postdata();
			}  else {
				// no posts found
			}
		?>
			</div>
		</div>
	<?php } ?>
	</div>
</div>