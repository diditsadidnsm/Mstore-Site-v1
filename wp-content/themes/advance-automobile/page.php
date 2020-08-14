<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Advance Automobile
 */

get_header(); ?>

<?php do_action( 'advance_automobile_page_header' ); ?>

<main role="main" id="maincontent">
    <div class="container">
        <div class="middle-align">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_post_thumbnail(); ?>
                <h1><?php the_title(); ?></h1>
                <div class="entry-content"><?php the_content();?></div>
            <?php endwhile; // end of the loop. ?>
            <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>
            <div class="clear"></div>
        </div>
    </div>
</main>

<?php do_action( 'advance_automobile_page_footer' ); ?>

<?php get_footer(); ?>