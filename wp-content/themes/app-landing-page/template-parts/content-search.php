<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package App_Landing_Page
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
    /**
     * Before search entry summary
     * 
     * @hooked app_landing_page_post_content_image - 10
     * @hooked app_landing_page_post_entry_header_before   - 20 
     * @hooked app_landing_page_post_entry_header  - 30 
    */
    do_action( 'app_landing_page_before_search_entry_summary' );   
    ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<a href="<?php the_permalink(); ?>" class="btn-readmore"><?php esc_html_e( 'Read More', 'app-landing-page' ); ?></a>
		<?php app_landing_page_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    <?php
         /**
         * After Page entry content
         * 
         * @hooked app_landing_page_post_entry_header_after   - 10 
         */
         do_action( 'app_landing_page_after_post_entry_content' ); 
     ?>
     
</article><!-- #post-## -->
