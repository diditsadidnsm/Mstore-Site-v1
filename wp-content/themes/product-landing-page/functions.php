<?php 
	 add_action( 'wp_enqueue_scripts', 'product_landing_page_enqueue_styles' );
	 function product_landing_page_enqueue_styles() {
 		  wp_enqueue_style( 'superb-landing-page-styles', get_template_directory_uri() . '/style.css' ); 
 		  } 
