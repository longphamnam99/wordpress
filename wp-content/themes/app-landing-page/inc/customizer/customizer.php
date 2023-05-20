<?php
/**
 * App Landing Page Theme Customizer.
 *
 * @package App_Landing_Page
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

$app_landing_page_sections = array( 'banner' , 'featured', 'features', 'vedio', 'intro', 'service', 'stats', 'subscribe', 'social' );

$app_landing_page_settings = array( 'default', 'home', 'breadcrumb', 'footer' );

/* Option list of all post */	
$app_landing_page_options_posts = array();
$app_landing_page_options_posts_obj = get_posts('posts_per_page=-1');
$app_landing_page_options_posts[''] = __( 'Choose Post', 'app-landing-page' );
foreach ( $app_landing_page_options_posts_obj as $posts ) {
	$app_landing_page_options_posts[$posts->ID] = $posts->post_title;
}

/* Option list of all page */   
$app_landing_page_options_pages = array();
$app_landing_page_options_pages_obj = get_pages('posts_per_page=-1');
$app_landing_page_options_pages[''] = __( 'Choose Page', 'app-landing-page' );
foreach ( $app_landing_page_options_pages_obj as $pg ) {
    $app_landing_page_options_pages[$pg->ID] = $pg->post_title;
}

/* Option list of all categories */
$args = array(
   'type'                     => 'post',
   'orderby'                  => 'name',
   'order'                    => 'ASC',
   'hide_empty'               => 1,
   'hierarchical'             => 1,
   'taxonomy'                 => 'category'
); 
$app_landing_page_option_categories = array();
$app_landing_page_category_lists = get_categories( $args );
$app_landing_page_option_categories[''] = __( 'Choose Category', 'app-landing-page' );;
foreach( $app_landing_page_category_lists as $category ){
    $app_landing_page_option_categories[$category->term_id] = $category->name;
}

foreach( $app_landing_page_settings as $setting ){
    require get_template_directory() . '/inc/customizer/' . $setting . '.php';
}

foreach( $app_landing_page_sections as $section ){
    require get_template_directory() . '/inc/customizer/home/' . $section . '.php';
}



/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function app_landing_page_customize_preview_js() {
	wp_enqueue_script( 'app_landing_page_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'app_landing_page_customize_preview_js' );

if(app_landing_page_newsletter_activated()){
  /** 
   * Registering and enqueuing scripts/stylesheets for Customizer controls.
   */ 
  function app_landing_page_customizer_js() {
    wp_enqueue_script( 'app-landing-page-customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array("jquery"), '20160512', true  );
  }

  add_action( 'customize_controls_enqueue_scripts', 'app_landing_page_customizer_js' );

}

/**
 * Enqueue Scripts for customize controls
*/
function app_landing_page_customize_scripts() {
  wp_enqueue_style( 'app-landing-page-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );    
}
add_action( 'customize_controls_enqueue_scripts', 'app_landing_page_customize_scripts' );