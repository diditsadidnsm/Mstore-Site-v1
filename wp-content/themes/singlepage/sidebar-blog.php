<div id="sidebar-header">
        	<div id="header">
             <?php if ( of_get_option('logo')!="") { ?>
        <a id="logo" href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url(of_get_option('logo')); ?>" class="site-logo" alt="<?php bloginfo('name'); ?>" />
        </a>
        <?php } else{?>
					<div class="name-box">
						<a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-name"><?php bloginfo('name'); ?></h1></a>
						<span class="site-tagline"><?php echo  get_bloginfo( 'description' );?></span>
					</div>
                 <?php }?>

            </div><!--END header-->
        
           </div><!--END sidebar-header-->
           
           <div id="sidebar-widgets">
           <?php
 if( is_active_sidebar( 'displayed_everywhere' ) ) {
	 dynamic_sidebar('displayed_everywhere');
	 }
	 if ( is_active_sidebar( 'blog' ) ){
	 dynamic_sidebar( 'blog' );
	 }
	 elseif( is_active_sidebar( 'default_sidebar' ) ) {
	 dynamic_sidebar('default_sidebar');
	 }
	 ?>
          
        </div><!--END sidebar-widgets-->

