<?php

/**
 * Template file for buttons
 */


if (!function_exists('quantum_button')) :
    function quantum_button(array $args = array()): void
    {

        $href = $args['href'] ?? '';
        // prepare the href attribute
        $href = 'href="' . $href . '"';

        $class = $args['class'] ?? 'qbo-button';
        // prepare the class name
        $class = 'class="' . $class . '"';

        $button_text = $args['button_text'] ?? 'Button';

        // prepare button html
        $format = '<div %s>';
        $format .= '<a %s>';
        $format .= '%s';
        $format .= '</a>';
        $format .= '</div>';

        printf($format, $class, $href, $button_text);
    }
endif;
