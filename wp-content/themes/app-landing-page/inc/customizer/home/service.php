<?php
/**
 * Service Section Theme Option.
 *
 * @package App_Landing_Page
 */

function app_landing_page_customize_register_service( $wp_customize ) {

    global $app_landing_page_options_pages;
    global $app_landing_page_options_posts;

    /** Service Section */
    $wp_customize->add_section(
        'app_landing_page_service_settings',
        array(
            'title' => __( 'Service Section', 'app-landing-page' ),
            'priority' => 60,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable Service Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_service_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_service_section',
        array(
            'label' => __( 'Enable Service Section', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'checkbox',
        )
    );

    /** Service Section Title */
    /*$wp_customize->add_setting(
        'app_landing_page_service_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_section_title',
        array(
            'label' => __( 'Service Section Title', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );*/
    
    /** Service Section Content */
    /*$wp_customize->add_setting(
        'app_landing_page_service_section_content',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_section_content',
        array(
            'label' => __( 'Service Section Content', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'textarea',
        )
    );*/
    /** Secrvices Page */
    $wp_customize->add_setting(
        'app_landing_page_service_page',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_page',
        array(
            'label' => __( 'Select Services Page', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_pages,
        )
    );

    /** Service Post One */
    $wp_customize->add_setting(
        'app_landing_page_service_post_one',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_post_one',
        array(
            'label' => __( 'Select Service Post One', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );
   
    /** Service Post Two */
    $wp_customize->add_setting(
        'app_landing_page_service_post_two',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_post_two',
        array(
            'label' => __( 'Select Service Post Two', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );

    /** Service Post Two */
    $wp_customize->add_setting(
        'app_landing_page_service_post_three',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_post_three',
        array(
            'label' => __( 'Select Service Post Three', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );

    /** Service Post Four */
    $wp_customize->add_setting(
        'app_landing_page_service_post_four',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_post_four',
        array(
            'label' => __( 'Select Service Post Four', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );

    /** Service Post Five */
    $wp_customize->add_setting(
        'app_landing_page_service_post_five',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_post_five',
        array(
            'label' => __( 'Select Service Post Five', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );
    
    /** Service Post Six */
    $wp_customize->add_setting(
        'app_landing_page_service_post_six',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_post_six',
        array(
            'label' => __( 'Select Service Post Six', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );
    
    /** Service Post Seven */
    $wp_customize->add_setting(
        'app_landing_page_service_post_seven',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_post_seven',
        array(
            'label' => __( 'Select Service Post Seven', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );

    /** Service Post Eight */
    $wp_customize->add_setting(
        'app_landing_page_service_post_eight',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_post_eight',
        array(
            'label' => __( 'Select Service Post Eight', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );

    /** Button Text */
    $wp_customize->add_setting(
        'app_landing_page_service_section_button',
        array(
            'default' => __( 'Download Button', 'app-landing-page' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_section_button',
        array(
            'label' => __( 'Download Button Text', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    
    /** Button Url */
    $wp_customize->add_setting(
        'app_landing_page_service_section_button_link',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_service_section_button_link',
        array(
            'label' => __( 'Download Button Url', 'app-landing-page' ),
            'section' => 'app_landing_page_service_settings',
            'type' => 'text',
        )
    );
    /** Service Section Ends */

}
add_action( 'customize_register', 'app_landing_page_customize_register_service' );