<?php
/**
 * Template part for displaying page content in page.php
 * @package WordPress
 * @subpackage lz-computer-repair
 * @since 1.0
 * @version 0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header" role="banner">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php lz_computer_repair_edit_link( get_the_ID() ); ?>
	</header>
	<div class="entry-content">
		<img src="<?php the_post_thumbnail_url(); ?>">
		<p><?php the_content();?></p>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'lz-computer-repair' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>