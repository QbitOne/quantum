<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Quantum
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;



/**
 * Remove predefined actions from WP
 */
// if (!function_exists('quantum_remove_wordpress_version')) {

//     function quantum_remove_wordpress_version()
//     {

//         return '';
//     }
//     add_filter('the_generator', 'quantum_remove_wordpress_version');
// }
// remove_action('wp_head', 'wlwmanifest_link');
// remove_action('wp_head', 'rsd_link');
// remove_action('wp_head', 'wp_shortlink_wp_head');


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
if (!function_exists('quantum_pingback_header')) {

    function quantum_pingback_header()
    {
        if (is_singular() && pings_open()) {
            printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
        }
    }
    add_action('wp_head', 'quantum_pingback_header');
}