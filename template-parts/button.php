<?php

/**
 * Template file for buttons
 */


if (!function_exists('quantum_button')) :
    /**
     * Button Template
     *
     * Output a html button with given parameters
     *
     * Example
     *      $button_args = [
     *          'href' => 'https://google.com',
     *          'class' => 'button-class',
     *          'button_text' => MyButton,
     *      ];
     *      quantum_botton($button_args);
     *
     *
     * @param array $args - Paramters for the specific button
     * @return void
     *
     * @param string href - the URL of the linking <a> tag
     * @param string class - a class name to specify the button style
     * @param string button_text - the Name of the clickabel button
     */
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
