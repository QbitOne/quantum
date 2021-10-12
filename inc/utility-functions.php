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


if (!function_exists('quantum_footerbar_menu')) :

    function quantum_footerbar_menu(): void
    {

        if (has_nav_menu('footerbar_menu')) :
            wp_nav_menu(
                array(
                    'theme_location'    => 'footerbar_menu',
                    'menu_id'           => 'footerbar_menu',
                    'fallback_cb'       => false,
                )
            );
        endif;

        do_action('quantum_footer_navigation_extension');
    }
endif;


if (!function_exists('quantum_footerbar_meta')) :

    function quantum_footerbar_meta(): void
    {

        $url = parse_url(home_url('/'), PHP_URL_HOST);

        // Check whether the URL is www-prefixed
        if (explode('.', $url)[0] === $url) {
            $url = 'www.' . $url;
        }
        echo $url;
    }
endif;


if (!function_exists('quantum_footerbar_copyright')) :

    function quantum_footerbar_copyright(): void
    {

        $copyright = apply_filters('quantum_copyright_text', 'Copyright');

        // TODO: implement solution you use a year of foundation
        // $year_of_foundation = apply_filters('quantum_copyright_year_of_foundation', '');

        $current_year = date('Y');
        $site_title = get_bloginfo('name');

        $format = '<span role="contentinfo">%s &copy; %s %s</span>';
        printf($format, esc_html($copyright), $current_year, $site_title);
    }
endif;


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
