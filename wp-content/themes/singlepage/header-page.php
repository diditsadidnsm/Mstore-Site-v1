<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php wp_head(); ?>
</head>
<body  id="page-template" <?php body_class(); ?>>
<header class="navbar navbar-onex">
 <div class="container">
 
<div class="nav navbar-header">
		<div class="logo-container text-left">
                      
					 <?php if ( of_get_option('logo')!="") { ?>
        <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url(of_get_option('logo')); ?>" class="site-logo" alt="<?php bloginfo('name'); ?>" />
        </a>
        <?php } else{?>
					<div class="name-box">
						<a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-name"><?php bloginfo('name'); ?></h1></a><br />
                         <?php if ( 'blank' != get_header_textcolor() && '' != get_header_textcolor() ){?>
						<span class="site-tagline"><?php  bloginfo('description');?></span>
                        <?php }?>
					</div>
                 <?php }?>
                    </div>
                    <?php if ( has_nav_menu( "primary" ) ) {?>
                    	<button type="button" class="navbar-toggle site-nav-toggle" data-toggle="collapse" data-target="#navbar-collapse">
      				<span class="sr-only"><?php _e('Toggle navigation','singlepage');?></span>
      				<span class="icon-bar"></span>
      				<span class="icon-bar"></span>
     				<span class="icon-bar"></span>
   				</button>
                <?php }?>
		 <nav class="site-nav main-menu" id="navbar-collapse" role="navigation">
			<?php wp_nav_menu(array('theme_location'=>'primary','depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span>', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s<li class="nav_focus">focus</li><li class="nav_default cur">default</li></ul>'));?>
		</nav>
	</div>
    </div>
    </header>