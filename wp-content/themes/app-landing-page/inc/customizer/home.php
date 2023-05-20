<?php
/**
 * Home Page Options
 *
 * @package App_Landing_Page
 */
 
function app_landing_page_customize_register_home( $wp_customize ) {

	/** Home Page Settings */
    $wp_customize->add_panel( 
        'app_landing_page_home_page_settings',
         array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'title' => __( 'Home Page Settings', 'app-landing-page' ),
            'description' => __( 'Customize Home Page Settings', 'app-landing-page' ),
        ) 
    );
        
    /** Home Page Settings Ends */

}
add_action( 'customize_register', 'app_landing_page_customize_register_home' );
