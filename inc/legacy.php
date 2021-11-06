<?php

/**
 * Legacy code which maybe is used in some project.
 * Further using of these functions are discouraged.
 * 
 * @author Andreas Geyer <andreas@qbitone.de>
 * @since 2.8.0
 */


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
        if (str_contains($sidebar_key, 'footer') && is_active_sidebar($sidebar_key)) $count++;
    }
    return $count;
}
