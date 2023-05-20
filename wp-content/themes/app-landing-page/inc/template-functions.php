<?php
/**
 * Custom template function for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package App_Landing_page
 */


if( ! function_exists( 'app_landing_page_doctype_cb' ) ) :
/**
 * Doctype Declaration
 * 
 * @since 1.0.1
*/
function app_landing_page_doctype_cb(){
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;

if( ! function_exists( 'app_landing_page_head' ) ) :
/**
 * Before wp_head
 * 
 * @since 1.0.1
*/
function app_landing_page_head(){
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
}
endif;

if( ! function_exists( 'app_landing_page_page_start' ) ) :
/**
 * Page Start
 * 
 * @since 1.0.1
*/
function app_landing_page_page_start(){
   if ( !  is_page_template( 'template-home.php' ) ) { ?>
      <div id="page" class="site">
 <?php } 
}
endif;

if( ! function_exists( 'app_landing_page_header_cb' ) ) :
/**
 * Header Start
 * 
 * @since 1.0.1
*/
function app_landing_page_header_cb(){
    ?>   
    <header id="masthead" class="site-header" role="banner">
        <div class="container">
            <div class="site-branding">
                <?php 
                    if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                              the_custom_logo();
                          } 
                ?>
                    <div class="text-logo">
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                      <?php
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) { ?>
                              <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                      <?php } ?>
                    </div>  
            </div><!-- .site-branding -->
            
            <div id="mobile-header">
                <a id="responsive-menu-button" href="#sidr-main"><span class="fa fa-navicon"></span></a>
            </div>
            
            <nav id="site-navigation" class="main-navigation" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav><!-- #site-navigation -->
        </div>
    </header><!-- #masthead -->
    
    <?php 
}
endif;

if( ! function_exists( 'app_landing_page_breadcrumbs_cb' ) ) :
/**
 * App Landing Page Breadcrumb
 * 
 * @since 1.0.1
*/

function app_landing_page_breadcrumbs_cb() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = esc_html( get_theme_mod( 'app_landing_page_breadcrumb_separator', '>' ) ); // delimiter between crumbs
  $home = esc_html( get_theme_mod( 'app_landing_page_breadcrumb_home_text', __( 'Home', 'app-landing-page' ) ) ); // text for the 'Home' link
  $showCurrent = get_theme_mod( 'app_landing_page_ed_current', '1' ); // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
  $ed_breadcrumb = get_theme_mod( 'app_landing_page_ed_breadcrumb' );
 
  global $post;
  $homeLink = esc_url( home_url() );
  
  if( $ed_breadcrumb ){
  
  if ( is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . single_cat_title('', false) . $after;
 
    } elseif ( is_search() ) {
      echo $before . esc_html__( 'Search Result', 'app-landing-page' ) . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . esc_url( get_year_link( get_the_time('Y') ) ) . '">' . esc_html( get_the_time('Y') ) . '</a> ' . $delimiter . ' ';
      echo '<a href="' . esc_url( get_month_link( get_the_time('Y'), get_the_time('m') ) ) . '">' . esc_html( get_the_time('F') ) . '</a> ' . $delimiter . ' ';
      echo $before . esc_html( get_the_time('d') ) . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . esc_url( get_year_link( get_the_time('Y') ) ) . '">' . esc_html( get_the_time('Y') ) . '</a> ' . $delimiter . ' ';
      echo $before . esc_html( get_the_time('F') ) . $after;
 
    } elseif ( is_year() ) {
      echo $before . esc_html( get_the_time('Y') ) . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . esc_html( $post_type->labels->singular_name ) . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . esc_html( get_the_title() ) . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . esc_html( get_the_title() ) . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . esc_html( $post_type->labels->singular_name ) . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . esc_url( get_permalink($parent) ) . '">' . esc_html( $parent->post_title ) . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . esc_html( get_the_title() ) . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . esc_html( get_the_title() ) . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . esc_url( get_permalink($page->ID) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . esc_html( get_the_title() ) . $after;
 
    } elseif ( is_tag() ) {
      echo $before . esc_html( single_tag_title('', false) ) . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . esc_html( $userdata->display_name ) . $after;
 
    } elseif ( is_404() ) {
        echo $before . esc_html__( '404 Error - Page not Found', 'app-landing-page' ) . $after;
    } elseif( is_home() ){
        echo $before;
        single_post_title();
        echo $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __( 'Page', 'app-landing-page' ) . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
    }
    } 
}// end app_landing_page_breadcrumbs()

