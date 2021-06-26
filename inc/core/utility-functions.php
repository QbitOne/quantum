<?php

/**
 * Utility Functions
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;


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
        echo get_quantum_abbr($abbr);
    }
}