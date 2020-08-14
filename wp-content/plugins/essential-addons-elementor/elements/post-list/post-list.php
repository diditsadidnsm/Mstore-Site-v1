<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Eael_Post_List extends Widget_Base {

	use \Elementor\ElementsCommonFunctions;

	protected $all_terms = [];

	protected $tax_query = [];

	public function get_name() {
		return 'eael-post-list';
	}

	public function get_title() {
		return __( 'EA Post List', 'essential-addons-elementor' );
	}

	public function get_icon() {
		return 'eicon-post-list';
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
		$this->post_list_layout_controls();

		/**
		 * Post List Controls!
		 */
		$this->start_controls_section(
			'eael_section_post_list_featured_post_layout',
			[
				'label' => __( 'Featured Post Settings', 'essential-addons-elementor' ),
				'condition' => [
					'eael_post_list_featured_area' => 'yes'
				]
			]
		);

        $this->add_control(
            'featured_posts',
            [
                'label'             => __( 'Featured Post', 'essential-addons-elementor' ),
                'type'              => Controls_Manager::SELECT2,
				'label_block'       => true,
				'multiple'      	=> true,
				'options'           => eael_get_all_types_post(),
				'default'			=> array(),
				'condition' => [
					'eael_post_list_featured_area' => 'yes',
			 	]
            ]
		);

        $this->add_control(
            'featured_page_divider',
            [
                'type'              => Controls_Manager::RAW_HTML,
				'label_block'       => false,
				'raw'       => '<br>',
				'condition' => [
					'post_type' => 'page',
			 	]
            ]
		);
        $this->add_control(
            'featured_page',
            [
                'label'             => __( 'Featured Page', 'essential-addons-elementor' ),
                'type'              => Controls_Manager::SELECT2,
				'label_block'       => true,
				'options'           => eael_get_pages(),
				'condition' => [
					'post_type' => 'page',
					'eael_post_list_featured_area' => 'yes',
			 	]
            ]
		);

		$this->add_responsive_control(
			'eael_post_list_featured_height',
			[
				'label' => esc_html__( 'Featured Post Min Height', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
		            'size' => 450,
		        ],
				'range' => [
					'px' => [
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-featured-wrap' => 'min-height: {{SIZE}}px;',
				],
			]
		);
		$this->add_responsive_control(
			'eael_post_list_featured_width',
			[
				'label' => esc_html__( 'Featured Post Width', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
		            'size' => 30,
		        ],
				'range' => [
					'%' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-featured-wrap' => 'flex: 0 0 {{SIZE}}%;',
				],
			]
		);
		$this->add_responsive_control(
			'eael_post_list_list_width',
			[
				'label' => esc_html__( 'List Area Width', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
		            'size' => 70,
		        ],
				'range' => [
					'%' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-posts-wrap' => 'flex: 0 0 {{SIZE}}%;',
				],
			]
		);
		$this->add_control(
			'eael_post_list_featured_meta',
			[
				'label' => __( 'Show Meta', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'essential-addons-elementor' ),
				'label_off' => __( 'No', 'essential-addons-elementor' ),
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'eael_post_list_featured_title',
			[
				'label' => __( 'Show Title', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'essential-addons-elementor' ),
				'label_off' => __( 'No', 'essential-addons-elementor' ),
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'eael_post_list_featured_excerpt',
			[
				'label' => __( 'Show Excerpt', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'essential-addons-elementor' ),
				'label_off' => __( 'No', 'essential-addons-elementor' ),
				'return_value' => 'yes',
			]
		);
        $this->add_control(
            'eael_post_list_featured_excerpt_length',
            [
                'label' => __( 'Excerpt Words', 'essential-addons-elementor' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '8',
                'condition' => [
                    'eael_post_list_featured_excerpt' => 'yes',
                ]

            ]
        );
		$this->end_controls_section();

		$this->start_controls_section(
			'eael_section_post_list_post_layout',
			[
				'label' => __( 'List Post Settings', 'essential-addons-elementor' ),
			]
		);
		$this->add_control(
		  	'eael_post_list_columns',
		  	[
		   		'label'       	=> esc_html__( 'Post List Column(s)', 'essential-addons-elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'col-2',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'col-1'	=> esc_html__( '1 Column', 'essential-addons-elementor' ),
		     		'col-2'	=> esc_html__( '2 Columns', 'essential-addons-elementor' ),
		     		'col-3'	=> esc_html__( '3 Columns', 'essential-addons-elementor' ),
		     	],
		     	'prefix_class' 	=> 'eael-post-list-'
		  	]
		);
		$this->add_control(
			'eael_post_list_post_feature_image',
			[
				'label' => __( 'Show Featured Image', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'essential-addons-elementor' ),
				'label_off' => __( 'No', 'essential-addons-elementor' ),
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'eael_post_list_post_meta',
			[
				'label' => __( 'Show Meta', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'essential-addons-elementor' ),
				'label_off' => __( 'No', 'essential-addons-elementor' ),
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'eael_post_list_post_title',
			[
				'label' => __( 'Show Title', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'essential-addons-elementor' ),
				'label_off' => __( 'No', 'essential-addons-elementor' ),
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'eael_post_list_post_excerpt',
			[
				'label' => __( 'Show Excerpt', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'essential-addons-elementor' ),
				'label_off' => __( 'No', 'essential-addons-elementor' ),
				'return_value' => 'yes',
			]
		);
        $this->add_control(
            'eael_post_list_post_excerpt_length',
            [
                'label' => __( 'Excerpt Words', 'essential-addons-elementor' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '12',
                'condition' => [
                    'eael_post_list_post_excerpt' => 'yes',
                ]

            ]
        );
		$this->end_controls_section();

        $this->start_controls_section(
            'eael_section_post_list_style',
            [
                'label' => __( 'EA Post List Style', 'essential-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_control(
			'eael_post_list_container_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-container' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'eael_post_list_container_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-post-list-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'eael_post_list_container_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-post-list-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_post_list_container_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-post-list-container',
			]
		);
		$this->add_control(
			'eael_post_list_container_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-container' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_post_list_container_shadow',
				'selector' => '{{WRAPPER}} .eael-post-list-container',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'eael_section_post_list_topbar_style',
            [
                'label' => __( 'Topbar Style', 'essential-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                	'eael_post_list_topbar' => 'yes'
                ]
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_post_list_topbar_border',
				'label' => esc_html__( 'Topbar Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-post-list-header',
			]
		);
        $this->add_control(
	        'eael_section_post_list_topbar_tag_style',
	        [
	        	'label' => esc_html__( 'Title Tag', 'essential-addons-elementor' ),
	          	'type' => Controls_Manager::HEADING,
	          	'separator' => 'before'
	        ]
	    );
		$this->add_control(
			'eael_section_post_list_topbar_bg_color',
			[
				'label' => __( 'Title Tag Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#e23a47',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-header .header-title .title' => 'background-color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'eael_section_post_list_topbar_color',
			[
				'label' => __( 'Title Tag Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-header .header-title .title' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_section_post_list_topbar_tag_typo',
				'label' => __( 'Tag Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .eael-post-list-header .header-title .title',
			]
		);
		$this->add_control(
	        'eael_section_post_list_topbar_category_style',
	        [
	        	'label' => esc_html__( 'Category Filter', 'essential-addons-elementor' ),
	          	'type' => Controls_Manager::HEADING,
	          	'separator' => 'before'
	        ]
	    );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_section_post_list_topbar_category_typo',
				'label' => __( 'Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .eael-post-list-header .post-categories a',
			]
		);
	    $this->add_control(
			'eael_section_post_list_topbar_category_background_color',
			[
				'label' => __( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-header .post-categories a' => 'background-color: {{VALUE}}',
				]

			]
		);
	    $this->add_control(
			'eael_section_post_list_topbar_category_color',
			[
				'label' => __( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#5a5a5a',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-header .post-categories a' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'eael_section_post_list_topbar_category_active_background_color',
			[
				'label' => __( 'Active Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-header .post-categories a.active, {{WRAPPER}} .eael-post-list-header .post-categories a:hover' => 'background-color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'eael_section_post_list_topbar_category_active_color',
			[
				'label' => __( 'Active Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#F56A6A',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-header .post-categories a.active, {{WRAPPER}} .eael-post-list-header .post-categories a:hover' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_responsive_control(
	       	'eael_section_post_list_topbar_category_padding',
	        [
	        	'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
	         	'type' => Controls_Manager::DIMENSIONS,
	          	'size_units' => [ 'px', 'em', '%' ],
	          	'selectors' => [
	              	'{{WRAPPER}} .eael-post-list-header .post-categories a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	          	],
	        ]
	    );
		$this->add_responsive_control(
	       	'eael_section_post_list_topbar_category_margin',
	        [
	        	'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
	         	'type' => Controls_Manager::DIMENSIONS,
	          	'size_units' => [ 'px', 'em', '%' ],
	          	'selectors' => [
	              	'{{WRAPPER}} .eael-post-list-header .post-categories a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	          	],
	        ]
	    );
		$this->end_controls_section();

		$this->start_controls_section(
            'eael_section_post_list_navigation_style',
            [
                'label' => __( 'Navigation Style', 'essential-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                	'eael_post_list_pagination' => 'yes'
                ]
            ]
        );
        $this->add_control(
			'eael_section_post_list_nav_icon_color',
			[
				'label' => __( 'Icon Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-container .btn-next-post' => 'color: {{VALUE}}',
					'{{WRAPPER}} .eael-post-list-container .btn-prev-post' => 'color: {{VALUE}}',
				]

			]
		);
		$this->add_control(
			'eael_section_post_list_nav_icon_bg_color',
			[
				'label' => __( 'Icon Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-container .btn-next-post' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .eael-post-list-container .btn-prev-post' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->add_control(
			'eael_section_post_list_nav_icon_hover_color',
			[
				'label' => __( 'Icon Hover Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-container .btn-next-post:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .eael-post-list-container .btn-prev-post:hover' => 'color: {{VALUE}}',
				]
			]
		);
		$this->add_control(
			'eael_section_post_list_nav_icon_hover_bg_color',
			[
				'label' => __( 'Icon Background Hover Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-container .btn-next-post:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .eael-post-list-container .btn-prev-post:hover' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->add_responsive_control(
	        'eael_section_post_list_nav_icon_padding',
	        [
	          	'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
	          	'type' => Controls_Manager::DIMENSIONS,
	          	'size_units' => [ 'px', 'em', '%' ],
	          	'selectors' => [
	            	'{{WRAPPER}} .eael-post-list-container .btn-next-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	              	'{{WRAPPER}} .eael-post-list-container .btn-prev-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	          	],
	        ]
	    );
		$this->add_responsive_control(
	        'eael_section_post_list_nav_icon_margin',
	        [
	          	'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
	          	'type' => Controls_Manager::DIMENSIONS,
	          	'size_units' => [ 'px', 'em', '%' ],
	          	'selectors' => [
	            	'{{WRAPPER}} .eael-post-list-container .btn-next-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	              	'{{WRAPPER}} .eael-post-list-container .btn-prev-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	          	],
	        ]
	    );
	    $this->add_control(
	        'eael_section_post_list_nav_icon_border_radius',
	        [
	        	'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
	          	'type' => Controls_Manager::SLIDER,
	          	'default' => [
	            	'size' => 0,
	          	],
	          	'range' => [
	            	'px' => [
	              		'max' => 50,
	            	],
	          	],
	          	'selectors' => [
	            	'{{WRAPPER}} .eael-post-list-container .btn-next-post' => 'border-radius: {{SIZE}}px;',
	            	'{{WRAPPER}} .eael-post-list-container .btn-prev-post' => 'border-radius: {{SIZE}}px;',
	          	],
	        ]
	    );
		$this->end_controls_section();

        $this->start_controls_section(
            'eael_post_list_featured_typography',
            [
                'label' => __( 'Featured Post Style', 'essential-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		$this->add_control(
			'eael_post_list_featured_title_settings',
			[
				'label' => __( 'Title Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'eael_post_list_featured_title_color',
			[
				'label' => __( 'Title Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#fff',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-featured-wrap .featured-content .eael-post-list-title, {{WRAPPER}} .eael-post-list-featured-wrap .featured-content .eael-post-list-title a' => 'color: {{VALUE}};',
				]
			]
		);
        $this->add_control(
			'eael_post_list_featured_title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#92939b',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-featured-wrap .featured-content .eael-post-list-title:hover, {{WRAPPER}} .eael-post-list-featured-wrap .featured-content .eael-post-list-title a:hover' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_responsive_control(
			'eael_post_list_featured_title_alignment',
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
					'{{WRAPPER}} .eael-post-list-featured-wrap .featured-content .eael-post-list-title' => 'text-align: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_post_list_featured_title_typography',
				'label' => __( 'Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eael-post-list-featured-wrap .featured-content .eael-post-list-title, {{WRAPPER}} .eael-post-list-featured-wrap .featured-content .eael-post-list-title a',
			]
		);
		$this->add_control(
			'eael_post_list_featured_excerpt_style',
			[
				'label' => __( 'Excerpt Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'eael_post_list_featured_excerpt_color',
			[
				'label' => __( 'Excerpt Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#f8f8f8',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-featured-wrap .featured-content p' => 'color: {{VALUE}};',
				]
			]
		);
        $this->add_responsive_control(
			'eael_post_list_featured_excerpt_alignment',
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
					'{{WRAPPER}} .eael-post-list-featured-wrap .featured-content p' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_post_list_featured_excerpt_typography',
				'label' => __( 'Excerpt Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .eael-post-list-featured-wrap .featured-content p',
			]
		);
		$this->add_control(
			'eael_post_list_featured_meta_style',
			[
				'label' => __( 'Meta Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'eael_post_list_featured_meta_color',
			[
				'label' => __( 'Meta Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-featured-wrap .featured-content .meta' => 'color: {{VALUE}};',
				]
			]
		);
        $this->add_responsive_control(
			'eael_post_list_featured_meta_alignment',
			[
				'label' => __( 'Meta Alignment', 'essential-addons-elementor' ),
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
					'{{WRAPPER}} .eael-post-list-featured-wrap .featured-content .meta' => 'text-align: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_post_list_featured_meta_typography',
				'label' => __( 'Meta Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .eael-post-list-featured-wrap .featured-content .meta',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
            'eael_post_list_typography',
            [
                'label' => __( 'List Style', 'essential-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		$this->add_control(
			'eael_post_list_title_settings',
			[
				'label' => __( 'Title Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'eael_post_list_title_color',
			[
				'label' => __( 'Title Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#222',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-content .eael-post-list-title, {{WRAPPER}} .eael-post-list-content .eael-post-list-title a' => 'color: {{VALUE}};',
				]

			]
		);
        $this->add_control(
			'eael_post_list_title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#e65a50',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-content .eael-post-list-title:hover, {{WRAPPER}} .eael-post-list-content .eael-post-list-title a:hover' => 'color: {{VALUE}};',
				]

			]
		);
		$this->add_responsive_control(
			'eael_post_list_title_alignment',
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
					'{{WRAPPER}} .eael-post-list-content .eael-post-list-title' => 'text-align: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_post_list_title_typography',
				'label' => __( 'Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eael-post-list-content .eael-post-list-title, {{WRAPPER}} .eael-post-list-content .eael-post-list-title a',
			]
		);
		$this->add_control(
			'eael_post_list_excerpt_style',
			[
				'label' => __( 'Excerpt Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'eael_post_list_excerpt_color',
			[
				'label' => __( 'Excerpt Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-content p' => 'color: {{VALUE}};',
				]
			]
		);
        $this->add_responsive_control(
			'eael_post_list_excerpt_alignment',
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
					'{{WRAPPER}} .eael-post-list-content p' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_post_list_excerpt_typography',
				'label' => __( 'Excerpt Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .eael-post-list-content p',
			]
		);
		$this->add_control(
			'eael_post_list_meta_style',
			[
				'label' => __( 'Meta Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'eael_post_list_meta_color',
			[
				'label' => __( 'Meta Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#aaa',
				'selectors' => [
					'{{WRAPPER}} .eael-post-list-content .meta' => 'color: {{VALUE}};',
				]
			]
		);
        $this->add_responsive_control(
			'eael_post_list_meta_alignment',
			[
				'label' => __( 'Meta Alignment', 'essential-addons-elementor' ),
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
					'{{WRAPPER}} .eael-post-list-content .meta' => 'text-align: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_post_list_meta_typography',
				'label' => __( 'Meta Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .eael-post-list-content .meta',
			]
		);
		$this->end_controls_section();

	}

	protected function render( ) {
        $settings = $this->get_settings();
		/**
		 * Setup the post arguments.
		 */
		$settings['post_style'] = 'list';
		$post_args = eael_get_post_settings( $settings );
		$query_args = EAE_Helper::get_query_args( 'eaeposts', $this->get_settings() );
		$query_args = $settings = array_merge( $query_args, $post_args );

		if( isset( $query_args['tax_query'] ) ) {
			$this->tax_query = $tax_query = $query_args['tax_query'];
		}
		/**
		 * Get posts from database.
		 */
		$posts = eael_load_more_ajax( $query_args );
		/**
		 * Collect Featured Posts from user.
		 */
		$featured_posts = $this->get_settings( 'featured_posts' );
		/**
		 * Set total posts.
		 */
		$total_post = $posts['count'];

		$this->add_render_attribute(
			'post-list-wrapper-attribute',
			[
				'class' => [ 'eael-post-list-container' ],
				'data-appender' => '#eael-post-list-post-appender-' . $this->get_id(),
				'data-post_type' => $settings['post_type'],
				'data-posts_per_page' => $settings['posts_per_page'],
				'data-post__in' => json_encode( ! empty( $settings['post__in'] ) ? $settings['post__in'] : [] ),
				'data-orderby' => $settings['orderby'],
				'data-order' => $settings['order'],
				'data-total_posts' => $total_post,
				'data-offset' => $settings['offset'],

				'data-show_image' => $settings['eael_post_list_post_feature_image'],
				'data-show_meta' => $settings['eael_post_list_post_meta'],
				'data-show_title' => $settings['eael_post_list_post_title'],
				'data-show_excerpt' => $settings['eael_post_list_post_excerpt'],
				'data-excerpt_length' => $settings['eael_post_list_post_excerpt_length'],

				'data-show_featured_area' => $settings['eael_post_list_featured_area'],
				'data-show_featured_meta' => $settings['eael_post_list_featured_meta'],
				'data-show_featured_title' => $settings['eael_post_list_featured_title'],
				'data-show_featured_excerpt' => $settings['eael_post_list_featured_excerpt'],
				'data-featured_excerpt_length' => $settings['eael_post_list_featured_excerpt_length'],

				'data-featured_posts' => json_encode( ! empty( $featured_posts ) ? $featured_posts : [] ),
				'data-tax_query' => json_encode( ! empty( $query_args['tax_query'] ) ? $query_args['tax_query'] : [] ),
				'data-excluded' => json_encode( ! empty( $query_args['post__not_in'] ) ? $query_args['post__not_in'] : [] ),
				
				'data-show_nav' => $settings['eael_post_list_pagination'],
				'data-next_icon' => $settings['eael_post_list_pagination_next_icon'],
				'data-prev_icon' => $settings['eael_post_list_pagination_prev_icon'],
				'data-prev_btn' => '#post-nav-prev-' . $this->get_id(),
				'data-next_btn' => '#post-nav-next-' . $this->get_id(),
			]
		);
	?>
		<div <?php echo $this->get_render_attribute_string( 'post-list-wrapper-attribute' ); ?>>
			<?php if( $settings['eael_post_list_topbar'] === 'yes' ) : ?>
			<div class="eael-post-list-header">
				<div class="header-title">
					<h2 class="title"><?php echo esc_html__( $settings['eael_post_list_topbar_title'], 'essential-addons-elementor' ); ?></h2>
				</div>
				<?php 
				if( $settings['eael_post_list_terms'] === 'yes' ) :
					if( '' != $this->categories() || '' != $this->tags() ) :
						
						echo '<div class="post-categories">';
							echo '<a href="javascript:;" data-taxonomy="all" data-all-id=\''. json_encode( $this->all_terms() ) .'\' class="active post-list-filter-item post-list-cat-'. $this->get_id() .'">'. __( $settings['eael_post_list_topbar_term_all_text'], 'essential-addons-elementor' ) .'</a>';
							if( '' != $this->categories() ) {
								foreach( $this->categories() as $taxonomy => $category_ids ) {
									foreach ($category_ids as $id) {
										$category = get_term_by( 'term_taxonomy_id', $id, $taxonomy );
										echo '<a href="javascript:;" data-taxonomy="'. $taxonomy .'" data-id="'. $id .'" class="post-list-filter-item post-list-cat-'. $this->get_id() .'">'. $category->name .'</a>';
									}
								}
							}
							if( '' != $this->tags() ) {
								foreach( $this->tags() as $taxonomy => $tag_ids ) {
									foreach ($tag_ids as $id) {
										$tag = get_term_by( 'term_taxonomy_id', $id, $taxonomy );
										echo '<a href="javascript:;" data-taxonomy="'. $taxonomy .'" data-id="'. $id .'" class="post-list-filter-item post-list-cat-'. $this->get_id() .'">'. $tag->name .'</a>';
									}
								}
							}
						echo '</div>';
					endif;
				endif; 
				?>
			</div>
			<?php endif; ?>
			<div class="eael-post-list-wrap" id="eael-post-list-post-appender-<?php echo $this->get_id(); ?>">
				<?php 
					if( ! empty( $posts['content'] ) ) {
						echo $posts['content'];
					}
				?>
			</div>
		</div>
		<?php if( $settings['eael_post_list_pagination'] === 'yes' ) : ?>
			<div class="post-list-pagination">
				<button class="btn btn-prev-post" id="post-nav-prev-<?php echo $this->get_id(); ?>">
					<span class="<?php echo esc_attr( $settings['eael_post_list_pagination_prev_icon'] ); ?>"></span>
				</button>
				<button class="btn btn-next-post" id="post-nav-next-<?php echo $this->get_id(); ?>" >
					<span class="<?php echo esc_attr( $settings['eael_post_list_pagination_next_icon'] ); ?>"></span>
				</button>
			</div>
		<?php endif;
	}

	protected function content_template() {}

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

	protected function categories() {
		$categories = [];
		foreach ( $this->all_terms() as $key => $value) {
			if( strpos( $key, 'cat' ) !== false ) {
				$categories[ $key ] = $value;
			}
		}
		return $categories;
	}

	protected function tags() {
		$tags = [];
		foreach ( $this->all_terms() as $key => $value) {
			if( strpos( $key, 'tag' ) !== false ) {
				$tags[ $key ] = $value;
			}
		}
		return $tags;
	}

	protected function get_posts() {

		$posts_args = array(
			'post_type' => $this->get_settings('post_type'),
			'post_style' => 'all_types',
			'post_status' => 'publish',
		);
		$posts = eael_load_more_ajax( $posts_args );
	
		$post_list = [];
	
		foreach( $posts as $post ) {
			$post_list[ $post->ID ] = $post->post_title;
		}
	
		return $post_list;
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Eael_Post_List() );