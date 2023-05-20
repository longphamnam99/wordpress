<?php
/**
 * Breadcrumbs Options
 *
 * @package App_Landing_Page
 */
 
function app_landing_page_customize_register_breadcrumbs( $wp_customize ) {

    /** BreadCrumb Settings */
    
    $wp_customize->add_section(
        'app_landing_page_breadcrumb_settings',
        array(
            'title' => __( 'Breadcrumb Settings', 'app-landing-page' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable BreadCrumb */
    $wp_customize->add_setting(
        'app_landing_page_ed_breadcrumb',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_breadcrumb',
        array(
            'label' => __( 'Enable Breadcrumb', 'app-landing-page' ),
            'section' => 'app_landing_page_breadcrumb_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Show/Hide Current */
    $wp_customize->add_setting(
        'app_landing_page_ed_current',
        array(
            'default' => '1',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_current',
        array(
            'label' => __( 'Show current', 'app-landing-page' ),
            'section' => 'app_landing_page_breadcrumb_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Home Text */
    $wp_customize->add_setting(
        'app_landing_page_breadcrumb_home_text',
        array(
            'default' => __( 'Home', 'app-landing-page' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_breadcrumb_home_text',
        array(
            'label' => __( 'Breadcrumb Home Text', 'app-landing-page' ),
            'section' => 'app_landing_page_breadcrumb_settings',
            'type' => 'text',
        )
    );
    
    /** Breadcrumb Separator */
    $wp_customize->add_setting(
        'app_landing_page_breadcrumb_separator',
        array(
            'default' => '>',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_breadcrumb_separator',
        array(
            'label' => __( 'Breadcrumb Separator', 'app-landing-page' ),
            'section' => 'app_landing_page_breadcrumb_settings',
            'type' => 'text',
        )
    );
    /** BreadCrumb Settings Ends */
    
    }
add_action( 'customize_register', 'app_landing_page_customize_register_breadcrumbs' );
