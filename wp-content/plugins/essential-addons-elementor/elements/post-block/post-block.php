<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Eael_Post_Block extends Widget_Base {

	use \Elementor\ElementsCommonFunctions;

	public function get_name() {
		return 'eael-post-block';
	}

	public function get_title() {
		return __( 'EA Post Block', 'essential-addons-elementor' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
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

        $this->start_controls_section(
            'eael_section_post_block_style',
            [
                'label' => __( 'Post Block Style', 'essential-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );


        $this->add_control(
			'eael_post_block_bg_color',
			[
				'label' => __( 'Post Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eael-post-block-item' => 'background-color: {{VALUE}}',
				]

			]
		);


        $this->add_control(
			'eael_thumbnail_overlay_color',
			[
				'label' => __( 'Thumbnail Overlay Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0, .5)',
				'selectors' => [
					'{{WRAPPER}} .eael-entry-overlay, {{WRAPPER}} .eael-post-block.post-block-style-overlay .eael-entry-wrapper' => 'background-color: {{VALUE}}',
				]

			]
		);

		$this->add_responsive_control(
			'eael_post_block_spacing',
			[
				'label' => esc_html__( 'Spacing Between Items', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .eael-post-block-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_post_block_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-post-block-item',
			]
		);

		$this->add_control(
			'eael_post_block_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .eael-post-block-item' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_post_block_box_shadow',
				'selector' => '{{WRAPPER}} .eael-post-block-item',
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
			'eael_post_block_title_style',
			[
				'label' => __( 'Title Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'eael_post_block_title_color',
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
			'eael_post_block_title_hover_color',
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
			'eael_post_block_title_alignment',
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
				'name' => 'eael_post_block_title_typography',
				'label' => __( 'Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eael-entry-title',
			]
		);

		$this->add_control(
			'eael_post_block_excerpt_style',
			[
				'label' => __( 'Excerpt Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'eael_post_block_excerpt_color',
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
			'eael_post_block_excerpt_alignment',
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
				'name' => 'eael_post_block_excerpt_typography',
				'label' => __( 'Excerpt Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .eael-grid-post-excerpt p',
			]
		);


		$this->add_control(
			'eael_post_block_meta_style',
			[
				'label' => __( 'Meta Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'eael_post_block_meta_color',
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
			'eael_post_block_meta_alignment_footer',
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
                'condition' => [
                    'meta_position' => 'meta-entry-footer',
                ]
			]
		);

        $this->add_responsive_control(
			'eael_post_block_meta_alignment_header',
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
					],
					'justify' => [
						'title' => __( 'Justified', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-entry-meta' => 'text-align: {{VALUE}};',
				],
                'condition' => [
                    'meta_position' => 'meta-entry-header',
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'eael_post_block_meta_typography',
				'label' => __( 'Meta Typography', 'essential-addons-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .eael-entry-meta > div, {{WRAPPER}} .eael-entry-meta > span',
			]
		);


		$this->end_controls_section();

		/**
		 * Load More Button Style Controls!
		 */
		$this->load_more_button_style();

	}


	protected function render( ) {
        $settings = $this->get_settings();
		/**
		 * Setup the post arguments.
		 */
		$settings['post_style'] = 'block';
		$post_args = eael_get_post_settings( $settings );
		$query_args = EAE_Helper::get_query_args( 'eaeposts', $this->get_settings() );
		$settings = $query_args = array_merge( $query_args, $post_args );

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
        ?>

		<div id="eael-post-block-<?php echo esc_attr( $this->get_id() ); ?>" class="eael-post-block <?php echo esc_attr( $settings['grid_style'] ); ?>">
		    <div class="eael-post-block-grid eael-post-appender-<?php echo esc_attr( $this->get_id() ); ?>">
		    <?php
		        if( ! empty( $posts['content'] ) ){
					echo $posts['content'];
		        } else {
					echo 'Something went wrong!';
				}
		    ?>
		    </div>
		</div>
		<?php 
			if( 1 == $settings['show_load_more'] ) : 
				if( 
					$settings['posts_per_page'] != '-1'
					&& $total_post != $settings['posts_per_page'] 
					&& $total_post > intval( $settings['offset'] ) + intval( ! empty( $settings['posts_per_page'] ) ? $settings['posts_per_page'] : 4 ) 
				) : 
		?>
		<!-- Load More Button -->
		<div class="eael-load-more-button-wrap">
			<button class="eael-load-more-button" id="eael-load-more-btn-<?php echo $this->get_id(); ?>">
				<div class="eael-btn-loader button__loader"></div>
				<span><?php echo esc_html__( $settings['show_load_more_text'], 'essential-addons-elementor' ); ?></span>
			</button>
		</div>
		<!-- Loading Lode More Js -->
		<script>
			jQuery(document).ready(function($) {

				'use strict';
				var options = {
					totalPosts: <?php echo $total_post; ?>,
					loadMoreBtn: $( '#eael-load-more-btn-<?php echo $this->get_id(); ?>' ),
					postContainer: $( '.eael-post-appender-<?php echo esc_attr( $this->get_id() ); ?>' ),
					postStyle: 'block',
				}

				var settings = {
					postType: '<?php echo $settings['post_type']; ?>',
					perPage: <?php echo $settings['posts_per_page'] != '' ? $settings['posts_per_page'] : '4'; ?>,
					postOrder: '<?php echo $settings['order']; ?>',
					orderBy: '<?php echo $settings['orderby']; ?>',
					showImage: <?php echo $settings['eael_show_image']; ?>,
					imageSize: '<?php echo $settings['image_size']; ?>',
					showTitle: <?php echo $settings['eael_show_title']; ?>,
					showExcerpt: <?php echo $settings['eael_show_excerpt']; ?>,
					showMeta: <?php echo $settings['eael_show_meta']; ?>,

					offset: <?php echo intval( $settings['offset'] ); ?>,

					metaPosition: '<?php echo $settings['meta_position']; ?>',
					excerptLength: parseInt( <?php echo $settings['eael_excerpt_length']; ?>, 10 ),
					btnText: '<?php echo $settings['show_load_more_text']; ?>',
					
					tax_query: <?php echo json_encode( ! empty( $settings['tax_query'] ) ? $settings['tax_query'] : [] ); ?>,

					exclude_posts: <?php echo json_encode( ! empty( $settings['post__not_in'] ) ? $settings['post__not_in'] : [] ); ?>,
					post__in: <?php echo json_encode( ! empty( $settings['post__in'] ) ? $settings['post__in'] : [] ); ?>,
					grid_style: '<?php echo $settings['grid_style']; ?>',
				}

				eaelLoadMore( options, settings );
			});
		</script>
		<?php endif; endif;
	}

	protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Eael_Post_Block() );