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


if (!function_exists('quantum_button2')) :
    /**
     * Button Template
     *
     * Output a html button with given attributes.
     * Given attributes in the array are checks against hardcoded valid attributes
     *
     * Example
     *      quantum_button2('MyButton', ['href' => 'https://mydomain.de', 'class' => 'class1 class2']);
     *
     */
    function quantum_button2(string $innerHTML = 'Button', array $attrs = array()): void
    {
        $innerHTML = esc_html($innerHTML);
        $given_attrs = $attrs;
        $valid_attrs = ['href', 'class', 'target'];

        foreach ($given_attrs as $attr => $value) {

            if (!in_array($attr, $valid_attrs)) {

                unset($attrs[$attr]);
            } else {
                $attrs[$attr] = $attr . '="' . esc_attr($value) . '"';
            }
        }

        $attrs = implode(' ', $attrs);

        $output = '<a ' . $attrs . '>';
        $output .= $innerHTML;
        $output .= '</a>';

        echo $output;
    }
endif;