endif;

if( ! function_exists( 'app_landing_page_page_header' ) ) :
/**
 * Page Header for inner pages
 * 
 * @since 1.0.1
*/
function app_landing_page_page_header(){  
    
    global $wp_query; 
           
            if ( is_single() && get_theme_mod( 'app_landing_page_ed_breadcrumb' ) ){
                echo '<div class="top-bar">';
                    do_action( 'app_landing_page_breadcrumbs' );
                echo '</div>';
            }

            if( ! is_single() ){ 
            if( is_404() ){ echo '<div class="container">'; } ?>
                <div class="top-bar">
                    <div class="page-header">
                        <h1 class="page-title">
                        <?php
                            if( is_search() ){ 
                                printf( esc_html__( '%s Search Results for ','app-landing-page' ), $wp_query->found_posts ); 
                                printf( '%s', get_search_query() ); }
                            elseif( is_404() ){ esc_html_e( '404 - Page Not Found ' ,'app-landing-page' ); } 
                            elseif( is_page() ){ the_title(); }
                            elseif( is_archive() ){ the_archive_title(); }
                            elseif( is_home() ){ single_post_title(); }
                        ?>
                        </h1>
                    </div>
                    <?php do_action( 'app_landing_page_breadcrumbs' ); ?>
                </div>
         <?php  
             if( is_404() ){ echo '</div>'; }
         } 
} 
endif;


if( ! function_exists( 'app_landing_page_content_start' ) ) :
/**
 * Content Start
 * 
 * @since 1.0.1
*/
function app_landing_page_content_start(){ 
  $ed_section = app_landing_page_ed_section(); 
  if( is_home() || ! $ed_section || ! ( is_front_page()  || is_page_template( 'template-home.php' ) ) ) { 
        
	   echo '<div id="content" class="site-content">';
        if( is_404() ) { 
            do_action( 'app_landing_page_header_main');
            echo '<div class="error-page">'; 
        }
            echo '<div class="container">';
                if( ! is_404() ) { 
                    do_action( 'app_landing_page_header_main');
                }
                echo '<div class="row">';
    }
}
endif;

if( ! function_exists( 'app_landing_page_page_content_image' ) ) :
/**
 * Page Featured Image
 * 
 * @since 1.0.1
*/
function app_landing_page_page_content_image(){
    $sidebar_layout = app_landing_page_sidebar_layout();
    if( has_post_thumbnail() )
    ( is_active_sidebar( 'right-sidebar' ) && ( $sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'app-landing-page-with-sidebar' ) : the_post_thumbnail( 'app-landing-page-without-sidebar' );    
}
endif;


if( ! function_exists( 'app_landing_page_post_content_image' ) ) :
/**
 * Post Featured Image
 * 
 * @since 1.0.1
*/
function app_landing_page_post_content_image(){
    if( has_post_thumbnail() ){
    echo ( !is_single() ) ? '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">' : '<div class="post-thumbnail">'; 
         ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'app-landing-page-with-sidebar' ) : the_post_thumbnail( 'app-landing-page-without-sidebar' ) ; 
    echo ( !is_single() ) ? '</a>' : '</div>' ;    
    }
}
endif;

if( ! function_exists( 'app_landing_page_post_entry_header' ) ) :
/**
 * Post Entry Header
 * 
 * @since 1.0.1
*/
function app_landing_page_post_entry_header_before(){
    echo '<div class="text-holder">';
}
endif;

if( ! function_exists( 'app_landing_page_post_entry_header' ) ) :
/**
 * Post Entry Header
 * 
 * @since 1.0.1
*/
function app_landing_page_post_entry_header(){
    ?>
        <header class="entry-header">
            <?php
                if ( is_single() ) {
                    the_title( '<h1 class="entry-title">', '</h1>' );
                } else {
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                }
               	
                if ( 'post' === get_post_type() ) :
        			echo '<div class="entry-meta">';
        				app_landing_page_posted_on();
        			echo '</div>';
        			
    			endif;   
            ?>
        </header><!-- .entry-header -->
    <?php
}
endif;

if( ! function_exists( 'app_landing_page_post_entry_header_after' ) ) :
/**
 * Post Entry Header
 * 
 * @since 1.0.1
*/
function app_landing_page_post_entry_header_after(){
    echo '</div>';
}
endif;

