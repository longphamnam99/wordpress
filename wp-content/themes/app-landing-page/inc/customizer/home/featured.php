<?php
/**
 * Featured Section Theme Option.
 *
 * @package App_Landing_Page
 */


function app_landing_page_customize_register_featured( $wp_customize ) {
    
global $app_landing_page_option_categories;

    /** Featured Section */
    $wp_customize->add_section(
        'app_landing_page_featured_settings',
        array(
            'title' => __( 'Featured Section', 'app-landing-page' ),
            'priority' => 20,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable Featured Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_featured_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_featured_section',
        array(
            'label' => __( 'Enable Featured Section', 'app-landing-page' ),
            'section' => 'app_landing_page_featured_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Featured Section Title */
    $wp_customize->add_setting(
        'app_landing_page_featured_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_featured_section_title',
        array(
            'label' => __( 'Featured Section Title', 'app-landing-page' ),
            'section' => 'app_landing_page_featured_settings',
            'type' => 'text',
        )
    );

    /** Featured Post Category */
    $wp_customize->add_setting(
        'app_landing_page_featured_cat',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_featured_cat',
        array(
            'label' => __( 'Select Featured Category', 'app-landing-page' ),
            'section' => 'app_landing_page_featured_settings',
            'type' => 'select',
            'choices' => $app_landing_page_option_categories,
        )
    );
    
}
add_action( 'customize_register', 'app_landing_page_customize_register_featured' );