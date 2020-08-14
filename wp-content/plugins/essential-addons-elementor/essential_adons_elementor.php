<?php
/**
 * Plugin Name: Essential Addons for Elementor - Pro
 * Description: The ultimate elements library for Elementor page builder plugin for WordPress.
 * Plugin URI: https://essential-addons.com/elementor/
 * Author: WPDeveloper
 * Version: 2.12.1
 * Author URI: http://www.wpdeveloper.net
 *
 * Text Domain: essential-addons-elementor
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'ESSENTIAL_ADDONS_EL_URL', plugins_url( '/', __FILE__ ) );
define( 'ESSENTIAL_ADDONS_EL_PATH', plugin_dir_path( __FILE__ ) );
define( 'ESSENTIAL_ADDONS_EL_ROOT', __FILE__ );

// Licensing
define( 'EAEL_STORE_URL', 'https://wpdeveloper.net/' );
define( 'EAEL_SL_ITEM_ID', 4372 );
define( 'EAEL_SL_ITEM_SLUG', 'essential-addons-elementor' );
define( 'EAEL_SL_ITEM_NAME', 'Essential Addons for Elementor' );

require_once ESSENTIAL_ADDONS_EL_PATH.'includes/elementor-helper.php';
require_once ESSENTIAL_ADDONS_EL_PATH.'includes/queries.php';
require_once ESSENTIAL_ADDONS_EL_PATH.'includes/mailchimp-subscription.php';
require_once ESSENTIAL_ADDONS_EL_PATH.'admin/settings.php';



/**
 * This function will return true for all activated modules
 *
 * @since   v2.6.0
 */
function eael_activated_modules() {

   $eael_default_keys = array( 'contact-form-7', 'count-down', 'counter', 'creative-btn', 'divider', 'fancy-text', 'img-comparison', 'instagram-gallery', 'interactive-promo',  'lightbox', 'post-block', 'post-grid', 'post-carousel', 'post-timeline', 'product-grid', 'team-members', 'testimonial-slider', 'testimonials', 'testimonials', 'weforms', 'static-product', 'call-to-action', 'flip-box', 'info-box', 'dual-header', 'price-table', 'price-menu', 'flip-carousel', 'interactive-cards', 'ninja-form', 'content-timeline', 'gravity-form', 'data-table', 'caldera-form','twitter-feed', 'twitter-feed-carousel', 'facebook-feed', 'facebook-feed-carousel', 'filter-gallery', 'dynamic-filter-gallery', 'content-ticker', 'image-accordion', 'post-list', 'tooltip', 'adv-tabs', 'adv-accordion', 'adv-google-map', 'google-map-api', 'mailchimp', 'toggle', 'one-page-navigation', 'team-member-carousel', 'image-hotspots', 'logo-carousel', 'wpforms', 'protected-content' );

   $eael_default_settings  = array_fill_keys( $eael_default_keys, true );
   $eael_get_settings      = get_option( 'eael_save_settings', $eael_default_settings );
   $eael_new_settings      = array_diff_key( $eael_default_settings, $eael_get_settings );

   if( ! empty( $eael_new_settings ) ) {
	  $eael_updated_settings = array_merge( $eael_get_settings, $eael_new_settings );
	  update_option( 'eael_save_settings', $eael_updated_settings );
   }

   return $eael_get_settings = get_option( 'eael_save_settings', $eael_default_settings );
}

/**
 * Acivate or Deactivate Modules
 *
 * @since v1.0.0
 */
