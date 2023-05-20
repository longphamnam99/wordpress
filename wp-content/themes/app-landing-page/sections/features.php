<?php
/**
 * Features Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_features_page =  get_theme_mod( 'app_landing_page_features_page' );

$app_landing_page_features_one_post = get_theme_mod( 'app_landing_page_features_post_one' );
$app_landing_page_features_two_post = get_theme_mod( 'app_landing_page_features_post_two' );
$app_landing_page_features_three_post = get_theme_mod( 'app_landing_page_features_post_three' );
$app_landing_page_features_four_post = get_theme_mod( 'app_landing_page_features_post_four' );
$app_landing_page_features_five_post = get_theme_mod( 'app_landing_page_features_post_five' );
$app_landing_page_features_six_post = get_theme_mod( 'app_landing_page_features_post_six' );

if( ( $app_landing_page_features_page ) || ( ( $app_landing_page_features_one_post || $app_landing_page_features_two_post || $app_landing_page_features_three_post || $app_landing_page_features_four_post || $app_landing_page_features_five_post || $app_landing_page_features_six_post ) ) ) {
    echo '<section class="features" id="features">';
        echo '<div class="container">';
    		if( $app_landing_page_features_page){ 
    			$features_qry = new WP_Query( "page_id=$app_landing_page_features_page" );
    	        
        	        if( $features_qry->have_posts() ){
        	            while( $features_qry->have_posts() ){
        	                $features_qry->the_post();
        	                
        	                echo '<header class="header wow wow fadeInUp">';
                         		the_title( '<h2 class="main-title">', '</h2>' );
                         		the_content();
        	                echo '</header>';
  					     }
                          wp_reset_postdata(); 
                    }; 
            }
    
        echo '<div class="row">';
        
            if( $app_landing_page_features_one_post || $app_landing_page_features_three_post || $app_landing_page_features_five_post ){ 
            
            	$app_landing_page_features_block_one = array( $app_landing_page_features_one_post, $app_landing_page_features_three_post, $app_landing_page_features_five_post ); 
            	$app_landing_page_features_block_one = array_diff( array_unique( $app_landing_page_features_block_one  ), array('') );
            
            		$features_qry_one = new WP_Query( array( 
                                'post_type'             => 'post',
                                'posts_per_page'        => -1,
                                'post__in'              => $app_landing_page_features_block_one,
                                'orderby'               => 'post__in',
                                'ignore_sticky_posts'   => true
                            ) );
            
            			if( $features_qry_one->have_posts() ){
                            echo '<div class="col wow wow fadeInUp">';
                                while( $features_qry_one->have_posts() ){
                                	$features_qry_one->the_post();
                                    
                                	echo '<div class="text">';
                                		if( has_post_thumbnail() ){
            								echo '<div class="icon-holder">';
            									the_post_thumbnail( 'app-landing-page-features-image-small' );
            								echo '</div>';
            							}
            							echo '<div class="text-holder">';
            								the_title('<h3 class="title">', '</h3>');
            								the_content();
            							echo '</div>';
            						echo '</div>';
                				}
                				wp_reset_postdata(); 
                		echo '</div>';
                		}
                		
           	}
            
    		if( $app_landing_page_features_page){ 
                $features_qry = new WP_Query( "page_id=$app_landing_page_features_page" );
              
    	        if( $features_qry->have_posts() ){
    	            while( $features_qry->have_posts() ){
    	                $features_qry->the_post();
    					
    					if( has_post_thumbnail() ){ 
    						echo '<div class="col wow wow fadeInUp">';
    							the_post_thumbnail( 'app-landing-page-features-image' );
    						echo '</div>';
    					} 
                    }
                    wp_reset_postdata(); 
   				} 
            }
            
            if( $app_landing_page_features_two_post || $app_landing_page_features_four_post  || $app_landing_page_features_six_post ){ 
    
    			$app_landing_page_features_block_two = array( $app_landing_page_features_two_post, $app_landing_page_features_four_post, $app_landing_page_features_six_post ); 
    			$app_landing_page_features_block_two = array_diff( array_unique( $app_landing_page_features_block_two  ), array('') );
    
    			$features_qry_two = new WP_Query( array( 
    	                    'post_type'             => 'post',
    	                    'posts_per_page'        => -1,
    	                    'post__in'              => $app_landing_page_features_block_two,
    	                    'orderby'               => 'post__in',
    	                    'ignore_sticky_posts'   => true,
    	                   	'offset' => 3
    	                ) );
    
        			if( $features_qry_two->have_posts() ){
                        echo '<div class="col wow wow fadeInUp">';
                            while( $features_qry_two->have_posts() ){
                            	$features_qry_two->the_post();
                            	echo '<div class="text">';
        							if( has_post_thumbnail() ){
        								echo '<div class="icon-holder">';
        									the_post_thumbnail( 'app-landing-page-features-image-small' );
        								echo '</div>';
        							}
        							echo '<div class="text-holder">';
        								the_title('<h3 class="title">', '</h3>');
        								the_content();
        							echo '</div>';
        						echo '</div>';
            				}
            				wp_reset_postdata(); 
                        echo '</div>';
        			}
            	}
            		
            echo '</div>';
    	echo '</div>';
    echo '</section>';
}