<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_Eael_Instagram_Feed extends Widget_Base {

	public function get_name() {
		return 'eael-instafeed';
	}

	public function get_title() {
		return esc_html__( 'EA Instagram Feed', 'essential-addons-elementor' );
	}

	public function get_icon() {
		return 'fa fa-instagram';
	}

   	public function get_categories() {
		return [ 'essential-addons-elementor' ];
	}

	public function get_script_depends() {
        return [
            'eael-scripts'
        ];
    }


	protected function _register_controls() {


  		$this->start_controls_section(
  			'eael_section_instafeed_settings_account',
  			[
  				'label' => esc_html__( 'Instagram Account Settings', 'essential-addons-elementor' )
  			]
  		);

		$this->add_control(
			'eael_instafeed_access_token',
			[
				'label' => esc_html__( 'Access Token', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '4507625822.ba4c844.2608ae40c33d40fe97bffdc9bed8c9c7', 'essential-addons-elementor' ),
				'description' => '<a href="http://www.jetseotools.com/instagram-access-token/" class="eael-btn" target="_blank">Get Access Token</a>', 'essential-addons-elementor',
			]
		);

		$this->add_control(
			'eael_instafeed_user_id',
			[
				'label' => esc_html__( 'User ID', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '4507625822', 'essential-addons-elementor' ),
				'description' => '<a href="https://codeofaninja.com/tools/find-instagram-user-id" class="eael-btn" target="_blank">Get User ID</a>', 'essential-addons-elementor',
			]
		);


		$this->add_control(
			'eael_instafeed_client_id',
			[
				'label' => esc_html__( 'Client ID', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '09908b866b954358b028cc488171dadf', 'essential-addons-elementor' ),
				'description' => '<a href="https://www.instagram.com/developer/clients/manage/" class="eael-btn" target="_blank">Get Client ID</a>', 'essential-addons-elementor',
			]
		);



		$this->end_controls_section();

  		$this->start_controls_section(
  			'eael_section_instafeed_settings_content',
  			[
  				'label' => esc_html__( 'Feed Settings', 'essential-addons-elementor' )
  			]
  		);

		$this->add_control(
			'eael_instafeed_source',
			[
				'label' => esc_html__( 'Instagram Feed Source', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'user',
				'options' => [
					'user' => esc_html__( 'User', 'essential-addons-elementor' ),
					'tagged' => esc_html__( 'Hashtag', 'essential-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'eael_instafeed_hashtag',
			[
				'label' => esc_html__( 'Hashtag', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'cars', 'essential-addons-elementor' ),
				'condition' => [
					'eael_instafeed_source' => 'tagged',
				],
				'description' => 'Place the hashtag without #', 'essential-addons-elementor',
			]
		);

		$this->add_control(
			'eael_instafeed_sort_by',
			[
				'label' => esc_html__( 'Sort By', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'essential-addons-elementor' ),
					'most-recent' => esc_html__( 'Most Recent',   'essential-addons-elementor' ),
					'least-recent' => esc_html__( 'Least Recent', 'essential-addons-elementor' ),
					'most-liked' => esc_html__( 'Most Likes', 'essential-addons-elementor' ),
					'least-liked' => esc_html__( 'Least Likes', 'essential-addons-elementor' ),
					'most-commented' => esc_html__( 'Most Commented', 'essential-addons-elementor' ),
					'least-commented' => esc_html__( 'Least Commented', 'essential-addons-elementor' ),
					'random' => esc_html__( 'Random', 'essential-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'eael_instafeed_image_count',
			[
				'label' => esc_html__( 'Max Visible Images', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 12,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
			]
		);

		$this->add_control(
			'eael_instafeed_image_resolution',
			[
				'label' => esc_html__( 'Image Resolution', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'low_resolution',
				'options' => [
					'thumbnail' => esc_html__( 'Thumbnail (150x150)', 'essential-addons-elementor' ),
					'low_resolution' => esc_html__( 'Low Res (306x306)',   'essential-addons-elementor' ),
					'standard_resolution' => esc_html__( 'Standard (612x612)', 'essential-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'eael_instafeed_force_square',
			[
				'label' => esc_html__( 'Force Square Image?', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_responsive_control(
			'eael_instafeed_sq_image_size',
			[
				'label' => esc_html__( 'Image Dimension (px)', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 300,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-instafeed-square-img .eael-insta-img-wrap img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; object-fit: cover;',
				],
 				'condition' => [
					'eael_instafeed_force_square' => 'yes',
				],
			]
		);

		$this->end_controls_section();


  		$this->start_controls_section(
  			'eael_section_instafeed_settings_general',
  			[
  				'label' => esc_html__( 'General Settings', 'essential-addons-elementor' )
  			]
  		);

		$this->add_control(
			'eael_instafeed_columns',
			[
				'label' => esc_html__( 'Number of Columns', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'eael-col-4',
				'options' => [
					'eael-col-1' => esc_html__( 'Single Column', 'essential-addons-elementor' ),
					'eael-col-2' => esc_html__( 'Two Columns',   'essential-addons-elementor' ),
					'eael-col-3' => esc_html__( 'Three Columns', 'essential-addons-elementor' ),
					'eael-col-4' => esc_html__( 'Four Columns',  'essential-addons-elementor' ),
					'eael-col-5' => esc_html__( 'Five Columns',  'essential-addons-elementor' ),
					'eael-col-6' => esc_html__( 'Six Columns',   'essential-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'eael_instafeed_pagination_heading',
			[
				'label' => __( 'Pagination', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'eael_instafeed_pagination',
			[
				'label' => esc_html__( 'Enable Load More?', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'eael_instafeed_caption_heading',
			[
				'label' => __( 'Link & Content', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'eael_instafeed_caption',
			[
				'label' => esc_html__( 'Display Caption', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'show-caption',
				'default' => '',
			]
		);

		$this->add_control(
			'eael_instafeed_likes',
			[
				'label' => esc_html__( 'Display Like', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'eael_instafeed_comments',
			[
				'label' => esc_html__( 'Display Comments', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'eael_instafeed_link',
			[
				'label' => esc_html__( 'Enable Link', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'eael_instafeed_link_target',
			[
				'label' => esc_html__( 'Open in new window?', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'eael_instafeed_link' => 'yes',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'eael_section_instafeed_styles_general',
			[
				'label' => esc_html__( 'Instagram Feed Styles', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'eael_instafeed_spacing',
			[
				'label' => esc_html__( 'Padding Between Images', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .eael-insta-feed-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_instafeed_box_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-insta-feed-wrap',
			]
		);

		$this->add_control(
			'eael_instafeed_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .eael-insta-feed-wrap' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'eael_section_instafeed_styles_content',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);


		$this->add_control(
			'eael_instafeed_overlay_color',
			[
				'label' => esc_html__( 'Hover Overlay Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0, .75)',
				'selectors' => [
					'{{WRAPPER}} .eael-insta-feed-wrap::after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_instafeed_like_comments_heading',
			[
				'label' => __( 'Like & Comments Styles', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'eael_instafeed_like_comments_color',
			[
				'label' => esc_html__( 'Like &amp; Comments Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fbd800',
				'selectors' => [
					'{{WRAPPER}} .eael-insta-likes-comments > p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_instafeed_like_comments_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .eael-insta-likes-comments > p',
			]
		);

		$this->add_control(
			'eael_instafeed_caption_style_heading',
			[
				'label' => __( 'Caption Styles', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'eael_instafeed_caption_color',
			[
				'label' => esc_html__( 'Caption Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .eael-insta-info-wrap' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_instafeed_caption_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .eael-insta-info-wrap',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
            'eael_section_load_more_btn',
            [
                'label' => __( 'Load More Button Style', 'essential-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_responsive_control(
			'eael_instafeed_load_more_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-load-more-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_instafeed_load_more_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-load-more-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
	         'name' => 'eael_instafeed_load_more_btn_typography',
				'selector' => '{{WRAPPER}} .eael-load-more-button',
			]
		);

		$this->start_controls_tabs( 'eael_instafeed_load_more_btn_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'eael_instafeed_load_more_btn_normal', [ 'label' => esc_html__( 'Normal', 'essential-addons-elementor' ) ] );

			$this->add_control(
				'eael_instafeed_load_more_btn_normal_text_color',
				[
					'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .eael-load-more-button' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'eael_cta_btn_normal_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#29d8d8',
					'selectors' => [
						'{{WRAPPER}} .eael-load-more-button' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'eael_instafeed_load_more_btn_normal_border',
					'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
					'selector' => '{{WRAPPER}} .eael-load-more-button',
				]
			);

			$this->add_control(
				'eael_instafeed_load_more_btn_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .eael-load-more-button' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'eael_instafeed_load_more_btn_shadow',
					'selector' => '{{WRAPPER}} .eael-load-more-button',
					'separator' => 'before'
				]
			);

			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'eael_instafeed_load_more_btn_hover', [ 'label' => esc_html__( 'Hover', 'essential-addons-elementor' ) ] );

			$this->add_control(
				'eael_instafeed_load_more_btn_hover_text_color',
				[
					'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .eael-load-more-button:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'eael_instafeed_load_more_btn_hover_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#27bdbd',
					'selectors' => [
						'{{WRAPPER}} .eael-load-more-button:hover' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'eael_instafeed_load_more_btn_hover_border_color',
				[
					'label' => esc_html__( 'Border Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .eael-load-more-button:hover' => 'border-color: {{VALUE}};',
					],
				]

			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'eael_instafeed_load_more_btn_hover_shadow',
					'selector' => '{{WRAPPER}} .eael-load-more-button:hover',
					'separator' => 'before'
				]
			);
			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}


	protected function render( ) {

      $settings 	= $this->get_settings();
      $image_limit 	= $this->get_settings( 'eael_instafeed_image_count' );
	  $force_square = ( ($settings['eael_instafeed_force_square'] == 'yes') ? "eael-instafeed-square-img" : "" );
	  $column_count = ($settings['eael_instafeed_columns']);
	  $classes 		= $force_square . ' ' . $column_count;

	?>
	<div class="eael-instagram-feed <?php echo $classes; ?>">
		<div id="eael-instagram-feed-<?php echo esc_attr($this->get_id()); ?>" class="eael-insta-grid" data-get="<?php echo esc_attr($settings['eael_instafeed_source'] ); ?>" data-tag-name="<?php echo esc_attr($settings['eael_instafeed_hashtag'] ); ?>" data-user-id="<?php echo esc_attr($settings['eael_instafeed_user_id'] ); ?>" data-client-id="<?php echo esc_attr($settings['eael_instafeed_client_id'] ); ?>" data-access-token="<?php echo esc_attr($settings['eael_instafeed_access_token'] ); ?>" data-limit="<?php echo $image_limit['size']; ?>" data-resolution="<?php echo esc_attr($settings['eael_instafeed_image_resolution'] ); ?>" data-sort-by="<?php echo esc_attr($settings['eael_instafeed_sort_by'] ); ?>" data-target="eael-instagram-feed-<?php echo esc_attr($this->get_id()); ?>" data-link="<?php echo esc_attr($settings['eael_instafeed_link'] ); ?>" data-link-target="<?php echo esc_attr($settings['eael_instafeed_link_target'] ); ?>" data-caption="<?php echo esc_attr($settings['eael_instafeed_caption'] ); ?>" data-likes="<?php echo esc_attr($settings['eael_instafeed_likes'] ); ?>" data-comments="<?php echo esc_attr($settings['eael_instafeed_comments'] ); ?>">
		</div>
		<div class="clearfix"></div>

		<?php if ( ($settings['eael_instafeed_pagination'] == 'yes') ) { ?>
		<div class="eael-load-more-button-wrap">
			<button class="eael-load-more-button" id="eael-load-more-btn-<?php echo $this->get_id(); ?>">
				<div class="eael-btn-loader button__loader"></div>
		  		<span>Load more</span>
			</button>
		</div>
		<?php } ?>
	</div>

	<?php

	}

	protected function content_template() {

		?>


		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_Eael_Instagram_Feed() );