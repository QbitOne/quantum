<?php

/**
 * Footer Nav
 * 
 * @since 2.7.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

wp_nav_menu(
    array(
        'theme_location' => 'footerbar_menu',
        'menu_id' => 'footerbar_menu',
        'menu_class' => 'qu-flex',
        'container' => 'nav',
        'fallback_cb' => 'quantum_no_webpage_selected', // Fallback if now webpage is selected in this menu,
    )
);
do_action('quantum_footer_navigation_extension');
