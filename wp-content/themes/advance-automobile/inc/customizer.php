<?php
/**
 * Advance Automobile Theme Customizer
 *
 * @package Advance Automobile
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_automobile_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_automobile_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-automobile'),
		'description'    => __('Description of what this panel does.', 'advance-automobile'),
	));	

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'advance_automobile_theme_color_option', 
		array( 'panel' => 'advance_automobile_panel_id', 'title' => esc_html__( 'Theme Color Option', 'advance-automobile' ) )
	);

  	$wp_customize->add_setting( 'advance_automobile_theme_color_first', array(
	    'default' => '#1a8129',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_automobile_theme_color_first', array(
  		'label' => 'First Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'advance-automobile'),
	    'section' => 'advance_automobile_theme_color_option',
	    'settings' => 'advance_automobile_theme_color_first',
  	)));

  	$wp_customize->add_setting( 'advance_automobile_theme_color_second', array(
	    'default' => '#06393a',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_automobile_theme_color_second', array(
  		'label' => 'Second Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'advance-automobile'),
	    'section' => 'advance_automobile_theme_color_option',
	    'settings' => 'advance_automobile_theme_color_second',
  	)));

// font array
	$font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );

	//Typography
	$wp_customize->add_section( 'advance_automobile_typography', array(
    	'title'      => __( 'Typography', 'advance-automobile' ),
		'priority'   => 30,
		'panel' => 'advance_automobile_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'advance_automobile_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_automobile_paragraph_color', array(
		'label' => __('Paragraph Color', 'advance-automobile'),
		'section' => 'advance_automobile_typography',
		'settings' => 'advance_automobile_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('advance_automobile_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_automobile_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_automobile_paragraph_font_family', array(
	    'section'  => 'advance_automobile_typography',
	    'label'    => __( 'Paragraph Fonts','advance-automobile'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('advance_automobile_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_automobile_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','advance-automobile'),
		'section'	=> 'advance_automobile_typography',
		'setting'	=> 'advance_automobile_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_automobile_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_automobile_atag_color', array(
		'label' => __('"a" Tag Color', 'advance-automobile'),
		'section' => 'advance_automobile_typography',
		'settings' => 'advance_automobile_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_automobile_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_automobile_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_automobile_atag_font_family', array(
	    'section'  => 'advance_automobile_typography',
	    'label'    => __( '"a" Tag Fonts','advance-automobile'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_automobile_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_automobile_li_color', array(
		'label' => __('"li" Tag Color', 'advance-automobile'),
		'section' => 'advance_automobile_typography',
		'settings' => 'advance_automobile_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_automobile_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_automobile_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_automobile_li_font_family', array(
	    'section'  => 'advance_automobile_typography',
	    'label'    => __( '"li" Tag Fonts','advance-automobile'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'advance_automobile_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_automobile_h1_color', array(
		'label' => __('H1 Color', 'advance-automobile'),
		'section' => 'advance_automobile_typography',
		'settings' => 'advance_automobile_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('advance_automobile_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_automobile_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_automobile_h1_font_family', array(
	    'section'  => 'advance_automobile_typography',
	    'label'    => __( 'H1 Fonts','advance-automobile'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('advance_automobile_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_automobile_h1_font_size',array(
		'label'	=> __('H1 Font Size','advance-automobile'),
		'section'	=> 'advance_automobile_typography',
		'setting'	=> 'advance_automobile_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'advance_automobile_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_automobile_h2_color', array(
		'label' => __('h2 Color', 'advance-automobile'),
		'section' => 'advance_automobile_typography',
		'settings' => 'advance_automobile_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('advance_automobile_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_automobile_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_automobile_h2_font_family', array(
	    'section'  => 'advance_automobile_typography',
	    'label'    => __( 'h2 Fonts','advance-automobile'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('advance_automobile_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_automobile_h2_font_size',array(
		'label'	=> __('h2 Font Size','advance-automobile'),
		'section'	=> 'advance_automobile_typography',
		'setting'	=> 'advance_automobile_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'advance_automobile_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_automobile_h3_color', array(
		'label' => __('h3 Color', 'advance-automobile'),
		'section' => 'advance_automobile_typography',
		'settings' => 'advance_automobile_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('advance_automobile_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_automobile_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_automobile_h3_font_family', array(
	    'section'  => 'advance_automobile_typography',
	    'label'    => __( 'h3 Fonts','advance-automobile'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('advance_automobile_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_automobile_h3_font_size',array(
		'label'	=> __('h3 Font Size','advance-automobile'),
		'section'	=> 'advance_automobile_typography',
		'setting'	=> 'advance_automobile_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'advance_automobile_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_automobile_h4_color', array(
		'label' => __('h4 Color', 'advance-automobile'),
		'section' => 'advance_automobile_typography',
		'settings' => 'advance_automobile_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('advance_automobile_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_automobile_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_automobile_h4_font_family', array(
	    'section'  => 'advance_automobile_typography',
	    'label'    => __( 'h4 Fonts','advance-automobile'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('advance_automobile_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_automobile_h4_font_size',array(
		'label'	=> __('h4 Font Size','advance-automobile'),
		'section'	=> 'advance_automobile_typography',
		'setting'	=> 'advance_automobile_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'advance_automobile_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_automobile_h5_color', array(
		'label' => __('h5 Color', 'advance-automobile'),
		'section' => 'advance_automobile_typography',
		'settings' => 'advance_automobile_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('advance_automobile_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_automobile_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_automobile_h5_font_family', array(
	    'section'  => 'advance_automobile_typography',
	    'label'    => __( 'h5 Fonts','advance-automobile'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('advance_automobile_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_automobile_h5_font_size',array(
		'label'	=> __('h5 Font Size','advance-automobile'),
		'section'	=> 'advance_automobile_typography',
		'setting'	=> 'advance_automobile_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'advance_automobile_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_automobile_h6_color', array(
		'label' => __('h6 Color', 'advance-automobile'),
		'section' => 'advance_automobile_typography',
		'settings' => 'advance_automobile_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('advance_automobile_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_automobile_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_automobile_h6_font_family', array(
	    'section'  => 'advance_automobile_typography',
	    'label'    => __( 'h6 Fonts','advance-automobile'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('advance_automobile_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('advance_automobile_h6_font_size',array(
		'label'	=> __('h6 Font Size','advance-automobile'),
		'section'	=> 'advance_automobile_typography',
		'setting'	=> 'advance_automobile_h6_font_size',
		'type'	=> 'text'
	));

	//Layouts
	$wp_customize->add_section('advance_automobile_left_right', array(
		'title'    => __('Layout Settings', 'advance-automobile'),
		'priority' => null,
		'panel'    => 'advance_automobile_panel_id',
	));

	$wp_customize->add_setting('advance_automobile_theme_options',array(
        'default' => __('Default','advance-automobile'),
        'sanitize_callback' => 'advance_automobile_sanitize_choices'
	));
	$wp_customize->add_control('advance_automobile_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','advance-automobile'),
        'description' => __('Here you can change the Width layout. ','advance-automobile'),
        'section' => 'advance_automobile_left_right',
        'choices' => array(
            'Default' => __('Default','advance-automobile'),
            'Container' => __('Container','advance-automobile'),
            'Box Container' => __('Box Container','advance-automobile'),
        ),
	) );

	$wp_customize->add_setting('advance_automobile_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-automobile'),
		'sanitize_callback' => 'advance_automobile_sanitize_choices',
	));
	$wp_customize->add_control('advance_automobile_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-automobile'),
		'section'        => 'advance_automobile_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-automobile'),
			'Right Sidebar' => __('Right Sidebar', 'advance-automobile'),
			'One Column'    => __('One Column', 'advance-automobile'),
			'Grid Layout'   => __('Grid Layout', 'advance-automobile')
		),
	));

	//Top Bar
	$wp_customize->add_section('advance_automobile_topbar',array(
		'title'	=> __('Topbar Section','advance-automobile'),
		'description'	=> __('Add topbar content','advance-automobile'),
		'priority'	=> null,
		'panel' => 'advance_automobile_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'advance_automobile_display_topbar',array(
		'default' => 'true',
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('advance_automobile_display_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','advance-automobile' ),
        'section' => 'advance_automobile_topbar'
    ));

	$wp_customize->add_setting('advance_automobile_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_mail1',array(
		'label'	=> __('Mail Address','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_automobile_facebook_url',array(
		'label'	=> __('Add Facebook link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_automobile_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_automobile_twitter_url',array(
		'label'	=> __('Add Twitter link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_automobile_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_automobile_youtube_url',array(
		'label'	=> __('Add Youtube link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_automobile_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('advance_automobile_google_plus_url',array(
		'label'	=> __('Add Google Plus link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_automobile_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_automobile_linkedin_url',array(
		'label'	=> __('Add Linkedin link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('advance_automobile_book1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_automobile_book1',array(
		'label'	=> __('Button text','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_book',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('advance_automobile_book',array(
		'label'	=> __('Add Link','advance-automobile'),
		'section'	=> 'advance_automobile_topbar',
		'setting'	=> 'advance_automobile_book',
		'type'	=> 'url'
	));
	
	//Slider
	$wp_customize->add_section( 'advance_automobile_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-automobile' ),
		'priority'   => null,
		'panel' => 'advance_automobile_panel_id'
	) );

	$wp_customize->add_setting('advance_automobile_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_automobile_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-automobile'),
       'section' => 'advance_automobile_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'advance_automobile_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_automobile_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_automobile_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-automobile' ),
			'description'	=> __('Size of image should be 1600 x 633','advance-automobile'),
			'section'  => 'advance_automobile_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//contact details
	$wp_customize->add_section('advance_automobile_contact_details',array(
		'title'	=> __('Contact details','advance-automobile'),
		'description'	=> __('Add Contact Details here','advance-automobile'),
		'priority'	=> null,
		'panel' => 'advance_automobile_panel_id',
	));

	$wp_customize->add_setting('advance_automobile_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_address',array(
		'label'	=> __('Address Text','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_address1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_address1',array(
		'label'	=> __('Address ','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_time',array(
		'label'	=> __('Timing Text','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_time1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_time1',array(
		'label'	=> __('Open at','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('advance_automobile_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_call',array(
		'label'	=> __('Call Text','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_automobile_call1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_call1',array(
		'label'	=> __('Phone Number','advance-automobile'),
		'section'	=> 'advance_automobile_contact_details',
		'type'	=> 'text'
	));

	//Our Services
  	$wp_customize->add_section('advance_automobile_category_section',array(
	    'title' => __('Our Services','advance-automobile'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'advance_automobile_panel_id',
	)); 

	$wp_customize->add_setting('advance_automobile_our_services_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('advance_automobile_our_services_title',array(
		'label'	=> __('Section Title','advance-automobile'),
		'section'	=> 'advance_automobile_category_section',
		'setting'	=> 'advance_automobile_our_services_title',
		'type'		=> 'text'
	));

	// category 
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

    $wp_customize->add_setting('advance_automobile_category3',array(
	    'default' => 'select',
	    'sanitize_callback' => 'advance_automobile_sanitize_choices',
  	));
  	$wp_customize->add_control('advance_automobile_category3',array(
	    'type'    => 'select',
	    'choices' => $cat_post,
	    'label' => __('Select Category to display Latest Post','advance-automobile'),
	    'description'	=> __('Size of image should be 570 x 380','advance-automobile'),
	    'section' => 'advance_automobile_category_section',
	));

	//Blog Post
	$wp_customize->add_section('advance_automobile_blog_post',array(
		'title'	=> __('Blog Page Settings','advance-automobile'),
		'panel' => 'advance_automobile_panel_id',
	));	

	$wp_customize->add_setting('advance_automobile_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_automobile_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','advance-automobile'),
       'section' => 'advance_automobile_blog_post'
    ));

    $wp_customize->add_setting('advance_automobile_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_automobile_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','advance-automobile'),
       'section' => 'advance_automobile_blog_post'
    ));

    $wp_customize->add_setting('advance_automobile_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_automobile_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','advance-automobile'),
       'section' => 'advance_automobile_blog_post'
    ));

    $wp_customize->add_setting('advance_automobile_tags_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_automobile_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','advance-automobile'),
       'section' => 'advance_automobile_blog_post'
    ));

    $wp_customize->add_setting( 'advance_automobile_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'advance_automobile_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','advance-automobile' ),
		'section'     => 'advance_automobile_blog_post',
		'type'        => 'input',
		'settings'    => 'advance_automobile_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('advance_automobile_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_automobile_button_text',array(
		'label'	=> __('Add Button Text','advance-automobile'),
		'section'=> 'advance_automobile_blog_post',
		'type'=> 'text'
	));

	//footer
	$wp_customize->add_section('advance_automobile_footer_section', array(
		'title'       => __('Footer Text', 'advance-automobile'),
		'priority'    => null,
		'panel'       => 'advance_automobile_panel_id',
	));

	$wp_customize->add_setting('advance_automobile_footer_widget_areas',array(
        'default'           => '4',
        'sanitize_callback' => 'advance_automobile_sanitize_choices',
    ));
    $wp_customize->add_control('advance_automobile_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'advance-automobile'),
        'section'     => 'advance_automobile_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'advance-automobile'),
        'choices' => array(
            '1'     => __('One', 'advance-automobile'),
            '2'     => __('Two', 'advance-automobile'),
            '3'     => __('Three', 'advance-automobile'),
            '4'     => __('Four', 'advance-automobile')
        ),
    ));

	$wp_customize->add_setting('advance_automobile_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_automobile_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-automobile'),
		'section' => 'advance_automobile_footer_section',
		'type'    => 'text',
	));

	$wp_customize->add_setting('advance_automobile_enable_disable_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_automobile_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','advance-automobile'),
      	'section' => 'advance_automobile_footer_section',
	));

	$wp_customize->add_setting('advance_automobile_scroll_setting',array(
        'default' => __('Right','advance-automobile'),
        'sanitize_callback' => 'advance_automobile_sanitize_choices'
	));
	$wp_customize->add_control('advance_automobile_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','advance-automobile'),
        'section' => 'advance_automobile_footer_section',
        'choices' => array(
            'Left' => __('Left','advance-automobile'),
            'Right' => __('Right','advance-automobile'),
            'Center' => __('Center','advance-automobile'),
        ),
	) );
	
}
add_action('customize_register', 'advance_automobile_customize_register');

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Automobile_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
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
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the conadvance_automobile_Customizetrols.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('Advance_Automobile_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Automobile_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Advance Automobile', 'advance-automobile'),
					'pro_text' => esc_html__('Go Pro', 'advance-automobile'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/automobile-wordpress-theme/'),
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

		wp_enqueue_script('advance-automobile-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-automobile-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Automobile_Customize::get_instance();