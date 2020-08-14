<?php
/**
* The page template file.
*
*/
   get_header(); 

?>
<div id="main-content">
<div id="page-<?php the_ID(); ?>" <?php post_class("clear"); ?>>
 <?php 
							
							if ( have_posts() ) :
							 while ( have_posts() ) : the_post(); 
							   
							?>
                            <ul class="pageing">
                            <?php get_template_part("content","article");?>
                            </ul>
            	
               <?php endwhile; endif;?>
                <div class="pagination"><?php singlepage_native_pagenavi("echo",$wp_query);?></div>
                 <div class="clear"></div>
            </div><!--END main-content-->
        </div><!--END main-->
        </div>
        
        <div id="side">
    	 	<?php get_sidebar("blog");?>
		</div>
        <div class="clear"></div>
        <div class="push"></div>
        
        </div><!--End wrapper-->

<?php get_footer(); ?>