<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="content" role="main">
	<?php do_action( 'lz_computer_repair_above_slider' ); ?>

	<?php if( get_theme_mod('lz_computer_repair_slider_hide_show') != ''){ ?>
		<section id="slider">
		  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $slider_pages = array();
			      	for ( $count = 1; $count <= 4; $count++ ) {
				        $mod = intval( get_theme_mod( 'lz_computer_repair_slider' . $count ));
				        if ( 'page-none-selected' != $mod ) {
				          $slider_pages[] = $mod;
				        }
			      	}
			      	if( !empty($slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $slider_pages,
			          	'orderby' => 'post__in'
			        );
			        $query = new WP_Query( $args );
			        if ( $query->have_posts() ) :
			          $i = 1;
			    ?>     
			    <div class="carousel-inner" role="listbox">
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
			          	<a href="<?php echo esc_url( get_permalink() );?>"><img src="<?php the_post_thumbnail_url('full'); ?>"/></a>
			          	<div class="carousel-caption">
				            <div class="inner_carousel">
				              	<h2><?php the_title();?></h2>
				              	<p><?php $excerpt = get_the_excerpt(); echo esc_html( lz_computer_repair_string_limit_words( $excerpt,20 ) ); ?></p>
				            </div>
				            <div class="read-btn">
				              <a href="<?php the_permalink();?>" class="" title="<?php esc_attr_e( 'READ MORE', 'lz-computer-repair' ); ?>"><?php esc_html_e('READ MORE','lz-computer-repair'); ?>
				              </a>
					       	</div>
			          	</div>
			        </div>
			      	<?php $i++; endwhile; 
			      	wp_reset_postdata();?>
			    </div>
			    <?php else : ?>
			    <div class="no-postfound"></div>
			      <?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
			    </a>
		  	</div>  
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('lz_computer_repair_below_slider'); ?>

	<?php /*--our-services --*/?>
	<?php if( get_theme_mod('lz_computer_repair_title') != '' || get_theme_mod( 'lz_computer_repair_cat' )!= ''){ ?>
		<section id="our_services">
			<div class="container">
				<div class="service-box">
					<?php if( get_theme_mod('lz_computer_repair_title') != ''){ ?>
			    		<h3><?php echo esc_html(get_theme_mod('lz_computer_repair_title','')); ?></h3>
			    		<img src="<?php echo esc_url(get_theme_mod('lz_computer_repair_sec_border',get_template_directory_uri().'/assets/images/border.png')); ?>" alt="">
			    	<?php }?>
		            <div class="row">
			      		<?php $catData1=  get_theme_mod('lz_computer_repair_cat'); if($catData1){ 
			      		$page_query = new WP_Query(array( 'category_name' => esc_html($catData1 ,'lz-computer-repair')));?>
			        		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>	
			          			<div class="col-lg-3 col-md-6">
			          				<div class="service-section">
								      	<a href="<?php the_permalink();?>"> <img src="<?php the_post_thumbnail_url('full'); ?>"/></a>
				          				<div class="content-topic">
				          					<h4><?php the_title();?></h4>
						            		<p><?php $excerpt = get_the_excerpt(); echo esc_html( lz_computer_repair_string_limit_words( $excerpt,10 ) ); ?></p>
			            				</div>
			          				</div>
							    </div>    	
			          		<?php endwhile; 
			          	wp_reset_postdata();
			          	}?>
		      		</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</section>
	<?php }?>

	<?php do_action('lz_computer_repair_below_our_services_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	        <?php the_content(); ?>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>