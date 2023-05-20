<?php
/**
 * Banner Section
 * 
 * @package App_Landing_Page
 */

$subscribe_section = get_theme_mod( 'app_landing_page_ed_subscribe_section' );
$social = get_theme_mod( 'app_landing_page_ed_social' );
$facebook = get_theme_mod( 'app_landing_page_facebook' );
$twitter = get_theme_mod( 'app_landing_page_twitter' );
$pinterest = get_theme_mod( 'app_landing_page_pinterest' );
$linkedin = get_theme_mod( 'app_landing_page_linkedin' );
$instagram = get_theme_mod( 'app_landing_page_instagram' );
$youtube = get_theme_mod( 'app_landing_page_youtube' );


if( ( app_landing_page_newsletter_activated() && is_active_sidebar( 'bottom-widget' ) && $subscribe_section ) || ( $social && ( $facebook || $twitter || $pinterest || $linkedin || $instagram || $youtube ) ) ) {
	?>
	<section class="stay-tuned">
		<div class="container">	
		<?php 
			if( is_active_sidebar( 'bottom-widget' ) ) { 
					dynamic_sidebar( 'bottom-widget' ); 
			} 
			if( $facebook || $twitter || $pinterest || $linkedin || $instagram || $youtube ){ 
		  		echo '<ul class="social-networks wow fadeInUp">'; 
                
		  			if( $facebook ) echo'<li><a href="' . esc_url( $facebook ) . '" class="fa fa-facebook"></a></li>';
		  			if( $twitter ) echo'<li><a href="' . esc_url( $twitter ) . '" class="fa fa-twitter"></a></li>';
		  			if( $pinterest ) echo'<li><a href="' . esc_url( $pinterest ) . '" class="fa fa-pinterest-p"></a></li>';
		  			if( $linkedin ) echo'<li><a href="' . esc_url( $linkedin ) . '" class="fa fa-linkedin"></a></li>';
		  			if( $instagram ) echo'<li><a href="' . esc_url( $instagram ) . '" class="fa fa-instagram"></a></li>';
		  			if( $youtube ) echo'<li><a href="' . esc_url( $youtube ) . '" class="fa fa-youtube"></a></li>';
		  		
                echo '</ul>';
			}
		?>
	    </div>
	</section>
<?php }
