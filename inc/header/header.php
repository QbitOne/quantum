<?php

/**
 * Manage the header of the theme
 */


if (!function_exists('header_html')) {

    function header_html()
    {
        get_template_part('template-parts/header');
    }
    add_action('quantum_header', 'header_html');
}
