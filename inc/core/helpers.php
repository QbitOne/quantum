<?php

/**
 * Helper functions
 * 
 * @since 2.7.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly


if (!function_exists('wp_body_open')) :
    /**
     * Shim for wp_body_open, ensuring backward compatibility 
     * with versions of WordPress older than 5.2.
     *
     * @link https://core.trac.wordpress.org/ticket/12563
     * @link https://en.wikipedia.org/wiki/Shim_(computing)
     * @return void
     */
    function wp_body_open(): void
    {
        do_action('wp_body_open');
    }
endif;
