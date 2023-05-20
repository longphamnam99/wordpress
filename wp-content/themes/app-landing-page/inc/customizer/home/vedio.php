<?php
/**
 * Vedio Section Theme Option.
 *
 * @package App_Landing_Page
 */

function app_landing_page_customize_register_vedio( $wp_customize ) {
    
    global $app_landing_page_options_pages;

    /** Video Section */
    $wp_customize->add_section(
        'app_landing_page_vedio_settings',
        array(
            'title' => __( 'Video Section', 'app-landing-page' ),
            'priority' => 40,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable Video Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_vedio_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_vedio_section',
        array(
            'label' => __( 'Enable Video Section', 'app-landing-page' ),
            'section' => 'app_landing_page_vedio_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Video Section Page */
    $wp_customize->add_setting(
        'app_landing_page_vedio_section_page',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_vedio_section_page',
        array(
            'label' => __( 'Video Section Page', 'app-landing-page' ),
            'section' => 'app_landing_page_vedio_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_pages,
        )
    );
        
    /**  Video Link */
    $wp_customize->add_setting(
        'app_landing_page_vedio_video',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_iframe',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_vedio_video',
        array(
            'label' => __( 'Video Embed Link', 'app-landing-page' ),
            'section' => 'app_landing_page_vedio_settings',
            'type' => 'text',
        )
    );

    /** Button Text */
    $wp_customize->add_setting(
        'app_landing_page_vedio_section_button',
        array(
            'default' => __( 'Download Button', 'app-landing-page' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_vedio_section_button',
        array(
            'label' => __( 'Download Button Text', 'app-landing-page' ),
            'section' => 'app_landing_page_vedio_settings',
            'type' => 'text',
        )
    );
    
    /** Button Url */
    $wp_customize->add_setting(
        'app_landing_page_vedio_section_button_link',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_vedio_section_button_link',
        array(
            'label' => __( 'Download Button Url', 'app-landing-page' ),
            'section' => 'app_landing_page_vedio_settings',
            'type' => 'text',
        )
    );
    
    /** Video Section Ends */

}
add_action( 'customize_register', 'app_landing_page_customize_register_vedio' );