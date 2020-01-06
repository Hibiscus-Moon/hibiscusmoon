<?php $canadaterms = get_terms( array(
	    'taxonomy' => 'alumnilocations',
	    'hide_empty' => true,
	    'parent' => '8117'
	) ); ?>

	<div class="accordian fusion-accordian">
		<div class="panel-group" id="accordion-33333-3">
		<?php foreach ( $canadaterms as $term ) { ?>
			<?php $panelnumber = rand(); ?>
			<div class="fusion-panel panel-default fusion-toggle-no-divider fusion-toggle-boxed-mode">
				<div class="panel-heading">
					<h4 class="panel-title toggle">
						<a data-toggle="collapse" data-parent="#accordion-33333-3" data-target="#<?php echo $panelnumber; ?>" href="#<?php echo $panelnumber; ?>" class="active">
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
						$alumnitwitter = get_post_meta( get_the_ID(), 'hmcaalumni_twitter', true ); ?>

						<div class="panel-body toggle-content fusion-clearfix">
							<h5 class="marginbottom0 bold"><?php the_title(); ?></h5>
							<?php if($alumnidescription) {
								echo $alumnidescription;
								echo '<br />';
							} ?>
							<?php if($alumnibusiness) {
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
								echo $alumniemail;
								echo '<br />';
							} ?>
							<?php if($alumniphone) {
								echo '<strong>Phone:</strong> ';
								echo $alumniphone;
								echo '<br />';
							} ?>
							<?php if($alumniwebsite) {
								echo '<strong>Website:</strong> ';
								echo $alumniwebsite;
								echo '<br />';
							} ?>
							<?php if($alumnifacebook) {
								echo '<strong>Facebook:</strong> ';
								echo $alumnifacebook;
								echo '<br />';
							} ?>
							<?php if($alumnitwitter) {
								echo '<strong>Twitter:</strong> ';
								echo $alumnitwitter;
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