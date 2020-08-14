<?php
// global $wp_registered_sidebars;
#########################################
function singlepage_widgets_init() {
		register_sidebar(array(
			'name' => __('Default Sidebar', 'singlepage'),
			'id'   => 'default_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
		register_sidebar(array(
			'name' => __('Displayed Everywhere', 'singlepage'),
			'id'   => 'displayed_everywhere',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
		
		register_sidebar(array(
			'name' => __('Blog Sidebar', 'singlepage'),
			'id'   => 'blog',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
		register_sidebar(array(
			'name' => __('Page Sidebar', 'singlepage'),
			'id'   => 'page',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
		
		register_sidebar(array(
			'name' => __('Footer Area One', 'singlepage'),
			'id'   => 'footer-1',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
		register_sidebar(array(
			'name' => __('Footer Area Two', 'singlepage'),
			'id'   => 'footer-2',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
		register_sidebar(array(
			'name' => __('Footer Area Three', 'singlepage'),
			'id'   => 'footer-3',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
		register_sidebar(array(
			'name' => __('Footer Area Four', 'singlepage'),
			'id'   => 'footer-4',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));

}
add_action( 'widgets_init', 'singlepage_widgets_init' );