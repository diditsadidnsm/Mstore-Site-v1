<?php
//about theme info
add_action( 'admin_menu', 'lz_computer_repair_gettingstarted' );
function lz_computer_repair_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'lz-computer-repair'), esc_html__('About Theme', 'lz-computer-repair'), 'edit_theme_options', 'lz_computer_repair_guide', 'lz_computer_repair_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function lz_computer_repair_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'lz_computer_repair_admin_theme_style');

//guidline for about theme
function lz_computer_repair_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'lz-computer-repair' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to LZ Computer Repair WordPress Theme', 'lz-computer-repair' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'lz-computer-repair' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'lz-computer-repair' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'lz-computer-repair' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'lz-computer-repair' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'lz-computer-repair' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'lz-computer-repair' ); ?> <a href="<?php echo esc_url( LZ_COMPUTER_REPAIR_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'lz-computer-repair' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'LZ Computer Repair is an exotic WordPress theme with tremendous applications for the hardware industry and in case you are interested for the repair and maintenance website for the computers, mobile phones and tablets; this premium theme will solve the purpose. It also finds application in the area of windows and software and is an exclusive option for the maintenance and service of digital content. This premium LZ Computer Repair theme is highly suited or the businesses like electronic fixing services or the cellular repair centers. With some of the classic features like user friendliness, multipurpose nature and responsiveness, it is good for any type of repair services in the IT industry. Some of the features that make it special are the personalization options, fast page load time, parallax effect and the CTA. This theme has bootstrap framework apart from the secure and clean code making it good for the data recovery as well as the game console repairs. The theme has professionalism associated with it apart from a high quality design that is clean as well. If you are an entrepreneur in the area of smart phone business, LZ Computer Repair will suit your purpose because it is not only modern but is translation ready as well.', 'lz-computer-repair')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free LZ Computer Repair Theme', 'lz-computer-repair' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'lz-computer-repair'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( LZ_COMPUTER_REPAIR_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'lz-computer-repair'); ?></a>
			<a href="<?php echo esc_url( LZ_COMPUTER_REPAIR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'lz-computer-repair'); ?></a>
			<a href="<?php echo esc_url( LZ_COMPUTER_REPAIR_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'lz-computer-repair'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/computer-repair.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'lz-computer-repair'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'lz-computer-repair'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'lz-computer-repair'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'lz-computer-repair'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'lz-computer-repair'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'lz-computer-repair'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'lz-computer-repair'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'lz-computer-repair'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'lz-computer-repair'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'lz-computer-repair'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'lz-computer-repair'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'lz-computer-repair'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'lz-computer-repair'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>