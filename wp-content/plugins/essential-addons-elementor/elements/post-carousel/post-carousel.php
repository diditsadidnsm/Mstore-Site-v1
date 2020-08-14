<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Eael_Post_Grid_Carousel extends Widget_Base {

    use \Elementor\ElementsCommonFunctions;

	public function get_name() {
		return 'eael-post-carousel';
	}

	public function get_title() {
		return __( 'EA Post Carousel', 'essential-addons-elementor' );
	}

	public function get_icon() {
		return 'eicon-slider-push';
	}

	public function get_categories() {
		return [ 'essential-addons-elementor' ];
	}

	protected function _register_controls() {
		/**
		 * Query And Layout Controls!
		 * @source includes/elementor-helper.php
		 */
		$this->query_controls();
		$this->layout_controls();
        
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

        $this->end_controls_section();

        $this->start_controls_section(
            'eael_section_post_grid_style',
            [
                'label' => __( 'Post Style', 'essential-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
			'eael_post_grid_bg_color',
			[
				'label' => __( 'Post Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eael-grid-post-holder' => 'background-color: {{VALUE}}',
				]

			]
		);

        $this->add_control(
			'eael_thumbnail_overlay_color',
			[
				'label' => __( 'Thumbnail Overlay Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0, .75)',
				'selectors' => [
					'{{WRAPPER}} .eael-entry-overlay' => 'background-color: {{VALUE}}',
				]

			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_post_grid_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-grid-post-holder',
			]
		);

		$this->add_control(
			'eael_post_grid_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .eael-grid-post-holder' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_post_grid_box_shadow',
				'selector' => '{{WRAPPER}} .eael-grid-post-holder',
			]
		);


		$this->end_controls_section();

        $this->start_controls_section(
            'eael_section_typography',
            [
                'label' => __( 'Color & Typography', 'essential-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

		$this->add_control(
			'eael_post_grid_title_style',
			[
				'label' => __( 'Title Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'eael_post_grid_title_color',
			[
				'label' => __( 'Title Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#303133',
				'selectors' => [
					'{{WRAPPER}} .eael-entry-title, {{WRAPPER}} .eael-entry-title a' => 'color: {{VALUE}};',
				]

			]
		);

        $this->add_control(
			'eael_post_grid_title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#23527c',
				'selectors' => [
					'{{WRAPPER}} .eael-entry-title:hover, {{WRAPPER}} .eael-entry-title a:hover' => 'color: {{VALUE}};',
				]

			]
		);

		$this->add_responsive_control(
			'eael_post_grid_title_alignment',
			[
				'label' => __( 'Title Alignment', 'essential-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} .eael-entry-title' => 'text-align: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_post_grid_title_typography',
				'label' => __( 'Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eael-entry-title',
			]
		);

		$this->add_control(
			'eael_post_grid_excerpt_style',
			[
				'label' => __( 'Excerpt Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'eael_post_grid_excerpt_color',
			[
				'label' => __( 'Excerpt Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '',
				'selectors' => [
					'{{WRAPPER}} .eael-grid-post-excerpt p' => 'color: {{VALUE}};',
				]
			]
		);

        $this->add_responsive_control(
			'eael_post_grid_excerpt_alignment',
			[
				'label' => __( 'Excerpt Alignment', 'essential-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-grid-post-excerpt p' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_post_grid_excerpt_typography',
				'label' => __( 'Excerpt Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .eael-grid-post-excerpt p',
			]
		);


		$this->add_control(
			'eael_post_grid_meta_style',
			[
				'label' => __( 'Meta Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'eael_post_grid_meta_color',
			[
				'label' => __( 'Meta Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '',
				'selectors' => [
					'{{WRAPPER}} .eael-entry-meta, .eael-entry-meta a' => 'color: {{VALUE}};',
				]
			]
		);

        $this->add_responsive_control(
			'eael_post_grid_meta_alignment',
			[
				'label' => __( 'Meta Alignment', 'essential-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
					'stretch' => [
						'title' => __( 'Justified', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-entry-footer' => 'justify-content: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_post_grid_meta_typography',
				'label' => __( 'Meta Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .eael-entry-meta > div',
			]
		);


		$this->end_controls_section();

        $this->end_controls_tabs();
        
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
                'type'                  => Controls_Manager::SELECT,
                'label_block'           => true,
                'default'               => 'fa fa-angle-right',
                'options'               => [
                    'fa fa-angle-right'             => __( 'Angle', 'essential-addons-elementor' ),
                    'fa fa-angle-double-right'      => __( 'Double Angle', 'essential-addons-elementor' ),
                    'fa fa-chevron-right'           => __( 'Chevron', 'essential-addons-elementor' ),
                    'fa fa-chevron-circle-right'    => __( 'Chevron Circle', 'essential-addons-elementor' ),
                    'fa fa-arrow-right'             => __( 'Arrow', 'essential-addons-elementor' ),
                    'fa fa-long-arrow-right'        => __( 'Long Arrow', 'essential-addons-elementor' ),
                    'fa fa-caret-right'             => __( 'Caret', 'essential-addons-elementor' ),
                    'fa fa-caret-square-o-right'    => __( 'Caret Square', 'essential-addons-elementor' ),
                    'fa fa-arrow-circle-right'      => __( 'Arrow Circle', 'essential-addons-elementor' ),
                    'fa fa-arrow-circle-o-right'    => __( 'Arrow Circle O', 'essential-addons-elementor' ),
                    'fa fa-toggle-right'            => __( 'Toggle', 'essential-addons-elementor' ),
                    'fa fa-hand-o-right'            => __( 'Hand', 'essential-addons-elementor' ),
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
                'label'                 => __( 'Dots', 'essential-addons-elementor' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
                'condition'             => [
                    'dots'      => 'yes',
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
            ]
        );

        $this->start_controls_tabs( 'tabs_dots_style' );

        $this->start_controls_tab(
            'tab_dots_normal',
            [
                'label'                 => __( 'Normal', 'essential-addons-elementor' ),
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
			]
		);
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_dots_hover',
            [
                'label'                 => __( 'Hover', 'essential-addons-elementor' ),
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
            ]
        );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();
        
        $this->end_controls_section();
     

	}


	protected function render() {
        $settings = $this->get_settings();
		/**
		 * Setup the post arguments.
		 */
		$settings['post_style'] = 'post_carousel';
		$post_args = eael_get_post_settings( $settings );
		$query_args = EAE_Helper::get_query_args( 'eaeposts', $this->get_settings() );
		$query_args = array_merge( $query_args, $post_args );

		if( isset( $query_args['tax_query'] ) ) {
			$tax_query = $query_args['tax_query'];
		}
		/**
		 * Get posts from database.
		 */
		$posts = eael_load_more_ajax( $query_args );
		/**
		 * Set total posts.
		 */
        $total_post = $posts['count'];
		
		$this->add_render_attribute( 'eael-post-carousel-container', 'class', 'swiper-container-wrap eael-logo-carousel-wrap eael-post-grid-container' );
		$this->add_render_attribute( 'eael-post-carousel-wrap', 'class', 'swiper-container eael-post-carousel eael-post-grid' );
		$this->add_render_attribute( 'eael-post-carousel-wrap', 'class', 'swiper-container-'.esc_attr( $this->get_id() ) );
		$this->add_render_attribute( 'eael-post-carousel-wrap', 'class', 'eael-post-appender-'.esc_attr( $this->get_id() ) );
		$this->add_render_attribute( 'eael-post-carousel-wrap', 'data-pagination', '.swiper-pagination-'.esc_attr( $this->get_id() ) );
        $this->add_render_attribute( 'eael-post-carousel-wrap', 'data-arrow-next', '.swiper-button-next-'.esc_attr( $this->get_id() ) );
		$this->add_render_attribute( 'eael-post-carousel-wrap', 'data-arrow-prev', '.swiper-button-prev-'.esc_attr( $this->get_id() ) );
		if ( $settings['dots_position'] ) {
            $this->add_render_attribute( 'eael-post-carousel-container', 'class', 'swiper-container-wrap-dots-' . $settings['dots_position'] );
        }	
        ?>

		<div id="eael-post-grid-<?php echo esc_attr($this->get_id()); ?>" <?php echo $this->get_render_attribute_string( 'eael-post-carousel-container' ); ?>>
		    <div <?php echo $this->get_render_attribute_string( 'eael-post-carousel-wrap' ); ?>
				<?php
					if ( ! empty( $settings['items']['size'] ) ) {
                        echo 'data-items="' . $settings['items']['size'] . '"';
                    }
                    if ( ! empty( $settings['items_tablet']['size'] ) ) {
                        echo 'data-items-tablet="' . $settings['items_tablet']['size'] . '"';
                    }
                    if ( ! empty( $settings['items_mobile']['size'] ) ) {
                        echo 'data-items-mobile="' . $settings['items_mobile']['size'] . '"';
                    }
                    if ( ! empty( $settings['margin']['size'] ) ) {
                        echo 'data-margin="' . $settings['margin']['size'] . '"';
                    }
                    if ( ! empty( $settings['margin_tablet']['size'] ) ) {
                        echo 'data-margin-tablet="' . $settings['margin_tablet']['size'] . '"';
                    }
                    if ( ! empty( $settings['margin_mobile']['size'] ) ) {
                        echo 'data-margin-mobile="' . $settings['margin_mobile']['size'] . '"';
                    }
					if ( $settings['carousel_effect'] ) {
						echo 'data-effect="' . $settings['carousel_effect'] . '"';
					}
					if ( ! empty( $settings['slider_speed']['size'] ) ) {
						echo 'data-speed="' . $settings['slider_speed']['size'] . '"';
					}
					if ( $settings['autoplay'] == 'yes' && ! empty( $settings['autoplay_speed']['size'] ) ) {
						echo 'data-autoplay="' . $settings['autoplay_speed']['size'] . '"';
					} else {
						echo 'data-autoplay="0"';
					}
					if ( $settings['infinite_loop'] == 'yes' ) {
						echo 'data-loop="1"';
					}
					if ( $settings['grab_cursor'] == 'yes' ) {
						echo 'data-grab-cursor="1"';
					}
					if ( $settings['arrows'] == 'yes' ) {
						echo 'data-arrows="1"';
					}
					if ( $settings['dots'] == 'yes' ) {
						echo 'data-dots="1"';
					}
				?>
			>
		        <div class="swiper-wrapper">
                <?php
                    if( ! empty( $posts['content'] ) ){
                        echo $posts['content'];
                    } else {
                        echo '<p class="text-danger">Something went wrong.</p>';
                    }
                ?>
				</div>
		    </div>
		    <div class="clearfix"></div>
            <?php 
                /**
                 * Render Slider Dots!
                 */
                $this->render_dots();
                /**
                 * Render Slider Navigations!
                 */
                $this->render_arrows();
            ?>
		</div>
        <?php
	}
	//changes
	protected function render_dots() {
        $settings = $this->get_settings_for_display();

        if ( $settings['dots'] == 'yes' ) { ?>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-<?php echo esc_attr( $this->get_id() ); ?>"></div>
        <?php }
    }

    /**
	 * Render logo carousel arrows output on the frontend.
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
	
	protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Eael_Post_Grid_Carousel() );