<?php

/**
 * Manage the footer of the theme
 */


if (!function_exists('quantum_footer_html')) {

    function quantum_footer_html()
    {
        get_template_part('template-parts/footer');
    }
    add_action('quantum_footer', 'quantum_footer_html');
}

/**
 * @since 3.0.0
 */
if (QT_Controller_Scroll_Top::is_scroll_top_active()) :
    add_action('quantum_footer_after', function () {
        get_template_part('template-parts/scroll-top');
    });
endif;
