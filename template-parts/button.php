<?php

/**
 * Template file for buttons
 */


if (!function_exists('quantum_button')) :
    function quantum_button(array $args = array()): void
    {
        $format = '<div>';
        $format = '<a href="%s">';
        $format = '%s';
        $format = '</a>';
        $format .= '</div>';

        printf($format, $args['href'], $args['text']);
    }
endif;
