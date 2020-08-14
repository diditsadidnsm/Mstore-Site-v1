<?php
//about theme info
add_action( 'admin_menu', 'advance_automobile_abouttheme' );
function advance_automobile_abouttheme() {    	
	add_theme_page( esc_html__('About Automobile Theme', 'advance-automobile'), esc_html__('About Automobile Theme', 'advance-automobile'), 'edit_theme_options', 'advance_automobile_guide', 'advance_automobile_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function advance_automobile_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() .'/inc/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'advance_automobile_admin_theme_style');

//guidline for about theme
function advance_automobile_mostrar_guide() {
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
 <div class="wrapper-info">
	 <div class="header">
	 	<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/logo.png" >
	 	<h2><?php esc_html_e('Welcome to Advance Automobile Theme', 'advance-automobile'); ?></h2>
 		<p><?php esc_html_e('Most of our outstanding theme is elegant, responsive, multifunctional, SEO friendly has amazing features and functionalities that make them highly demanding for designers and bloggers, who ought to excel in web development domain. Our Themeshopy has got everything that an individual and group need to be successful in their venture.', 'advance-automobile'); ?></p>
		<div class="main-button">
			<a href="<?php echo esc_url( ADVANCE_AUTOMOBILE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'advance-automobile'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_AUTOMOBILE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'advance-automobile'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_AUTOMOBILE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'advance-automobile'); ?></a>
		</div>
	</div>
	<div class="button-bg">
	<button role="tab" class="tablink" onclick="openPage('Home', this, '')"><?php esc_html_e('Lite Theme Setup', 'advance-automobile'); ?></button>
	<button role="tab" class="tablink" onclick="openPage('Contact', this, '')"><?php esc_html_e('Premium Theme info', 'advance-automobile'); ?></button>
	</div>
	<div id="Home" class="tabcontent tab1">
	  	<h3><?php esc_html_e('How to set up homepage', 'advance-automobile'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( ADVANCE_AUTOMOBILE_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'advance-automobile'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_AUTOMOBILE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Support', 'advance-automobile'); ?></a>
			<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" target="_blank"><?php esc_html_e('Start Customizing', 'advance-automobile'); ?></a>
		</div>
	  	<div class="documentation">
		  	<div class="image-docs">
				<ul>
					<li> <b><?php esc_html_e('Step 1.', 'advance-automobile'); ?></b> <?php esc_html_e('Follow these instructions to setup Home page.', 'advance-automobile'); ?></li>
					<li> <b><?php esc_html_e('Step 2.', 'advance-automobile'); ?></b> <?php esc_html_e(' Create Page to set template: Go to Dashboard >> Pages >> Add New Page.Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.', 'advance-automobile'); ?></li>
				</ul>
		  	</div>
		  	<div class="doc-image">
		  		<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/home-page-template.png">	
		  	</div>
		  	<div class="clearfixed">
				<div class="doc-image1">
					<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/set-front-page.png">	
			    </div>
			    <div class="image-docs1">
				    <ul>
						<li> <b><?php esc_html_e('Step 3.', 'advance-automobile'); ?></b> <?php esc_html_e('Set the front page: Go to Setting -> Reading --> Set the front page display static page to home page', 'advance-automobile'); ?></li>
					</ul>
			  	</div>
			</div>
		</div>
	</div>

	<div id="Contact" class="tabcontent">
	 	<h3><?php esc_html_e('Premium Theme Info', 'advance-automobile'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( ADVANCE_AUTOMOBILE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'advance-automobile'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_AUTOMOBILE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'advance-automobile'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_AUTOMOBILE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'advance-automobile'); ?></a>
		</div>
	  	<div class="features-section">
	  		<div class="col-4">
	  			<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/screenshot.jpg">
	  			<p><?php esc_html_e( 'Buying this automobile WordPress theme will be the best decision for your automobile website. It is smart, resourceful, eye-catching and bold. It can serve for car dealers, car showrooms, automobile garage, car rentals, cab service, bike showroom and similar businesses. It is a responsive theme with mobile first approach, multi-browser compatible, translation ready and supports RTL writing. It supports various post formats like gallery, testimonial section, video on homepage, subscription form and others. Though this automobile WordPress theme has sufficient inner pages predesigned like about us, contact us, blog etc., but if you want you can design them on your own with the help of page builder. You can change the layout of the theme from boxed to full width to full screen. Add sidebars on one or both side and use it to display ads to get extra earning. Choose from the unlimited colours and Google fonts to change the look of the website.', 'advance-automobile' ); ?></p>
	  		</div>
	  		<div class="col-4">
	  			<h4><?php esc_html_e( 'Theme Features', 'advance-automobile' ); ?></h4>
				<ul>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Theme options using customizer API', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Responsive Design', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( '100+ Font Family Options', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Slider with a Number of Slider Images Upload Option Available.', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Support to Add Custom CSS/JS', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'SEO Friendly', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Pagination Option', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Compatible With Different WordPress Famous Plugins Like Contact Form 7 and Woocommerce', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Enable-Disable Options on All Sections', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Footer Customization Options', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Short Codes', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Background Image Option', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Page Templates', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Featured Product Images, HD Images and Video display', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Make Post About Firms News, Events, Achievements and So On.', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Left and Right Sidebar', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Sticky Post & Comment Threads', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Parallax Image-Background Section', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Customizable Home Page', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Full-Width Template', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'advance-automobile' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Social Media Feature', 'advance-automobile' ); ?></li>
				</ul>
			</div>
		</div>
	</div>

<script>
	function openPage(pageName,elmnt,color) {
	    var i, tabcontent, tablinks;
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }
	    tablinks = document.getElementsByClassName("tablink");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].style.backgroundColor = "";
	    }
	    document.getElementById(pageName).style.display = "block";
	    elmnt.style.backgroundColor = color;
	}
</script>
<?php } ?>