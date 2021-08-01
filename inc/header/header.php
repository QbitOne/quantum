<?php

/**
 * Manage the header of the theme
 */


if (!function_exists('quantum_header_html')) {

    function quantum_header_html()
    {
        get_template_part('template-parts/header');
    }
    add_action('quantum_header', 'quantum_header_html');
}
