<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Advance Automobile
 */

get_header(); ?>

<div class="container">
    <main role="main" id="maincontent" class="middle-align">
    	<?php
            $left_right = get_theme_mod( 'advance_automobile_layout_options','Right Sidebar');
            if($left_right == 'Left Sidebar'){ ?>
            <div class="row">
		    	<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
				<div class="col-lg-8 col-md-8" class="content-ts">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content-single' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next <i class="far fa-long-arrow-alt-right"></i> ', 'advance-automobile' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'advance-automobile' ) . '</span> ',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '<i class="far fa-long-arrow-alt-left"></i> Previous', 'advance-automobile' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'advance-automobile' ) . '</span> ',
							) );

						endwhile; // End of the loop.
					?>
		       	</div>
		    </div>
	    <?php }else if($left_right == 'Right Sidebar'){ ?>
	    	<div class="row">
		       	<div class="col-lg-8 col-md-8" class="content-ts">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content-single' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next <i class="far fa-long-arrow-alt-right"></i> ', 'advance-automobile' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'advance-automobile' ) . '</span> ',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '<i class="far fa-long-arrow-alt-left"></i>
										Previous', 'advance-automobile' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'advance-automobile' ) . '</span> ',
							) );

						endwhile; // End of the loop.
					?>
		       	</div>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			</div>
		<?php }else if($left_right == 'One Column'){ ?>
			<div class="content-ts">
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content-single' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						the_post_navigation( array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next <i class="far fa-long-arrow-alt-right"></i> ', 'advance-automobile' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'advance-automobile' ) . '</span> ',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( ' <i class="far fa-long-arrow-alt-left"></i> Previous', 'advance-automobile' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'advance-automobile' ) . '</span> ',
						) );

					endwhile; // End of the loop.
				?>
	       	</div>
	    <?php }else if($left_right == 'Grid Layout'){ ?>
			<div class="row">
				<div class="col-lg-8 col-md-8" class="content-ts">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content-single' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next <i class="far fa-long-arrow-alt-right"></i> ', 'advance-automobile' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'advance-automobile' ) . '</span> ' ,
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '<i class="far fa-long-arrow-alt-left"></i> Previous', 'advance-automobile' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'advance-automobile' ) . '</span> ',
							) );

						endwhile; // End of the loop.
					?>
		       	</div>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-2'); ?>
				</div>
			</div>
		<?php } else { ?>
			<div class="row">
		       	<div class="col-lg-8 col-md-8" class="content-ts">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content-single' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next <i class="far fa-long-arrow-alt-right"></i> ', 'advance-automobile' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'advance-automobile' ) . '</span> ',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '<i class="far fa-long-arrow-alt-left"></i> Previous', 'advance-automobile' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'advance-automobile' ) . '</span> ',
							) );

						endwhile; // End of the loop.
					?>
		       	</div>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			</div>
		<?php }?>
	    <div class="clearfix"></div>
    </main>
</div>

<?php get_footer(); ?>