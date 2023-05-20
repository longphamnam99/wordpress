<?php
/**
 * Featured  Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_featured_section_title = get_theme_mod( 'app_landing_page_featured_section_title' );
$app_landing_page_featured_cat = get_theme_mod( 'app_landing_page_featured_cat' );

if( $app_landing_page_featured_cat ){
    echo '<section class="featured-on" id="featured">';
        echo '<div class="container">';
        	if( $app_landing_page_featured_section_title ) echo '<h2 class="title">' . esc_html( $app_landing_page_featured_section_title ) . '</h2>'; 
        		$blog_qry = new WP_Query( array( 
        			'cat' 					=> $app_landing_page_featured_cat,
        			'post_status'           => 'publish',
        			'posts_per_page'		=> 6,
        			'ignore_sticky_posts'   => true ) );
        
        			if( $blog_qry->have_posts() ){
        		   		echo '<div class="row">';
            				while( $blog_qry->have_posts() ){
            			   		$blog_qry->the_post();
                                
            			   		echo '<div class="col wow fadeInUp">';
            			   		   the_post_thumbnail( 'app-landing-page-featured-cat' );
            			   		echo '</div>';
            				}
           					wp_reset_postdata(); 
        				echo '</div>';
        			}
                    
        echo '</div>';
    echo '</section>';
} 