<?php
/**
 * WP hooks for this theme.
 *
 * @package App_Landing_Page
 */

/**
 * @see app_landing_page_setup
*/
add_action( 'after_setup_theme', 'app_landing_page_setup' );

/**
 * @see app_landing_page_content_width
*/
add_action( 'after_setup_theme', 'app_landing_page_content_width', 0 );

/**
 * @see app_landing_page_template_redirect_content_width
*/
add_action( 'template_redirect', 'app_landing_page_template_redirect_content_width' );

/**
 * @see app_landing_page_scripts 
*/
add_action( 'wp_enqueue_scripts', 'app_landing_page_scripts' );

/**
 * @see app_landing_page_category_transient_flusher
*/
add_action( 'edit_category', 'app_landing_page_category_transient_flusher' );
add_action( 'save_post',     'app_landing_page_category_transient_flusher' );

/**
 * 
 * @see app_landing_page_body_classes
*/
add_filter( 'body_class', 'app_landing_page_body_classes' );

/**
 * @see app_landing_page_excerpt_more
 * @see app_landing_page_excerpt_length
*/
add_filter( 'excerpt_more', 'app_landing_page_excerpt_more' );
add_filter( 'excerpt_length', 'app_landing_page_excerpt_length', 999 );

/**
* @see app_landing_page_register_required_plugins
*/
add_action( 'tgmpa_register', 'app_landing_page_register_required_plugins' );