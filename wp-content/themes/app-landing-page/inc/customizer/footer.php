<?php 
/**
 * Footer Option.
 *
 * @package App Landing page
 */
 
function app_landing_page_customize_footer_settings( $wp_customize ) {

 /** Footer Section */
    $wp_customize->add_section(
        'app_landing_page_footer_section',
        array(
            'title' => __( 'Footer Settings', 'app-landing-page' ),
            'priority' => 70,
        )
    );
    
    /** Copyright Text */
    $wp_customize->add_setting(
        'app_landing_page_footer_copyright_text',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_footer_copyright_text',
        array(
            'label' => __( 'Copyright Info', 'app-landing-page' ),
            'section' => 'app_landing_page_footer_section',
            'type' => 'textarea',
        )
    );

}

add_action( 'customize_register', 'app_landing_page_customize_footer_settings' );
 