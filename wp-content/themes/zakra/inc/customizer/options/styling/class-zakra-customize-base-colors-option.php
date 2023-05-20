<?php
/**
 * Base styling.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== STYLING > BASE ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Base_Colors_Option' ) ) :

	/**
	 * Base option.
	 */
	class Zakra_Customize_Base_Colors_Option extends Zakra_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				/**
				 * Option: Primary color.
				 */
				'zakra_base_color_primary' => array(
					'output'  => array(
						array(
							'selector' => 'a:hover, a:focus, .tg-primary-menu > div ul li:hover > a, .tg-primary-menu > div > ul > li.current_page_item > a, .tg-primary-menu > div > ul > li.current-menu-item > a, .entry-content a',
							'property' => 'color',
						),
						array(
							'selector' => '.tg-primary-menu.tg-primary-menu--style-underline > div > ul > li.current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-underline > div > ul > li.tg-primary-menu--style-left-border > a::before, .tg-primary-menu.tg-primary-menu--style-underline > div > ul > li.tg-primary-menu--style-right-border > a::before, .tg-scroll-to-top.tg-scroll-to-top--show:hover, button, input[type="button"], input[type="reset"], input[type="submit"]',
							'property' => 'background-color',
						),
					),
					'setting' => array(
						'default'           => '#269bd1',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'     => 'color',
						'priority' => 10,
						'label'    => esc_html__( 'Primary Color', 'zakra' ),
						'section'  => 'zakra_styling_base',
						'choices'  => array(
							'alpha' => true,
						),
					),
				),

				/**
				 * Option: Text color.
				 */
				'zakra_base_color_text'    => array(
					'output'  => array(
						array(
							'selector' => 'body',
							'property' => 'color',
						),
					),
					'setting' => array(
						'default'           => '#51585f',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'     => 'color',
						'priority' => 20,
						'label'    => esc_html__( 'Text Color', 'zakra' ),
						'section'  => 'zakra_styling_base',
						'choices'  => array(
							'alpha' => true,
						),
					),
				),

				/**
				 * Option: Border color.
				 */
				'zakra_base_color_border'  => array(
					'output'  => array(
						array(
							'selector' => '.tg-site-header, .tg-primary-menu, .tg-primary-menu > div ul li ul, .tg-primary-menu > div ul li ul li a, .posts-navigation, #comments, .widget ul li, .post-navigation, #secondary, .tg-site-footer .tg-site-footer-widgets, .tg-site-footer .tg-site-footer-bar .tg-container',
							'property' => 'border-color',
						),

						array(
							'selector' => 'hr .tg-container--separate, ',
							'property' => 'background-color',
						),
					),
					'setting' => array(
						'default'           => '#e9ecef',
						'sanitize_callback' => array( 'Zakra_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'     => 'color',
						'priority' => 30,
						'label'    => esc_html__( 'Border Color', 'zakra' ),
						'section'  => 'zakra_styling_base',
						'choices'  => array(
							'alpha' => true,
						),
					),
				),

			);

		}

	}

	new Zakra_Customize_Base_Colors_Option();

endif;
