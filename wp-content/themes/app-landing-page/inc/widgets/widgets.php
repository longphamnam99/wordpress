<?php
/**
 * App Landing Page Widgets
 *
 * @package App_Landing_Page
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function app_landing_page_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'app-landing-page' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'app-landing-page' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	 register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar One', 'app-landing-page' ),
		'id'            => 'footer-sidebar-one',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	  register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar Two', 'app-landing-page' ),
		'id'            => 'footer-sidebar-two',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	   register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar Three', 'app-landing-page' ),
		'id'            => 'footer-sidebar-three',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if( app_landing_page_newsletter_activated() ){
		 register_sidebar( array(
			'name'          => esc_html__( 'Subscription Widget', 'app-landing-page' ),
			'id'            => 'bottom-widget',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	 
}
add_action( 'widgets_init', 'app_landing_page_widgets_init' );

/**
 * Load widget featured post.
 */
require get_template_directory() . '/inc/widgets/widget-featured-post.php';

/**
 * Load widget featured post.
 */
require get_template_directory() . '/inc/widgets/widget-popular-post.php';

/**
 * Load widget recent post.
 */
require get_template_directory() . '/inc/widgets/widget-recent-post.php';

/**
 * Load widget social link.
 */
require get_template_directory() . '/inc/widgets/widget-social-links.php';
