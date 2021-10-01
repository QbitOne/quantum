<?php

/**
 * Class for enqueueing scripts and styles
 * 
 * @since 2.6.0
 */

if (!defined('ABSPATH')) exit;

if (!class_exists('QT_Enqueue_Scripts')) :

    class QT_Enqueue_Scripts
    {
        private $min_postfix = '.min';
        private  $handle_prefix = 'qt';

        private $assets = [
            'css' => [
                'style',
            ],
            'js' => [
                'bundle'
            ]
        ];

        function __construct()
        {
            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        }

        public function enqueue_scripts()
        {

            $styles = self::$assets['css'];

            foreach ($styles as $key => $value) {

                $handle = self::$handle_prefix . '-' . $value;
                $src = QUANTUM_THEME_DIR . 'assets/css/unminified/' . $value . '.css';
                $ver = QUANTUM_THEME_VERSION;
                $deps = [];
                wp_enqueue_style($handle, $src, $deps, $ver);
            }
        }

        // private function minified_exists($file, $type) {
        //     $minified_exists = false

        //     if (file_exists(QUANTUM_THEME_DIR . 'assets/' . $type . '/minified/' . $file)):
        //         $minified_exists = true;
        //     endif;

        //     return $minified_exists
        // }
    }
endif;
