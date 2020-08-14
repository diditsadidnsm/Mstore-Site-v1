<?php
/**
 * The template part for displaying Image content
 *
 * @package Advance Automobile
 * @subpackage advance-automobile
 * @since advance-automobile 1.0
 */
?>	
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <h1><?php the_title();?></h1>
        <div class="entry-attachment">
            <div class="attachment">
                <?php advance_automobile_the_attached_image(); ?>
            </div>

            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>    
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'advance-automobile' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>
    <?php edit_post_link( __( 'Edit', 'advance-automobile' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?> 
</article>   
<?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || '0' != get_comments_number() )
        comments_template();

    if ( is_singular( 'attachment' ) ) {
        // Parent post navigation.
        the_post_navigation( array(
            'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'advance-automobile' ),
        ) );
    }   elseif ( is_singular( 'post' ) ) {
        // Previous/next post navigation.
        the_post_navigation( array(
            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'advance-automobile' ) . '</span> ' .
                '<span class="screen-reader-text">' . __( 'Next post:', 'advance-automobile' ) . '</span> ' .
                '<span class="post-title">%title</span>',
            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'advance-automobile' ) . '</span> ' .
                '<span class="screen-reader-text">' . __( 'Previous post:', 'advance-automobile' ) . '</span> ' .
                '<span class="post-title">%title</span>',
        ) );
    }
?>