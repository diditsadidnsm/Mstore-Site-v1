<div id="footer">
        	<div id="footerwrap" class="container">
            <div class="row">
            	<div class="footerwidgets col-md-3">
                	<?php dynamic_sidebar('footer-1');?>
                    </div>
                    
                    <div class="footerwidgets col-md-3">
                 <?php dynamic_sidebar('footer-2');?>
                    </div>
                    
                    <div class="footerwidgets col-md-3">
                    <?php dynamic_sidebar('footer-3');?>
                    </div>
                    
                    <div class="footerwidgets col-md-3">
                    	<?php dynamic_sidebar('footer-4');?>
                    </div>
                <div class="clear"></div>
           <!-- <span id="footer-border"></span>  -->              
                <div id="footer-navigation">
                	<ul>
                    	 <?php 
				
				for($i=0;$i<9; $i++){
					$social_icon  = of_get_option('social_icon_'.$i);
					$social_link  = of_get_option('social_link_'.$i);
					$social_title = of_get_option('social_title_'.$i);
					if($social_link !=""){
					echo '<li><a href="'.esc_url($social_link).'" target="_blank" data-toggle="tooltip" title="'.esc_attr($social_title).'"><i class="'.esc_attr($social_icon).'"></i></a></li>';
					}
					}
					?>
                    </ul>
                </div><!--END footer-navigation-->
                
                <div>
                	<span id="copyright">&copy; <?php echo date("Y");?>, <?php printf(__(' <a href="%s">MSA</a>. <a href="%s">Mall Ambassador Lantai 2 No 3 Jakarta Selatan. Telp 021 5762449 - 5762549.</a>.','singlepage'),esc_url('http://www.mstore.site/'),esc_url('http://www.mstore.site/'));?></span>
                </div><!--END copywrite-->
                </div>
            </div><!--END footerwrap-->
            <div class="clear"></div>
        </div>
       <?php wp_footer();?>
</body>
</html>