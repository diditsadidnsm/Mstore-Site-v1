<?php
/**
 * The template for displaying search results pages
 * @package WordPress
 * @subpackage lz-computer-repair
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

<div class="container">

	<header class="page-header" role="banner">
		<?php if ( have_posts() ) : ?>
			<h1 class="search-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','lz-computer-repair'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'lz-computer-repair' ); ?></h1>
		<?php endif; ?>
	</header>

	<div class="content-area">
		<main id="content" class="site-main" role="main">
			<?php $layout_option = get_theme_mod( 'lz_computer_repair_theme_options',__( 'Right Sidebar','lz-computer-repair' ) );
			    if($layout_option == 'Left Sidebar'){ ?>
			    	<div class="row">
				        <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
				        <div id="" class="content_area col-lg-8 col-md-8">
					    	<section id="post_section">
								<?php
								if ( have_posts() ) :
									/* Start the Loop */
									while ( have_posts() ) : the_post();

										get_template_part( 'template-parts/post/content' );

									endwhile; // End of the loop.

									else : ?>

									<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lz-computer-repair' ); ?></p>
									<?php
										get_search_form();

								endif;
								?>
								<div class="navigation">
					                <?php
					                    // Previous/next page navigation.
					                    the_posts_pagination( array(
					                        'prev_text'          => __( 'Previous page', 'lz-computer-repair' ),
					                        'next_text'          => __( 'Next page', 'lz-computer-repair' ),
					                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lz-computer-repair' ) . ' </span>',
					                    ) );
					                ?>
					                <div class="clearfix"></div>
					            </div>
							</section>
						</div>
						<div class="clearfix"></div>
					</div>
			<?php }else if($layout_option == 'Right Sidebar'){ ?>
				<div class="row">
					<div id="" class="content_area col-lg-8 col-md-8">
						<section id="post_section">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );

								endwhile; // End of the loop.

								else : ?>

								<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lz-computer-repair' ); ?></p>
								<?php
									get_search_form();

							endif;
							?>
							<div class="navigation">
				                <?php
				                    // Previous/next page navigation.
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'lz-computer-repair' ),
				                        'next_text'          => __( 'Next page', 'lz-computer-repair' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lz-computer-repair' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
					<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2'); ?>						
					</div>
				</div>
			<?php }else if($layout_option == 'One Column'){ ?>
				<div id="" class="content_area">
					<section id="post_section">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/content' );

							endwhile; // End of the loop.

							else : ?>

							<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lz-computer-repair' ); ?></p>
							<?php
								get_search_form();

						endif;
						?>
						<div class="navigation">
			                <?php
			                    // Previous/next page navigation.
			                    the_posts_pagination( array(
			                        'prev_text'          => __( 'Previous page', 'lz-computer-repair' ),
			                        'next_text'          => __( 'Next page', 'lz-computer-repair' ),
			                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lz-computer-repair' ) . ' </span>',
			                    ) );
			                ?>
			                <div class="clearfix"></div>
			            </div>
					</section>
				</div>
			<?php }else if($layout_option == 'Three Columns'){ ?>	
				<div class="row">
					<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>	
					<div id="" class="content_area col-lg-6 col-md-6">
						<section id="post_section">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );

								endwhile; // End of the loop.

								else : ?>

								<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lz-computer-repair' ); ?></p>
								<?php
									get_search_form();

							endif;
							?>
							<div class="navigation">
				                <?php
				                    // Previous/next page navigation.
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'lz-computer-repair' ),
				                        'next_text'          => __( 'Next page', 'lz-computer-repair' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lz-computer-repair' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
					<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?>						
					</div>
				</div>
			<?php }else if($layout_option == 'Four Columns'){ ?>
				<div class="row">
					<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
					<div id="" class="content_area col-lg-3 col-md-3">
						<section id="post_section">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );

								endwhile; // End of the loop.

								else : ?>

								<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lz-computer-repair' ); ?></p>
								<?php
									get_search_form();

							endif;
							?>
							<div class="navigation">
				                <?php
				                    // Previous/next page navigation.
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'lz-computer-repair' ),
				                        'next_text'          => __( 'Next page', 'lz-computer-repair' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lz-computer-repair' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
					<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
			        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
		        </div>
	    	<?php }else if($layout_option == 'Grid Layout'){ ?>
		    	<div class="row">
			    	<div id="" class="content_area col-lg-8 col-md-8">
						<section id="post_section">
							<div class="row">
								<?php
								if ( have_posts() ) :

									/* Start the Loop */
									while ( have_posts() ) : the_post();

										get_template_part( 'template-parts/post/grid-layout', get_post_format() );

									endwhile;

									else : ?>

										<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lz-computer-repair' ); ?></p>
										<?php
											get_search_form();

								endif;
								?>
								<div class="navigation">
					                <?php
					                    // Previous/next page navigation.
					                    the_posts_pagination( array(
					                        'prev_text'          => __( 'Previous page', 'lz-computer-repair' ),
					                        'next_text'          => __( 'Next page', 'lz-computer-repair' ),
					                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lz-computer-repair' ) . ' </span>',
					                    ) );
					                ?>
					                <div class="clearfix"></div>
					            </div>
							</div>
						</section>
					</div>
					<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?>						
					</div>	
				</div>	
			<?php } else { ?>
					<div class="row">
						<div id="" class="content_area col-lg-8 col-md-8">
							<section id="post_section">
								<?php
								if ( have_posts() ) :
									/* Start the Loop */
									while ( have_posts() ) : the_post();

										get_template_part( 'template-parts/post/content' );
									endwhile;
									else : ?>

										<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lz-computer-repair' ); ?></p>
										<?php
											get_search_form();
									endif;
								?>
								<div class="navigation">
					                <?php
					                    // Previous/next page navigation.
					                    the_posts_pagination( array(
					                        'prev_text'          => __( 'Previous page', 'lz-computer-repair' ),
					                        'next_text'          => __( 'Next page', 'lz-computer-repair' ),
					                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lz-computer-repair' ) . ' </span>',
					                    ) );
					                ?>
					                <div class="clearfix"></div>
					            </div>
							</section>
						</div>
						<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?>
						</div>
					</div>
			<?php } ?>
		</main>
	</div>
</div>

<?php get_footer();