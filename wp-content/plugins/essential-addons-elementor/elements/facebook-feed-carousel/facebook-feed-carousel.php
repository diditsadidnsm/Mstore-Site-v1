<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_Eael_facebook_feed_carousel_Carousel extends Widget_Base {

	public function get_name() {
		return 'eael-facebook-feed-carousel';
	}

	public function get_title() {
		return esc_html__( 'EA Facebook Feed Carousel', 'essential-addons-elementor' );
	}

	public function get_icon() {
		return 'fa fa-facebook-official';
	}

   public function get_categories() {
		return [ 'essential-addons-elementor' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
  			'eael_section_facebook_feed_carousel_acc_settings',
  			[
  				'label' => esc_html__( 'Account Settings', 'essential-addons-elementor' )
  			]
  		);

		$this->add_control(
			'eael_facebook_feed_carousel_ac_name',
			[
				'label' => esc_html__( 'Account Name', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => '@Codetic',
				'description' => esc_html__( 'Use @ sign with your account name.', 'essential-addons-elementor' ),

			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_app_id',
			[
				'label' => esc_html__( 'App ID', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => '138195606893948',
				'description' => '<a href="https://developers.facebook.com/apps/" target="_blank">Get App ID.</a> Create or select an app and grab the App ID',
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_app_secret',
			[
				'label' => esc_html__( 'App Secret', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => '23345fce6a2d09fe968f7b44d45c3d72',
				'description' => '<a href="https://developers.facebook.com/apps/" target="_blank">Get App Secret.</a> Create or select an app and grab the App ID',
			]
		);

  		$this->end_controls_section();

		$this->start_controls_section(
  			'eael_section_facebook_feed_carousel_settings',
  			[
  				'label' => esc_html__( 'Layout Settings', 'essential-addons-elementor' )
  			]
  		);

		$this->add_control(
			'eael_facebook_feed_carousel_content_length',
			[
				'label' => esc_html__( 'Content Length', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => '400'
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_post_limit',
			[
				'label' => esc_html__( 'Post Limit', 'essential-addons-elementor' ),
				'type' => Controls_Manager::NUMBER,
				'label_block' => false,
				'default' => 10
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_media',
			[
				'label' => esc_html__( 'Show Media Elements', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'essential-addons-elementor' ),
				'label_off' => __( 'no', 'essential-addons-elementor' ),
				'default' => 'true',
				'return_value' => 'true',
			]
		);

  		$this->end_controls_section();

  		$this->start_controls_section(
  			'eael_section_facebook_feed_carousel_card_settings',
  			[
  				'label' => esc_html__( 'Card Settings', 'essential-addons-elementor' ),
  			]
  		);

  		$this->add_control(
			'eael_facebook_feed_carousel_show_avatar',
			[
				'label' => esc_html__( 'Show Avatar', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'essential-addons-elementor' ),
				'label_off' => __( 'no', 'essential-addons-elementor' ),
				'default' => 'true',
				'return_value' => 'true',
			]
		);

		$this->add_control(
            'eael_facebook_feed_carousel_avatar_style',
            [
                'label' => __( 'Avatar Style', 'essential-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'circle' => 'Circle',
                    'square' => 'Square'
                ],
                'default' => 'circle',
                'prefix_class' => 'eael-social-feed-avatar-',
                'condition' => [
                	'eael_facebook_feed_carousel_show_avatar' => 'true'
                ],
            ]
        );

		$this->add_control(
			'eael_facebook_feed_carousel_show_date',
			[
				'label' => esc_html__( 'Show Date', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'essential-addons-elementor' ),
				'label_off' => __( 'no', 'essential-addons-elementor' ),
				'default' => 'true',
				'return_value' => 'true',
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_show_read_more',
			[
				'label' => esc_html__( 'Show Read More', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'essential-addons-elementor' ),
				'label_off' => __( 'no', 'essential-addons-elementor' ),
				'default' => 'true',
				'return_value' => 'true',
			]
		);
		$this->add_control(
			'eael_facebook_feed_carousel_show_icon',
			[
				'label' => esc_html__( 'Show Icon', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'essential-addons-elementor' ),
				'label_off' => __( 'no', 'essential-addons-elementor' ),
				'default' => 'true',
				'return_value' => 'true',
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

  		/**
		 * -------------------------------------------
		 * Tab Style (Facebook Feed Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_facebook_feed_carousel_style_settings',
			[
				'label' => esc_html__( 'General Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-facebook-feed-wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_facebook_feed_carousel_container_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-facebook-feed-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_facebook_feed_carousel_container_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-facebook-feed-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_facebook_feed_carousel_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-facebook-feed-wrapper',
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-facebook-feed-wrapper' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_facebook_feed_carousel_shadow',
				'selector' => '{{WRAPPER}} .eael-facebook-feed-wrapper',
			]
		);

  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style (facebook Feed Card Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_facebook_feed_carousel_card_style_settings',
			[
				'label' => esc_html__( 'Card Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_card_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .eael-content' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_facebook_feed_carousel_card_container_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-social-feed-element .eael-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_facebook_feed_carousel_card_container_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-social-feed-element .eael-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_facebook_feed_carousel_card_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-social-feed-element .eael-content',
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_card_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .eael-content' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_facebook_feed_carousel_card_shadow',
				'selector' => '{{WRAPPER}} .eael-social-feed-element .eael-content',
			]
		);

  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style (facebook Feed Typography Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_facebook_feed_carousel_card_typo_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_title_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .author-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_facebook_feed_carousel_title_typography',
				'selector' => '{{WRAPPER}} .eael-social-feed-element .author-title',
			]
		);
		// Content Style
		$this->add_control(
			'eael_facebook_feed_carousel_content_heading',
			[
				'label' => esc_html__( 'Content Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_content_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .social-feed-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_facebook_feed_carousel_content_typography',
				'selector' => '{{WRAPPER}} .eael-social-feed-element .social-feed-text',
			]
		);

		// Content Link Style
		$this->add_control(
			'eael_facebook_feed_carousel_content_link_heading',
			[
				'label' => esc_html__( 'Link Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_content_link_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .text-wrapper a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_content_link_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .text-wrapper a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_facebook_feed_carousel_content_link_typography',
				'selector' => '{{WRAPPER}} .eael-social-feed-element .text-wrapper a',
			]
		);

  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style (facebook Feed Preloader Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_facebook_feed_carousel_card_preloader_settings',
			[
				'label' => esc_html__( 'Preloader Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_facebook_feed_carousel_preloader_size',
			[
				'label' => esc_html__( 'Size', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-loading-feed .loader' => 'width: {{SIZE}}px; height: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'eael_section_facebook_feed_carousel_preloader_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#3498db',
				'selectors' => [
					'{{WRAPPER}} .eael-loading-feed .loader' => 'border-top-color: {{VALUE}};',
				],
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


	protected function render( ) {

      	$settings = $this->get_settings();

		$this->add_render_attribute( 'eael-facebook-feed-wrapper-carousel', 'data-facebook-feed-carousel-ac', $settings['eael_facebook_feed_carousel_ac_name'] );
		$this->add_render_attribute( 'eael-facebook-feed-wrapper-carousel', 'data-facebook-feed-carousel-post-limit', $settings['eael_facebook_feed_carousel_post_limit'] );
		$this->add_render_attribute( 'eael-facebook-feed-wrapper-carousel', 'data-facebook-feed-carousel-app-id', $settings['eael_facebook_feed_carousel_app_id'] );
		$this->add_render_attribute( 'eael-facebook-feed-wrapper-carousel', 'data-facebook-feed-carousel-app-secret', $settings['eael_facebook_feed_carousel_app_secret'] );
		$this->add_render_attribute( 'eael-facebook-feed-wrapper-carousel', 'data-facebook-feed-carousel-length', $settings['eael_facebook_feed_carousel_content_length'] );
		$this->add_render_attribute( 'eael-facebook-feed-wrapper-carousel', 'data-facebook-feed-carousel-media', $settings['eael_facebook_feed_carousel_media'] );
		$this->add_render_attribute( 'eael-facebook-feed-wrapper-carousel', 'data-facebook-feed-carousel-id', esc_attr($this->get_id()) );

		$this->add_render_attribute( 'eael-facebook-feed-carousel-container', 'class', 'swiper-container-wrap' );
		$this->add_render_attribute( 'eael-facebook-feed-carousel-wrap', 'class', 'swiper-container eael-facebook-feed-carousel-nav' );
		$this->add_render_attribute( 'eael-facebook-feed-carousel-wrap', 'class', 'swiper-container-'.esc_attr( $this->get_id() ) );
		$this->add_render_attribute( 'eael-facebook-feed-carousel-wrap', 'class', 'eael-post-appender-'.esc_attr( $this->get_id() ) );
		$this->add_render_attribute( 'eael-facebook-feed-carousel-wrap', 'data-pagination', '.swiper-pagination-'.esc_attr( $this->get_id() ) );
        $this->add_render_attribute( 'eael-facebook-feed-carousel-wrap', 'data-arrow-next', '.swiper-button-next-'.esc_attr( $this->get_id() ) );
		$this->add_render_attribute( 'eael-facebook-feed-carousel-wrap', 'data-arrow-prev', '.swiper-button-prev-'.esc_attr( $this->get_id() ) );
		if ( $settings['dots_position'] ) {
            $this->add_render_attribute( 'eael-facebook-feed-carousel-container', 'class', 'swiper-container-wrap-dots-' . $settings['dots_position'] );
        }		
?>
	<div class="eael-facebook-feed-wrapper eael-facebook-feed-carousel-wrapper" <?php echo $this->get_render_attribute_string( 'eael-facebook-feed-wrapper-carousel' ); ?>>
		<div <?php echo $this->get_render_attribute_string( 'eael-facebook-feed-carousel-container' ); ?> >
			<div <?php echo $this->get_render_attribute_string( 'eael-facebook-feed-carousel-wrap' ); ?>
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
				?>>
				<div id="eael-facebook-feed-<?php echo esc_attr($this->get_id()); ?>" class="eael-facebook-feed-container swiper-wrapper eael-facebook-feed-main-carousel-container"></div>
			</div>
			<div class="clearfix"></div>
				<?php
						$this->render_dots();

						$this->render_arrows();
				?>
		</div>
		<div class="eael-loading-feed"><div class="loader"></div></div>
	</div>



	<?php
		echo '<style>';
		// Show Avatar
		if( $settings['eael_facebook_feed_carousel_show_avatar'] == 'true' ) {
			echo '.eael-social-feed-element .auth-img { display: block; }';
		}else {
			echo '.eael-social-feed-element .auth-img { display: none; }';
		}
		// Show Date
		if( $settings['eael_facebook_feed_carousel_show_date'] == 'true' ) {
			echo '.eael-social-feed-element .social-feed-date { display: block;  }';
		}else {
			echo '.eael-social-feed-element .social-feed-date { display: none;  }';
		}
		//  Show Read More
		 if( $settings['eael_facebook_feed_carousel_show_read_more'] == 'true' ) {
		 	echo '.eael-social-feed-element .read-more-link { display: block }';
		 }else {
		 	echo '.eael-social-feed-element .read-more-link { display: none !important; }';
		 }

		 //  Show Icon
		 if( $settings['eael_facebook_feed_carousel_show_icon'] == 'true' ) {
		 	echo '.eael-social-feed-element .social-feed-icon { display: inline-block }';
		 }else {
		 	echo '.eael-social-feed-element .social-feed-icon { display: none !important; }';
		 }

		echo '</style>';
	}

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

	protected function content_template() {''

		?>


		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_Eael_facebook_feed_carousel_Carousel() );