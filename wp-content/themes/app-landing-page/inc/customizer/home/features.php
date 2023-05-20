<?php
/**
 * Features Section Theme Option.
 *
 * @package App_Landing_Page
 */


function app_landing_page_customize_register_features( $wp_customize ) {

    global $app_landing_page_options_pages;
    global $app_landing_page_options_posts;
    /** Features Section */
    $wp_customize->add_section(
        'app_landing_page_features_settings',
        array(
            'title' => __( 'Features Section', 'app-landing-page' ),
            'priority' => 30,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
        
    /** Enable/Disable Features Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_features_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_features_section',
        array(
            'label' => __( 'Enable features Section', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'checkbox',
        )
    );
      
    /** Featured Page */
    $wp_customize->add_setting(
        'app_landing_page_features_page',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_page',
        array(
            'label' => __( 'Select Features Page', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_pages,
        )
    );

    /** Featured Post One */
    $wp_customize->add_setting(
        'app_landing_page_features_post_one',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_post_one',
        array(
            'label' => __( 'Select Features Post One', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );

   /** Featured Post Two */
    $wp_customize->add_setting(
        'app_landing_page_features_post_two',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_post_two',
        array(
            'label' => __( 'Select Features Post Two', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );
 
   /** Featured Post Three */
    $wp_customize->add_setting(
        'app_landing_page_features_post_three',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_post_three',
        array(
            'label' => __( 'Select Features Post Three', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );
    
   /** Featured Post Four */
    $wp_customize->add_setting(
        'app_landing_page_features_post_four',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_post_four',
        array(
            'label' => __( 'Select Features Post Four', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );

    /** Featured Post Five */
    $wp_customize->add_setting(
        'app_landing_page_features_post_five',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_post_five',
        array(
            'label' => __( 'Select Features Post Five', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );

 
    /** Featured Post Six */
    $wp_customize->add_setting(
        'app_landing_page_features_post_six',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_features_post_six',
        array(
            'label' => __( 'Select Features Post Six', 'app-landing-page' ),
            'section' => 'app_landing_page_features_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_posts,
        )
    );
    /** Features Section Ends */

}
add_action( 'customize_register', 'app_landing_page_customize_register_features' );