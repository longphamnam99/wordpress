<?php
/**
 * Template hooks for this theme.
 *
 * @package App_Landing_Page
 */
 
/**
 * Doctype
 * 
 * @see app_landing_page_doctype_cb
 */
add_action( 'app_landing_page_doctype', 'app_landing_page_doctype_cb' );

/**
 * Before wp_head
 * 
 * @see app_landing_page_head
  */
add_action( 'app_landing_page_before_wp_head', 'app_landing_page_head' );

/**
 * Before Header
 * 
 * @see app_landing_page_page_start - 20
*/
add_action( 'app_landing_page_before_header', 'app_landing_page_page_start', 20 );

/**
 * app_landing_page Header
 * 
 * @see app_landing_page_header_cb  - 20
 */
add_action( 'app_landing_page_header', 'app_landing_page_header_cb', 20 );

/**
 * Before Content
 * 
 * @see app_landing_page_content_start - 20
*/
add_action( 'app_landing_page_before_content', 'app_landing_page_content_start', 20 );

/**
 * BreadCrumb
 * 
 * @see app_landing_page_breadcrumbs_cb 
*/
add_action( 'app_landing_page_breadcrumbs', 'app_landing_page_breadcrumbs_cb' );

/**
 * Page header
 * 
 * @see app_landing_page_page_header
*/
add_action( 'app_landing_page_header_main', 'app_landing_page_page_header');

/**
 * Before Page entry content
 * 
 * @see app_landing_page_page_content_image
*/
add_action( 'app_landing_page_before_page_entry_content', 'app_landing_page_page_content_image' );

/**
 * Before Post entry content
 * 
 * @see app_landing_page_post_content_image - 10
 * @see app_landing_page_post_entry_header_before  - 20
 * @see app_landing_page_post_entry_header  - 30
*/
add_action( 'app_landing_page_before_post_entry_content', 'app_landing_page_post_content_image', 10 );
add_action( 'app_landing_page_before_post_entry_content', 'app_landing_page_post_entry_header_before', 20 );
add_action( 'app_landing_page_before_post_entry_content', 'app_landing_page_post_entry_header', 30 );



/**
 * Before Search entry summary
 * 
 * @see app_landing_page_post_content_image  - 10
 * @see app_landing_page_post_entry_header_before  - 20
 * @see app_landing_page_post_entry_header - 30
*/
add_action( 'app_landing_page_before_search_entry_summary', 'app_landing_page_post_content_image', 10 );
add_action( 'app_landing_page_before_search_entry_summary', 'app_landing_page_post_entry_header_before', 20 );
add_action( 'app_landing_page_before_search_entry_summary', 'app_landing_page_post_entry_header', 30 );



/**
 * After post content
 * 
 * @see app_landing_page_post_author  - 10
*/
add_action( 'app_landing_page_author_info_box', 'app_landing_page_post_author',10 );


/**
 * After Post entry content
 * 
 * @see app_landing_page_post_entry_header_after  - 10
*/

add_action( 'app_landing_page_after_post_entry_content', 'app_landing_page_post_entry_header_after', 10 );


/**
 * app_landing_page Comment
 * 
 * @see app_landing_page_get_comment_section 
*/
add_action( 'app_landing_page_comment', 'app_landing_page_get_comment_section' );

/**
 * After Content
 * 
 * @see app_landing_page_content_end - 20
*/
add_action( 'app_landing_page_after_content', 'app_landing_page_content_end', 20 );


/**
 * app Landing Page Footer
 * 
 * @see app_landing_page_footer_start  - 20
 * @see app_landing_page_footer_menu   - 30
 * @see app_landing_page_footer_credit - 40
 * @see app_landing_page_footer_end    - 50
*/
add_action( 'app_landing_page_footer', 'app_landing_page_footer_start', 20 );
add_action( 'app_landing_page_footer', 'app_landing_page_footer_widgets', 30 );
add_action( 'app_landing_page_footer', 'app_landing_page_footer_credit', 40 );
add_action( 'app_landing_page_footer', 'app_landing_page_footer_end', 50 );

/**
 * After Footer
 * 
 * @see app_landing_page_page_end - 20
*/
add_action( 'app_landing_page_after_footer', 'app_landing_page_page_end', 20 );