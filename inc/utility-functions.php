<?php

/**
 * Utility Functions
 * 
 * @author Andreas Geyer <andreas@qbitone.de>
 * @since 1.0.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly.


if (!function_exists('the_quantum_email')) {
    /**
     * Print out a mailto-link.
     *
     * Print out a mailto-link for a mail address 
     * with the mail address as anchor text
     * 
     * @param string $address
     * @return void
     * @since 1.0.0
     */
    function the_quantum_email(string $address): void
    {
        $format = '<a href="mailto:%1$s">%1$s</a>';
        printf($format, $address);
    }
}


if (!function_exists('quantum_print_r')) {
    /**
     * Print human-readable information about a variable.
     * 
     * Uses PHP built-in function print_r() combined with 
     * suitable html markup.
     *
     * @param mixed $expression
     * @return void
     * @since 1.0.0
     */
    function quantum_print_r(mixed $expression): void
    {
        echo '<pre>' . print_r($expression, true) . '</pre>';
    }
}


if (!function_exists('quantum_placeholder_image')) :
    /**
     * Get a html image tag with a placeholder image.
     * 
     * Use a remote placeholder image from 
     * https://via.placeholder.com/ 
     * for fast prototyping. Get a html image tag with
     * specified query parameters
     * 
     * @link https://via.placeholder.com/
     * @since 2.8.0
     * @param string $params the query parameter of the url
     * @return string the html markup of the image tag
     * 
     * ### Example
     * - get_quantum_placeholder_image(150) return a image with 150x150 pixel
     * - get_quantum_placeholder_image(300x150) return a image with 300x150 pixel
     */
    function get_quantum_placeholder_image(string $params): string
    {
        $html = '';
        $url = 'https://via.placeholder.com/';

        $html .= '<img src="';
        $html .= $url . $params;
        $html .= '">';

        return $html;
    }
endif;


if (!function_exists('get_quantum_button')) :
    /**
     * Undocumented function
     *
     * @param string $name name of the specific button
     * @param array $args further details/attributes of the button
     * @return void
     * @since 2.9.0
     */
    function get_quantum_button($name = 'link', $args = []): void
    {
        get_template_part('template-parts/button', $name, $args);
    }
endif;
