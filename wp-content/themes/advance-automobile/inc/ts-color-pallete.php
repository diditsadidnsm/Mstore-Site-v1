<?php
	
	/*---------------------------Theme color option-------------------*/
	$advance_automobile_theme_color_first = get_theme_mod('advance_automobile_theme_color_first');

	$custom_css = '';

	if($advance_automobile_theme_color_first != false){
		$custom_css .='input[type="submit"], .top-header, #slider i, #slider .inner_carousel .read-btn a, .address, .owl-carousel .owl-nav .owl-prev i, .owl-carousel .owl-nav .owl-next i, #category .explore-btn a, #footer .tagcloud a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.copyright, #footer input[type="submit"], .read-more-btn a:hover, .main-navigation ul ul, #contact-info, #comments a.comment-reply-link{';
			$custom_css .='background-color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_first != false){
		$custom_css .='h1,h2,h4,h5,h6, input[type="search"], .read-moresec a, .address i,.time i, .owl-carousel .owl-nav .owl-prev i:hover, .owl-carousel .owl-nav .owl-next i:hover,  section h4, section .innerlightbox,.copyright, #comments a time,.woocommerce div.product span.price, .woocommerce .quantity .qty, #sidebar caption, #sidebar h3, #content-ts h2, #content-ts h3,.copyright, h3.widget-title a, .nav-previous a, p.logged-in-as a, .nav-next a, .new-text p a, h2.woocommerce-loop-product__title, .content-ts h3, .content-ts h2,.woocommerce-info::before, .new-text h2 a, .primary-navigation ul ul li:hover > a , .metabox a:hover, #sidebar ul li a:hover,  #comments a, #category .text-content h3{';
			$custom_css .='color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_first != false){
		$custom_css .='.read-moresec a,  #footer input[type="search"], .woocommerce .quantity .qty{';
			$custom_css .='border-color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_first != false){
		$custom_css .='.woocommerce-info, .primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_first != false){
		$custom_css .='#sidebar ul li a:hover, #sidebar ul li a:focus{';
			$custom_css .='color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	} 
	/*---------------------------Theme color option-------------------*/

	$advance_automobile_theme_color_second = get_theme_mod('advance_automobile_theme_color_second');

	if($advance_automobile_theme_color_second != false){
		$custom_css .='.read-moresec a:hover, #slider .inner_carousel .read-btn a:hover, .time, #category .explore-btn a:hover, #footer, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#sidebar input[type="submit"], .read-more-btn a, .primary-navigation li a:hover, .primary-navigation li:hover a, #menu-sidebar input[type="submit"]{';
			$custom_css .='background-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, .toggle a, .book-btn a{';
			$custom_css .='background-color: '.esc_html($advance_automobile_theme_color_second).'!important;';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='.logo a,.search-box i, #slider .inner_carousel h2 , #slider .inner_carousel, .page-box .metabox,.page-box-single .metabox,.metabox a, .woocommerce-message::before, h1.entry-title,h1.page-title,  .page-box h4, .new-text h4 a,#slider .inner_carousel h1, #category h2, .primary-navigation a{';
			$custom_css .='color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='#header .main-menu{';
			$custom_css .='border-bottom-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='.page-box, #sidebar aside, #sidebar input[type="search"]{';
			$custom_css .='border-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='.logo p, .page-box-single h3, #sidebar ul li a:active, span.post-title, p.logged-in-as a{';
			$custom_css .='color: '.esc_html($advance_automobile_theme_color_second).'!important;';
		$custom_css .='}';
	}

	// media
	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_automobile_theme_color_first != false || $advance_automobile_theme_color_second != false){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a, #contact-info{
	background-image: linear-gradient(-90deg, '.esc_html($advance_automobile_theme_color_first).' 0%, '.esc_html($advance_automobile_theme_color_second).' 120%);
		} ';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_automobile_theme_options','Default');
    if($theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.3%';
		$custom_css .='}';
	}else if($theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$custom_css .='}';
	}else if($theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .main-header{';
			$custom_css .='margin:0 10px;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='right:0;';
		$custom_css .='}';
	}

	$show_header = get_theme_mod( 'advance_automobile_slider_hide', true);
		 if($show_header == false){
			$custom_css .='#contact-details{';
				$custom_css .='margin: 25px 0;';
			$custom_css .='}';
			$custom_css .='.page-template-custom-front-page #header .main-menu{';
				$custom_css .='border-bottom: 1px solid #000;';
			$custom_css .='}';
		}

