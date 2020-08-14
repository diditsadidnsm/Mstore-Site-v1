<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Logo Carousel Widget
 */
class Widget_Eael_Logo_Carousel extends Widget_Base {
    
    /**
	 * Retrieve logo carousel widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
    public function get_name() {
        return 'eael-logo-carousel';
    }

    /**
	 * Retrieve logo carousel widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
    public function get_title() {
        return __( 'EA Logo Carousel', 'essential-addons-elementor' );
    }

    /**
	 * Retrieve the list of categories the logo carousel widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
    public function get_categories() {
        return [ 'essential-addons-elementor' ];
    }

    /**
	 * Retrieve logo carousel widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
    public function get_icon() {
        return 'eicon-carousel essential-addons-elementor-admin-icon';
    }
    
    /**
	 * Retrieve the list of scripts the logo carousel widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
    public function get_script_depends() {
        return [
            'jquery-swiper',
            'eael-scripts'
        ];
    }

    /**
	 * Register logo carousel widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
    protected function _register_controls() {

        /*-----------------------------------------------------------------------------------*/
        /*	CONTENT TAB
        /*-----------------------------------------------------------------------------------*/
        
        /**
         * Content Tab: Logo Carousel
         */
        $this->start_controls_section(
            'section_logo_carousel',
            [
                'label'                 => __( 'Logo Carousel', 'essential-addons-elementor' ),
            ]
        );

		$this->add_control(
			'carousel_slides',
			[
				'label'                 => '',
				'type'                  => Controls_Manager::REPEATER,
				'default'               => [
					[
						'logo_carousel_slide' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'logo_carousel_slide' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'logo_carousel_slide' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'logo_carousel_slide' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'logo_carousel_slide' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
					],
				],
				'fields'                => [
					[
						'name'        => 'logo_carousel_slide',
						'label'       => __( 'Upload Logo Image', 'essential-addons-elementor' ),
						'type'        => Controls_Manager::MEDIA,
                        'dynamic'     => [
                            'active'   => true,
                        ],
						'default'     => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
					],
					[
						'name'        => 'logo_title',
						'label'       => __( 'Title', 'essential-addons-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [
                            'active'   => true,
                        ],
					],
					[
						'name'        => 'link',
						'label'       => __( 'Link', 'essential-addons-elementor' ),
                        'type'        => Controls_Manager::URL,
                        'dynamic'     => [
                            'active'   => true,
                        ],
                        'placeholder' => 'https://www.your-link.com',
                        'default'     => [
                            'url' => '',
                        ],
					],
				],
				'title_field'           => __( 'Logo Image', 'essential-addons-elementor' ),
			]
		);
        
