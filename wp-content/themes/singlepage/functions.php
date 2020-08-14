<?php


define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
require_once dirname( __FILE__ ) . '/admin/options-framework.php';
require_once get_template_directory() . '/options.php';

function singlepage_prefix_options_menu_filter( $menu ) {
	$menu['mode'] = 'menu';
	$menu['page_title'] = __( 'Theme Options', 'singlepage');
	$menu['menu_title'] = __( 'Theme Options', 'singlepage');
	$menu['menu_slug'] = 'singlepage-options';
	return $menu;
}

add_filter( 'optionsframework_menu', 'singlepage_prefix_options_menu_filter' );

/**
 * Mobile Detect Library
 **/
 if(!class_exists("Mobile_Detect"))
load_template( trailingslashit( get_template_directory() ) . 'includes/Mobile_Detect.php' );

 
/**
 * Theme setup
 **/
 
load_template( trailingslashit( get_template_directory() ) . 'includes/theme-setup.php' );

/**
 * Theme widgets
 **/
 
load_template( trailingslashit( get_template_directory() ) . 'includes/theme-widgets.php' );

/**
 * Theme Functions
 **/
 
load_template( trailingslashit( get_template_directory() ) . 'includes/custom-functions.php' );

/**
 * Theme breadcrumb
 */
 
load_template( trailingslashit( get_template_directory() ) . 'includes/breadcrumb-trail.php' );

/**
 * Theme Metabox
 */
 
load_template( trailingslashit( get_template_directory() ) . 'includes/metabox-options.php' );
