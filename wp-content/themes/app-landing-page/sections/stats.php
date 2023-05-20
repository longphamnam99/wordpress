<?php
/**
 * Stats Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_stats_page = get_theme_mod( 'app_landing_page_stats_page' );
$app_landing_page_stats_button = get_theme_mod( 'app_landing_page_stats_button', __( 'Download Button', 'app-landing-page' ) );
$app_landing_page_stats_button_link = get_theme_mod( 'app_landing_page_stats_button_link', '#' );
$app_landing_page_year = get_theme_mod( 'app_landing_page_date_year', '1' );
$app_landing_page_month = get_theme_mod( 'app_landing_page_date_month', date( 'm' ));
$app_landing_page_date_odd = get_theme_mod( 'app_landing_page_date_day_odd', date("j") );
$app_landing_page_date_even = get_theme_mod( 'app_landing_page_date_day_even', date("j") );
$app_landing_page_date_leap = get_theme_mod( 'app_landing_page_date_day_leap', date("j") );
$app_landing_page_date_noleap = get_theme_mod( 'app_landing_page_date_day_noleap', date("j") );

if( $app_landing_page_stats_page){ 
	$stats_qry = new WP_Query( "page_id=$app_landing_page_stats_page" );
    
        if( $stats_qry->have_posts() ){
            while( $stats_qry->have_posts() ){
            	$stats_qry->the_post();
?>
                <section class="count-down" id="stats"  <?php if( has_post_thumbnail() ){ ?> style="background: url(' <?php the_post_thumbnail_url() ;?> ')no-repeat; background-size: cover; background-position: center; " <?php } ?> >
                    <div class="container">
						<header class="header wow fadeInUp">
						<?php 
				            the_title( '<h2 class="title">','</h2>');
							the_content();         
				        ?>
						</header>
				
                        <?php if( ( $app_landing_page_year && $app_landing_page_month ) && ( $app_landing_page_date_odd || $app_landing_page_date_even || $app_landing_page_date_leap || $app_landing_page_date_noleap ) ) { ?>
                                <ul class="count-down-lists wow fadeInUp">
                                	<li>
                                		<div class="holder">
                                			<span id="days"></span>
                                		</div>
                                		<?php esc_html_e( 'Days', 'app-landing-page' ); ?>
                                	</li>
                                	<li>
                                		<div class="holder">
                                			<span id="hours"></span>
                                		</div>
                                		<?php esc_html_e( 'Hours', 'app-landing-page' ); ?>
                                	</li>
                                	<li>
                                		<div class="holder">
                                			<span id="minutes"></span>
                                		</div>
                                		<?php esc_html_e( 'Minutes', 'app-landing-page' ); ?>
                                	</li>
                                	<li>
                                		<div class="holder">
                                			<span id="seconds"></span>
                                		</div>
                                		<?php esc_html_e( 'Seconds','app-landing-page' ); ?>
                                	</li>
                                </ul>
                    	<?php }
                    		if( $app_landing_page_stats_button_link ){ 
                  		        echo ' <div class="btn-holder"> <a href="'. esc_url( $app_landing_page_stats_button_link ) .'" class="btn-request"> '. esc_html( $app_landing_page_stats_button ) .'</a></div>';
                            }
                         ?>		
                    </div>
                </section>
<?php   } } }