function add_eael_elements() {

   $is_component_active = eael_activated_modules();
   
   // load elements
   if( $is_component_active['post-grid'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/post-grid/post-grid.php';
   }

	if( $is_component_active['post-carousel'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/post-carousel/post-carousel.php';
   }

   if( $is_component_active['post-block'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/post-block/post-block.php';
   }

   if( $is_component_active['post-timeline'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/post-timeline/post-timeline.php';
   }

   if( $is_component_active['fancy-text'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/fancy-text/fancy-text.php';
   }

   if( $is_component_active['img-comparison'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/image-comparison/image-comparison.php';
   }

   if( $is_component_active['lightbox'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/lightbox/lightbox.php';
   }
	if( $is_component_active['protected-content'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/protected-content/protected-content.php';
   }
   if( $is_component_active['interactive-promo'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/interactive-promo/interactive-promo.php';
   }

   if( $is_component_active['creative-btn'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/creative-button/creative-button.php';
   }

   if( $is_component_active['count-down'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/countdown/countdown.php';
   }

   if( $is_component_active['counter'] ) {
		require_once ESSENTIAL_ADDONS_EL_PATH.'elements/counter/counter.php';
	}

	if( $is_component_active['divider'] ) {
		require_once ESSENTIAL_ADDONS_EL_PATH.'elements/divider/divider.php';
	}

   if( $is_component_active['instagram-gallery'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/instagram-gallery/instagram-gallery.php';
   }

   if( $is_component_active['team-members'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/team-members/team-members.php';
   }

   if( $is_component_active['testimonials'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/testimonials/testimonials.php';
	}
   if( $is_component_active['testimonial-slider'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/testimonial-slider/testimonial-slider.php';
   }

   if ( function_exists( 'WC' ) && $is_component_active['product-grid'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/product-grid/product-grid.php';
   }

   if ( function_exists( 'wpcf7' ) && $is_component_active['contact-form-7'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/contact-form-7/contact-form-7.php';
   }

   if ( function_exists( 'WeForms' ) && $is_component_active['weforms'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/weforms/weforms.php';
   }

   if( $is_component_active['static-product'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/static-product/static-product.php';
   }

   if( $is_component_active['info-box'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/infobox/infobox.php';
   }

   if( $is_component_active['flip-box'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/flipbox/flipbox.php';
   }

   if( $is_component_active['call-to-action'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/call-to-action/call-to-action.php';
   }

   if( $is_component_active['dual-header'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/dual-color-header/dual-color-header.php';
   }

   if( $is_component_active['price-table'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/pricing-table/pricing-table.php';
   }

	if( $is_component_active['price-menu'] ) {
		require_once ESSENTIAL_ADDONS_EL_PATH.'elements/price-menu/price-menu.php';
	}
   
   if( $is_component_active['flip-carousel'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/flip-carousel/flip-carousel.php';
   }

   if( $is_component_active['logo-carousel'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/logo-carousel/logo-carousel.php';
   }

   if( $is_component_active['interactive-cards'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/interactive-card/interactive-card.php';
   }

   if( function_exists( 'Ninja_Forms' ) && $is_component_active['ninja-form'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/ninja-form/ninja-form.php';
   }

   if( class_exists( 'GFForms' ) && $is_component_active['gravity-form'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/gravity-form/gravity-form.php';
   }

   if( $is_component_active['content-timeline'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/content-timeline/content-timeline.php';
   }

   if( $is_component_active['data-table'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/data-table/data-table.php';
   }

   if( class_exists( 'Caldera_Forms' ) && $is_component_active['caldera-form'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/caldera-forms/caldera-forms.php';
   }

   if( class_exists( 'WPForms' ) && $is_component_active['wpforms'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/wpforms/wpforms.php';
   }

   if( $is_component_active['twitter-feed'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/twitter-feed/twitter-feed.php';
   }

   if( $is_component_active['facebook-feed'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/facebook-feed/facebook-feed.php';
   }

   if( $is_component_active['facebook-feed-carousel'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/facebook-feed-carousel/facebook-feed-carousel.php';
   }

   if( $is_component_active['twitter-feed-carousel'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/twitter-feed-carousel/twitter-feed-carousel.php';
   }

   if( $is_component_active['filter-gallery'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/filterable-gallery/filterable-gallery.php';
   }

   if( $is_component_active['dynamic-filter-gallery'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/dynamic-filter-gallery/dynamic-filter-gallery.php';
   }

   if( $is_component_active['content-ticker'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/content-ticker/content-ticker.php';
   }

   if( $is_component_active['image-accordion'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/image-accordion/image-accordion.php';
   }

   if( $is_component_active['post-list'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/post-list/post-list.php';
   }

   if( $is_component_active['tooltip'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/tooltip/tooltip.php';
   }

   if( $is_component_active['adv-tabs'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/advance-tabs/advance-tabs.php';
   }

   if( $is_component_active['adv-accordion'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/advance-accordion/advance-accordion.php';
   }

   if( $is_component_active['adv-google-map'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/advance-google-map/advance-google-map.php';
   }

   if( $is_component_active['mailchimp'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/mailchimp/mailchimp.php';
   }

   if( $is_component_active['toggle'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/toggle/toggle.php';
   }

   if( $is_component_active['one-page-navigation'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/one-page-navigation/one-page-navigation.php';
   }
   if( $is_component_active['team-member-carousel'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/team-member-carousel/team-member-carousel.php';
   }
   if( $is_component_active['image-hotspots'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/image-hotspots/image-hotspots.php';
   }
   if( $is_component_active['progress-bar'] ) {
	  require_once ESSENTIAL_ADDONS_EL_PATH.'elements/progress-bar/progress-bar.php';
   }
}
add_action('elementor/widgets/widgets_registered','add_eael_elements');

/**
 * Registering a Group Control for All Posts Element
 */
function eae_posts_register_control( $controls_manager ){
	include_once ESSENTIAL_ADDONS_EL_PATH . 'includes/eae-posts-group-control.php';
    $controls_manager->add_group_control( 'eaeposts', new Elementor\EAE_Posts_Group_Control() );
}

add_action( 'elementor/controls/controls_registered', 'eae_posts_register_control' );

/**
 * Load module's scripts and styles if any module is active.
 *
 * @since v1.0.0
 */
function essential_addons_el_enqueue(){
	$is_component_active = eael_activated_modules();

	wp_enqueue_style('essential_addons_elementor-css',ESSENTIAL_ADDONS_EL_URL.'assets/css/essential-addons-elementor.css');
	wp_enqueue_style('essential_addons_lightbox-css',ESSENTIAL_ADDONS_EL_URL.'assets/css/lity.min.css');

	wp_enqueue_script( 'eael-scripts', ESSENTIAL_ADDONS_EL_URL.'assets/js/eael-scripts.js', array( 'jquery' ),'1.0', true);

	if ( class_exists( 'GFCommon' ) ) {
		foreach( eael_select_gravity_form() as $form_id => $form_name ){
			if ( $form_id != '0' ) {
				gravity_form_enqueue_scripts( $form_id );
			}
		};
	}
	if ( function_exists( 'wpforms' ) ) {
		wpforms()->frontend->assets_css();
	}
	
	if( $is_component_active['flip-carousel']  ) {
		wp_enqueue_style('essential_addons_flipster-css',ESSENTIAL_ADDONS_EL_URL.'assets/flip-carousel/jquery.flipster.min.css');
	}
	if( $is_component_active['fancy-text'] ) {
		wp_enqueue_script('essential_addons_elementor-fancy-text-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/fancy-text.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['lightbox'] ) {
		wp_enqueue_script('essential_addons_elementor-lightbox-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/lity.min.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['count-down'] ) {
		wp_enqueue_script('essential_addons_elementor-countdown-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/countdown.min.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['counter'] ) {
		wp_enqueue_style('essential_addons_odometer-css',ESSENTIAL_ADDONS_EL_URL.'assets/css/odometer-theme-default.css');
		wp_enqueue_script('essential_addons_elementor-waypoints-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/waypoints.min.js', array('jquery'),'1.0', true);
		wp_enqueue_script('essential_addons_elementor-odometer-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/odometer.min.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['instagram-gallery'] ) {
		wp_enqueue_script('essential_addons_elementor-instafeed-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/eael-instafeed.min.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['img-comparison'] ) {
		wp_enqueue_style('essential_addons_elementor-image-comp-css',ESSENTIAL_ADDONS_EL_URL.'assets/css/twentytwenty.css');
		wp_enqueue_script('essential_addons_elementor-image-comp-move-js', ESSENTIAL_ADDONS_EL_URL . 'assets/js/jquery.event.move.js', array( 'jquery' ), '1.0', true);
		wp_enqueue_script('essential_addons_elementor-image-comp-js', ESSENTIAL_ADDONS_EL_URL . 'assets/js/jquery.twentytwenty.js', array( 'jquery', 'essential_addons_elementor-image-comp-move-js' ), '1.0', true);
	}


	if( $is_component_active['flip-carousel'] ) {
		wp_enqueue_script('essential_addons_elementor-flipster-js',ESSENTIAL_ADDONS_EL_URL.'assets/flip-carousel/jquery.flipster.min.js', array('jquery'),'1.0', true);
	}
		
	if( $is_component_active['interactive-cards'] ) {
		wp_enqueue_style('essential_addons_interactive-card-css',ESSENTIAL_ADDONS_EL_URL.'assets/interactive-card/interactive-card.css');
		wp_enqueue_script('essential_addons_elementor-interactive-card-js',ESSENTIAL_ADDONS_EL_URL.'assets/interactive-card/interactive-card.min.js', array('jquery'),'1.0', true);
		wp_enqueue_script('essential_addons_elementor-nicescroll-js',ESSENTIAL_ADDONS_EL_URL.'assets/interactive-card/jquery.nicescroll.min.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['post-grid'] || $is_component_active['post-carousel'] || $is_component_active['instagram-gallery'] || $is_component_active['facebook-feed'] || $is_component_active['twitter-feed'] ) {
		wp_enqueue_script('essential_addons_elementor-masonry-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/masonry.min.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['post-block'] || $is_component_active['post-grid'] || $is_component_active['post-carousel'] || $is_component_active['post-timeline'] ) {
		wp_enqueue_script('essential_addons_elementor-eael-load-more-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/eael-load-more.js', array('jquery'),'1.0', true);
		$eael_js_settings = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		);
		wp_localize_script( 'essential_addons_elementor-eael-load-more-js', 'eaelPostGrid', $eael_js_settings );
	}
	if( $is_component_active['content-timeline'] ) {
		wp_enqueue_script('essential_addons_elementor-vertical-timeline-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/vertical-timeline.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['data-table'] ) {
		wp_enqueue_script('essential_addons_elementor-data-table-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/jquery.tablesorter.min.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['twitter-feed'] || $is_component_active['facebook-feed'] ) {
		wp_enqueue_script('essential_addons_elementor-doT-js',ESSENTIAL_ADDONS_EL_URL.'assets/social-feeds/doT.min.js', array('jquery'),'1.0', true);
		wp_enqueue_script('essential_addons_elementor-moment-js',ESSENTIAL_ADDONS_EL_URL.'assets/social-feeds/moment.js', array('jquery'),'1.0', true);
		wp_enqueue_script('essential_addons_elementor-socialfeed-js',ESSENTIAL_ADDONS_EL_URL.'assets/social-feeds/jquery.socialfeed.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['twitter-feed'] || $is_component_active['twitter-feed-carousel'] ) {
		wp_enqueue_script('essential_addons_elementor-codebird-js',ESSENTIAL_ADDONS_EL_URL.'assets/social-feeds/codebird.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['filter-gallery'] || $is_component_active['dynamic-filter-gallery'] ) {
		wp_enqueue_script('essential_addons_mixitup-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/mixitup.min.js', array('jquery'),'1.0', true);
		wp_enqueue_script('essential_addons_magnific-popup-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/jquery.magnific-popup.min.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['content-ticker'] ) {
		wp_enqueue_script('essential_addons_elementor-typed-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/typed.min.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['post-list'] ) {
		wp_enqueue_script('essential_addons_elementor-post-list',ESSENTIAL_ADDONS_EL_URL.'assets/js/eael-post-list.js', array('jquery' ),'1.0', true);

		$eael_post_list_settings = array(
			'ajax_url' => admin_url('admin-ajax.php'),
		);
		wp_localize_script( 'essential_addons_elementor-post-list', 'eaelPostList', $eael_post_list_settings );
	}

	if( $is_component_active['adv-google-map'] && '' != get_option('eael_save_google_map_api') ) {
		wp_enqueue_script('essential_addons_elementor-google-map-api', 'https://maps.googleapis.com/maps/api/js?key='.get_option('eael_save_google_map_api').'', array('jquery'),'1.0', false);
		wp_enqueue_script('essential_addons_elementor-gmap-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/gmap.js', array('jquery'),'1.0', true);
	}
	
	if( $is_component_active['mailchimp'] ) {
		wp_enqueue_script('essential_addons_elementor-mailchimp-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/mailchimp.js', array('jquery'),'1.0', true);

		$eael_mailchimp_settings = array(
			'ajax_url' => admin_url('admin-ajax.php'),
		);
		wp_localize_script( 'essential_addons_elementor-mailchimp-js', 'eaelMailchimp', $eael_mailchimp_settings );
	}
	if( $is_component_active['one-page-navigation'] ) {
		wp_enqueue_script('essential_addons_elementor-one-page-nav-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/one-page-nav.js', array('jquery'),'1.0', true);
	}
	if( $is_component_active['image-hotspots'] ) {
		wp_enqueue_script('essential_addons_elementor-image-hotspots-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/tipso.js', array('jquery'),'1.0', true);
	}

	if( $is_component_active['price-table'] ) {
		wp_enqueue_style('essential_addons_elementor-tooltipster',ESSENTIAL_ADDONS_EL_URL.'assets/css/tooltipster.bundle.min.css');
		wp_enqueue_script('essential_addons_elementor-tooltipster-js',ESSENTIAL_ADDONS_EL_URL.'assets/js/tooltipster.bundle.min.js', array('jquery'),'1.0', true);
	}
	
	if( $is_component_active['progress-bar'] ) {
		wp_enqueue_script('essential_addons_elementor-progress-bar',ESSENTIAL_ADDONS_EL_URL.'assets/js/loading-bar.min.js', array('jquery'),'1.0', true);
	}
}
add_action( 'wp_enqueue_scripts', 'essential_addons_el_enqueue' );

/**
 * Creates an Action Menu
 */
function eael_add_settings_link( $links ) {
   $settings_link = sprintf( '<a href="admin.php?page=eael-settings">' . __( 'Settings' ) . '</a>' );
   array_push( $links, $settings_link );
   return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'eael_add_settings_link' );

/**
 * Activation redirects
 *
 * @since v1.0.0
 */
function eael_activate() {
	add_option('eael_do_activation_redirect', true);
}
register_activation_hook(__FILE__, 'eael_activate');

/**
 * Redirect to options page
 *
 * @since v1.0.0
 */
function eael_redirect() {
	if ( get_option( 'eael_do_activation_redirect', false ) ) {
		delete_option( 'eael_do_activation_redirect' );
		if( ! isset( $_GET['activate-multi'] ) ) {
			wp_redirect("admin.php?page=eael-settings");
		}
	}
}
add_action('admin_init', 'eael_redirect');

/**
 * Plugin Licensing
 *
 * @since v1.0.0
 */
function eael_plugin_licensing() {

	// Requiring Licensing Class
	require_once ESSENTIAL_ADDONS_EL_PATH.'lib/licensing/eael-licensing.php';
	if ( is_admin() ) {
		// Setup the settings page and validation
		$licensing = new EAEL_Licensing(
			EAEL_SL_ITEM_SLUG,
			EAEL_SL_ITEM_NAME,
			'essential-addons-elementor'
		);
	}

}
eael_plugin_licensing();

/**
 * Handles Updates
 *
 * @since 1.0.0
 */
function eael_plugin_updater() {

	// Requiring the Updater class
	require_once ESSENTIAL_ADDONS_EL_PATH.'lib/licensing/eael-updater.php';

	// Disable SSL verification
	add_filter( 'edd_sl_api_request_verify_ssl', '__return_false' );

	// Setup the updater
   	$license = get_option( EAEL_SL_ITEM_SLUG . '-license-key' );
	$updater = new Eael_Plugin_Updater( EAEL_STORE_URL, __FILE__, array(
			'version'      => '2.12.1',
			'license'      => $license,
			'item_id'      => EAEL_SL_ITEM_ID,
			'author'       => 'WPDeveloper',
		)
	);
}
add_action( 'admin_init', 'eael_plugin_updater' );


function eael_init() {
	if ( class_exists( 'Caldera_Forms' ) ) {
		add_filter( 'caldera_forms_force_enqueue_styles_early', '__return_true' );
	}

	/**
		* Check if Elementor is Installed or not
		*/
	if( ! function_exists( 'eael_is_elementor_active' ) ) :
		function eael_is_elementor_active() {
			$file_path = 'elementor/elementor.php';
			$installed_plugins = get_plugins();
			return isset( $installed_plugins[$file_path] );
		}
	endif;

   /**
	* This notice will appear if Elementor is not installed or activated or both
	*/
   function eael_is_failed_to_load() {
		$elementor = 'elementor/elementor.php';
		if( eael_is_elementor_active() ) {
			if( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}
			$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor );
			$message = __( '<strong>Essential Addons for Elementor</strong> requires Elementor plugin to be active. Please activate Elementor to continue.', 'essential-addons-elementor' );
			$button_text = __( 'Activate Elementor', 'essential-addons-elementor' );
		} else {
			if( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}
			$activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
			$message = sprintf( __( '<strong>Essential Addons for Elementor</strong> requires %1$s"Elementor"%2$s plugin to be installed and activated. Please install Elementor to continue.', 'essential-addons-elementor' ), '<strong>', '</strong>' );
			$button_text = __( 'Install Elementor', 'essential-addons-elementor' );
		}
		$button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
		printf( '<div class="error"><p>%1$s</p>%2$s</div>', __( $message ), $button );
   }

	if( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'eael_is_failed_to_load' );
	}
}
add_action( 'plugins_loaded', 'eael_init' );
