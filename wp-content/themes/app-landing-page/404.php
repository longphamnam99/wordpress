<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package App_Landing_Page
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="error-holder">
				<div class="icon-holder">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/images/smily.png' ) ;?>" alt="" width="146" height="146">
				</div>
				<h1><?php esc_html_e( 'Looks Like Something Went Wrong!', 'app-landing-page' ); ?></h1>

				<p><?php esc_html_e( 'The page you were looking for is not here. Maybe you want to perform a search?', 'app-landing-page' ); ?></p>
					
					<?php get_search_form(); ?>
			</div><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
