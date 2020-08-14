<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Superb_Landingpage
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="navigation-wrapper">
		
		<div class="site grid-container">
			<header id="masthead" class="site-header grid-x grid-padding-x">
				<div class="site-branding large-4 medium-10 small-9 cell">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
					<div class="logo-container">
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
						else :
							?>
						<div class="logo-container">
							<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
							<?php
							endif;
							$superb_landingpage_description = get_bloginfo( 'description', 'display' );
							if ( $superb_landingpage_description || is_customize_preview() ) :
								?>
							<p class="site-description"><?php echo $superb_landingpage_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>	
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation large-8 medium-2 small-3 cell">

					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						) );
						?>
					</nav><!-- #site-navigation -->
				</header><!-- #masthead -->
			</div>
		</div>

	<?php if ( get_header_image() ) : ?>
		<?php if ( is_front_page() ) : ?>

	<div class="content-wrap">
		<div class="bottom-header-wrapper">
			<img src="<?php echo esc_url(( get_header_image()) ); ?>" alt="<?php echo esc_attr(( get_bloginfo( 'title' )) ); ?>" />
		</div>
	</div>
		<?php endif; ?>

<?php endif; ?>
		<div id="page" class="site grid-container start-container-head">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'superb-landingpage' ); ?></a>
			<div id="content" class="site-content grid-x grid-padding-x">