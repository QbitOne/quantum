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


/**
 * Print a src for an img tag. If filename is given,
 * the src will be loaded.
 * If now filename is given (empty string excepted)
 * then a dummy image with the size given in args is loaded
 *
 * @param   string $filename
 * @param   string $args
 * @return  void
 */
// function the_quantum_image_src( string $filename, string $args ) {

//     if ( empty( $filename ) ) {

//         $format = 'https://dummyimage.com/%s';
//         printf( $format, $args );
//     } else {

//         $path = get_template_directory_uri() . '/assets/img/' . $filename;
//         echo $path;
//     }
// }





// Fallback for new php8 function
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle): bool
    {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}


function quantum_count_active_footer_sidebars(): int
{
    $count = 0;
    $sidebars = $GLOBALS['wp_registered_sidebars'];

    foreach ($sidebars as $sidebar_key => $sidebar_array) {
        if (str_contains($sidebar_key, 'footer') && is_active_sidebar($sidebar_key)) :
            $count++;
        endif;
    }
    return $count;
}
