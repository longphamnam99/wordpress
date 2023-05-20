<?php
/**
 * App Landing Page Theme Info
 *
 * @package App_Landing_Page
 */

function metro_magazine_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info' , array(
		'title'       => __( 'Information Links' , 'app-landing-page' ),
		'priority'    => 6,
		));

	$wp_customize->add_setting('theme_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));
    
    $theme_info = '';
	$theme_info .= '<h3 class="sticky_title">' . __( 'Need help?', 'app-landing-page' ) . '</h3>';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View demo', 'app-landing-page' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/previews/?theme=app-landing-page' ) . '" target="_blank">' . __( 'here', 'app-landing-page' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View documentation', 'app-landing-page' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/documentation/app-landing-page/' ) . '" target="_blank">' . __( 'here', 'app-landing-page' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Download Zip', 'app-landing-page' ) . ': </label><a href="' . esc_url( 'https://raratheme-wbtneb0y4p.netdna-ssl.com/wp-content/uploads/2017/12/app-landing-page-demo-content.zip' ) . '" target="_blank">' . __( 'here', 'app-landing-page' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme info', 'app-landing-page' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/wordpress-themes/app-landing-page/' ) . '" target="_blank">' . __( 'here', 'app-landing-page' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Support ticket', 'app-landing-page' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/support-ticket/' ) . '" target="_blank">' . __( 'here', 'app-landing-page' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Rate this theme', 'app-landing-page' ) . ': </label><a href="' . esc_url( 'https://wordpress.org/support/theme/app-landing-page/reviews' ) . '" target="_blank">' . __( 'here', 'app-landing-page' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="more-detail row-element">' . __( 'More WordPress Themes', 'app-landing-page' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/wordpress-themes/' ) . '" target="_blank">' . __( 'here', 'app-landing-page' ) . '</a></span><br />';
	

	$wp_customize->add_control( new App_Landing_Theme_Info( $wp_customize ,'theme_info_theme',array(
		'label' => __( 'About App Landing Page' , 'app-landing-page' ),
		'section' => 'theme_info',
		'description' => $theme_info
		)));

	$wp_customize->add_setting('theme_info_more_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));

}
add_action( 'customize_register', 'metro_magazine_customizer_theme_info' );


if( class_exists( 'WP_Customize_control' ) ){

	class App_Landing_Theme_Info extends WP_Customize_Control
	{
    	/**
       	* Render the content on the theme customizer page
       	*/
       	public function render_content()
       	{
       		?>
       		<label>
       			<strong class="customize-text_editor"><?php echo esc_html( $this->label ); ?></strong>
       			<br />
       			<span class="customize-text_editor_desc">
       				<?php echo wp_kses_post( $this->description ); ?>
       			</span>
       		</label>
       		<?php
       	}
    }//editor close
    
}//class close
