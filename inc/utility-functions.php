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
    function quantum_print_r($expression): void
    {
        echo '<pre>' . print_r($expression, true) . '</pre>';
    }
}

if (!function_exists('quantum_var_dump')) :
    /**
     * Dumps information about a variable.
     * 
     * This function displays structured information about 
     * one or more expressions that includes its type and value. 
     * Arrays and objects are explored 
     * recursively with values indented to show structure.
     *
     * @param mixed $expression The expression to dump.
     * @return void
     * @since 2.9.0
     */
    function quantum_var_dump($expression): void
    {
        echo '<pre>' . var_dump($expression) . '</pre>';
    }
endif;


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
     * Get a button template.
     * 
     * Shortcut function to get a button via get_template_part
     * function.
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


if (!function_exists('get_quantum_svg')) :
    /**
     * Get a SVG as HTML.
     * 
     * Use this function to include a SVG directly i.e.
     * with its HTML markup into the page.
     *
     * @param string $name The name of the icon. Further parent paths have to be included
     * @param string $dir Choose parent or child theme with ``template`` or ``stylesheet`` respectively
     * @return string The HTML SVG markup
     * @since 2.9.0
     * 
     * ### Example
     *      get_quantum_svg('social/facebook-icon', 'template');
     */
    function get_quantum_svg(string $name, string $dir = 'stylesheet'): string
    {
        if (!in_array($dir, ['stylesheet', 'template'])) :
            error_log('SVG Problem: unkown directory name: ' . $dir);
            return false;
        endif;
        $dir = 'get_' . $dir . '_directory';
        return file_get_contents($dir() . '/assets/svg/' . $name . '.svg');
    }
endif;


if (!function_exists('get_quantum_internlink')) :
    /**
     * Get a intern URL of your site.
     * 
     * ### Example
     * - Link to page mit slug 'myslug' under the domain 'mydomain.de'.
     *   Use get_quantum_internlink('myslug') to get 'http(s)://mydomain.de/myslug'.
     *
     * @param string $slug The slug appended to the domain
     * @return string The URL escaped home url link with slug appended 
     * @since 2.9.2
     */
    function get_quantum_internlink(string $slug): string
    {
        return esc_url(home_url($slug));
    }
endif;
