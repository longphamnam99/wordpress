<?php
/**
 * Service Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_service_page =  get_theme_mod( 'app_landing_page_service_page' );

$app_landing_page_service_one_post = get_theme_mod( 'app_landing_page_service_post_one' );
$app_landing_page_service_two_post = get_theme_mod( 'app_landing_page_service_post_two' );
$app_landing_page_service_three_post= get_theme_mod( 'app_landing_page_service_post_three' );
$app_landing_page_service_four_post= get_theme_mod( 'app_landing_page_service_post_four' );
$app_landing_page_service_five_post = get_theme_mod( 'app_landing_page_service_post_five' );
$app_landing_page_service_six_post = get_theme_mod( 'app_landing_page_service_post_six' );
$app_landing_page_service_seven_post = get_theme_mod( 'app_landing_page_service_post_seven' );
$app_landing_page_service_eight_post = get_theme_mod( 'app_landing_page_service_post_eight' );

$app_landing_page_service_section_button = get_theme_mod( 'app_landing_page_service_section_button', __( 'Download Button', 'app-landing-page' ) );
$app_landing_page_service_section_button_link = get_theme_mod( 'app_landing_page_service_section_button_link' , '#' );

if( $app_landing_page_service_one_post || $app_landing_page_service_two_post || $app_landing_page_service_three_post || $app_landing_page_service_four_post || $app_landing_page_service_five_post || $app_landing_page_service_six_post || $app_landing_page_service_seven_post || $app_landing_page_service_eight_post ) { 

	$app_landing_page_service_posts = array( $app_landing_page_service_one_post, $app_landing_page_service_two_post, $app_landing_page_service_three_post, $app_landing_page_service_four_post, $app_landing_page_service_five_post, $app_landing_page_service_six_post, $app_landing_page_service_seven_post, $app_landing_page_service_eight_post );

	$app_landing_page_service_posts = array_diff( array_unique( $app_landing_page_service_posts  ), array('') );

    
?>
    <section class="section-5" id="service">
        <div class="container">
            <?php
            if( $app_landing_page_service_page){ 
                $service_qry = new WP_Query( "page_id=$app_landing_page_service_page" );
                
                    if( $service_qry->have_posts() ){
                        while( $service_qry->have_posts() ){
                            $service_qry->the_post();
                            
                            echo '<header class="header wow fadeInUp">';
                                the_title( '<h2 class="main-title">', '</h2>' );
                                the_content();
                            echo '</header>';
                         }
                          wp_reset_postdata(); 
                    }; 
            } 
            
		
        	$services_qry = new WP_Query( array( 
                    'post_type'             => 'post',
                    'posts_per_page'        => -1,
                    'post__in'              => $app_landing_page_service_posts,
                    'orderby'               => 'post__in',
                    'ignore_sticky_posts'   => true
                ) );

                    echo '<div class="row">';
        				if( $services_qry->have_posts() ){
        				    while( $services_qry->have_posts() ){
        				        $services_qry->the_post();
        
                        		echo '<div class="col wow fadeInUp">';
                         			if( has_post_thumbnail() ){
                						echo '<div class="icon-holder">';
                							the_post_thumbnail( 'app-landing-page-features-image-small' );
                						echo '</div>' ; 
                					} 
            						echo '<div class="text-holder">';
            							the_title( '<h2 class="main-title">', '</h2>' );
            							the_content();
            						echo '</div>';
            					echo '</div>';
        					}
        				wp_reset_postdata();
        				}
    				echo '</div>';
        			
                    if( $app_landing_page_service_section_button_link ){ 
        				echo ' <div class="btn-holder"> <a href="'. esc_url( $app_landing_page_service_section_button_link ) .'" class="btn-download"> '. esc_html( $app_landing_page_service_section_button ) .'</a></div>'; 
        			}
                ?>
        	</div>
        </section>
<?php }