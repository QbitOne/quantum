<?php

/**
 * Functions and Defintions
 * After WordPress Theme Setup
 * 
 * @since 2.7.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!class_exists('QT_After_Setup_Theme')) :
    /**
     * QT_After_Setup_Theme initial setup
     */
    class QT_After_Setup_Theme
    {
        /**
         * Instance
         *
         * @var $instance
         */
        private static $instance;

        /**
         * Initiator
         *
         * @return object
         */
        public static function get_instance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Constructor
         */
        public function __construct()
        {
            add_action('after_setup_theme', array($this, 'setup_theme'));
        }

        /**
         * Setup theme
         *
         * @since 1.0.0
         */
        public function setup_theme()
        {
            /*
            * Make theme available for translation.
            * Translations can be filed in the /languages/ directory.
            */
            load_theme_textdomain('quantum', QUANTUM_THEME_DIR . '/languages');

            /*
            * Let WordPress manage the document title.
            * By adding theme support, we declare that this theme does not use a
            * hard-coded <title> tag in the document head, and expect WordPress to
            * provide it for us.
            */
            add_theme_support('title-tag');

            /*
            * Enable support for Post Thumbnails on posts and pages.
            *
            * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
            */
            add_theme_support('post-thumbnails');

            /*
            * Switch default core markup for search form, comment form, and comments
            * to output valid HTML5.
            */
            add_theme_support(
                'html5',
                array(
                    'navigation-widgets',
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'style',
                    'script',
                )
            );

            // Add theme support for selective refresh for widgets.
            add_theme_support('customize-selective-refresh-widgets');
        }
    }
endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
$QT_After_Setup_Theme::get_instance();
