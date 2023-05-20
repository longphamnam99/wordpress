<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package App Landing Page 
 */

    $ed_section = app_landing_page_ed_section();
    global $app_landing_page_sections;
    
  
    get_header(); 
        if ( 'posts' == get_option( 'show_on_front' ) ) {

            include( get_home_template() );

        }elseif( $ed_section ){ 

            foreach( $app_landing_page_sections as $section ){ 
               if( get_theme_mod( 'app_landing_page_ed_' . $section . '_section' ) == 1 ){
                    get_template_part( 'sections/' . esc_attr( $section ) );
                } 
            }
                
        }else{
            include( get_page_template() );

        }
                      
    get_footer();