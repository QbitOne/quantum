<?php

/**
 * Class for enqueueing scripts and styles.
 *
 * @since 2.6.0
 */

if (!defined('ABSPATH')) exit;

if (!class_exists('QT_Enqueue_Scripts')) :
    /**
     * Class for enqueueing scripts and styles.
     *
     * @since 2.6.0
     */
    class QT_Enqueue_Scripts
    {
        /**
         * The URI to the assets.
         *
         * @var string
         * @since 2.10.0
         */
        private $uri;

        /**
         * The handle prefix.
         * 
         * For Example ``qt``.
         *
         * @var string
         * @since 2.10.0
         */
        private $handle_prefix;

        /**
         * The script/style version.
         *
         * @var string
         * @since 2.10.0
         */
        private $version;

        /**
         * Style container.
         * 
         * Holds all added styles.
         *
         * @var array
         * @since 2.10.0
         */
        private $styles = [];

        /**
         * Login style container.
         * 
         * Holds all added login styles.
         *
         * @var array
         * @since 2.10.0
         */
        private $styles_login = [];

        /**
         * Script container.
         * 
         * Holds all added scripts.
         *
         * @var array
         * @since 2.10.0
         */
        private $scripts = [];

        /**
         * Defer scripts container.
         * 
         * Holds all scripts that will be loaded with ``defer``.
         *
         * @var array
         * @since 2.10.0
         */
        private $scripts_defer = [];

        /**
         * Constructor
         *
         * @param string $uri
         * @param string $handle_prefix
         * @param string $version
         * @since 2.10.0
         */
        function __construct(string $uri, string $handle_prefix, string $version)
        {
            $this->uri = $uri;
            $this->handle_prefix = $handle_prefix;
            $this->version = $version;

            add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
            add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
            add_action('login_enqueue_scripts', [$this, 'login_enqueue_scripts']);

            add_filter('script_loader_tag', [$this, 'filter_script_loader_tag'], 10, 3);
        }

        /**
         * Add a stylesheet.
         *
         * @param string $filename The filename of the stylesheet. Is also used as handle.
         * @param string $src 
         *  The source path to the file. Defaults to ``assets/css/``.
         *  If a source is given, the minified contional check to ``(un)minified directory`` is overwritten.
         * @param boolean $minified Checks if file is a ``.min`` file or not.
         * @param array $args Arguments like ``login`` to add stylesheet on login page.
         * @param array $deps Any dependencies, see ``wp_enqueue_styles()``.
         * @param boolean|string $ver The version of the file.
         * @param string $media The css media attribute.
         * @return void
         * @since 2.10.0
         */
        public function add_style($filename, $src = '', $minified = true, $args = [], $deps = [], $ver = false, $media = 'all'): void
        {
            $style = [];

            $handle = $filename;
            $filename .= $this->get_file_suffix($minified, '.css');

            if (empty($src)) :
                $src = 'assets/css/' . ($minified ? 'minified/' : 'unminified/');
            endif;

            $style['handle'] = $this->prepared_handle($handle);
            $style['src'] = $this->uri . $src . $filename;
            $style['deps'] = $deps;
            $style['ver'] = ($ver ? $ver : $this->version);
            $style['media'] = $media;

            if (in_array('login', $args)) :
                $style_arr = 'styles_login';
            else :
                $style_arr = 'styles';
            endif;
            $this->$style_arr[$style['handle']] = $style;
        }

        public function add_login_style($filename, $src = '', $minified = true, $args = ['login'], $deps = [], $ver = false, $media = 'all')
        {
            $this->add_style($filename, $src, $minified, $args, $deps, $ver, $media);
        }

        /**
         * Add a script.
         *
         * @param string $filename The filename of the script. Is also used as handle.
         * @param string $src
         *  The source path to the file. Defaults to ``assets/js/``.
         *  If a source is given, the minified contional check to ``(un)minified directory`` is overwritten.
         * @param boolean $minified Checks if file is a ``.min`` file or not.
         * @param array $args Arguments like ``defer`` to load script with defer attribute.
         * @param array $deps Any dependencies, see ``wp_enqueue_styles()``.
         * @param boolean|string $ver The version of the file.
         * @param boolean $in_footer If the script should be loaded in the footer.
         * @return void
         * @since 2.10.0
         */
        public function add_script($filename, $src = '', $minified = true, $args = ['defer'], $deps = [], $ver = false, $in_footer = false): void
        {
            $script = [];

            $handle = $filename;
            $filename .= $this->get_file_suffix($minified, '.js');

            if (empty($src)) :
                $src = 'assets/js/' . ($minified ? 'minified/' : 'unminified/');
            endif;

            $script['handle'] = $this->prepared_handle($handle);
            $script['src'] = $this->uri . $src . $filename;
            $script['deps'] = $deps;
            $script['ver'] = ($ver ? $ver : $this->version);
            $script['in_footer'] = $in_footer;

            if (in_array('defer', $args)) :
                $this->scripts_defer[] = $script['handle'];
            endif;
            $this->scripts[$script['handle']] = $script;
        }

        /**
         * Postfix the handle.
         * 
         * Example
         * -------
         * Handle is given by ``myHandle``.
         * Return value is then ``qt-myHandle`` if
         * prefix is given by ``qt``.
         *
         * @param string $handle The name for the handle
         * @return string
         * @since 2.10.0
         */
        private function prepared_handle($handle): string
        {
            return $this->handle_prefix . '-' . $handle;
        }

        /**
         * Get a file suffix.
         *
         * @param boolean $minified
         * @param string $file_format
         * @return string
         * @since 2.10.0
         */
        public function get_file_suffix($minified = true, $file_format = ''): string
        {
            return ($minified ? ".min$file_format" : "$file_format");
        }

        /**
         * Filters the HTML script tag of an enqueued script.
         *
         * @param   string  $tag    The <script> tag for the enqueued script.
         * @param   string  $handle The script's registered handle.
         * @param   string  $src    The script's source URL.
         * @return  string  The <script> tag for the enqueued script.
         * @since 2.10.0
         */
        public function filter_script_loader_tag(string $tag, string $handle, string $src): string
        {
            // if $handle is in our QT scripts, than output w/ defer attribute
            if (in_array($handle, $this->scripts_defer)) :
                $tag = '<script src="' . esc_url($src) . '" id="' . $handle . '-js" defer></script>';
            endif;

            return $tag;
        }

        /**
         * Enqueue all styles.
         *
         * @since 2.10.0
         */
        public function enqueue_styles(): void
        {
            foreach ($this->styles as $style) {
                wp_enqueue_style(
                    $style['handle'],
                    $style['src'],
                    $style['deps'],
                    $style['ver'],
                    $style['media'],
                );
            }
        }

        /**
         * Enqueue all styles for the login page.
         *
         * @since 2.10.0
         */
        public function login_enqueue_scripts(): void
        {
            foreach ($this->styles_login as $style) {
                wp_enqueue_style(
                    $style['handle'],
                    $style['src'],
                    $style['deps'],
                    $style['ver'],
                    $style['media']
                );
            }
        }

        /**
         * Enqueue all scripts.
         *
         * @return void
         * @since 2.10.0
         */
        public function enqueue_scripts(): void
        {
            foreach ($this->scripts as $script) {
                wp_enqueue_script(
                    $script['handle'],
                    $script['src'],
                    $script['deps'],
                    $script['ver'],
                    $script['in_footer'],
                );
            }
        }
    }
endif;
