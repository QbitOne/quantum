<?php

/**
 * Controller Class for Scroll Top
 * 
 * @since 3.0.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!class_exists('QT_Controller_Scroll_Top')) :
    /**
     * Controller Class for Scroll Top
     * 
     * @since 3.0.0
     */
    class QT_Controller_Scroll_Top
    {
        /**
         * Constructor
         * 
         * @since 3.0.0
         */
        public function __construct()
        {
            add_action('customize_register', [$this, 'build_customizer']);
        }

        /**
         * Checke if Scroll Top is activated
         *
         * @static  true
         * @return  boolean
         * @since   3.0.0
         */
        public static function is_scroll_top_active(): bool
        {
            // Return false by default
            $return = false;

            // Return true if activated via Customizer
            if (get_theme_mod('qt_scroll_top', false)) {
                $return = true;
            }

            // Apply filters and return
            return apply_filters('qt_display_scroll_up_button', $return);
        }

        /**
         * Register customizer options.
         *
         * @param   WP_Customize_Manager $wp_customize Theme Customizer object.
         * @return  void
         * @since   3.0.0
         */
        public function build_customizer($wp_customize): void
        {
            $wp_customize->add_panel(
                'qt_panel',
                array(
                    'title' => 'Quantum',
                    'description' => 'Quantum Customizer',
                    'priority' => 160, // Not typically needed. Default is 160
                    'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
                    'theme_supports' => '', // Rarely needed
                    'active_callback' => '', // Rarely needed
                )
            );

            $wp_customize->add_section(
                'qt_section_scroll_top',
                array(
                    'title' => 'Scroll Top',
                    'description' => 'Scroll Top Settings',
                    'panel' => 'qt_panel', // Only needed if adding your Section to a Panel
                    'priority' => 160, // Not typically needed. Default is 160
                    'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
                    'theme_supports' => '', // Rarely needed
                    'active_callback' => '', // Rarely needed
                    'description_hidden' => 'false', // Rarely needed. Default is False
                )
            );

            $wp_customize->add_setting(
                'qt_scroll_top',
                array(
                    'default' => '', // Optional.
                    'transport' => 'refresh', // Optional. 'refresh' or 'postMessage'. Default: 'refresh'
                    'type' => 'theme_mod', // Optional. 'theme_mod' or 'option'. Default: 'theme_mod'
                    'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
                    'theme_supports' => '', // Optional. Rarely needed
                    'validate_callback' => '', // Optional. The name of the function that will be called to validate Customizer settings
                    'sanitize_callback' => '', // Optional. The name of the function that will be called to sanitize the input data before saving it to the database
                    'sanitize_js_callback' => '', // Optional. The name of the function that will be called to sanitize the data before outputting to javascript code. Basically to_json.
                    'dirty' => false, // Optional. Rarely needed. Whether or not the setting is initially dirty when created. Default: False
                )
            );

            $wp_customize->add_control(
                'qt_scroll_top',
                array(
                    'label' => 'Scroll Top Button aktivieren',
                    'description' => 'Erzeugt einen Scroll Top Button',
                    'section'  => 'qt_section_scroll_top',
                    'priority' => 10, // Optional. Order priority to load the control. Default: 10
                    'type' => 'checkbox',
                    'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
                )
            );
        }
    }

    $QT_Controller_Scroll_Top = new QT_Controller_Scroll_Top();
endif;
