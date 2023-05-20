<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eCommerce_Gem
 */

get_header(); ?>
<?php echo do_shortcode('[metaslider id="76"]'); ?>
<?php if ( true === apply_filters( 'ecommerce_gem_home_page_content', true ) ) : ?>

	<div id="primary" class="content-area">
		
	</div><!-- #primary -->

<?php
do_action( 'ecommerce_gem_action_sidebar' );

endif; // End if show home content.

get_footer();
