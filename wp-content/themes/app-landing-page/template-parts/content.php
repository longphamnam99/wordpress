<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package App_Landing_Page
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
    /**
     * Before Page entry content
     * 
     * @hooked app_landing_page_post_content_image         - 10
     * @hooked app_landing_page_post_entry_header_before   - 20 
     * @hooked app_landing_page_post_entry_header          - 30 
    */
    do_action( 'app_landing_page_before_post_entry_content' );    
    ?>
		<div class="entry-content">
			<?php 
                if( is_single() ){
    				the_content( sprintf(
    					/* translators: %s: Name of current post. */
    					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'app-landing-page' ), array( 'span' => array( 'class' => array() ) ) ),
    					the_title( '<span class="screen-reader-text">"', '"</span>', false )
    				) );
				}else{
					the_excerpt();
				}
				
                wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'app-landing-page' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php if( !is_single() ){ ?>
    			<footer class="entry-footer">
    				<a href="<?php the_permalink(); ?>" class="btn-readmore"><?php esc_html_e( 'Read More', 'app-landing-page' ); ?></a>
    				<?php app_landing_page_entry_footer(); ?>
    			</footer><!-- .entry-footer -->
	    <?php }
             /**
             * After Page entry content
             * 
             * @hooked app_landing_page_after_post_entry_content   - 20 
             */
             do_action( 'app_landing_page_after_post_entry_content' ); 
         ?>

</article><!-- #post-## -->