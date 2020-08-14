<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php wp_head(); ?>
</head>
<body data-spy="scroll" id="template-site" data-target="#navbar-collapse" <?php body_class(); ?>>

<?php if(is_single()){?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php } if(is_page()){?>
<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php }?>
	<div id="wrapper">
    
      <div id="main">
        <div id="navigation">
        <div class="responsive-logo">
         <?php if ( of_get_option('logo')!="") { ?>
        <a id="logo" href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url(of_get_option('logo')); ?>" class="site-logo" alt="<?php bloginfo('name'); ?>" />
        </a>
        <?php } else{?>
					<div class="name-box">
						<a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-name"><?php bloginfo('name'); ?></h1></a><br />
                        
						<span class="site-tagline"><?php bloginfo('description');?></span>
					</div>
                 <?php }?>
        </div>
      
        <a class="navbar site-nav-toggle" href="javascript:;"><i class="fa fa-bars"></i></a> 
        <nav class="site-nav main-menu" id="navbar-collapse" role="navigation">
               <?php wp_nav_menu(array('theme_location'=>'primary','depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span>', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s<li class="nav_focus">focus</li><li class="nav_default">default</li></ul>'));?>
                </nav>
        </div>