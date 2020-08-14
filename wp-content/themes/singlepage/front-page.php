<?php
/**
* The front page template
*
*/
    $enable_home_page = of_get_option('enable_home_page',1);
  
	if(  $enable_home_page == "1" && get_option( 'show_on_front' ) != 'page' ){
	get_header("featured");
	get_template_part( 'featured-content' );
	get_footer();
	}
	else{
     get_template_part( 'content','home');
		}
  
