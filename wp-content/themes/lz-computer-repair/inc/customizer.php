<?php
/**
 * lz-computer-repair: Customizer
 *
 * @package WordPress
 * @subpackage lz-computer-repair
 * @since 1.0
 */

function lz_computer_repair_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'lz_computer_repair_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'lz-computer-repair' ),
	    'description' => __( 'Description of what this panel does.', 'lz-computer-repair' ),
	) );

	$wp_customize->add_section( 'lz_computer_repair_theme_options_section', array(
    	'title'      => __( 'General Settings', 'lz-computer-repair' ),
		'priority'   => 30,
		'panel' => 'lz_computer_repair_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('lz_computer_repair_theme_options',array(
        'default' => __('Right Sidebar','lz-computer-repair'),
        'sanitize_callback' => 'lz_computer_repair_sanitize_choices'	        
	));

	$wp_customize->add_control('lz_computer_repair_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','lz-computer-repair'),
        'section' => 'lz_computer_repair_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','lz-computer-repair'),
            'Right Sidebar' => __('Right Sidebar','lz-computer-repair'),
            'One Column' => __('One Column','lz-computer-repair'),
            'Three Columns' => __('Three Columns','lz-computer-repair'),
            'Four Columns' => __('Four Columns','lz-computer-repair'),
            'Grid Layout' => __('Grid Layout','lz-computer-repair')
        ),
	));

	// Top Bar
	$wp_customize->add_section( 'lz_computer_repair_contact_details', array(
    	'title'      => __( 'Top Bar', 'lz-computer-repair' ),
		'priority'   => null,
		'panel' => 'lz_computer_repair_panel_id'
	) );
	
	$wp_customize->add_setting('lz_computer_repair_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_computer_repair_call',array(
		'label'	=> __('Phone Text','lz-computer-repair'),
		'section'=> 'lz_computer_repair_contact_details',
		'setting'=> 'lz_computer_repair_call',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lz_computer_repair_call1',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_computer_repair_call1',array(
		'label'	=> __('Phone Number','lz-computer-repair'),
		'section'=> 'lz_computer_repair_contact_details',
		'setting'=> 'lz_computer_repair_call1',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lz_computer_repair_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_computer_repair_time',array(
		'label'	=> __('Time Text','lz-computer-repair'),
		'section'=> 'lz_computer_repair_contact_details',
		'setting'=> 'lz_computer_repair_time',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lz_computer_repair_time1',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_computer_repair_time1',array(
		'label'	=> __('Opening Hours','lz-computer-repair'),
		'section'=> 'lz_computer_repair_contact_details',
		'setting'=> 'lz_computer_repair_time1',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lz_computer_repair_btn_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_computer_repair_btn_text',array(
		'label'	=> __('Add Button Text','lz-computer-repair'),
		'section'	=> 'lz_computer_repair_contact_details',
		'setting'	=> 'lz_computer_repair_btn_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('lz_computer_repair_btn_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('lz_computer_repair_btn_link',array(
		'label'	=> __('Add Button Link','lz-computer-repair'),
		'section'	=> 'lz_computer_repair_contact_details',
		'setting'	=> 'lz_computer_repair_btn_link',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'lz_computer_repair_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'lz-computer-repair' ),
		'priority'   => null,
		'panel' => 'lz_computer_repair_panel_id'
	) );

	$wp_customize->add_setting('lz_computer_repair_slider_hide_show',array(
       	'default' => 'true',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lz_computer_repair_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide slider','lz-computer-repair'),
	   	'description' => __('Image Size ( 1600px x 582px )','lz-computer-repair'),
	   	'section' => 'lz_computer_repair_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'lz_computer_repair_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'lz_computer_repair_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'lz_computer_repair_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'lz-computer-repair' ),
			'section'  => 'lz_computer_repair_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//	Our Services
	$wp_customize->add_section('lz_computer_repair_service',array(
		'title'	=> __('Our Services','lz-computer-repair'),
		'description'=> __('This section will appear below the slider.','lz-computer-repair'),
		'panel' => 'lz_computer_repair_panel_id',
	));
	
	$wp_customize->add_setting('lz_computer_repair_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_computer_repair_title',array(
		'label'	=> __('Section Title','lz-computer-repair'),
		'section'	=> 'lz_computer_repair_service',
		'setting'	=> 'lz_computer_repair_title',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('lz_computer_repair_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('lz_computer_repair_cat',array(
		'type'    => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','lz-computer-repair'),
		'section' => 'lz_computer_repair_service',
	));

	//Footer
    $wp_customize->add_section( 'lz_computer_repair_footer', array(
    	'title'      => __( 'Footer Text', 'lz-computer-repair' ),
		'priority'   => null,
		'panel' => 'lz_computer_repair_panel_id'
	) );

    $wp_customize->add_setting('lz_computer_repair_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_computer_repair_footer_copy',array(
		'label'	=> __('Footer Text','lz-computer-repair'),
		'section'	=> 'lz_computer_repair_footer',
		'setting'	=> 'lz_computer_repair_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'lz_computer_repair_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'lz_computer_repair_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'lz_computer_repair_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'lz_computer_repair_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'lz-computer-repair' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'lz-computer-repair' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'lz_computer_repair_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'lz_computer_repair_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'lz_computer_repair_customize_register' );

function lz_computer_repair_customize_partial_blogname() {
	bloginfo( 'name' );
}

function lz_computer_repair_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function lz_computer_repair_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function lz_computer_repair_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class LZ_Computer_Repair_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'LZ_Computer_Repair_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new LZ_Computer_Repair_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Computer Pro Theme', 'lz-computer-repair' ),
					'pro_text' => esc_html__( 'Go Pro','lz-computer-repair' ),
					'pro_url'  => esc_url( 'https://www.luzuk.com/themes/lz-computer-repair-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'lz-computer-repair-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'lz-computer-repair-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
LZ_Computer_Repair_Customize::get_instance();