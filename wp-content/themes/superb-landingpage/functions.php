<?php
/**
 * Superb Landingpage functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Superb_Landingpage
 */

if ( ! function_exists( 'superb_landingpage_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
function superb_landingpage_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Superb Landingpage, use a find and replace
		 * to change 'superb-landingpage' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'superb-landingpage', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );



		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
	add_image_size( 'superb-landingpage-related', 200, 125, true ); //related


		// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary Menu', 'superb-landingpage' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'superb-landingpage' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'superb_landingpage_custom_background_args', array(
			'default-color' => 'fff',
			'default-image' => '',
			) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			) );
	}
	endif;
	add_action( 'after_setup_theme', 'superb_landingpage_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function superb_landingpage_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'superb_landingpage_content_width', 640 );
}
add_action( 'after_setup_theme', 'superb_landingpage_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function superb_landingpage_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'superb-landingpage' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'superb-landingpage' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (First)', 'superb-landingpage' ),
		'id'            => 'footer-widget-one',
		'description'   => esc_html__( 'Add widgets here.', 'superb-landingpage' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (Second)', 'superb-landingpage' ),
		'id'            => 'footer-widget-two',
		'description'   => esc_html__( 'Add widgets here.', 'superb-landingpage' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (Third)', 'superb-landingpage' ),
		'id'            => 'footer-widget-three',
		'description'   => esc_html__( 'Add widgets here.', 'superb-landingpage' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );

}
add_action( 'widgets_init', 'superb_landingpage_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function superb_landingpage_scripts() {
	wp_enqueue_style( 'superb-landingpage-owl-slider-default', get_template_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'superb-landingpage-owl-slider-theme', get_template_directory_uri() . '/css/owl.theme.default.css' );

	wp_enqueue_script( 'superb-landingpage-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_script( 'superb-landingpage-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_style( 'superb-landingpage-foundation', get_template_directory_uri() . '/css/foundation.css' );
	wp_enqueue_style( 'superb-landingpage-font', 'https://fonts.googleapis.com/css?family=Saira+Semi+Condensed:400,700' );
	wp_enqueue_style( 'superb-landingpage-dashicons', get_home_url() . '/wp-includes/css/dashicons.css' );

	wp_enqueue_script( 'superb-landingpage-foundation-js-jquery', get_template_directory_uri() . '/js/vendor/foundation.js', array('jquery'), '6', true );
	wp_enqueue_script( 'superb-landingpage-custom-js-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'superb-landingpage-owl-slider-js-jquery', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'superb-landingpage-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'superb_landingpage_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/** 
 * Superb Landingpage Get Custom Fonts 
 */
function superb_landingpage_load_google_fonts() {
	wp_enqueue_style( 'superb-landingpage-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Merriweather:700,400,700i' ); 
}
add_action( 'wp_enqueue_scripts', 'superb_landingpage_load_google_fonts' );


/**
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Superb Landingpage for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'superb_landingpage_register_required_plugins' );

function superb_landingpage_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Superb Helper',
			'slug'      => 'superb-helper',
			'required'  => false,
			),
		);

	$config = array(
		'id'           => 'superb-landingpage',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		);
	tgmpa( $plugins, $config );
}





/**
 * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. Customizer button https://gitlandingpage.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );


/**
 * Compare page CSS
 */

function superb_landingpage_comparepage_css($hook) {
	if ( 'appearance_page_superb-landingpage-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'superb-landingpage-custom-style', get_template_directory_uri() . '/css/compare.css' );
}
add_action( 'admin_enqueue_scripts', 'superb_landingpage_comparepage_css' );

/**
 * Compare page content
 */

add_action('admin_menu', 'superb_landingpage_themepage');
function superb_landingpage_themepage(){
	$theme_info = add_theme_page( __('Superb Landingpage','superb-landingpage'), __('Superb Landingpage','superb-landingpage'), 'manage_options', 'superb-landingpage-info.php', 'superb_landingpage_info_page' );
}

function superb_landingpage_info_page() {
	$user = wp_get_current_user();
	?>
	<div class="wrap about-wrap superb-landingpage-add-css">
		<div>
			<h1>
				<?php echo esc_html__('Welcome to Superb Landingpage!','superb-landingpage'); ?>
			</h1>

			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html__("Contact Support", "superb-landingpage"); ?></h3>
						<p><?php echo esc_html__("Getting started with a new theme can be difficult, if you have issues with Superb Landingpage then throw us an email.", "superb-landingpage"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/help-contact/', 'superb-landingpage'); ?>" class="button button-primary">
							<?php echo esc_html__("Contact Support", "superb-landingpage"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html__("Review Superb Landing Page", "superb-landingpage"); ?></h3>
						<p><?php echo esc_html__("Nothing motivates us more than feedback, are you are enjoying Superb Landing Page? We would love to hear what you think!", "superb-landingpage"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://wordpress.org/support/theme/superb-landingpage/reviews/?filter=5', 'superb-landingpage'); ?>" class="button button-primary">
							<?php echo esc_html__("Submit A Review", "superb-landingpage"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html__("Premium Edition", "superb-landingpage"); ?></h3>
						<p><?php echo esc_html__("If you enjoy Superb Landingpage and want to take your website to the next step, then check out our premium edition here.", "superb-landingpage"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/superb-landingpage/', 'superb-landingpage'); ?>" class="button button-primary">
							<?php echo esc_html__("Read More", "superb-landingpage"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php echo esc_html__("Free Vs Premium","superb-landingpage"); ?></h2>
		<div class="superb-landingpage-button-container">
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/superb-landingpage/', 'superb-landingpage'); ?>" class="button button-primary">
				<?php echo esc_html__("Read Full Description", "superb-landingpage"); ?>
			</a>
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/demo/superb-landingpage/', 'superb-landingpage'); ?>" class="button button-primary">
				<?php echo esc_html__("View Theme Demo", "superb-landingpage"); ?>
			</a>
		</div>


		<table class="wp-list-table widefat">
			<thead>
				<tr>
					<th><strong><?php echo esc_html__("Theme Feature", "superb-landingpage"); ?></strong></th>
					<th><strong><?php echo esc_html__("Basic Version", "superb-landingpage"); ?></strong></th>
					<th><strong><?php echo esc_html__("Premium Version", "superb-landingpage"); ?></strong></th>
				</tr>
			</thead>

			<tbody>

				<tr>
					<td><?php echo esc_html__("Page Builder Integration", "superb-landingpage"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Hide Featured Images On Blog Posts", "superb-landingpage"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Navigation Logo & Title/Tagline", "superb-landingpage"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Hide Navigation Title and/or Tagline", "superb-landingpage"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Hide Navigation Completely	", "superb-landingpage"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Navigation Colors", "superb-landingpage"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Header & Footer Menu", "superb-landingpage"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>


				<tr>
					<td><?php echo esc_html__("Premium Support", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Fully SEO Optimized", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("0.2 Seconds Load Time", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Header Content Slideshow", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Header Image Slideshow	", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Show Slideshow On Front Page", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Only Show Slideshow On Landing Page", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Only Show Slideshow On Front Page & Landing Page", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
								<tr>
					<td><?php echo esc_html__("Show Slideshow Everywhere", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Slideshow Colors	", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Slideshow Title, Tagline & Button", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Images In Slideshows", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Easy Google Fonts", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>

				<tr>
					<td><?php echo esc_html__("Custom Landing Page Section Ordering", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Landing Page: Pagebuilder Section", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Landing Page: Grid Section (Up To 9 Grid Boxes)", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Landing Page: About Section", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Landing Page: Blog Posts Section", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>

				<tr>
					<td><?php echo esc_html__("Hide Sidebar On Posts", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Hide About The Author Section On Posts", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Hide Sidebar On Pages	", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Hide Sidebar On Blog Feed	", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Post & Page Colors", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Footer Copyright Text", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Sidebar Colors	", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Blog Feed Colors", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Footer Colors", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Page Builder Implementation", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr> 
				<tr>
					<td><?php echo esc_html__("SEO Plugins", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Contact Form", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Instagram Feed", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Recent Posts Extended", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
								<tr>
					<td><?php echo esc_html__("Access All Child Themes	", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>
								<tr>
					<td><?php echo esc_html__("Importable Demo Content", "superb-landingpage"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo esc_html__("No", "superb-landingpage"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo esc_html__("Yes", "superb-landingpage"); ?>" /></span></td>
				</tr>

			</tbody>
		</table>
		<div class="superb-landingpage-button-container">
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/superb-landingpage/', 'superb-landingpage'); ?>" class="button button-primary">
				<?php echo esc_html__("GO PREMIUM", "superb-landingpage"); ?>
			</a>

		</div>
	</div>
	<?php
}

