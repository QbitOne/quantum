<?php

/**
 * Core Theme Functions
 *
 * @package Quantum
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;


if (!function_exists('wp_body_open')) :
    /**
     * Shim for sites older than 5.2.
     *
     * @link https://core.trac.wordpress.org/ticket/12563
     */
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
endif;