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
     * @return void
     */
    function wp_body_open(): void
    {
        do_action('wp_body_open');
    }
endif;



if (!function_exists('quantum_no_webpage_selected')) :
    /**
     * Fallback if no webpage is selected in registered menu
     *
     * @return void
     */
    function quantum_no_webpage_selected(): void
    {
        echo "<div>Keine Webseite im Menu ausgewählt</div>";
    }
endif;
