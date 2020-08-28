<?php 
$terms = get_terms( array(
	'taxonomy' => 'alumnilocations',
	'hide_empty' => true,
	'parent' => '8116'
) ); ?>

<div class="accordian fusion-accordian">
	<div class="panel-group" id="accordion-11111-1">
		<?php foreach ( $terms as $term ) : ?>
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
					<?php
					$query_args_one = array(
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
							get_template_part( '/parts/alumni-content' );
						}
						/* Restore original Post Data */
						wp_reset_postdata();
					} else {
						// no posts found
					}
				?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
