<?php

/**
 * Manage the header of the theme
 */


if (!function_exists('quantum_header_html')) {

    function quantum_header_html()
    {
        get_template_part('template-parts/header/header');
    }
    add_action('quantum_header', 'quantum_header_html');
}


/**
 * Filters the list of custom logo image attributes.
 *
 * @param array $custom_logo_attr Custom logo image attributes.
 * @param int   $custom_logo_id   Custom logo attachment ID.
 * @param int   $blog_id          ID of the blog to get the custom logo for.
 * @return array Custom logo image attributes.
 */
add_filter(
    'get_custom_logo_image_attributes',
    function (array $custom_logo_attr): array {

        // add QT custom class
        $custom_logo_attr['class'] .= ' site-header__inner__branding__logo';

        return $custom_logo_attr;
    },
    10,
    1
);
