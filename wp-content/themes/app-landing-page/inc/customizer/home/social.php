<?php
/**
 * Social Options
 *
 * @package App_Landing_Page
 */
 
 function app_landing_page_customize_register_social( $wp_customize ) {
    
    /** Social Settings */
    $wp_customize->add_section(
        'app_landing_page_social_settings',
        array(
            'title' => __( 'Social Settings', 'app-landing-page' ),
            'description' => __( 'Leave blank if you do not want to show the social link.', 'app-landing-page' ),
            'priority' => 90,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable Social in Header */
    $wp_customize->add_setting(
        'app_landing_page_ed_social',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_social',
        array(
            'label' => __( 'Enable Social Links', 'app-landing-page' ),
            'section' => 'app_landing_page_social_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Facebook */
    $wp_customize->add_setting(
        'app_landing_page_facebook',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_facebook',
        array(
            'label' => __( 'Facebook', 'app-landing-page' ),
            'section' => 'app_landing_page_social_settings',
            'type' => 'text',
        )
    );
    
    
    /** Twitter */
    $wp_customize->add_setting(
        'app_landing_page_twitter',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_twitter',
        array(
            'label' => __( 'Twitter', 'app-landing-page' ),
            'section' => 'app_landing_page_social_settings',
            'type' => 'text',
        )
    );
    
    /** Pinterest */
    $wp_customize->add_setting(
        'app_landing_page_pinterest',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_pinterest',
        array(
            'label' => __( 'Pinterest', 'app-landing-page' ),
            'section' => 'app_landing_page_social_settings',
            'type' => 'text',
        )
    );
    
    /** LinkedIn */
    $wp_customize->add_setting(
        'app_landing_page_linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_linkedin',
        array(
            'label' => __( 'LinkedIn', 'app-landing-page' ),
            'section' => 'app_landing_page_social_settings',
            'type' => 'text',
        )
    );
    
    /** Instagram */
    $wp_customize->add_setting(
        'app_landing_page_instagram',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_instagram',
        array(
            'label' => __( 'Instagram', 'app-landing-page' ),
            'section' => 'app_landing_page_social_settings',
            'type' => 'text',
        )
    );

    /** YouTube */
    $wp_customize->add_setting(
        'app_landing_page_youtube',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_youtube',
        array(
            'label' => __( 'YouTube', 'app-landing-page' ),
            'section' => 'app_landing_page_social_settings',
            'type' => 'text',
        )
    );
    /** Social Settings Ends */
    
 }
 add_action( 'customize_register', 'app_landing_page_customize_register_social' );