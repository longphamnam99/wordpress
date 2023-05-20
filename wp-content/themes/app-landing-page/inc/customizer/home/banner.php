<?php
/**
 * Banner Section Theme Option.
 *
 * @package App_Landing_Page
 */

function app_landing_page_customize_register_banner( $wp_customize ) {

    /** Banner Section */
    $wp_customize->add_section(
        'app_landing_page_banner_settings',
        array(
            'title' => __( 'Banner Section', 'app-landing-page' ),
            'priority' => 10,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
        
    /** Enable/Disable Banner Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_banner_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_banner_section',
        array(
            'label' => __( 'Enable Banner Section', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'checkbox',
        )
    );

    /** Button One Image */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_one',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_banner_button_one', 
           array(
               'label'      => __( 'Upload Button Logo One', 'app-landing-page' ),
               'section'    => 'app_landing_page_banner_settings',
           )
       )
    );
    
    
    /** Button  One Url */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_one_url',
        array(
            'default' =>'',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_banner_button_one_url',
        array(
            'label' => __( 'Banner Button One Url', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'text',
        )
    );

    /** Button Two Image */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_two',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'app_landing_page_banner_button_two',
           array(
               'label'      => __( 'Upload Logo Two', 'app-landing-page' ),
               'section'    => 'app_landing_page_banner_settings',
           )
       )
    );
    
    /** Button Two Url */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_two_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_banner_button_two_url',
        array(
            'label' => __( 'Banner Button Two Url', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'text',
        )
    );

    /** Button Three Text */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_text',
        array(
            'default' => __( 'Download Now', 'app-landing-page' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_banner_button_text',
        array(
            'label' => __( 'Download Button Text', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Button three Url */
    $wp_customize->add_setting(
        'app_landing_page_banner_button_url',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_banner_button_url',
        array(
            'label' => __( 'Download Button Url', 'app-landing-page' ),
            'section' => 'app_landing_page_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Banner Section Ends */
}
add_action( 'customize_register', 'app_landing_page_customize_register_banner' );