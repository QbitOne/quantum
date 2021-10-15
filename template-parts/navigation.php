<?php

/**
 * Main navigation for the Quantum Theme
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<div class="site-header__inner__nav">
    <nav id="site-navigation">

        <?php
        // $nav_name = (is_home() ? 'home_menu' : 'primary_menu');
        wp_nav_menu(
            array(
                'theme_location'    => 'primary_menu',
                'menu_id'           => 'primary_menu',
                'fallback_cb'       => 'quantum_no_webpage_selected', // Fallback if now webpage is selected in this menu
            )
        );
        ?>

        <?php do_action('quantum_header_navigation_extension'); ?>

    </nav>
</div>

<div class="site-header__inner__mobile-btn">
    <button id="menu-toggle" class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <span id="burger-btn" class="mobile-menu-burger-btn"></span>
    </button>
</div>