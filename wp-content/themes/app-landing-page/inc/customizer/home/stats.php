<?php
/**
 * Stats Section Theme Option.
 *
 * @package App_Landing_Page
 */

function app_landing_page_customize_register_stats( $wp_customize ) {

global $app_landing_page_options_pages;
    
/* Option Date Year */   
$app_landing_page_options_years = array();
for( $x=1; $x<=5; $x++){
 $app_landing_page_options_years[$x] = date( 'Y' ) + $x - 1;
}

/* Option Date Day */   
$app_landing_page_options_days_odd = array();
for( $x = 1; $x <= 31; $x++ ){
    $app_landing_page_options_days_odd[$x] = $x;
}

/* Option Date Day */   
$app_landing_page_options_days_even = array();
for( $x = 1; $x <= 30; $x++ ){
    $app_landing_page_options_days_even[$x] = $x;
}


/* Option Date Day */   
$app_landing_page_options_days_leap = array();
for( $x = 1; $x <= 29 ; $x++ ){
    $app_landing_page_options_days_leap[$x] = $x;
}


/* Option Date Day */   
$app_landing_page_options_days_noleap = array();
for( $x = 1; $x <= 28; $x++ ){
    $app_landing_page_options_days_noleap[$x] = $x;
}


    /** Stat Counter Section */
    $wp_customize->add_section(
        'app_landing_page_stats_settings',
        array(
            'title' => __( 'Stat Counter Section', 'app-landing-page' ),
            'priority' => 70,
            'panel' => 'app_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable Stat Counter Section */
    $wp_customize->add_setting(
        'app_landing_page_ed_stats_section',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_ed_stats_section',
        array(
            'label' => __( 'Enable Stat Counter Section', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Stats Counter Page One */
    $wp_customize->add_setting(
        'app_landing_page_stats_page',
        array(
            'default' => '',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_stats_page',
        array(
            'label' => __( 'Select Page', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_pages,
           
        )
    );

    /** Date Year */
    $wp_customize->add_setting(
        'app_landing_page_date_year',
        array(
            'default' =>'1',
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_date_year',
        array(
            'label' => __( 'Select Year', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'select',
            'choices' => $app_landing_page_options_years,

        )
    );

    /** Date Month */
    $wp_customize->add_setting(
        'app_landing_page_date_month',
        array(
            'default' => date( 'm' ),
            'sanitize_callback' => 'app_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_date_month',
        array(
            'label' => __( 'Select Month', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'select',
             'choices' => array(
                '1' => 'January',
                '2' => 'February',
                '3' => 'March',
                '4' => 'April',
                '5' => 'May',
                '6' => 'June',
                '7' => 'July',
                '8' => 'August',
                '9' => 'September',
                '10' => 'october',
                '11' => 'November',
                '12' => 'December',
                ),
        )
    );

    /** Date Day Odd */
    $wp_customize->add_setting(
        'app_landing_page_date_day_odd',
        array(
            'default' => date("j"),
            'sanitize_callback' => 'app_landing_page_sanitize_select',

        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_date_day_odd',
        array(
            'label' => __( 'Select Day', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'select',
            'active_callback' => 'cur_stats_date_odd',
            'choices' => $app_landing_page_options_days_odd,
        )
    );

    /** Date Day Even */
    $wp_customize->add_setting(
        'app_landing_page_date_day_even',
        array(
            'default' => date("j"),
            'sanitize_callback' => 'app_landing_page_sanitize_select',

        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_date_day_even',
        array(
            'label' => __( 'Select Day', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'select',
            'active_callback' => 'cur_stats_date_even',
            'choices' => $app_landing_page_options_days_even,
        )
    );

    /** Date Day Leap */
    $wp_customize->add_setting(
        'app_landing_page_date_day_leap',
        array(
            'default' => date("j"),
            'sanitize_callback' => 'app_landing_page_sanitize_select',

        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_date_day_leap',
        array(
            'label' => __( 'Select Day', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'select',
            'active_callback' => 'cur_stats_date_leap',
            'choices' => $app_landing_page_options_days_leap,
        )
    );

    /** Date Day noLeap */
    $wp_customize->add_setting(
        'app_landing_page_date_day_noleap',
        array(
            'default' => date("j"),
            'sanitize_callback' => 'app_landing_page_sanitize_select',

        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_date_day_noleap',
        array(
            'label' => __( 'Select Day', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'select',
            'active_callback' => 'cur_stats_date_noleap',
            'choices' => $app_landing_page_options_days_noleap,
        )
    );

    /** Button Text */
    $wp_customize->add_setting(
        'app_landing_page_stats_button',
        array(
            'default' => __( 'Download Button', 'app-landing-page' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_stats_button',
        array(
            'label' => __( 'Download Button Text', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'text',
        )
    );
    
    /** Button Url */
    $wp_customize->add_setting(
        'app_landing_page_stats_button_link',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'app_landing_page_stats_button_link',
        array(
            'label' => __( 'Download Button Url', 'app-landing-page' ),
            'section' => 'app_landing_page_stats_settings',
            'type' => 'text',
        )
    );

    /** Stat Section Ends */

}
add_action( 'customize_register', 'app_landing_page_customize_register_stats' );