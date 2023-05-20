<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package App_Landing_Page
 */

get_header(); 

    global $app_landing_page_sections;
    
    foreach( $app_landing_page_sections as $section ){ 
    	
    	if( get_theme_mod( 'app_landing_page_ed_' . $section . '_section' ) == 1 ){
        	get_template_part( 'sections/' . esc_attr( $section ) );
        }
    }

get_footer();