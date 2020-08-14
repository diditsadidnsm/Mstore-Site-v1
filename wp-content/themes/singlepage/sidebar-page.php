<div id="sidebar-widgets">
           <?php
 if( is_active_sidebar( 'displayed_everywhere' ) ) {
	 dynamic_sidebar('displayed_everywhere');
	 }
	 if ( is_active_sidebar( 'page' ) ){
	 dynamic_sidebar( 'page' );
	 }
	 elseif( is_active_sidebar( 'default_sidebar' ) ) {
	 dynamic_sidebar('default_sidebar');
	 }
	 ?>
          
        </div><!--END sidebar-widgets-->

