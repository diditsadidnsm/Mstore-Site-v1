<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Advance Automobile
 */
?>

<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside role="complementary" aria-label="firstsidebar" id="archives" class="widget">
            <h2 class="widget-title"><?php esc_html_e( 'Archives', 'advance-automobile' ); ?></h2>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside role="complementary" aria-label="secondsidebar" id="meta" class="widget">
            <h2 class="widget-title"><?php esc_html_e( 'Meta', 'advance-automobile' ); ?></h2>
            <ul>
                <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>