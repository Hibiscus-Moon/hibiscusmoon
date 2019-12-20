<?php
/**
 * Template Name: Alumni
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
<section id="content" <?php Avada()->layout->add_style( 'content_style' ); ?>>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo fusion_render_rich_snippets_for_pages(); // phpcs:ignore WordPress.Security.EscapeOutput ?>

			<div class="post-content">
				<?php the_content(); ?>


				<h2 class="padtop50">Canada</h2>
				<?php get_template_part( '/parts/alumni-canada' ); ?>

				<h2 class="padtop50">United States</h2>
				<?php get_template_part( '/parts/alumni-unitedstates' ); ?>

				<h2 class="padtop50">Australia</h2>
				<?php get_template_part( '/parts/alumni-australia' ); ?>

				<h2 class="padtop50">Other</h2>
				<?php get_template_part( '/parts/alumni-other' ); ?>

			</div>

		</div>
	<?php endwhile; ?>
</section>
<?php do_action( 'avada_after_content' ); ?>
<?php get_footer(); ?>
