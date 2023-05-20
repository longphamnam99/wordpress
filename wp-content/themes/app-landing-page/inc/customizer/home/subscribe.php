<?php
/**
 * Subscribe Section Theme Option.
 *
 * @package App_Landing_Page
 */

function app_landing_page_customize_register_subscribe( $wp_customize ) {
        
    /** Subscribe Settings */
    $wp_customize->add_section(
        'app_landing_page_subscribe_settings',
        array(
            'title' => __( 'Subscription Settings', 'app-landing-page' ),
            'priority' => 80,
            'panel' => 'app_landing_page_home_page_settings',
            'active_callback' => 'app_landing_page_newsletter_activated',
        )
    );
    
    /** Enable/Disable Subscribe */
    $wp_customize->add_setting(
        'app_landing_page_ed_subscribe_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_subscribe_section',
        array(
            'label' => __( 'Enable Subscribe', 'app-landing-page' ),
            'description' =>  __( 'Newsletters plugin must be activated for this section to be enable. ', 'app-landing-page' ),
            'section' => 'app_landing_page_subscribe_settings',
            'type' => 'checkbox',

        )
    );
    /** Subscribe Section Ends */
}
add_action( 'customize_register', 'app_landing_page_customize_register_subscribe' );