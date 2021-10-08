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
        private $styles_login = [];
        private $scripts = [];

        function __construct(string $uri, string $handle_prefix, string $version)
        {
            $this->uri = $uri;
            $this->handle_prefix = $handle_prefix;
            $this->version = $version;
        }

        public function enqueue()
        {
            add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
            add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
            add_action('login_enqueue_scripts', [$this, 'login_enqueue_scripts']);

            add_filter('script_loader_tag', [$this, 'filter_script_loader_tag'], 10, 3);
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

        public function add_login_style(string $filename, string $src = 'assets/css/', array $deps = array(), bool $min = true): void
        {
            $style = [];

            $style['handle'] = $this->prepared_handle($filename);

            $src .= ($min ? 'minified/' : 'unminified/');
            $filename_postfix = ($min ? '.min.css' : '.css');
            $filename .= $filename_postfix;
            $style['src'] = $this->uri . $src . $filename;

            $style['deps'] = $deps;

            $style['ver'] = $this->version;

            $this->styles_login[] = $style;
        }

        public function add_script(string $filename, string $src = 'assets/js/', array $deps = array(), bool $min = true, $defer = true): void
        {
            $script = [];

            $script['handle'] = $this->prepared_handle($filename);

            $src .= ($min ? 'minified/' : 'unminified/');
            $filename .= ($min ? '.min.js' : '.js');
            $script['src'] = $this->uri . $src . $filename;

            $script['deps'] = $deps;

            $script['ver'] = $this->version;

            $script['defer'] = $defer;

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

        /**
         * Filters the HTML script tag of an enqueued script.
         *
         * @param   string  $tag    The <code>script</code> tag for the enqueued script.
         * @param   string  $handle The script's registered handle.
         * @param   string  $src    The script's source URL.
         * @return  string  The <code>script</code> tag for the enqueued script.
         */
        public function filter_script_loader_tag(string $tag, string $handle, string $src): string
        {
            foreach ($this->scripts as $script) {
                if ($script['defer']) :
                    $tag = '<script src="' . esc_url($src) . '" id="' . $handle . '-js" defer></script>';
                endif;
            }
            return $tag;
        }

        /**
         * Enqueue scripts and styles for the login page.
         *
         */
        public function login_enqueue_scripts(): void
        {
            foreach ($this->styles_login as $style) {
                wp_enqueue_style(
                    $style['handle'],
                    $style['src'],
                    $style['deps'],
                    $style['ver'],
                    'all'
                );
            }
        }

        /**
         * Pipeline for WP function
         *
         * @param string $handle
         * @param string $src
         * @param array $deps
         * @return void
         */
        public function wp_enqueue_style($handle, $src = '', $deps = array()): void
        {
            $style = [];

            $style['handle'] = $this->prepared_handle($handle);

            $style['src'] = $src;

            $style['deps'] = $deps;

            $style['ver'] = false;

            $this->styles[] = $style;
        }

        /**
         * Pipeline for WP function
         *
         * @param string $handle
         * @param string $src
         * @param array $deps
         * @param boolean $defer
         * @return void
         */
        public function wp_enqueue_script($handle, $src = '', $deps = array(), $defer = true): void
        {
            $script = [];

            $script['handle'] = $this->prepared_handle($handle);

            $script['src'] = $src;

            $script['deps'] = $deps;

            $script['ver'] = false;

            $script['defer'] = $defer;

            $this->scripts[] = $script;
        }
    }

    $qt_enqueue_sripts = new QT_Enqueue_Scripts(QUANTUM_THEME_URI, 'qt', QUANTUM_THEME_VERSION);

    $qt_enqueue_sripts->add_style('style');

    /**
     * Enquere siteNavigation.js
     */
    $qt_enqueue_sripts->add_script('siteNavigation');

    $qt_enqueue_sripts->enqueue();

endif;
