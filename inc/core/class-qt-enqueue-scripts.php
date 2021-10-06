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
        private $uri;
        private $handle_prefix;
        private $version;

        private $styles = [];
        private $scripts = [];

        function __construct(string $uri, string $handle_prefix, string $version)
        {
            $this->uri = $uri;
            $this->handle_prefix = $handle_prefix;
            $this->version = $version;
        }

        public function add_style(string $filename, string $src = 'assets/css/', array $deps = array(), bool $min = true): void
        {
            $style = [];

            $style['handle'] = $this->prepared_handle($filename);

            $src .= ($min ? 'minified/' : 'unminified/');
            $filename_postfix = ($min ? '.min.css' : '.css');
            $filename .= $filename_postfix;
            $style['src'] = $this->uri . $src . $filename;

            $style['deps'] = $deps;

            $style['ver'] = $this->version;

            $this->styles[] = $style;
        }

        public function add_srcipt(string $filename, string $src = 'assets/js/', array $deps = array(), bool $min = true, $defer = true): void
        {
            $script = [];

            $script['handle'] = $this->prepared_handle($filename);

            $src .= ($min ? 'minified/' : 'unminified/');
            $filename .= ($min ? '.min.js' : '.js');
            $script['src'] = $this->uri . $src . $filename;

            $script['deps'] = $deps;

            $script['ver'] = $this->version;

            $this->scripts[] = $script;
        }

        /**
         * Postfix the handle
         * 
         * Example
         * -------
         * Handle is given by 'myHandle'.
         * Return value is then 'qt-myHandle'.
         *
         * @param string $handle
         * @return string
         */
        private function prepared_handle($handle): string
        {
            return $this->handle_prefix . '-' . $handle;
        }

        public function enqueue_styles(): void
        {
            foreach ($this->styles as $style) {
                wp_enqueue_style(
                    $style['handle'],
                    $style['src'],
                    $style['deps'],
                    $style['ver'],
                    'all'
                );
            }
        }

        public function enqueue_scripts(): void
        {
            foreach ($this->scripts as $script) {
                wp_enqueue_script(
                    $script['handle'],
                    $script['src'],
                    $script['deps'],
                    $script['ver'],
                    false
                );
            }
        }

        // public function enqueue_styles(): void
        // {
        //     $type = 'css';
        //     $src = QUANTUM_THEME_URI . 'assets/' . $type . '/unminified';

        //     $assets = $this->default_assets[$type];

        //     foreach ($assets as $handle) {

        //         wp_enqueue_style(
        //             $this->prepare_handles($handle),
        //             $src . "/${handle}.${type}",
        //             array(),
        //             QUANTUM_THEME_VERSION
        //         );
        //     }
        // }

        // public function enqueue_scripts()
        // {
        //     $type = 'js';
        //     $src = QUANTUM_THEME_URI . 'assets/' . $type;

        //     $assets = $this->default_assets[$type];

        //     foreach ($assets as $handle) {

        //         $src = $src . "/${handle}.min.${type}";
        //         $handle = $this->prepare_handles($handle);

        //         wp_enqueue_script(
        //             $handle,
        //             $src,
        //             array(),
        //             QUANTUM_THEME_VERSION
        //         );
        //     }
        // }



        public function init()
        {
            add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        }
    }

    $qt_enqueue_sripts = new QT_Enqueue_Scripts(QUANTUM_THEME_URI, 'qt', QUANTUM_THEME_VERSION);

    $qt_enqueue_sripts->add_style('style');

    // $qt_enqueue_sripts->add_srcipt('siteNavigation');

    $qt_enqueue_sripts->init();
    
endif;
