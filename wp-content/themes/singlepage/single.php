<?php
/**
 * The Template for displaying single post.
 *
 * @since singlepage 1.0.0
 */

get_header(); ?>

<div id="main-content">
<div class="breadcrumb-box">

            <?php singlepage_breadcrumb_trail(array("before"=>"","show_browse"=>false));?>
    
        </div>

<?php if (have_posts()) :
   while ( have_posts() ) : the_post();
       
?>

        <div class="blog-detail right-aside">
                        <section class="blog-main text-left" role="main">
                            <article class="post-entry text-center">
                                <div class="entry-main">
                                 <h4 class="entry-title"><?php the_title();?></h4>
                                    <div class="blog-header">
                  <div class="entry-author"><i class="fa fa-user"></i><?php echo get_the_author_link();?></div> 
                  
                  <div class="entry-category"><i class="fa fa-file-o"></i><?php the_category(', '); ?></div>
                  
                 <div class="entry-comments"><i class="fa fa-comment"></i><?php  comments_popup_link( __('No comments yet','singlepage'), __('1 comment','singlepage'), __('% comments','singlepage'), 'comments-link', __('No comment','singlepage'));?></div>
                 <?php edit_post_link( __('Edit','singlepage'), '<div class="entry-edit"><i class="fa fa-pencil"></i>', '</div>', get_the_ID() ); ?> 
                    <div class="clear"></div>
                </div>
                                    <div class="entry-content">
                                       <?php the_content();?>	
                                       <?php  wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'singlepage' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );?>
                                    </div>
                                </div>
                            </article>
                            <div class="comments-area text-left">
                             <?php
									echo '<div class="comment-wrapper">';
									comments_template(); 
									echo '</div>';
                                  ?>    
                            </div>
                        </section>
                
        </div>
		<?php endwhile;?>
<?php endif;?>
        
             </div><!--END main-content-->
        </div>
                      <div id="side">
    	 	<?php get_sidebar("blog");?>
		</div>
   <div class="clear"></div>
        <div class="push"></div>
</div><!--End wrapper-->
</div>
<?php get_footer(); ?>