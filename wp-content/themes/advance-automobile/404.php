<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Advance Automobile
 */

get_header(); ?>

<main role="main" id="maincontent" class="content-ts">
	<div class="container">
        <div class="middle-align">
			<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'advance-automobile' ), esc_html__( 'Not Found', 'advance-automobile' ) ) ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'advance-automobile' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'advance-automobile' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url() ) ?>"  class="button"><?php esc_html_e( 'Back to Home Page', 'advance-automobile' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'advance-automobile' ); ?></span></a>
        	</div>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>