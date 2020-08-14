<?php  

if( isset( $post_args['post_style'] ) ) :
    /**
     * Contnet Ticker Markup
     */
    if( $post_args['post_style'] == 'ticker' ) : 
?>
    <div class="swiper-slide">
        <div class="ticker-content">
            <a href="<?php the_permalink(); ?>" class="ticker-content-link"><?php the_title(); ?></a>
        </div>
    </div>
<?php 
    endif; // $post_args['post_style'] == 'ticker'
    /**
     * Post Timeline Markup
     */
    if( $post_args['post_style'] == 'timeline' ) :
?>
    <article class="eael-timeline-post eael-timeline-column">
        <div class="eael-timeline-bullet"></div>
        <div class="eael-timeline-post-inner">
            <a class="eael-timeline-post-link" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
                <time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
                <div class="eael-timeline-post-image" <?php if( $post_args['eael_show_image'] == 1 ){ ?> style="background-image: url('<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $post_args['image_size'])?>');" <?php } ?>></div>
                <?php if($post_args['eael_show_excerpt']){ ?>
                    <div class="eael-timeline-post-excerpt">
                        <p><?php echo eael_get_excerpt_by_id( get_the_ID(), $post_args['eael_excerpt_length'] );?></p>
                    </div>
                <?php } ?>

                <?php if($post_args['eael_show_title']){ ?>
                    <div class="eael-timeline-post-title">
                        <h2><?php the_title(); ?></h2>
                    </div>
                <?php } ?>
            </a>
        </div>
    </article>
<?php 
    endif; // $post_args['post_style'] == 'timeline'
    /**
     * GRID style POST and POST CAROUSEL markup.
     */
    if( $post_args['post_style'] == 'grid' || $post_args['post_style'] == 'post_carousel' ) :
        // below line is only for post carousel
        echo ( $post_args['post_style'] == 'post_carousel' ) ? '<div class="swiper-slide">' : '';
