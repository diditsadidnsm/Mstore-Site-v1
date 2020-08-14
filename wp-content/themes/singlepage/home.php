<?php
/**
 * The blog list template
 *
 * @since singlepage 1.0.4
 */

 $enable_home_page = of_get_option('enable_home_page',1);
  
	if(  $enable_home_page == "1" && get_option( 'show_on_front' ) == 'page' && $wp_query->get_queried_object_id() != get_option( 'page_for_posts' ) ){
	get_header("featured");
	get_template_part( 'featured-content' );
	get_footer();
	}
	else{
		 get_header();
    get_template_part("content","blog-list");
	 get_footer();
		}
  


 