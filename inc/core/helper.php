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


if (!function_exists('quantum_filter_document_title_separator')) {
    /**
     * Filters the separator for the document title.
     *
     * @param string $sep Document title separator. Default '-'.
     * @return string Document title separator. Default '-'.
     */
    function quantum_filter_document_title_separator(string $sep): string
    {
        $sep = '|';
        return $sep;
    }
    add_filter('document_title_separator', 'quantum_filter_document_title_separator', 10, 1);
}


if (!function_exists('quantum_filter_wp_robots')) {
    /**
     * Filters the directives to be included in the 'robots' meta tag.
     *
     * @param   array $robots Associative array of directives. Every key must be the name of the directive, and the
     *                  corresponding value must either be a string to provide as value for the directive or a
     *                  boolean true if it is a boolean directive, i.e. without a value.
     * @return  array Associative array of directives. Every key must be the name of the directive, and the
     *                  corresponding value must either be a string to provide as value for the directive or a
     *                  boolean true if it is a boolean directive, i.e. without a value.
     */
    function quantum_filter_wp_robots(array $robots): array
    {
        if (is_archive()) {
            $robots['noindex'] = true;
        }
        return $robots;
    }
    add_filter('wp_robots', 'quantum_filter_wp_robots', 10, 1);
}


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


if (!function_exists('quantum_login_logo_url')) {
    /**
     * Change the URL for the Login Page Logo
     *
     * @return void
     */
    function quantum_login_logo_url()
    {
        return home_url('/');
    }
    add_filter('login_headerurl', 'quantum_login_logo_url');
}
