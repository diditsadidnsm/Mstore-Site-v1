<?php
/**
* The page template file.
*
*/
   get_header('page'); 

?>
<div id="main-content">
<div class="container">
 <?php 
							
							if ( have_posts() ) :
							 while ( have_posts() ) : the_post(); 
							 
							 $page_layout_meta = get_post_meta( get_the_ID());
							 $page_layout      = isset($page_layout_meta['page_layout'][0])?$page_layout_meta['page_layout'][0]:"full-width";
							 $show_title       = isset($page_layout_meta['show_title'][0])?$page_layout_meta['show_title'][0]:"on";
							 $show_breadcrumb  = isset($page_layout_meta['show_breadcrumb'][0])?$page_layout_meta['show_breadcrumb'][0]:"on";
							 
							 switch( $page_layout ){
							   case "left-sidebar":
								 $sidebar_class = "left col-md-3";
								 $content_class = "right col-md-9";
							   break;
							  case "right-sidebar":
								 $sidebar_class = "right col-md-3";
								 $content_class = "left col-md-9";
							   break;
							   default:
							   $sidebar_class    = "";
							   $content_class    = "";
							   break;
							 }
							?>
                            <?php if($show_breadcrumb=='on'){ ?>
<div class="breadcrumb-box">

            <?php singlepage_breadcrumb_trail(array("before"=>"","show_browse"=>false));?>
    
        </div><?php }?>

            	<div class="page-main text-center " role="main">
                <div class="container"><div class="row">
                            <article class="post-entry text-center <?php echo $content_class;?>">
                                <div class="entry-main">
                                <?php if($show_title=='on'){ ?>
                                    <div class="entry-header">
                                    <h1 class="entry-title"><?php the_title();?></h1>
                                    </div>
                                    <?php }?>
                                    <div class="entry-content">
                                       <?php the_content();?>	
                                       <?php  wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'singlepage' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );?>
                                       <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="comments-area text-left">
                             <?php
									echo '<div class="comment-wrapper">';
									comments_template(); 
									echo '</div>';
                                  ?>    
                            </div>
                            </article>
                            <?php if( $page_layout == "left-sidebar" || $page_layout == "right-sidebar" ):?>
                            <side class="<?php echo $sidebar_class;?>">
                            <?php get_sidebar("page");?>
                            </side>
                             <?php endif;?>
                        </div></div></div>
               <?php endwhile; endif;?>
                
                 <div class="clear"></div>
            </div><!--END container-->
        </div><!--END main-content-->
        
<?php get_footer(); ?>