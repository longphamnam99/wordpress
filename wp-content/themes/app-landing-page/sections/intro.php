<?php
/**
 * Intro Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_intro_section_page = get_theme_mod( 'app_landing_page_intro_section_page' );

if( $app_landing_page_intro_section_page ){ 
?>
    <section class="section-4" id="intro">
        <div class="container">
        
    	<?php 
    		$intro_qry = new WP_Query( "page_id=$app_landing_page_intro_section_page" );
            
                if( $intro_qry->have_posts() ){
                    while( $intro_qry->have_posts() ){
                        $intro_qry->the_post();				
    		
    	?>
                    	<div class="row">
                    		<div class="col">
                    			<div class="img-holder wow wow fadeInUp"><?php the_post_thumbnail( 'app-landing-page-intro' ); ?></div>
                    		</div>
                    		<div class="col">
                    			<div class="text-holder wow fadeInRight">
                    				<?php 
                        				echo '<header class="header">';
                                 			the_title( '<h2 class="main-title">', '</h2>' );
                                    	echo '</header>';
                       				?>
                    			<?php the_content();?>
                    			</div>
                    		</div>
                    	</div>
        </div>
    </section>
<?php
	} } 
	wp_reset_postdata(); 
}