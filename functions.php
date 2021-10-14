<?php

/**
 * Quantum functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Quantum
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly


define('QUANTUM_THEME_VERSION', '2.7.0');
define('QUANTUM_THEME_SETTINGS', 'quantum-settings');
define('QUANTUM_THEME_DIR', trailingslashit(get_template_directory()));
define('QUANTUM_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
define('QUANTUM_UPLOADS_URI', trailingslashit(esc_url(wp_get_upload_dir()['baseurl'])));


if (!function_exists('quantum_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function quantum_setup()
    {


        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');




        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary_menu' => esc_html__('Hauptmenü', 'quantum'),
                'footer_menu' => esc_html__('Footer Menü', 'quantum'),
                'footerbar_menu' => esc_html__('Footer Bar Menü', 'quantum'),
                'blog_menu' => esc_html__('Blog Menü', 'quantum'),
            )
        );



        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'quantum_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );


        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'quantum_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// function quantum_content_width()
// {
//     $GLOBALS['content_width'] = apply_filters('quantum_content_width', 640);
// }
// add_action('after_setup_theme', 'quantum_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function quantum_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'quantum'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Füge hier neue Widgets hinzu', 'quantum'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 1', 'quantum'),
            'id'            => 'footer-1',
            'description'   => esc_html__('Widgets für die erste Footer Spalte', 'quantum'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 2', 'quantum'),
            'id'            => 'footer-2',
            'description'   => esc_html__('Widgets für die zweite Footer Spalte', 'quantum'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 3', 'quantum'),
            'id'            => 'footer-3',
            'description'   => esc_html__('Widgets für die dritte Footer Spalte', 'quantum'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 4', 'quantum'),
            'id'            => 'footer-4',
            'description'   => esc_html__('Widgets für die vierte Footer Spalte', 'quantum'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'quantum_widgets_init');






/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Enqueue the Button Template
 */
require get_template_directory() . '/template-parts/button.php';

/**
 * All theme hooks
 */
require_once QUANTUM_THEME_DIR . 'inc/core/theme-hooks.php';

/**
 * Helper functions
 */
require_once QUANTUM_THEME_DIR . 'inc/core/helper.php';

/**
 * Functions which can be uses inside template-parts
 */
require_once QUANTUM_THEME_DIR . 'inc/utility-functions.php';

/**
 * Update Checker for the theme
 */
require_once QUANTUM_THEME_DIR . 'inc/core/class-qt-update-checker.php';

/**
 * Enqueues scripts (css/js) into the theme
 */
require_once QUANTUM_THEME_DIR . 'inc/core/class-qt-enqueue-scripts.php';

/**
 * After setup theme initial setup
 */
require_once QUANTUM_THEME_DIR . 'inc/core/class-qt-after-setup-theme.php';

/**
 * WordPress Adminbar functions
 */
require_once QUANTUM_THEME_DIR . 'inc/core/class-qt-adminbar.php';


require_once QUANTUM_THEME_DIR . 'inc/header/header.php';
require_once QUANTUM_THEME_DIR . 'inc/footer/footer.php';
