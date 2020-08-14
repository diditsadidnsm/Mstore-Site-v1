<?php
namespace Elementor;

// Elementor Pro Classes
use ElementorPro\Modules\QueryControl\Controls\Group_Control_Posts;
use ElementorPro\Modules\QueryControl\Module;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_Eael_Dynamic_Filterable_Gallery extends Widget_Base {

	use \Elementor\ElementsCommonFunctions;

	protected $tax_query = [];

	public function get_name() {
		return 'eael-dynamic-filterable-gallery';
	}

	public function get_title() {
		return esc_html__( 'EA Dynamic Gallery', 'essential-addons-elementor' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

   public function get_categories() {
		return [ 'essential-addons-elementor' ];
	}

	protected function _register_controls() {

		/**
  		 * Filter Gallery Settings
  		 */
  		$this->start_controls_section(
  			'eael_section_fg_settings',
  			[
  				'label' => esc_html__( 'Dynamic Gallery Settings', 'essential-addons-elementor' )
  			]
  		);

		$this->add_control(
			'eael_fg_filter_duration',
			[
				'label' => esc_html__( 'Animation Duration (ms)', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => 500,
			]
		);

		$this->add_control(
			'eael_fg_filter_animation_style',
			[
				'label' => esc_html__( 'Animation Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'essential-addons-elementor' ),
					'effect-in' => esc_html__( 'Fade In', 'essential-addons-elementor' ),
					'effect-out' => esc_html__( 'Fade Out', 'essential-addons-elementor' ),
				],
			]
		);

  		$this->add_control(
			'eael_fg_columns',
			[
				'label' => esc_html__( 'Number of Columns', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'eael-col-3',
				'options' => [
					'eael-col-1' => esc_html__( 'Single Column', 'essential-addons-elementor' ),
					'eael-col-2' => esc_html__( 'Two Columns',   'essential-addons-elementor' ),
					'eael-col-3' => esc_html__( 'Three Columns', 'essential-addons-elementor' ),
					'eael-col-4' => esc_html__( 'Four Columns',  'essential-addons-elementor' ),
					'eael-col-5' => esc_html__( 'Five Columns',  'essential-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'eael_fg_grid_style',
			[
				'label' => esc_html__( 'Grid Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'eael-hoverer',
				'options' => [
					'eael-hoverer' 	=> esc_html__( 'Hoverer', 'essential-addons-elementor' ),
					'eael-tiles' 	=> esc_html__( 'Tiles',   'essential-addons-elementor' ),
					'eael-cards' 	=> esc_html__( 'Cards', 'essential-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'eael_fg_grid_hover_style',
			[
				'label' => esc_html__( 'Hover Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'eael-zoom-in',
				'options' => [
					'eael-zoom-in' 		=> esc_html__( 'Zoom In', 'essential-addons-elementor' ),
					'eael-slide-left' 	=> esc_html__( 'Slide In Left',   'essential-addons-elementor' ),
					'eael-slide-right' 	=> esc_html__( 'Slide In Right', 'essential-addons-elementor' ),
					'eael-slide-top' 	=> esc_html__( 'Slide In Top', 'essential-addons-elementor' ),
					'eael-slide-bottom' => esc_html__( 'Slide In Bottom', 'essential-addons-elementor' ),
				],
			]
		);

  		$this->add_control(
			'eael_section_fg_zoom_icon',
			[
				'label' => esc_html__( 'Zoom Icon', 'essential-addons-elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-search-plus',
			]
		);

		$this->add_control(
			'eael_section_fg_link_icon',
			[
				'label' => esc_html__( 'Link Icon', 'essential-addons-elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-link',
			]
		);

  		$this->end_controls_section();

  		/**
		 * Query And Layout Controls!
		 * @source includes/elementor-helper.php
		 */
		$this->query_controls();

		/**
  		 * Filter Gallery Content Settings
  		 */
  		$this->start_controls_section(
  			'eael_section_fg_control_settings',
  			[
  				'label' => esc_html__( 'Settings', 'essential-addons-elementor' )
  			]
		);
		  
		$this->add_control(
			'eael_fg_all_label_text',
			[
				'label'		=> esc_html__( 'Gallery All Label', 'essential-addons-elementor' ),
				'type'		=> Controls_Manager::TEXT,
				'default'	=> 'All',
			]
		);

	    

        $this->add_control(
            'eael_post_excerpt',
            [
                'label' => __( 'Post Excerpt Length', 'essential-addons-elementor' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '12'
            ]
        );

  		$this->end_controls_section();

  		/**
  		 * Filter Gallery Popup Settings
  		 */
  		$this->start_controls_section(
  			'eael_section_fg_popup_settings',
  			[
  				'label' => esc_html__( 'Popup Settings', 'essential-addons-elementor' )
  			]
  		);

  		$this->add_control(
		  'eael_fg_show_popup',
		  	[
				'label' => __( 'Show Popup', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => esc_html__( 'Yes', 'essential-addons-elementor' ),
				'label_off' => esc_html__( 'No', 'essential-addons-elementor' ),
				'return_value' => 'true',
		  	]
		);

		$this->add_control(
		  'eael_fg_show_popup_gallery',
		  	[
				'label' => __( 'Show Popup Gallery', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => esc_html__( 'Yes', 'essential-addons-elementor' ),
				'label_off' => esc_html__( 'No', 'essential-addons-elementor' ),
				'return_value' => 'true',
				'condition' => [
					'eael_fg_show_popup' => 'true'
				]
		  	]
		);

  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style (Filterable Gallery Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_fg_style_settings',
			[
				'label' => esc_html__( 'General Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_fg_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eael-filter-gallery-wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_fg_container_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-filter-gallery-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_fg_container_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-filter-gallery-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_fg_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-filter-gallery-wrapper',
			]
		);

		$this->add_control(
			'eael_fg_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-filter-gallery-wrapper' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_fg_shadow',
				'selector' => '{{WRAPPER}} .eael-filter-gallery-wrapper',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Filterable Gallery Control Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_fg_control_style_settings',
			[
				'label' => esc_html__( 'Control Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_responsive_control(
			'eael_fg_control_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-filter-gallery-control ul li a.control' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_fg_control_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-filter-gallery-control ul li a.control' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
	         'name' => 'eael_fg_control_typography',
				'selector' => '{{WRAPPER}} .eael-filter-gallery-control ul li a.control',
			]
		);
		// Tabs
		$this->start_controls_tabs( 'eael_fg_control_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'eael_fg_control_normal', [ 'label' => esc_html__( 'Normal', 'essential-addons-elementor' ) ] );

			$this->add_control(
				'eael_fg_control_normal_text_color',
				[
					'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#444',
					'selectors' => [
						'{{WRAPPER}} .eael-filter-gallery-control ul li a.control' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'eael_fg_control_normal_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .eael-filter-gallery-control ul li a.control' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'eael_fg_control_normal_border',
					'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
					'selector' => '{{WRAPPER}} .eael-filter-gallery-control ul li a.control',
				]
			);

			$this->add_control(
				'eael_fg_control_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 20
					],
					'range' => [
						'px' => [
							'max' => 30,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .eael-filter-gallery-control ul li > a.control' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'eael_fg_control_shadow',
					'selector' => '{{WRAPPER}} .eael-filter-gallery-control ul li a.control',
					'separator' => 'before'
				]
			);

			$this->end_controls_tab();

			// Active State Tab
			$this->start_controls_tab( 'eael_cta_btn_hover', [ 'label' => esc_html__( 'Active', 'essential-addons-elementor' ) ] );

			$this->add_control(
				'eael_fg_control_active_text_color',
				[
					'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .eael-filter-gallery-control ul li a.control.mixitup-control-active' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'eael_fg_control_active_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#3F51B5',
					'selectors' => [
						'{{WRAPPER}} .eael-filter-gallery-control ul li a.control.mixitup-control-active' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'eael_fg_control_active_border',
					'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
					'selector' => '{{WRAPPER}} .eael-filter-gallery-control ul li a.control.mixitup-control-active',
				]
			);

			$this->add_control(
				'eael_fg_control_active_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 20
					],
					'range' => [
						'px' => [
							'max' => 30,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .eael-filter-gallery-control ul li > a.control.mixitup-control-active' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'eael_fg_control_active_shadow',
					'selector' => '{{WRAPPER}} .eael-filter-gallery-control ul li a.control.mixitup-control-active',
					'separator' => 'before'
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Filterable Gallery Item Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_fg_item_style_settings',
			[
				'label' => esc_html__( 'Item Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_fg_item_bg_color',
			[
				'label' => __( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#e5e5e5',
				'selectors' => [
					'{{WRAPPER}} .eael-filter-gallery-container .item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .eael-filter-gallery-container .item .item-img' => 'background-color: {{VALUE}}',
				]

			]
		);

		$this->add_responsive_control(
			'eael_fg_item_container_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-filter-gallery-container .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_fg_item_container_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-filter-gallery-container .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_fg_item_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-filter-gallery-container .item',
			]
		);

		$this->add_control(
			'eael_fg_item_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-filter-gallery-container .item' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_fg_item_shadow',
				'selector' => '{{WRAPPER}} .eael-filter-gallery-container .item',
			]
		);

		$this->end_controls_section();
		/**
		 * -------------------------------------------
		 * Tab Style (Filterable Gallery Item Caption Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_fg_item_cap_style_settings',
			[
				'label' => esc_html__( 'Item Caption Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_fg_item_cap_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0.7)',
				'selectors' => [
					'{{WRAPPER}} .eael-filter-gallery-container .item .caption' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_fg_item_cap_container_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-filter-gallery-container .item .caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_fg_item_cap_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-filter-gallery-container .item .caption',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_fg_item_cap_shadow',
				'selector' => '{{WRAPPER}} .eael-filter-gallery-container .item .caption',
			]
		);

		$this->add_control(
			'eael_fg_item_caption_hover_icon',
			[
				'label' => esc_html__( 'Hover Icon', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'eael_fg_item_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ff622a',
				'selectors' => [
					'{{WRAPPER}} .eael-filter-gallery-container .item .caption a' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_fg_item_icon_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eael-filter-gallery-container .item .caption a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Filterable Gallery Item Content Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_fg_item_content_style_settings',
			[
				'label' => esc_html__( 'Item Content Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
	 			'condition' => [
	 				'eael_fg_grid_style' => 'eael-cards'
	 			]
			]
		);

		$this->add_control(
			'eael_fg_item_content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f2f2f2',
				'selectors' => [
					'{{WRAPPER}} .eael-filter-gallery-container.eael-cards .item-content' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_fg_item_content_container_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-filter-gallery-container.eael-cards .item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_fg_item_content_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-filter-gallery-container.eael-cards .item-content',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_fg_item_content_shadow',
				'selector' => '{{WRAPPER}} .eael-filter-gallery-container.eael-cards .item-content',
			]
		);

		$this->add_control(
			'eael_fg_item_content_title_typography_settings',
			[
				'label' => esc_html__( 'Title Typography', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'eael_fg_item_content_title_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#F56A6A',
				'selectors' => [
					'{{WRAPPER}} .eael-filter-gallery-container.eael-cards .item-content .title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_fg_item_content_title_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#3F51B5',
				'selectors' => [
					'{{WRAPPER}} .eael-filter-gallery-container.eael-cards .item-content .title a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             	'name' => 'eael_fg_item_content_title_typography',
				'selector' => '{{WRAPPER}} .eael-filter-gallery-container.eael-cards .item-content .title a',
			]
		);

		$this->add_control(
			'eael_fg_item_content_text_typography_settings',
			[
				'label' => esc_html__( 'Content Typography', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'eael_fg_item_content_text_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#444',
				'selectors' => [
					'{{WRAPPER}} .eael-filter-gallery-container.eael-cards .item-content p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             	'name' => 'eael_fg_item_content_text_typography',
				'selector' => '{{WRAPPER}} .eael-filter-gallery-container.eael-cards .item-content p',
			]
		);

		$this->add_responsive_control(
			'eael_fg_item_content_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'essential-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'separator' => 'before',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'prefix_class' => 'eael-fg-content-align-',
			]
		);

		$this->end_controls_section();
	}

	protected function render( ) {

        $settings = $this->get_settings();
		/**
		 * Setup the post arguments.
		 */
		$settings['post_style'] = 'dynamic_gallery';
		$settings['control_id'] = $this->get_id();
		$post_args = eael_get_post_settings( $settings );
		$query_args = EAE_Helper::get_query_args( 'eaeposts', $this->get_settings() );
		$query_args = array_merge( $query_args, $post_args );

		if( isset( $query_args['tax_query'] ) && count( $query_args['tax_query'] ) ) {
			$this->tax_query = $query_args['tax_query'];
			
		}

   		/**
   		 * Filter Gallery Animation
   		 */
   		if( $settings['eael_fg_filter_animation_style'] == 'default' ) {
   			$fg_animation = 'fade translateZ(-100px)';
   		}elseif( $settings['eael_fg_filter_animation_style'] == 'effect-in' ) {
   			$fg_animation = 'fade translateY(-100%)';
   		}elseif( $settings['eael_fg_filter_animation_style'] == 'effect-out' ) {
   			$fg_animation = 'fade translateY(-100%)';
   		}

   		/**
   		 * Posts
   		 */
   		$posts = eael_load_more_ajax( $query_args );
	?>
		<div id="eael-filter-gallery-wrapper-<?php echo esc_attr( $this->get_id() ); ?>" class="eael-filter-gallery-wrapper" data-grid-style="<?php echo $settings['eael_fg_grid_style']; ?>" data-duration="<?php if( !empty( $settings['eael_fg_filter_duration'] ) ) : echo $settings['eael_fg_filter_duration']; else: echo '500'; endif; ?>" data-efects="<?php echo $fg_animation; ?>" data-popup="<?php echo $settings['eael_fg_show_popup']; ?>" data-gallery-enabled="<?php if( 'true' == $settings['eael_fg_show_popup_gallery'] ) : echo 'true'; else: echo 'false'; endif; ?>">
			<div class="eael-filter-gallery-control">
	            <ul>
	                <li><a href="javascript:;" class="control" data-filter="all"><?php echo ( isset($settings['eael_fg_all_label_text']) && ! empty($settings['eael_fg_all_label_text']) ? esc_attr($settings['eael_fg_all_label_text']) : 'All'); ?></a></li>
	                <?php 
	                	if( count( $this->all_terms() ) ) : 
				            foreach( $this->all_terms() as $taxonomy => $value ) {
				            	foreach( $value as $term_id ) {
				            		$category = get_term( $term_id, $taxonomy );
				            		echo '<li><a href="javascript:;" class="control" data-filter=".'. esc_attr( $category->slug ) .'">'. ucfirst( $category->name ) .'</a></li>';
				            	}
				            }
				        endif;
			        ?>
	            </ul>
	        </div>
	        <div class="eael-filter-gallery-container 
	        	 <?php echo esc_attr( $settings['eael_fg_grid_style'] ); ?> 
	        	 <?php echo esc_attr( $settings['eael_fg_columns'] ); ?>" 
	        	 data-ref="mixitup-container-<?php echo esc_attr( $this->get_id() ); ?>">
				<?php
					if( $posts['count'] ) :
						echo $posts['content'];
					else :
						echo 'Something going wrong.';
					endif;
				?>
	        </div>
       <script>
            jQuery(document).ready( function($) {

            var containerEl = document.querySelector('#eael-filter-gallery-wrapper-<?php echo esc_attr( $this->get_id() ); ?>');
            var mixer = mixitup(containerEl, {
            	controls: {
                    scope: 'local'
                },
                selectors: {
                    target: '[data-ref~="mixitup-target-<?php echo esc_attr( $this->get_id() ); ?>"]'
                },
                animation: {
                    enable: true,
                    duration: '<?php if( !empty( $settings['eael_fg_filter_duration'] ) ) : echo $settings['eael_fg_filter_duration']; else: echo '500'; endif; ?>',
                    effects: '<?php echo $fg_animation; ?>',
                    easing: 'cubic-bezier(0.245, 0.045, 0.955, 1)',
                }
            });

            // Set Background Image
            <?php if( $settings['eael_fg_grid_style'] == 'eael-hoverer' || $settings['eael_fg_grid_style'] == 'eael-tiles' ) : ?>
				var postColumn = $( '.eael-filter-gallery-container .item' );
				postColumn.each( function() {
					let dataBg = $(this).attr( 'data-item-bg' );
					$(this).css( 'background-image', 'url( '+ dataBg +' )' );
				} );
            <?php endif; ?>
			// Magnific Popup
			<?php if( 'true' == $settings['eael_fg_show_popup'] ) : ?>
               	$('#eael-filter-gallery-wrapper-<?php echo esc_attr( $this->get_id() ); ?> .eael-magnific-link').magnificPopup({
                	type: 'image',
                  	gallery:{
                    	enabled: <?php if( 'true' == $settings['eael_fg_show_popup_gallery'] ) : echo 'true'; else: echo 'false'; endif; ?>
                  	},
                  	callbacks: {
						close: function() {
							$( '#elementor-lightbox' ).hide();
					   	}
					}
                });
            <?php endif; ?>

            });
        </script>
	<?php
	}

	protected function content_template() {}

	/**
	 * Tax Query 
	 */
	protected function all_terms(){
		foreach( $this->tax_query as $query ) {
			if( is_array( $query ) ) {
				foreach ($query as $key => $value) {
					if( 'taxonomy' == $key ) {
						$taxonomy = $value;
					}
					if( 'terms' == $key && ! empty( $taxonomy ) ) {
						$this->all_terms[ $taxonomy ] = $value;
					}
				}
			}
		}
		return $this->all_terms;
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_Eael_Dynamic_Filterable_Gallery() );