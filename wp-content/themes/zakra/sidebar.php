<?php
/**
 * The sidebar containing the main widget area
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zakra
 */

// Hide sidebar when sidebar is not present.
if ( in_array( zakra_get_current_layout(), array( 'tg-site-layout--no-sidebar', 'tg-site-layout--default' ), true ) ) {
	return;
}

// Get site layout from customizer and page setting.
$current_sidebar = zakra_get_current_layout();

// Get which sidebar content to show in Sidebar.
$sidebar_meta = get_post_meta( get_the_ID(), 'zakra_sidebar', true );

$sidebar = '';

if ( zakra_is_woocommerce_active() && ( is_checkout() || is_cart() || is_account_page() ) ) {
	if ( 'tg-site-layout--left' === $current_sidebar ) {
		$sidebar = 'wc-left-sidebar';
	} elseif ( 'tg-site-layout--right' === $current_sidebar ) {
		$sidebar = 'wc-right-sidebar';
	}
} elseif ( $sidebar_meta ) {
	$sidebar = $sidebar_meta;
} else {
	if ( 'tg-site-layout--left' === $current_sidebar ) {
		$sidebar = 'sidebar-left';
	} elseif ( 'tg-site-layout--right' === $current_sidebar ) {
		$sidebar = 'sidebar-right';
	}
}

if ( ! is_active_sidebar( $sidebar ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area <?php zakra_sidebar_class(); ?>">
	<?php
	if ( ! empty( $sidebar ) ) {
		dynamic_sidebar( $sidebar );
	}
	?>
</aside><!-- #secondary -->
