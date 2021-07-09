<?php

/**
 * Enqueue Theme Scripts and Theme Styles
 *
 * @package Quantum
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * Enqueue the main script and stylsheet
 *
 * @return void
 */
if (!function_exists('quantum_action_wp_enqueue_scripts')) {

    function quantum_action_wp_enqueue_scripts(): void
    {
        wp_enqueue_style(
            'quantum-style',
            // TODO find the right path
            get_template_directory_uri() . '/assets/css/minified/style.min.css',
            array(),
            QUANTUM_THEME_VERSION
        );
        // wp_style_add_data('quantum-style', 'rtl', 'replace');

        wp_enqueue_script(
            'quantum-js',
            // TODO find the right path
            get_template_directory_uri() . '/assets/js/bundle.min.js',
            array(),
            QUANTUM_THEME_VERSION,
            false
        );
        // wp_script_add_data('quantum-navigation', 'defer', true);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
    add_action('wp_enqueue_scripts', 'quantum_action_wp_enqueue_scripts');
}



/**
 * Include custom CSS file into WP login page
 * @link    https://codex.wordpress.org/Customizing_the_Login_Form
 */
if (!function_exists('quantum_custom_login_css')) {

    function quantum_custom_login_css()
    {
        $file = get_template_directory_uri() . '/assets/css/login.css';

        if (file_exists($file)) {

            wp_enqueue_style(
                'quantum-login-style',
                $file,
                array(),
                QUANTUM_THEME_VERSION,
            );
        }
    }
    add_action('login_enqueue_scripts', 'quantum_custom_login_css');
}




/**
 * Include custom css file into WP admin page
 */
if (!function_exists('quantum_custom_admin_css')) {

    function quantum_custom_admin_css()
    {
        $file = get_template_directory_uri() . '/assets/css/admin.css';

        if (file_exists($file)) {

            wp_enqueue_style(
                'quantum-admin-style',
                $file,
                array(),
                QUANTUM_THEME_VERSION,
            );
        }
    }
    add_action('admin_enqueue_scripts', 'quantum_custom_admin_css');
}











/**
 * Filters the HTML script tag of an enqueued script.
 *
 * @param   string $tag     The script tag for the enqueued script.
 * @param   string $handle  The script's registered handle.
 * @param   string $src     The script's source URL.
 * @return  string          The script tag for the enqueued script.
 */
if (!function_exists('quantum_modify_script_tag')) {

    function quantum_modify_script_tag(string $tag, string $handle, string $src): string
    {
        $defer = 'defer';

        if ('quantum-navigation' === $handle) {
            $tag = '<script src="' . esc_url($src) . '" id="' . $handle . '" ' . $defer . '></script>';
        }
        return $tag;
    }
    add_filter('script_loader_tag', 'quantum_modify_script_tag', 10, 3);
}
