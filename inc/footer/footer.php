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
