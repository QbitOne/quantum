<?php

/**
 * Used WP Core Filter
 *
 * @package Quantum
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;


/**
 * Filters the separator for the document title.
 *
 * @param string $sep Document title separator. Default '-'.
 * @return string Document title separator. Default '-'.
 */
if (!function_exists('quantum_filter_document_title_separator')) {

    function quantum_filter_document_title_separator(string $sep): string
    {
        $sep = '|';
        return $sep;
    }
    add_filter('document_title_separator', 'quantum_filter_document_title_separator', 10, 1);
}


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
if (!function_exists('quantum_filter_wp_robots')) {

    function quantum_filter_wp_robots(array $robots): array
    {
        if (is_archive()) {
            $robots['noindex'] = true;
        }
        return $robots;
    }
    add_filter('wp_robots', 'quantum_filter_wp_robots', 10, 1);
}


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if (!function_exists('quantum_body_classes')) {

    function quantum_body_classes($classes)
    {
        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if (!is_active_sidebar('sidebar-1')) {
            $classes[] = 'no-sidebar';
        }

        return $classes;
    }
    add_filter('body_class', 'quantum_body_classes');
}