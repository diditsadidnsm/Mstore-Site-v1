<?php
/**
 * The search results template file.
 *
 * @since singlepage 1.0.0
 */

get_header(); ?>
<div id="main-content">

<div class="breadcrumb-box">

            <?php singlepage_breadcrumb_trail(array("before"=>"","show_browse"=>false));?>
    
        </div>

		    <?php if (have_posts()) :?>
                           <ul class="pageing">
                    <?php while ( have_posts() ) : the_post(); 
					    get_template_part("content","article");
					?>
                   <?php endwhile;?>
                   </ul>
                    <div class="pagination"><?php singlepage_native_pagenavi("echo",$wp_query);?></div>
                   <?php else:?>
                   <div class="blog-list-wrap">
                   <?php _e('No results found','singlepage');?>
                   
                    <?php get_search_form(); ?> 
                   </div>
                   
                   <?php endif;?>
                        <div class="clear"></div>
                        
                         </div><!--END main-content-->
        </div><!--END main-->     		
					
                    <div id="side">
    	 	<?php get_sidebar("blog");?>
		</div>
        <div class="clear"></div>
        <div class="push"></div>
        
        </div><!--End wrapper-->
                    
		
<?php get_footer(); ?>