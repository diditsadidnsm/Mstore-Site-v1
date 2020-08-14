<?php

/*
*  page navigation
*
*/
function singlepage_native_pagenavi($echo,$wp_query){
    if(!$wp_query){global $wp_query;}
    global $wp_rewrite;      
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
    'base' => @add_query_arg('paged','%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'prev_text' => '&laquo; ',
    'next_text' => ' &raquo;'
    );
 
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');
 
    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array('s'=>get_query_var('s'));
    if($echo == "echo"){
    echo '<div class="page_navi">'.paginate_links($pagination).'</div>'; 
	}else
	{
	
	return '<div class="page_navi">'.paginate_links($pagination).'</div>';
	}
}


/*
*  Custom comments list
*
*/
   
  function singlepage_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ;?>">
     <div id="comment-<?php comment_ID(); ?>">
	 
	 <div class="comment-avatar"><?php echo get_avatar($comment,'52','' ); ?></div>
			<div class="comment-info">
			<div class="reply-quote">
             <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ;?>
			</div>
      <div class="comment-author vcard">
        
			<span class="fnfn"><?php printf(__('<cite> %s </cite><span class="says">says:</span>','singlepage'), get_comment_author_link()) ;?></span>
								<span class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ;?>">
<?php printf(__('%1$s at %2$s','singlepage'), get_comment_date(), get_comment_time()) ;?></a>
<?php edit_comment_link(__('(Edit)','singlepage'),'  ','') ;?></span>
				<span class="comment-meta">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ;?>">-#<?php echo $depth?></a>				</span>

      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.','singlepage') ;?></em>
         <br />
      <?php endif; ?>

     

      <?php comment_text() ;?>
</div>
   <div class="clear"></div>
     </div>
<?php
        }
		
	/*
*  wp_title filter
*
*/	
if ( ! function_exists( '_wp_render_title_tag' ) ) {		
 function singlepage_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( ' Page %s ', 'singlepage' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'singlepage_wp_title', 10, 2 );
}


if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function singlepage_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'singlepage_slug_render_title' );
}
/*
*  title filter
*
*/

function singlepage_the_title( $title ) {
if ( $title == '' ) {
  return 'Untitled';
  } else {
  return $title;
  }
}
add_filter( 'the_title', 'singlepage_the_title' );




   /**
 * sp admin sidebar
 */
 
add_action( 'optionsframework_sidebar','singlepage_options_panel_sidebar' );

function singlepage_options_panel_sidebar() { ?>
	<div id="optionsframework-sidebar">
		<div class="metabox-holder">
	    	<div class="postbox">
	    		<h3><?php _e( 'Quick Links', 'singlepage' ); ?></h3>
      			<div class="inside"> 
		          <ul>
                  <li><a href="<?php echo esc_url( 'http://www.hoothemes.com/themes/single-page.html' ); ?>" target="_blank"><?php _e( 'Upgrade to Pro', 'singlepage' ); ?></a></li>
                  <li><a href="<?php echo esc_url( 'http://www.hoothemes.com/singlepage-wordpress-theme-manual.html' ); ?>" target="_blank"><?php _e( 'Tutorials', 'singlepage' ); ?></a></li>
                  </ul>
      			</div>
	    	</div>
	  	</div>
	</div>
    <div class="clear"></div>
<?php
}


 	/*	
	*	get background 
	*	---------------------------------------------------------------------
	*/
function singlepage_get_background($args){
$background = "";
 if (is_array($args)) {
	if (isset($args['image']) && $args['image']!="") {
	$background .=  "background:url(".$args['image']. ")  ".$args['repeat']." ".$args['position']." ".$args['attachment'].";";
	}

	if(isset($args['color']) && $args['color'] !=""){
	$background .= "background-color:".$args['color'].";";
	}

	}
return $background;
}


// allow script & iframe tag within posts
function singlepage_allow_post_tags( $allowedposttags ){
    $allowedposttags['script'] = array(
        'type' => true,
        'src' => true,
        'height' => true,
        'width' => true,
    );
    $allowedposttags['iframe'] = array(
        'src' => true,
        'width' => true,
        'height' => true,
        'class' => true,
        'frameborder' => true,
        'webkitAllowFullScreen' => true,
        'mozallowfullscreen' => true,
        'allowFullScreen' => true
    );
	
	$allowedposttags["embed"] = array(
	   "src" => true,
	   "type" => true,
	   "allowfullscreen" => true,
	   "allowscriptaccess" => true,
	   "height" => true,
	   "width" => true
	  );
	
    return $allowedposttags;
}
add_filter('wp_kses_allowed_html','singlepage_allow_post_tags', 1);


 /**
 * singlepage favicon
 */

	function singlepage_favicon()
	{
	    $url =  of_get_option('favicon');
	
		$icon_link = "";
		if($url)
		{
			$type = "image/x-icon";
			if(strpos($url,'.png' )) $type = "image/png";
			if(strpos($url,'.gif' )) $type = "image/gif";
		
			$icon_link = '<link rel="icon" href="'.esc_url($url).'" type="'.$type.'">';
		}
		
		echo $icon_link;
	}
	
	 add_action( 'wp_head', 'singlepage_favicon' );


//** fonts **//

/**

* Returns an array of system fonts

* Feel free to edit this, update the font fallbacks, etc.

*/



function singlepage_options_typography_get_os_fonts() {

  // OS Font Defaults

  $os_faces = array(

      'Arial, sans-serif' => 'Arial',

      '"Avant Garde", sans-serif' => 'Avant Garde',

      'Cambria, Georgia, serif' => 'Cambria',

      'Copse, sans-serif' => 'Copse',

      'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',

      'Georgia, serif' => 'Georgia',

      '"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',

      'Tahoma, Geneva, sans-serif' => 'Tahoma'

  );

  return $os_faces;

}

/*

* Returns a typography option in a format that can be outputted as inline CSS

*/

 

function singlepage_options_typography_font_styles($option, $selectors) {

      $output = $selectors . ' {';

      $output .= ' color:' . $option['color'] .'; ';

      $output .= 'font-family:' . $option['face'] . '; ';

      $output .= 'font-weight:' . $option['style'] . '; ';

      $output .= 'font-size:' . $option['size'] . '; ';

      $output .= '}';

      $output .= "\n";

      return $output;

}

function singlepage_options_typography_font_styles2($option) {

      $output = '';

      $output .= ' color:' . $option['color'] .'; ';

      $output .= 'font-family:' . $option['face'] . '; ';

      $output .= 'font-weight:' . $option['style'] . '; ';

      $output .= 'font-size:' . $option['size'] . '; ';


      return $output;

}