        $this->add_control(
            'title_html_tag',
            [
                'label'                => __( 'Title HTML Tag', 'essential-addons-elementor' ),
                'type'                 => Controls_Manager::SELECT,
                'default'              => 'h4',
                'options'              => [
                    'h1'     => __( 'H1', 'essential-addons-elementor' ),
                    'h2'     => __( 'H2', 'essential-addons-elementor' ),
                    'h3'     => __( 'H3', 'essential-addons-elementor' ),
                    'h4'     => __( 'H4', 'essential-addons-elementor' ),
                    'h5'     => __( 'H5', 'essential-addons-elementor' ),
                    'h6'     => __( 'H6', 'essential-addons-elementor' ),
                    'div'    => __( 'div', 'essential-addons-elementor' ),
                    'span'   => __( 'span', 'essential-addons-elementor' ),
                    'p'      => __( 'p', 'essential-addons-elementor' ),
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Content Tab: Carousel Settings
         */
        $this->start_controls_section(
            'section_additional_options',
            [
                'label'                 => __( 'Carousel Settings', 'essential-addons-elementor' ),
            ]
        );
        
        $this->add_control(
            'carousel_effect',
            [
                'label'                 => __( 'Effect', 'essential-addons-elementor' ),
                'description'           => __( 'Sets transition effect', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'slide',
                'options'               => [
                    'slide'     => __( 'Slide', 'essential-addons-elementor' ),
                    'fade'      => __( 'Fade', 'essential-addons-elementor' ),
                    'cube'      => __( 'Cube', 'essential-addons-elementor' ),
                    'coverflow' => __( 'Coverflow', 'essential-addons-elementor' ),
                    'flip'      => __( 'Flip', 'essential-addons-elementor' ),
                ],
            ]
        );
        
        $this->add_responsive_control(
            'items',
            [
                'label'                 => __( 'Visible Items', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'default'               => [ 'size' => 3 ],
                'tablet_default'        => [ 'size' => 2 ],
                'mobile_default'        => [ 'size' => 1 ],
                'range'                 => [
                    'px' => [
                        'min'   => 1,
                        'max'   => 10,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => '',
                'condition'             => [
                    'carousel_effect'   => 'slide',
                ],
                'separator'             => 'before',
            ]
        );
        
        $this->add_responsive_control(
            'margin',
            [
                'label'                 => __( 'Items Gap', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'default'               => [ 'size' => 10 ],
                'range'                 => [
                    'px' => [
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => '',
                'condition'             => [
                    'carousel_effect'   => 'slide',
                ],
            ]
        );
        
        $this->add_control(
            'slider_speed',
            [
                'label'                 => __( 'Slider Speed', 'essential-addons-elementor' ),
                'description'           => __( 'Duration of transition between slides (in ms)', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'default'               => [ 'size' => 400 ],
                'range'                 => [
                    'px' => [
                        'min'   => 100,
                        'max'   => 3000,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => '',
                'separator'             => 'before',
            ]
        );
        
        $this->add_control(
            'autoplay',
            [
                'label'                 => __( 'Autoplay', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SWITCHER,
                'default'               => 'yes',
                'label_on'              => __( 'Yes', 'essential-addons-elementor' ),
                'label_off'             => __( 'No', 'essential-addons-elementor' ),
                'return_value'          => 'yes',
                'separator'             => 'before',
            ]
        );
        
        $this->add_control(
            'autoplay_speed',
            [
                'label'                 => __( 'Autoplay Speed', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'default'               => [ 'size' => 2000 ],
                'range'                 => [
                    'px' => [
                        'min'   => 500,
                        'max'   => 5000,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => '',
                'condition'         => [
                    'autoplay'      => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'infinite_loop',
            [
                'label'                 => __( 'Infinite Loop', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SWITCHER,
                'default'               => 'yes',
                'label_on'              => __( 'Yes', 'essential-addons-elementor' ),
                'label_off'             => __( 'No', 'essential-addons-elementor' ),
                'return_value'          => 'yes',
            ]
        );
        
        $this->add_control(
            'grab_cursor',
            [
                'label'                 => __( 'Grab Cursor', 'essential-addons-elementor' ),
                'description'           => __( 'Shows grab cursor when you hover over the slider', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SWITCHER,
                'default'               => '',
                'label_on'          => __( 'Show', 'essential-addons-elementor' ),
                'label_off'         => __( 'Hide', 'essential-addons-elementor' ),
                'return_value'      => 'yes',
                'separator'             => 'before',
            ]
        );
        
        $this->add_control(
            'navigation_heading',
            [
                'label'                 => __( 'Navigation', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::HEADING,
                'separator'             => 'before',
            ]
        );
        
        $this->add_control(
            'arrows',
            [
                'label'                 => __( 'Arrows', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SWITCHER,
                'default'               => 'yes',
                'label_on'              => __( 'Yes', 'essential-addons-elementor' ),
                'label_off'             => __( 'No', 'essential-addons-elementor' ),
                'return_value'          => 'yes',
            ]
        );
        
        $this->add_control(
            'dots',
            [
                'label'                 => __( 'Dots', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SWITCHER,
                'default'               => 'yes',
                'label_on'              => __( 'Yes', 'essential-addons-elementor' ),
                'label_off'             => __( 'No', 'essential-addons-elementor' ),
                'return_value'          => 'yes',
            ]
        );
        
        $this->add_control(
            'direction',
            [
                'label'                 => __( 'Direction', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'left',
                'options'               => [
                    'left'       => __( 'Left', 'essential-addons-elementor' ),
                    'right'      => __( 'Right', 'essential-addons-elementor' ),
                ],
				'separator'             => 'before',
            ]
        );

        $this->end_controls_section();
        
        /*-----------------------------------------------------------------------------------*/
        /*	STYLE TAB
        /*-----------------------------------------------------------------------------------*/

        /**
         * Style Tab: Logos
         */
        $this->start_controls_section(
            'section_logos_style',
            [
                'label'                 => __( 'Logos', 'essential-addons-elementor' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'                  => 'logo_bg',
                'label'                 => __( 'Button Background', 'essential-addons-elementor' ),
                'types'                 => [ 'none','classic','gradient' ],
                'selector'              => '{{WRAPPER}} .eael-lc-logo',
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'                  => 'logo_border',
				'label'                 => __( 'Border', 'essential-addons-elementor' ),
				'placeholder'           => '1px',
				'default'               => '1px',
				'selector'              => '{{WRAPPER}} .eael-lc-logo',
			]
		);

		$this->add_control(
			'logo_border_radius',
			[
				'label'                 => __( 'Border Radius', 'essential-addons-elementor' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .eael-lc-logo, {{WRAPPER}} .eael-lc-logo img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'logo_padding',
			[
				'label'                 => __( 'Padding', 'essential-addons-elementor' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .eael-lc-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->start_controls_tabs( 'tabs_logos_style' );

        $this->start_controls_tab(
            'tab_logos_normal',
            [
                'label'                 => __( 'Normal', 'essential-addons-elementor' ),
            ]
        );
        
        $this->add_control(
            'grayscale_normal',
            [
                'label'                 => __( 'Grayscale', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SWITCHER,
                'default'               => 'no',
                'label_on'              => __( 'Yes', 'essential-addons-elementor' ),
                'label_off'             => __( 'No', 'essential-addons-elementor' ),
                'return_value'          => 'yes',
            ]
        );
        
        $this->add_control(
            'opacity_normal',
            [
                'label'                 => __( 'Opacity', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'range'                 => [
                    'px' => [
                        'min'   => 0,
                        'max'   => 1,
                        'step'  => 0.1,
                    ],
                ],
				'selectors'             => [
					'{{WRAPPER}} .eael-logo-carousel img' => 'opacity: {{SIZE}};',
				],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_logos_hover',
            [
                'label'                 => __( 'Hover', 'essential-addons-elementor' ),
            ]
        );
        
        $this->add_control(
            'grayscale_hover',
            [
                'label'                 => __( 'Grayscale', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SWITCHER,
                'default'               => 'no',
                'label_on'              => __( 'Yes', 'essential-addons-elementor' ),
                'label_off'             => __( 'No', 'essential-addons-elementor' ),
                'return_value'          => 'yes',
            ]
        );
        
        $this->add_control(
            'opacity_hover',
            [
                'label'                 => __( 'Opacity', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'range'                 => [
                    'px' => [
                        'min'   => 0,
                        'max'   => 1,
                        'step'  => 0.1,
                    ],
                ],
				'selectors'             => [
					'{{WRAPPER}} .eael-logo-carousel .swiper-slide:hover img' => 'opacity: {{SIZE}};',
				],
            ]
        );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Title
         */
        $this->start_controls_section(
            'section_logo_title_style',
            [
                'label'                 => __( 'Title', 'essential-addons-elementor' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'                 => __( 'Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .eael-logo-carousel-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_spacing',
            [
                'label'                 => __( 'Margin Top', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'size_units'            => [ 'px' ],
                'range'                 => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'             => [
                    '{{WRAPPER}} .eael-logo-carousel-title' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'                  => 'title_typography',
                'label'                 => __( 'Typography', 'essential-addons-elementor' ),
                'scheme'                => Scheme_Typography::TYPOGRAPHY_4,
                'selector'              => '{{WRAPPER}} .eael-logo-carousel-title',
            ]
        );
        
        $this->end_controls_section();

        /**
         * Style Tab: Arrows
         */
        $this->start_controls_section(
            'section_arrows_style',
            [
                'label'                 => __( 'Arrows', 'essential-addons-elementor' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
                'condition'             => [
                    'arrows'        => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'arrow',
            [
                'label'                 => __( 'Choose Arrow', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::ICON,
                'label_block'           => true,
                'default'               => 'fa fa-angle-right',
                'include'               => [
                    'fa fa-angle-right',
                    'fa fa-angle-double-right',
                    'fa fa-chevron-right',
                    'fa fa-chevron-circle-right',
                    'fa fa-arrow-right',
                    'fa fa-long-arrow-right',
                    'fa fa-caret-right',
                    'fa fa-caret-square-o-right',
                    'fa fa-arrow-circle-right',
                    'fa fa-arrow-circle-o-right',
                    'fa fa-toggle-right',
                    'fa fa-hand-o-right',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'arrows_size',
            [
                'label'                 => __( 'Arrows Size', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'default'               => [ 'size' => '22' ],
                'range'                 => [
                    'px' => [
                        'min'   => 15,
                        'max'   => 100,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => [ 'px' ],
				'selectors'             => [
					'{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'font-size: {{SIZE}}{{UNIT}};',
				],
            ]
        );
        
        $this->add_responsive_control(
            'left_arrow_position',
            [
                'label'                 => __( 'Align Left Arrow', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'range'                 => [
                    'px' => [
                        'min'   => -100,
                        'max'   => 40,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => [ 'px' ],
				'selectors'         => [
					'{{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
				],
            ]
        );
        
        $this->add_responsive_control(
            'right_arrow_position',
            [
                'label'                 => __( 'Align Right Arrow', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'range'                 => [
                    'px' => [
                        'min'   => -100,
                        'max'   => 40,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => [ 'px' ],
				'selectors'         => [
					'{{WRAPPER}} .swiper-container-wrap .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
				],
            ]
        );

        $this->start_controls_tabs( 'tabs_arrows_style' );

        $this->start_controls_tab(
            'tab_arrows_normal',
            [
                'label'                 => __( 'Normal', 'essential-addons-elementor' ),
            ]
        );

        $this->add_control(
            'arrows_bg_color_normal',
            [
                'label'                 => __( 'Background Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrows_color_normal',
            [
                'label'                 => __( 'Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'                  => 'arrows_border_normal',
				'label'                 => __( 'Border', 'essential-addons-elementor' ),
				'placeholder'           => '1px',
				'default'               => '1px',
				'selector'              => '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev'
			]
		);

		$this->add_control(
			'arrows_border_radius_normal',
			[
				'label'                 => __( 'Border Radius', 'essential-addons-elementor' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_arrows_hover',
            [
                'label'                 => __( 'Hover', 'essential-addons-elementor' ),
            ]
        );

        $this->add_control(
            'arrows_bg_color_hover',
            [
                'label'                 => __( 'Background Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrows_color_hover',
            [
                'label'                 => __( 'Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrows_border_color_hover',
            [
                'label'                 => __( 'Border Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();

		$this->add_responsive_control(
			'arrows_padding',
			[
				'label'                 => __( 'Padding', 'essential-addons-elementor' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'separator'             => 'before',
			]
		);
        
        $this->end_controls_section();
        
        /**
         * Style Tab: Dots
         */
        $this->start_controls_section(
            'section_dots_style',
            [
                'label'                 => __( 'Pagination: Dots', 'essential-addons-elementor' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
                'condition'             => [
                    'dots'              => 'yes'
                ],
            ]
        );

        $this->add_control(
            'dots_position',
            [
                'label'                 => __( 'Position', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SELECT,
                'options'               => [
                   'inside'     => __( 'Inside', 'essential-addons-elementor' ),
                   'outside'    => __( 'Outside', 'essential-addons-elementor' ),
                ],
                'default'               => 'outside',
                'condition'             => [
                    'dots'              => 'yes'
                ],
            ]
        );
        
        $this->add_responsive_control(
            'dots_size',
            [
                'label'                 => __( 'Size', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'range'                 => [
                    'px' => [
                        'min'   => 2,
                        'max'   => 40,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => '',
                'selectors'             => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
                ],
                'condition'             => [
                    'dots'              => 'yes'
                ],
            ]
        );
        
        $this->add_responsive_control(
            'dots_spacing',
            [
                'label'                 => __( 'Spacing', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SLIDER,
                'range'                 => [
                    'px' => [
                        'min'   => 1,
                        'max'   => 30,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => '',
                'selectors'             => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}}',
                ],
                'condition'             => [
                    'dots'              => 'yes'
                ],
            ]
        );

        $this->start_controls_tabs( 'tabs_dots_style' );

        $this->start_controls_tab(
            'tab_dots_normal',
            [
                'label'                 => __( 'Normal', 'essential-addons-elementor' ),
                'condition'             => [
                    'dots'              => 'yes'
                ],
            ]
        );

        $this->add_control(
            'dots_color_normal',
            [
                'label'                 => __( 'Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'background: {{VALUE}};',
                ],
                'condition'             => [
                    'dots'              => 'yes'
                ],
            ]
        );

        $this->add_control(
            'active_dot_color_normal',
            [
                'label'                 => __( 'Active Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet-active' => 'background: {{VALUE}};',
                ],
                'condition'             => [
                    'dots'              => 'yes'
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'                  => 'dots_border_normal',
				'label'                 => __( 'Border', 'essential-addons-elementor' ),
				'placeholder'           => '1px',
				'default'               => '1px',
				'selector'              => '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet',
                'condition'             => [
                    'dots'              => 'yes'
                ],
			]
		);

		$this->add_control(
			'dots_border_radius_normal',
			[
				'label'                 => __( 'Border Radius', 'essential-addons-elementor' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition'             => [
                    'dots'              => 'yes'
                ],
			]
		);

		$this->add_responsive_control(
			'dots_padding',
			[
				'label'                 => __( 'Padding', 'essential-addons-elementor' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', 'em', '%' ],
                'allowed_dimensions'    => 'vertical',
				'placeholder'           => [
					'top'      => '',
					'right'    => 'auto',
					'bottom'   => '',
					'left'     => 'auto',
				],
				'selectors'             => [
					'{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullets' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition'             => [
                    'dots'              => 'yes'
                ],
			]
		);
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_dots_hover',
            [
                'label'                 => __( 'Hover', 'essential-addons-elementor' ),
                'condition'             => [
                    'dots'              => 'yes'
                ],
            ]
        );

        $this->add_control(
            'dots_color_hover',
            [
                'label'                 => __( 'Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
                ],
                'condition'             => [
                    'dots'              => 'yes'
                ],
            ]
        );

        $this->add_control(
            'dots_border_color_hover',
            [
                'label'                 => __( 'Border Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet:hover' => 'border-color: {{VALUE}};',
                ],
                'condition'             => [
                    'dots'              => 'yes'
                ],
            ]
        );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();
        
        $this->end_controls_section();

    }

    /**
	 * Render logo carousel widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'logo-carousel-wrap', 'class', 'swiper-container-wrap eael-logo-carousel-wrap' );
        
        $this->add_render_attribute( 'logo-carousel', 'class', 'swiper-container eael-logo-carousel' );
        $this->add_render_attribute( 'logo-carousel', 'class', 'swiper-container-'.esc_attr( $this->get_id() ) );
        $this->add_render_attribute( 'logo-carousel', 'data-pagination', '.swiper-pagination-'.esc_attr( $this->get_id() ) );
        $this->add_render_attribute( 'logo-carousel', 'data-arrow-next', '.swiper-button-next-'.esc_attr( $this->get_id() ) );
        $this->add_render_attribute( 'logo-carousel', 'data-arrow-prev', '.swiper-button-prev-'.esc_attr( $this->get_id() ) );

        if ( $settings['dots_position'] ) {
            $this->add_render_attribute( 'logo-carousel-wrap', 'class', 'swiper-container-wrap-dots-' . $settings['dots_position'] );
        }
        
        if ( $settings['direction'] == 'right' ) {
            $this->add_render_attribute( 'logo-carousel', 'dir', 'rtl' );
        }

        if ( $settings['grayscale_normal'] == 'yes' ) {
            $this->add_render_attribute( 'logo-carousel', 'class', 'grayscale-normal' );
        }

        if ( $settings['grayscale_hover'] == 'yes' ) {
            $this->add_render_attribute( 'logo-carousel', 'class', 'grayscale-hover' );
        }
        
        if ( ! empty( $settings['items']['size'] ) ) {
            $this->add_render_attribute( 'logo-carousel', 'data-items', $settings['items']['size'] );
        }
        if ( ! empty( $settings['items_tablet']['size'] ) ) {
            $this->add_render_attribute( 'logo-carousel', 'data-items-tablet', $settings['items_tablet']['size'] );
        }
        if ( ! empty( $settings['items_mobile']['size'] ) ) {
            $this->add_render_attribute( 'logo-carousel', 'data-items-mobile', $settings['items_mobile']['size'] );
        }
        if ( ! empty( $settings['margin']['size'] ) ) {
            $this->add_render_attribute( 'logo-carousel', 'data-margin', $settings['margin']['size'] );
        }
        if ( ! empty( $settings['margin_tablet']['size'] ) ) {
            $this->add_render_attribute( 'logo-carousel', 'data-margin-tablet', $settings['margin_tablet']['size'] );
        }
        if ( ! empty( $settings['margin_mobile']['size'] ) ) {
            $this->add_render_attribute( 'logo-carousel', 'data-margin-mobile', $settings['margin_mobile']['size'] );
        }
        if ( $settings['carousel_effect'] ) {
            $this->add_render_attribute( 'logo-carousel', 'data-effect', $settings['carousel_effect'] );
        }
        if ( ! empty( $settings['slider_speed']['size'] ) ) {
            $this->add_render_attribute( 'logo-carousel', 'data-speed', $settings['slider_speed']['size'] );
        }
        if ( $settings['autoplay'] == 'yes' && ! empty( $settings['autoplay_speed']['size'] ) ) {
            $this->add_render_attribute( 'logo-carousel', 'data-autoplay', $settings['autoplay_speed']['size'] );
        } else {
            $this->add_render_attribute( 'logo-carousel', 'data-autoplay', '999999' );
        }
        if ( $settings['infinite_loop'] == 'yes' ) {
            $this->add_render_attribute( 'logo-carousel', 'data-loop', '1' );
        }
        if ( $settings['grab_cursor'] == 'yes' ) {
            $this->add_render_attribute( 'logo-carousel', 'data-grab-cursor', '1' );
        }
        if ( $settings['arrows'] == 'yes' ) {
            $this->add_render_attribute( 'logo-carousel', 'data-arrows', '1' );
        }
        ?>
        <div <?php echo $this->get_render_attribute_string( 'logo-carousel-wrap' ); ?>>
            <div <?php echo $this->get_render_attribute_string( 'logo-carousel' ); ?>>
                <div class="swiper-wrapper">
                <?php
                    $i = 1;
                    foreach ( $settings['carousel_slides'] as $index => $item ) :
                        if ( $item['logo_carousel_slide'] ) : ?>
                            <div class="swiper-slide">
                                <div class="eael-lc-logo-wrap">
                                    <div class="eael-lc-logo">
                                        <?php
                                            if ( ! empty( $item['logo_carousel_slide']['url'] ) ) {

                                                if ( ! empty( $item['link']['url'] ) ) {

                                                    $this->add_render_attribute( 'logo-link' . $i, 'href', $item['link']['url'] );

                                                    if ( $item['link']['is_external'] ) {
                                                        $this->add_render_attribute( 'logo-link' . $i, 'target', '_blank' );
                                                    }

                                                    if ( $item['link']['nofollow'] ) {
                                                        $this->add_render_attribute( 'logo-link' . $i, 'rel', 'nofollow' );
                                                    }
                                                }

                                                if ( ! empty( $item['link']['url'] ) ) {
                                                    echo '<a ' . $this->get_render_attribute_string( 'logo-link' . $i ) . '>';
                                                }

                                                echo '<img src="' . esc_url( $item['logo_carousel_slide']['url'] ) . '">';

                                                if ( ! empty( $item['link']['url'] ) ) {
                                                    echo '</a>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        if ( ! empty( $item['logo_title'] ) ) {
                                            printf( '<%1$s class="eael-logo-carousel-title">', $settings['title_html_tag'] );
                                                if ( ! empty( $item['link']['url'] ) ) {
                                                    echo '<a ' . $this->get_render_attribute_string( 'logo-link' . $i ) . '>';
                                                }
                                                echo $item['logo_title'];
                                                if ( ! empty( $item['link']['url'] ) ) {
                                                    echo '</a>';
                                                }
                                            printf( '</%1$s>', $settings['title_html_tag'] );
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                        endif;
                        $i++;
                    endforeach;
                ?>
                </div>
            </div>
            <?php
                $this->render_dots();

                $this->render_arrows();
            ?>
        </div>
        <?php
    }

    /**
	 * Render logo carousel dots output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
    protected function render_dots() {
        $settings = $this->get_settings_for_display();

        if ( $settings['dots'] == 'yes' ) { ?>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-<?php echo esc_attr( $this->get_id() ); ?>"></div>
        <?php }
    }

    /**
	 * Render logo carousel arrows output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
    protected function render_arrows() {
        $settings = $this->get_settings_for_display();

        if ( $settings['arrows'] == 'yes' ) { ?>
            <?php
                if ( $settings['arrow'] ) {
                    $pa_next_arrow = $settings['arrow'];
                    $pa_prev_arrow = str_replace("right","left",$settings['arrow']);
                }
                else {
                    $pa_next_arrow = 'fa fa-angle-right';
                    $pa_prev_arrow = 'fa fa-angle-left';
                }
            ?>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-next-<?php echo esc_attr( $this->get_id() ); ?>">
                <i class="<?php echo esc_attr( $pa_next_arrow ); ?>"></i>
            </div>
            <div class="swiper-button-prev swiper-button-prev-<?php echo esc_attr( $this->get_id() ); ?>">
                <i class="<?php echo esc_attr( $pa_prev_arrow ); ?>"></i>
            </div>
        <?php }
    }

    /**
	 * Render logo carousel dots widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @access protected
	 */
    protected function _dots_template() {
        ?>
        <# if ( settings.dots == 'yes' ) { #>
            <div class="swiper-pagination"></div>
        <# } #>
        <?php
    }

    /**
	 * Render logo carousel arrows widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @access protected
	 */
    protected function _arrows_template() {
        ?>
        <# if ( settings.arrows == 'yes' ) { #>
            <#
                if ( settings.arrow != '' ) {
                    var eael_next_arrow = settings.arrow;
                    var eael_prev_arrow = eael_next_arrow.replace('right', "left");
                }
                else {
                    var eael_next_arrow = 'fa fa-angle-right';
                    var eael_prev_arrow = 'fa fa-angle-left';
                }
            #>
            <div class="swiper-button-next">
                <i class="{{ eael_next_arrow }}"></i>
            </div>
            <div class="swiper-button-prev">
                <i class="{{ eael_prev_arrow }}"></i>
            </div>
        <# } #>
        <?php
    }

    /**
	 * Render logo carousel widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @access protected
	 */
    protected function _content_template() {
        ?>
        <#
            var i = 1;

           view.addRenderAttribute(
                'container',
                {
                    'class': [ 'swiper-container', 'eael-logo-carousel' ],
                }
           );
           
           if ( settings.grayscale_normal == 'yes' ) {
                view.addRenderAttribute( 'container', 'class', 'grayscale-normal' );
           }
           
           if ( settings.grayscale_hover == 'yes' ) {
                view.addRenderAttribute( 'container', 'class', 'grayscale-hover' );
           }
           
           if ( settings.items.size != '' ) {
                view.addRenderAttribute( 'container', 'data-items', settings.items.size );
           }
           
           if ( settings.items_tablet.size != '' ) {
                view.addRenderAttribute( 'container', 'data-items-tablet', settings.items_tablet.size );
           }
           
           if ( settings.items_mobile.size != '' ) {
                view.addRenderAttribute( 'container', 'data-items-mobile', settings.items_mobile.size );
           }
           
           if ( settings.margin.size != '' ) {
                view.addRenderAttribute( 'container', 'data-margin', settings.margin.size );
           }
           
           if ( settings.margin_tablet.size != '' ) {
                view.addRenderAttribute( 'container', 'data-margin-tablet', settings.margin_tablet.size );
           }
           
           if ( settings.margin_mobile.size != '' ) {
                view.addRenderAttribute( 'container', 'data-margin-mobile', settings.margin_mobile.size );
           }
           
           if ( settings.autoplay == 'yes' && settings.autoplay_speed.size != '' ) {
                view.addRenderAttribute( 'container', 'data-autoplay', settings.autoplay_speed.size );
           }
           
           if ( settings.infinite_loop == 'yes' ) {
                view.addRenderAttribute( 'container', 'data-loop', '1' );
           }
           
           if ( settings.grab_cursor == 'yes' ) {
                view.addRenderAttribute( 'container', 'data-grab-cursor', '1' );
           }
           
           if ( settings.arrows == 'yes' ) {
                view.addRenderAttribute( 'container', 'data-arrows', settings.arrows );
           }
           
           view.addRenderAttribute( 'container', 'data-effect', settings.carousel_effect );
           
           if ( settings.direction == 'right' ) {
                view.addRenderAttribute( 'container', 'dir', 'rtl' );
           }
        #>
        <div class="swiper-container-wrap eael-logo-carousel-wrap swiper-container-wrap-dots-{{ settings.dots_position }}">
            <div {{{ view.getRenderAttributeString( 'container' ) }}}>
                <div class="swiper-wrapper">
                    <# _.each( settings.carousel_slides, function( item ) { #>
                        <# if ( item.logo_carousel_slide ) { #>
                            <div class="swiper-slide">
                                <div class="eael-lc-logo-wrap">
                                    <div class="eael-lc-logo">
                                        <# if ( item.logo_carousel_slide.url != '' ) { #>
                                            <# if ( item.link && item.link.url ) { #>
                                                <a href="{{ item.link.url }}">
                                            <# } #>

                                            <img src="{{ item.logo_carousel_slide.url }}">

                                            <# if ( item.link && item.link.url ) { #>
                                                </a>
                                            <# } #>
                                        <# } #>
                                    </div>
                                    <# if ( item.title != '' ) { #>
                                        <{{ settings.title_html_tag }} class="eael-logo-grid-title">
                                            <# if ( item.link && item.link.url ) { #>
                                                <a href="{{ item.link.url }}">
                                            <# } #>
                                                {{ item.title }}
                                            <# if ( item.link && item.link.url ) { #>
                                                </a>
                                            <# } #>
                                        </{{ settings.title_html_tag }}>
                                    <# } #>
                                </div>
                            </div>
                        <# } #>
                    <# i++ } ); #>
                </div>
            </div>
            <?php $this->_dots_template(); ?>
            <?php $this->_arrows_template(); ?>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Eael_Logo_Carousel() );