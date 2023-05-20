<?php
/**
 * Vedio Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_vedio_section_page        = get_theme_mod( 'app_landing_page_vedio_section_page' );
$app_landing_page_vedio_video               = get_theme_mod( 'app_landing_page_vedio_video' );
$app_landing_page_vedio_section_button_link =  get_theme_mod( 'app_landing_page_vedio_section_button_link' , '#' );
$app_landing_page_vedio_section_button      = get_theme_mod( 'app_landing_page_vedio_section_button' , __( 'Download Button', 'app-landing-page' ) );
if( $app_landing_page_vedio_section_page || $app_landing_page_vedio_video ){
?>
    <section class="vedio" id="vedio">
    	<div class="container">
            <?php 
                $video_qry = new WP_Query( "page_id=$app_landing_page_vedio_section_page" );
                    
                    if( $video_qry->have_posts() ){
                        while( $video_qry->have_posts() ){
                            $video_qry->the_post();
                            
                            echo '<header class="header">';
                                the_title( '<h2 class="main-title">', '</h2>' );
                                the_excerpt();
                            echo '</header>';
                               
                            if( $app_landing_page_vedio_video){ 
                    			echo '<div class="vedio-holder">';
                            	    echo app_landing_page_sanitize_iframe( $app_landing_page_vedio_video );             
                    			echo '</div>';
                			}else{
                                echo '<div class="vedio-holder">';
                                    the_post_thumbnail( 'app-landing-page-video-image' );
                                echo '</div>';
                            }
                        } 
                    }
                    wp_reset_postdata(); 
        			
    				if( $app_landing_page_vedio_section_button_link ){ 
    				    echo ' <div class="btn-holder"> <a href="'. esc_url( $app_landing_page_vedio_section_button_link ) .'" class="btn-download"> '. esc_html( $app_landing_page_vedio_section_button ).'</a></div>'; 
                    }
                ?>
    	</div>

    </section>
<?php }