if( ! function_exists( 'app_landing_page_post_author' ) ) :
/**
 * Post Author Bio
 * 
 * @since 1.0.1
*/
function app_landing_page_post_author(){
    if( get_the_author_meta( 'description' ) ){
        global $post;
    ?>
    <section class="author">
        <h2 class="title"><?php esc_html_e( 'About Admin', 'app-landing-page' ); ?></h2>
        <div class="holder">
          <div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 126 ); ?></div>
            <div class="text-holder">
                <strong class="name"><?php echo esc_html( get_the_author_meta( 'display_name', $post->post_author ) ); ?></strong>
                <?php echo '<span class="posted-on">';
                        esc_html_e( 'Posted on ','app-landing-page' );
                        app_landing_page_author_posted_on();
                      echo '</span>';
                      echo wpautop( esc_html( get_the_author_meta( 'description' ) ) ); 
                ?>
            </div>
        </div>
    </section>
    <?php  
    }  
}
endif;

if( ! function_exists( 'app_landing_page_get_comment_section' ) ) :
/**
 * Comment template
 * 
 * @since 1.0.1
*/
function app_landing_page_get_comment_section(){
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
}
endif;

if( ! function_exists( 'app_landing_page_content_end' ) ) :
/**
 * Content End
 * 
 * @since 1.0.1
*/
function app_landing_page_content_end(){
  $ed_section = app_landing_page_ed_section();
  if( is_home() || ! $ed_section || ! ( is_front_page()  || is_page_template( 'template-home.php' ) ) ) { 
        echo '</div>';
    if( is_404() ){ 
        echo '</div>'; 
    }    
    echo '</div></div>';// .row /#content /.container
    }
}
endif;

if( ! function_exists( 'app_landing_page_footer_start' ) ) :
/**
 * Footer Start
 * 
 * @since 1.0.1
*/
function app_landing_page_footer_start(){
    echo '<footer id="colophon" class="site-footer" role="contentinfo">';
    echo '<div class="container">';
}
endif;


if( ! function_exists( 'app_landing_page_footer_widgets' ) ) :
/**
 * Footer Bottom
 * 
 * @since 1.0.1 
*/
function app_landing_page_footer_widgets(){
   echo '<div class="row">';
         echo '<div class= "col">';
             if( is_active_sidebar( 'footer-sidebar-one') ) dynamic_sidebar( 'footer-sidebar-one' ); 
         echo '</div>';
         echo '<div class= "col">';
             if( is_active_sidebar( 'footer-sidebar-two') ) dynamic_sidebar( 'footer-sidebar-two' ); 
         echo '</div>';
         echo '<div class= "col">';
             if( is_active_sidebar( 'footer-sidebar-three') ) dynamic_sidebar( 'footer-sidebar-three' ); 
         echo '</div>';
   echo '</div>';
}
endif;

if( ! function_exists( 'app_landing_page_footer_credit' ) ) :
/**
 * Footer Credits 
 */
function app_landing_page_footer_credit(){

    $copyright_text = get_theme_mod( 'app_landing_page_footer_copyright_text' );
    echo '<div class="site-info">&copy;&nbsp;';
    if( $copyright_text ){
      echo wp_kses_post( $copyright_text );
    }else{
      echo date_i18n( esc_html__( 'Y', 'app-landing-page' ) );
      echo ' &nbsp;<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>.&nbsp;';
    }
    printf( ' %s', '<a href="'. esc_url( 'http://raratheme.com/wordpress-themes/app-landing-page/' ) .'" target="_blank">'. esc_html__( 'App Landing Page By Rara Theme', 'app-landing-page' ) .'</a>. ' );
    printf( esc_html__( 'Powered by %s', 'app-landing-page' ), '<a href="'. esc_url( 'https://wordpress.org/', 'app-landing-page' ) .'" target="_blank">'. esc_html__( 'WordPress', 'app-landing-page' ) . '</a>. ' );
    if ( function_exists( 'the_privacy_policy_link' ) ) {
        the_privacy_policy_link();
    }
    echo '</div>';
}
endif;

if( ! function_exists( 'app_landing_page_footer_end' ) ) :
/**
 * Footer End
 * 
 * @since 1.0.1 
*/
function app_landing_page_footer_end(){
    echo '</div>';
    echo '</footer>'; // #colophon 
}
endif;

if( ! function_exists( 'app_landing_page_page_end' ) ) :
/**
 * Page End
 * 
 * @since 1.0.1
*/
function app_landing_page_page_end(){
    ?>
    </div><!-- #page -->
    <?php
}
endif;