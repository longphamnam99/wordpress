<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package App_Landing_Page
 */
 
 

if ( ! function_exists( 'app_landing_page_author_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function app_landing_page_author_posted_on() {


	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
    
	echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

}
endif;


if ( ! function_exists( 'app_landing_page_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function app_landing_page_posted_on() {
	
	
	$byline = sprintf(
		esc_html_x( 'By %s', 'post author', 'app-landing-page' ),
		'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
	);

	echo '<span class="byline"> ' . $byline . '</span>';

	echo '<span class="posted-on">';
		app_landing_page_author_posted_on();
	echo '</span>';

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'app-landing-page' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) { 
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( ', ' );
		if ( $categories_list && app_landing_page_categorized_blog() ) {
			printf( '<span class="cat-links">%1$s</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list('',', ','' );
		if ( $tags_list ) {
			printf( '<span class="tags-links">%1$s</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

}
endif;



if ( ! function_exists( 'app_landing_page_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function app_landing_page_entry_footer() {

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'app-landing-page' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function app_landing_page_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'app_landing_page_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'app_landing_page_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so app_landing_page_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so app_landing_page_categorized_blog should return false.
		return false;
	}
}

/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
 
 function app_landing_page_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	
    <footer class="comment-meta">
    
        <div class="comment-author vcard">
    	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    	<?php printf( '<b class="fn">%s</b>', get_comment_author_link() ); ?>
    	</div>
    	<?php if ( $comment->comment_approved == '0' ) : ?>
    		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'app-landing-page' ); ?></em>
    		<br />
    	<?php endif; ?>
    
    	<div class="comment-metadata commentmetadata"><?php esc_html_e('Posted on&nbsp;', 'app-landing-page'); ?><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_date(); ?>">
    		<?php
    			/* translators: 1: date, 2: time */
    			printf( __( '%1$s at %2$s', 'app-landing-page' ), get_comment_date(),  get_comment_time()  ); ?></time></a><?php edit_comment_link( __( '(Edit)', 'app-landing-page' ), '  ', '' );
    		?>
    	</div>
    </footer>
    
    <div class="comment-content"><?php comment_text(); ?></div>

	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

if( ! function_exists( 'app_landing_page_pagination' ) ) :
/**
 * Pagination
*/
function app_landing_page_pagination(){
    the_posts_pagination( array(
        'prev_text' => __( '<span class="fa fa-angle-double-left"></span>', 'app-landing-page' ),
        'next_text' => __( '<span class="fa fa-angle-double-right"></span>', 'app-landing-page' ),
     ) );   
}
endif;

if( ! function_exists( 'app_landing_page_sidebar_layout' ) ) :
/**
 * Return sidebar layouts for pages
 */
function app_landing_page_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'app_landing_page_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'app_landing_page_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
    
}
endif;
  
if( ! function_exists( 'app_landing_page_newsletter_activated' ) ) :
/**
 * Query Newsletter activation
 */
function app_landing_page_newsletter_activated(){
    return class_exists( 'newsletter' ) ? true : false;
}
endif;

/**
 * Display dates for 31 days based on result of year and month 
 * 
 * @link http://ottopress.com/2015/whats-new-with-the-customizer/
 */
function cur_stats_date_odd(  $control ){ 
$cur_month = $control->manager->get_setting( 'app_landing_page_date_month' )->value();
$cur_year = $control->manager->get_setting( 'app_landing_page_date_year' )->value();

if( ( ( ( ( $cur_month % 2 ) != 0 ) && ( $cur_month < 8 )  ) || ( ( ( $cur_month % 2 ) == 0 ) && ( $cur_month > 7 ) ) ) && ( $cur_month != 2 ) ) {
    return true;
}else { 
    return false; 
}
}

/**
 * Display dates for 30 days based on result of year and month 
 * 
 * @link http://ottopress.com/2015/whats-new-with-the-customizer/
 */
function cur_stats_date_even(  $control ){ 
$cur_month = $control->manager->get_setting( 'app_landing_page_date_month' )->value();
$cur_year = $control->manager->get_setting( 'app_landing_page_date_year' )->value();

if( ( ( ( ( $cur_month % 2 ) == 0 ) && ( $cur_month < 8 )  ) || ( ( ( $cur_month % 2 ) != 0 ) && ( $cur_month > 7 ) ) ) && ( $cur_month != 2 ) ) {
    return true;
}else { 
    return false; }
}

/**
 * Display dates for 29 days for leap year and Febuary month 
 * 
 * @link http://ottopress.com/2015/whats-new-with-the-customizer/
 */
function cur_stats_date_leap(  $control ){ 
$cur_month = $control->manager->get_setting( 'app_landing_page_date_month' )->value();
$cur_year = $control->manager->get_setting( 'app_landing_page_date_year' )->value();

if( ( $cur_month == 2 ) && ( ( ( $cur_year - 1 ) % 4 ) == 0 ) ){
    return true;
}else { return false; 
}
}

/**
 * Display dates for 28 days  for non leap year and Febuary month
 * 
 * @link http://ottopress.com/2015/whats-new-with-the-customizer/
 */
function cur_stats_date_noleap(  $control ){ 
$cur_month = $control->manager->get_setting( 'app_landing_page_date_month' )->value();
$cur_year = $control->manager->get_setting( 'app_landing_page_date_year' )->value();

if( ( $cur_month == 2 ) && ( ( ( $cur_year - 1 ) % 4 ) != 0  ) ){
    return true; 
}else { return false; }
}


if( ! function_exists( 'app_landing_page_ed_section') ):
    /**
     * Check if home page section are enable or not.
    */

    function app_landing_page_ed_section(){
        global $app_landing_page_sections;
        $en_sec = false;
        foreach( $app_landing_page_sections as $section ){ 
            if( get_theme_mod( 'app_landing_page_ed_' . $section . '_section' ) == 1 ){
                $en_sec = true;
            }
        }
        return $en_sec;
    }

endif;