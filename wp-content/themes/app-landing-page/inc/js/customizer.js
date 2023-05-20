jQuery(document).ready(function($) {
	/* Move widgets to their respective sections */
	wp.customize.section( 'sidebar-widgets-bottom-widget' ).panel( 'app_landing_page_home_page_settings' )
	wp.customize.section( 'sidebar-widgets-bottom-widget' ).priority( '81' );
});