?>
    <article class="eael-grid-post eael-post-grid-column">
        <div class="eael-grid-post-holder">
            <div class="eael-grid-post-holder-inner">
                <?php if ( $thumbnail_exists = has_post_thumbnail() && $post_args['eael_show_image'] == 1 ): ?>
                <div class="eael-entry-media">
                    <div class="eael-entry-overlay">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <a href="<?php echo get_permalink(); ?>"></a>
                    </div>
                    <div class="eael-entry-thumbnail">
                        <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $post_args['image_size'])?>">
                    </div>
                </div>
                <?php endif; ?>

                <div class="eael-entry-wrapper">
                    <header class="eael-entry-header">
                        <?php if($post_args['eael_show_title']){ ?>
                        <h2 class="eael-entry-title"><a class="eael-grid-post-link" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        <?php } ?>

                        <?php if($post_args['eael_show_meta'] && $post_args['meta_position'] == 'meta-entry-header'){ ?>
                        <div class="eael-entry-meta">
                            <span class="eael-posted-by"><?php the_author_posts_link(); ?></span>
                            <span class="eael-posted-on"><time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></span>
                        </div>
                        <?php } ?>
                    </header>

                    <?php if($post_args['eael_show_excerpt']){ ?>
                        <div class="eael-entry-content">
                            <div class="eael-grid-post-excerpt">
                                <p><?php echo eael_get_excerpt_by_id(get_the_ID(),$post_args['eael_excerpt_length']);?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <?php if($post_args['eael_show_meta'] && $post_args['meta_position'] == 'meta-entry-footer'){ ?>
                    <div class="eael-entry-footer">
                        <div class="eael-author-avatar">
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?> </a>
                        </div>
                        <div class="eael-entry-meta">
                            <div class="eael-posted-by"><?php the_author_posts_link(); ?></div>
                            <div class="eael-posted-on"><time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </article>
<?php
        // below line is only for post carousel
        echo ( $post_args['post_style'] == 'post_carousel' ) ? '</div>' : '';
    endif; // $post_args['post_style'] == 'grid' && $post_args['post_style'] == 'post_carousel'

    /**
     * Content Timeline Markup
     */
    if( $post_args['post_style'] == 'content_timeline' ) :
        $icon_image = $post_args['eael_icon_image'];
        if( empty( $icon_image_url ) ) : 
            $icon_image_url = $icon_image['url']; 
        else : 
            $icon_image_url = $icon_image_url; 
        endif;
?>
    <div class="eael-content-timeline-block">
        <div class="eael-content-timeline-line">
            <div class="eael-content-timeline-inner"></div>
        </div>
        <div class="eael-content-timeline-img eael-picture <?php if( 'bullet' === $post_args['eael_show_image_or_icon'] ) : echo 'eael-content-timeline-bullet'; endif;?>">
            <?php if( 'img' === $post_args['eael_show_image_or_icon'] ) : ?>
                <img src="<?php echo esc_url( $icon_image_url ); ?>" alt="Icon Image">
            <?php endif; ?>
            <?php if( 'icon' === $post_args['eael_show_image_or_icon'] ) : ?>
                <i class="<?php echo esc_attr( $post_args['eael_content_timeline_circle_icon'] ); ?>"></i>
            <?php endif; ?>
        </div>

        <div class="eael-content-timeline-content">
            <?php if( '1' == $post_args['eael_show_title'] ) : ?>
                <h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title(); ?></a></h2>
            <?php endif; ?>
            <?php if( '1' == $post_args['eael_show_excerpt'] ) : ?>
                <p><?php echo eael_get_excerpt_by_id( get_the_ID(), $post_args['eael_excerpt_length'] );?></p>
            <?php endif; ?>
            <?php if( '1' === $post_args['eael_show_read_more'] && !empty( $post_args['eael_read_more_text'] ) ) : ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="eael-read-more"><?php echo esc_html__( $post_args['eael_read_more_text'], 'essential-addons-elementor' ); ?></a>
            <?php endif; ?>
            <span class="eael-date"><?php echo get_the_date(); ?></span>
        </div>
    </div>
<?php 
    endif; // $post_args['post_style'] == 'content_timeline'
    /**
     * Post Block Markup
     */
    if( $post_args['post_style'] == 'block' ) : 
        /**
         * Post Block Default Markup
         */
        if( $post_args['grid_style'] == 'post-block-style-default' ) : 
?>
    <article class="eael-post-block-item eael-post-block-column">
        <div class="eael-post-block-item-holder">
            <div class="eael-post-block-item-holder-inner">

                <?php if($post_args['eael_show_image'] == 1){ ?>
                <div class="eael-entry-media">
                    <div class="eael-entry-overlay">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <a href="<?php echo get_permalink(); ?>"></a>
                    </div>
                    <div class="eael-entry-thumbnail">
                    <?php if ($thumbnail_exists = has_post_thumbnail()): ?>
                        <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $post_args['image_size'])?>">
                    <?php endif; ?>
                    </div>
                </div>
                <?php } ?>


                <div class="eael-entry-wrapper">
                    <header class="eael-entry-header">
                        <?php if($post_args['eael_show_title']){ ?>
                        <h2 class="eael-entry-title"><a class="eael-grid-post-link" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        <?php } ?>

                        <?php if($post_args['eael_show_meta'] && $post_args['meta_position'] == 'meta-entry-header'){ ?>
                        <div class="eael-entry-meta">
                            <span class="eael-posted-by"><?php the_author_posts_link(); ?></span>
                            <span class="eael-posted-on"><time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></span>
                        </div>
                        <?php } ?>
                    </header>

                    <div class="eael-entry-content">
                        <?php if($post_args['eael_show_excerpt']){ ?>
                        <div class="eael-grid-post-excerpt">
                            <p><?php echo  eael_get_excerpt_by_id(get_the_ID(),$post_args['eael_excerpt_length']);?></p>
                        </div>
                        <?php } ?>
                    </div>

                </div>
                <?php if($post_args['eael_show_meta'] && $post_args['meta_position'] == 'meta-entry-footer'){ ?>
                <div class="eael-entry-footer">
                    <div class="eael-author-avatar">
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?> </a>
                    </div>
                    <div class="eael-entry-meta">
                        <div class="eael-posted-by"><?php the_author_posts_link(); ?></div>
                        <div class="eael-posted-on"><time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </article>  
<?php   
    endif; // $post_args['grid_style'] == 'default'
    /**
     * Post Block Overlay Markup
     */
    if( $post_args['grid_style'] == 'post-block-style-overlay' ) :  
?>
    <article class="eael-post-block-item eael-post-block-column">
        <div class="eael-post-block-item-holder">
            <div class="eael-post-block-item-holder-inner">

                <?php if($post_args['eael_show_image'] == 1){ ?>
                <div class="eael-entry-media">
                    <div class="eael-entry-thumbnail">
                    <?php if ($thumbnail_exists = has_post_thumbnail()): ?>
                        <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $post_args['image_size'])?>">
                    <?php endif; ?>
                    </div>
                </div>
                <?php } ?>

                <div class="eael-entry-wrapper">
                    <header class="eael-entry-header">
                        <?php if($post_args['eael_show_title']){ ?>
                        <h2 class="eael-entry-title"><a class="eael-grid-post-link" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        <?php } ?>

                        <?php if($post_args['eael_show_meta'] && $post_args['meta_position'] == 'meta-entry-header'){ ?>
                        <div class="eael-entry-meta">
                            <span class="eael-posted-by"><?php the_author_posts_link(); ?></span>
                            <span class="eael-posted-on"><time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></span>
                        </div>
                        <?php } ?>
                    </header>

                    <div class="eael-entry-content">
                        <?php if($post_args['eael_show_excerpt']){ ?>
                        <div class="eael-grid-post-excerpt">
                            <p><?php echo  eael_get_excerpt_by_id(get_the_ID(),$post_args['eael_excerpt_length']);?></p>
                        </div>
                        <?php } ?>
                    </div>
                    <?php if($post_args['eael_show_meta'] && $post_args['meta_position'] == 'meta-entry-footer'){ ?>
                    <div class="eael-entry-footer">
                        <div class="eael-author-avatar">
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?> </a>
                        </div>
                        <div class="eael-entry-meta">
                            <div class="eael-posted-by"><?php the_author_posts_link(); ?></div>
                            <div class="eael-posted-on"><time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="eael-entry-overlay">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <a href="<?php echo get_permalink(); ?>"></a>
                    </div>
                </div>

            </div>
        </div>
    </article>
<?php 
        endif; // $post_args['grid_style'] == 'overlay'
    endif; // $post_args['post_style'] == 'block'

    /**
     * Post Style List Markup
     */
    if( $post_args['post_style'] == 'list' ) : 
        /**
         * Featured Post Markup
         */
        if( $post_args['eael_post_list_featured_area'] == 'yes' ) : 
            if( isset( $post_args['featured_posts'] ) && in_array( get_the_ID(), $post_args['featured_posts'] ) && $feature_counter == 0 ) : 
                $feature_counter++;
        ?>
        <div class="eael-post-list-featured-wrap">
            <div class="eael-post-list-featured-inner" style="background-image: url('<?php echo esc_url(wp_get_attachment_image_url(get_post_thumbnail_id(), 'full')); ?>')">
                <div class="featured-content">
                    <?php if( $post_args['eael_post_list_featured_meta'] === 'yes' ) : ?>
                    <div class="meta">
                        <span><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta ( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
                        <span><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if( $post_args['eael_post_list_featured_title'] === 'yes' ) : ?>
                        <h2 class="eael-post-list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php endif; ?>
                    <?php if( $post_args['eael_post_list_featured_excerpt'] === 'yes' ) : ?>
                    <p><?php echo eael_get_excerpt_by_id( get_the_ID(), $post_args['eael_post_list_featured_excerpt_length'] ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
            $isPrinted = true;
            endif; // in_array( get_the_ID(), $post_args['featured_posts'] ) && $feature_counter == 0
        endif; // $post_args['eael_post_list_featured_area'] == 'yes'
        /**
         * Normal Post Markup
         */
        if( ! $isPrinted ) : 
            echo $iterator == 0 ? '<div class="eael-post-list-posts-wrap">' : '';
    ?>
        <div class="eael-post-list-post" >
            <?php if( isset( $post_args['eael_post_list_post_feature_image'] ) && $post_args['eael_post_list_post_feature_image'] === 'yes' ) : ?>
            <div class="eael-post-list-thumbnail<?php if( empty( wp_get_attachment_image_url(get_post_thumbnail_id() ) ) ) : ?> eael-empty-thumbnail<?php endif; ?>"><?php if( !empty( wp_get_attachment_image_url(get_post_thumbnail_id() ) ) ) : ?><img src="<?php echo esc_url(wp_get_attachment_image_url(get_post_thumbnail_id(), 'full')); ?>" alt="<?php the_title(); ?>"><?php endif; ?></div> <?php endif; ?>
            <div class="eael-post-list-content">
                <?php if( $post_args['eael_post_list_post_title'] === 'yes' ) : ?>
                <h2 class="eael-post-list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php endif; ?>
                <?php if( isset( $post_args['eael_post_list_post_meta'] ) && $post_args['eael_post_list_post_meta'] === 'yes' ) : ?>
                <div class="meta">
                    <span><?php echo get_the_date(); ?></span>
                </div>
                <?php endif; ?>
                <?php if( isset( $post_args['eael_post_list_post_excerpt'] ) && $post_args['eael_post_list_post_excerpt'] === 'yes' ) : ?>
                <p><?php echo eael_get_excerpt_by_id( get_the_ID(), $post_args['eael_post_list_post_excerpt_length'] ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php   
            echo ( $iterator == ( $posts->found_posts - 1 ) ) == true ? '</div>' : '';
            $iterator++;
        endif; //  ! $isPrinted 
    endif; // $post_args['post_style'] == 'list'

    if( 'dynamic_gallery' === $post_args['post_style'] ) : 
        $classes = [];
        /**
         * Collect all category of a post
         * @var array
         */
        $categories = get_the_category( get_the_ID() );
        if( is_array( $categories ) ) {
            foreach ($categories as $category) {
                $classes[] = $category->slug;
            }
        }
        /**
         * Collect all tags of a post
         * @var array
         */
        $posttags = get_the_tags();
        if ($posttags) {
            foreach($posttags as $tag) {
                $classes[] = $tag->slug;
            }
        }

        
        if( isset( $post_args['eael_fg_grid_style'] ) ) :
            /**
             * 'eael-hoverer'
             */
            if( $post_args['eael_fg_grid_style'] == 'eael-hoverer' ) :

?>
<div class="item 
    <?php echo esc_attr( implode( ' ', $classes ) ); ?>" 
    data-ref="mixitup-target-<?php echo esc_attr( $post_args['control_id'] ); ?>" 
    data-item-bg="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>">
    <div class="caption <?php echo esc_attr( $post_args['eael_fg_grid_hover_style'] ); ?> ">
        <?php if( 'true' == $post_args['eael_fg_show_popup'] ) : ?>
        <a href="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" class="eael-magnific-link"><i class="<?php echo esc_attr( $post_args['eael_section_fg_zoom_icon'] ); ?>"></i></a>
        <?php endif; ?>
        <a href="<?php echo the_permalink() ?>"><i class="<?php echo esc_attr( $post_args['eael_section_fg_link_icon'] ); ?>"></i></a>
    </div>
</div>
<?php
            endif;
            /**
             * 'eael-cards'
             */
            if( $post_args['eael_fg_grid_style'] == 'eael-cards' ) :
?>
<div class="item <?php echo esc_attr( implode( ' ', $classes ) ) ?>" data-ref="mixitup-target-<?php echo esc_attr( $post_args['control_id'] ); ?>">
    <div class="item-img" style="background-image:url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>')">
        <div class="caption <?php echo esc_attr( $post_args['eael_fg_grid_hover_style'] ); ?> ">
            <?php if( 'true' == $post_args['eael_fg_show_popup'] ) : ?>
            <a href="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" class="eael-magnific-link"><i class="<?php echo esc_attr( $post_args['eael_section_fg_zoom_icon'] ); ?>"></i></a>
            <?php endif; ?>
            <a href="<?php echo the_permalink() ?>"><i class="<?php echo esc_attr( $post_args['eael_section_fg_link_icon'] ); ?>"></i></a>
        </div>
    </div>
    <div class="item-content">
        <h2 class="title"><a href="<?php echo the_permalink() ?>"><?php echo the_title(); ?></a></h2>
        <p><?php echo eael_get_excerpt_by_id( get_the_ID(), $post_args['eael_post_excerpt'] );?></p>
    </div>
</div>
<?php
            endif;
        endif; // isset( $post_args['eael_fg_grid_style'] )
    endif; // 'dynamic_gallery' === $post_args['post_style']
endif; // isset( $post_args['post_style'] )