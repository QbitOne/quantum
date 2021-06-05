<?php

/**
 * Core Theme Functions
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * Remove predefined actions from WP
 */
// if ( ! function_exists( 'quantum_remove_wordpress_version' ) ) {

//     function quantum_remove_wordpress_version() {

//         return '';
//     }
//     add_filter( 'the_generator', 'quantum_remove_wordpress_version' );
// }
// remove_action( 'wp_head', 'wlwmanifest_link' );
// remove_action( 'wp_head', 'rsd_link' );
// remove_action( 'wp_head', 'wp_shortlink_wp_head' );



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
 * Print out a mailto-link for a mail address with the mail address as anchor text
 *
 * @param   string $address
 * @return  void
 */
if (!function_exists('the_quantum_email')) {

    function the_quantum_email(string $address): void
    {
        $format = '<a href="mailto:%1$s">%1$s</a>';
        printf($format, $address);
    }
}


/**
 * Print human-readable information about a variable
 *
 * @param   mixed $expression
 * @return  void
 */
if (!function_exists('quantum_print_r')) {

    function quantum_print_r($expression): void
    {
        echo "<pre>" . print_r($expression, true) . "</pre>";
    }
}


/**
 * Return or echo a given abbreviation
 *
 * @param   string $abbr
 * @return  string
 */
if (!function_exists('get_quantum_abbr')) {

    function get_quantum_abbr($abbr = ''): string
    {
        $abbreviations = apply_filters('quantum_abbreviations', []);

        if (array_key_exists($abbr, $abbreviations)) {

            $format = '<abbr title="%1$s">%2$s</abbr>';
            return sprintf($format, $abbreviations[$abbr], $abbr);
        }
        return '';
    }
}

if (!function_exists('the_quantum_abbr')) {

    function the_quantum_abbr($abbr = ''): void
    {
        echo get_abbr($abbr);
    }
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