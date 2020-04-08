<?php
/**
 * The template used for 404 pages.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

<style>
	html:not(.avada-has-site-width-percent) #main {padding-left: 0 !important;padding-right: 0 !important;}
	body.has-sidebar #content,
	#content.full-width,
	#content {width: 100% !important;}

	#main .fusion-row {max-width: 100% !important;}
</style>

<?php get_header(); ?>


<div class="imagebackground errorheader"></div>
<section id="content" class="full-width">
	<div id="post-404page">
		<div class="post-content">
			<div class="fusion-clearfix"></div>
			<div class="error-page">
				<div class="container">
					<div class="fusion-columns fusion-columns-1 padbot50">
						<div class="fusion-column col-lg-12 col-md-12 col-sm-12 padbot50 padtop25">
							<h3 style="text-align: center;"><em>Just kidding!</em></h3>
							<p style="text-align: center;"><strong>But … you’ve arrived at a page that no longer exists here on my website … <em>or it never did in the first place.</em></strong></p>
							<p style="text-align: center;">The mysteries of the universe never cease to amaze me too!</p>
							<a href="/" class="button">Go Back Home</a>
						</div>
					</div>
				</div>
				<div class="pagesection50 imagebackground" style="background-image: url('/wp-content/uploads/2018/11/FooterBackground.jpg');">
					<div class="container">
						<div class="search-page-search-form">
							<?php echo get_search_form( false ); ?>
						</div>
					</div>
				</div>

				<div class="container pagesection50">
					<h2 class="center padbot50">Perhaps You Would Like to Explore...</h2>
					<div class="fusion-columns fusion-columns-3">
						<div class="fusion-column col-lg-4 col-md-4 col-sm-4" style="text-align: center;">
							<a href="/crystal-path-quiz/" title="Crystal Path Quiz" target="_blank" rel="noopener noreferrer" style="outline: none;">
								<img src="/wp-content/uploads/2019/01/error-quiz.jpg" alt="Free Crystal Goodness">
							</a>
							<a class="button" href="/crystal-path-quiz/" title="Crystal Path Quiz" target="_blank" rel="noopener noreferrer">TAKE THE QUIZ</a>
						</div>
						<div class="fusion-column col-lg-4 col-md-4 col-sm-4" style="text-align: center;">
							<a href="/shop/" title="Shop Crystals" target="_blank" rel="noopener noreferrer">
								<img src="/wp-content/uploads/2019/01/error-shop.jpg" alt="Certified Crystal Healers Course">
							</a>
							<a class="button" href="/shop/" title="Shop">SHOP</a>
						</div>
						<div class="fusion-column col-lg-4 col-md-4 col-sm-4" style="text-align: center;">
							<a href="/blog/" title="Crystal Grids Book" target="_blank" rel="noopener noreferrer"style="outline: none;">
								<img src="/wp-content/uploads/2019/01/error-blog.jpg" alt="Crystal Grids Book">
							</a>
							<a class="button" href="/blog/" title="Blog">BLOG</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
