<?php

function singlepage_setup(){
	global $content_width;
	$lang = get_template_directory(). '/languages';
	load_theme_textdomain('singlepage', $lang);
	add_theme_support( 'post-thumbnails' ); 
	$args = array();
	$header_args = array( 
	    'default-image'          => '',
		'default-repeat' => 'no-repeat',
        'default-text-color'     => 'eeeeee',
		'url'                    => '',
        'width'                  => 1920,
        'height'                 => 89,
        'flex-height'            => true
     );
	add_theme_support( 'custom-background', $args );
	add_theme_support( 'custom-header', $header_args );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('nav_menus');
	add_theme_support( "title-tag" );
	register_nav_menus( array('primary' => __( 'Primary Menu', 'singlepage' )));
	add_editor_style("editor-style.css");
	add_image_size( 'blog', 609, 214 , true);
	if ( !isset( $content_width ) ) $content_width = 1170;
}

add_action( 'after_setup_theme', 'singlepage_setup' );


 function singlepage_custom_scripts(){
	 global $is_IE;
	$theme_info = wp_get_theme();
	wp_enqueue_style('singlepage-font-awesome',  get_template_directory_uri() .'/css/font-awesome.min.css', false, '4.2.0', false);
	wp_enqueue_style('singlepage-bootstrap',  get_template_directory_uri() .'/css/bootstrap.css', false, '4.0.3', false);
	wp_enqueue_style( 'singlepage-main', get_stylesheet_uri(), array(),  $theme_info->get( 'Version' ) );
	
	wp_enqueue_script( 'singlepage-bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ), '3.0.3', false );
	wp_enqueue_script( 'singlepage-respond', get_template_directory_uri().'/js/respond.min.js', array( 'jquery' ), '1.4.2', false );
	wp_enqueue_script( 'singlepage-modernizr', get_template_directory_uri().'/js/modernizr.custom.js', array( 'jquery' ), '2.8.2', false );
	wp_enqueue_script( 'singlepage-easing', get_template_directory_uri().'/js/jquery.easing.1.3.js', array( 'jquery' ), '1.3', false );
	wp_enqueue_script( 'singlepage-nav', get_template_directory_uri().'/js/jquery.nav.js', array( 'jquery' ), '3.0.0', false );
	
	$video_background_section  = of_get_option( 'video_background_section',0);
	if( $video_background_section > 0 && is_home() ){
	wp_enqueue_script( 'singlepage-jquery-ui', get_template_directory_uri().'/js/jquery-ui.min.js', array( 'jquery' ), '1.10.3', false );
	wp_enqueue_script( 'singlepage-video', get_template_directory_uri().'/js/video.js', array( 'jquery' ), '4.3.0', false );
	wp_enqueue_script( 'singlepage-bigvideo', get_template_directory_uri().'/js/bigvideo.js', array( 'jquery' ), '', false );
	}
	
	$google_map_section  = of_get_option( 'google_map_section',0);
	if( $google_map_section>0 && is_home() )
	wp_enqueue_script( 'singlepage-googlemap',esc_url('//maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true'), array( 'jquery' ), '', false );
	
	wp_enqueue_script( 'singlepage-main', get_template_directory_uri().'/js/common.js', array( 'jquery' ),  $theme_info->get( 'Version' ), true );
	
	if( $is_IE ) {
	wp_enqueue_script( 'singlepage-html5', get_template_directory_uri().'/js/html5.js', array( 'jquery' ), '', false );
	}
	
	$scrolldelay                = of_get_option('scrolldelay', 700);
	$section_height_mode        = of_get_option('section_height_mode', 1);
	
	wp_localize_script( 'singlepage-main', 'singlepage_params',  array(
			'ajaxurl'        => admin_url('admin-ajax.php'),
			'themeurl' => get_template_directory_uri(),
			'scrolldelay' => $scrolldelay,
			'section_height_mode'=>$section_height_mode
		)  );
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){wp_enqueue_script( 'comment-reply' );}
		
		
	
	$background_array  = of_get_option("blog_background");
    $blog_background   = singlepage_get_background($background_array);
	
	$singlepage_custom_css   =  esc_html(of_get_option("custom_css"));
	$singlepage_custom_css  .=  'body#template-site{'.esc_html($blog_background).'}';
	
	 $header_image       = get_header_image();
	if (isset($header_image) && ! empty( $header_image )) {
	$singlepage_custom_css .= "header.navbar{background:url(".$header_image. ");}\n";
	
	/*$singlepage_custom_css .= "@media screen and (max-width: 919px){
           header.navbar {
			   background:url(".$header_image. ") !important;
			   margin-bottom:0;
	       }}\n";*/
	
	}
	
	
	 if ( 'blank' != get_header_textcolor() && '' != get_header_textcolor() ){
     $header_color           =  ' color:#' . get_header_textcolor() . ';';
	 $singlepage_custom_css .=  '.site-name,.site-tagline{'.$header_color.'}';
		}
	$home_nav_menu_color        = of_get_option("home_nav_menu_color",'#c2d5eb');
	$home_nav_menu_hover_color  = of_get_option("home_nav_menu_hover_color",'#ffffff');
	$singlepage_custom_css     .=  '#featured-template .nav li a{color:'.$home_nav_menu_color.'}';
	$singlepage_custom_css     .=  '#featured-template .nav .cur a{color:'.$home_nav_menu_hover_color.'}';
	
	$home_side_nav_menu_color         = of_get_option("home_side_nav_menu_color",'#dcecff');
	$home_side_nav_menu_active_color  = of_get_option("home_side_nav_menu_active_color",'#23dd91');
	$singlepage_custom_css           .=  '.sub_nav li{color:'.$home_side_nav_menu_color.'}';
	$singlepage_custom_css           .=  '.sub_nav .cur{color:'.$home_side_nav_menu_active_color.'}';
	$singlepage_custom_css           .=  '.sub_nav .cur a{color:'.$home_side_nav_menu_active_color.'}';
	
	$home_side_nav_circle_color = of_get_option("home_side_nav_circle_color",'nav_cur0');
	$singlepage_custom_css     .=  '.sub_nav .cur{background:url('.get_template_directory_uri().'/images/'.$home_side_nav_circle_color.'.png) 0 50% no-repeat}';
	
	////Typography
	
	$content_link_color  = of_get_option("content_link_color",'#666');
	$singlepage_custom_css     .=  'a{color:'.$content_link_color.';}';
	
	$content_link_hover_color  = of_get_option("content_link_hover_color",'#fe8a02');
	$singlepage_custom_css     .=  'a:hover,#main #main-content .post .meta a:hover{color:'.$content_link_hover_color.';}';
	
	
	$page_menu_typography       = of_get_option("page_menu_typography",'');
	if( $page_menu_typography )
	$singlepage_custom_css     .=singlepage_options_typography_font_styles($page_menu_typography ,'#page-template .main-nav li a,#featured-template .main-nav li a');
	
	$home_nav_menu_hover_color  = of_get_option("home_nav_menu_hover_color",'#ffffff');
	if( $home_nav_menu_hover_color  )
	$singlepage_custom_css     .=  '#featured-template .main-nav li > a:hover,#page-template .main-nav li > a:hover,#page-template .main-nav .current-menu-item > a,#page-template .main-nav .current_page_parent > a{color:'.$home_nav_menu_hover_color.' !important;}';
	
	$blog_menu_typography       = of_get_option("blog_menu_typography",'');
	if( $blog_menu_typography )
	$singlepage_custom_css     .=singlepage_options_typography_font_styles($blog_menu_typography ,'#template-site .main-nav li a,#template-site .main-nav li a,#template-site #navigation ul li a:link');
	
	$blog_menu_hover_color       = of_get_option("blog_menu_hover_color",'#eeee22');
	if( $blog_menu_hover_color  )
	$singlepage_custom_css     .=  '#template-site .main-nav li > a:hover,#template-site .main-nav .current-menu-item > a,#template-site .main-nav .current_page_parent > a{color:'.$blog_menu_hover_color.' !important;}';
	
	$homepage_side_nav_menu_typography       = of_get_option("homepage_side_nav_menu_typography",'');
	if( $homepage_side_nav_menu_typography )
	$singlepage_custom_css     .=singlepage_options_typography_font_styles($homepage_side_nav_menu_typography ,'#featured-template .sub_nav li,#featured-template .sub_nav li a');
	
	$home_side_nav_menu_active_color       = of_get_option("home_side_nav_menu_active_color",'#23dd91');
	if( $blog_menu_hover_color  )
	$singlepage_custom_css     .=  '#featured-template .sub_nav li.cur,#featured-template .sub_nav li a:hover{color:'.$home_side_nav_menu_active_color.' !important;}';
	
	$homepage_footer_background  = of_get_option("homepage_footer_background",'');
	if($homepage_footer_background){
    $singlepage_custom_css     .=  '#featured-template #footer{'.singlepage_get_background($homepage_footer_background).'}';
	}

	
	$page_post_content_typography       = of_get_option("page_post_content_typography",'');
	if( $page_post_content_typography )
	$singlepage_custom_css     .=singlepage_options_typography_font_styles($page_post_content_typography ,'.entry-content,.post p,.entry-title');
	
	
	//
	
	$content_container_width_768   = of_get_option("content_container_width_768",'70%');
	$content_container_left_768    = of_get_option("content_container_left_768",'9%');
	$content_container_top_768     = of_get_option("content_container_top_768",'15%');
	$content_container_padding_768 = of_get_option("content_container_padding_768",'10px');
	
	$content_container_width_992   = of_get_option("content_container_width_992",'60%');
	$content_container_left_992    = of_get_option("content_container_left_992",'18%');
	$content_container_top_992     = of_get_option("content_container_top_992",'15%');
	$content_container_padding_992 = of_get_option("content_container_padding_992",'20px');
	
	$content_container_width_1200   = of_get_option("content_container_width_1200",'50%');
	$content_container_left_1200    = of_get_option("content_container_left_1200",'21%');
	$content_container_top_1200     = of_get_option("content_container_top_1200",'15%');
	$content_container_padding_1200 = of_get_option("content_container_padding_1200",'20px');
	
	$content_container_width_1200_r   = of_get_option("content_container_width_1200_r",'50%');
	$content_container_left_1200_r    = of_get_option("content_container_left_1200_r",'21%');
	$content_container_top_1200_r     = of_get_option("content_container_top_1200_r",'15%');
	$content_container_padding_1200_r = of_get_option("content_container_padding_1200_r",'20px');
	
	
	$singlepage_custom_css     .=  '
		section.section  .section-content{
			width:'.$content_container_width_1200_r.';
			margin-left:'.$content_container_left_1200_r.';
			margin-top:'.$content_container_top_1200_r.';
			padding:'.$content_container_padding_1200_r.';
			}
		';
	$singlepage_custom_css     .=  '@media screen and (max-width: 1200px) {
		section.section .section-content{
			width:'.$content_container_width_1200.';
			margin-left:'.$content_container_left_1200.';
			margin-top:'.$content_container_top_1200.';
			padding:'.$content_container_padding_1200.';
			}
		}';
	$singlepage_custom_css     .=  '@media screen and (max-width: 992px) {
		section.section .section-content{
			width:'.$content_container_width_992.';
			margin-left:'.$content_container_left_992.';
			margin-top:'.$content_container_top_992.';
			padding:'.$content_container_padding_992.';
			}
		}';
		
	$singlepage_custom_css     .=  '@media screen and (max-width: 768px) {
		section.section .section-content{
			width:'.$content_container_width_768.';
			margin-left:'.$content_container_left_768.';
			margin-top:'.$content_container_top_768.';
			padding:'.$content_container_padding_768.';
			}
		}';
		
	wp_add_inline_style( 'singlepage-main', $singlepage_custom_css );
	
	}

 function singlepage_admin_scripts(){
	 if(isset($_GET['page']) && $_GET['page'] == 'singlepage-options'){
	$theme_info = wp_get_theme();
	wp_enqueue_script( 'singlepage-admin', get_template_directory_uri().'/js/admin.js', array( 'jquery' ), $theme_info->get( 'Version' ), true );
	wp_enqueue_style('singlepage-admin',  get_template_directory_uri() .'/css/admin.css', false,  $theme_info->get( 'Version' ), false);
	 }
  }

  add_action( 'wp_enqueue_scripts', 'singlepage_custom_scripts' );
  add_action( 'admin_enqueue_scripts', 'singlepage_admin_scripts' );


