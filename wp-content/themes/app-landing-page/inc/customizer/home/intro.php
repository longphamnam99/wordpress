<?php
/**
 * Intro Section Theme Option.
 *
 * @package App_Landing_Page
 */

function app_landing_page_customize_register_intro( $wp_customize ) {

    global $app_landing_page_options_pages;

    /** Intro Section */
    $wp_customize->add_section(
        'app_landing_page_intro_settings',
        array(
            'title' => __( 'Intro Section', 'app-landing-page' ),
            'priority' => 50,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
        
    /** Enable/Disable Intro Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_intro_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_intro_section',
        array(
            'label' => __( 'Enable Intro Section', 'app-landing-page' ),
            'section' => 'app_landing_page_intro_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Intro Section Page */
    $wp_customize->add_setting(
        'app_landing_page_intro_section_page',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_intro_section_page',
        array(
            'label' => __( 'Intro Section Page', 'app-landing-page' ),
            'section' => 'app_landing_page_intro_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_pages,
        )
    );

    /** Intro Section Ends */

}
add_action( 'customize_register', 'app_landing_page_customize_register_intro' );