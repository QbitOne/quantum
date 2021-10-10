<?php

/**
 * Update Checker Class
 *
 * @since 2.7.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!class_exists('QT_Update_Checker')) :
    /**
     * Update Checker Class
     */
    class QT_Update_Checker
    {
        /**
         * Instance
         *
         * @var $instance
         */
        private static $instance;

        /**
         * Vendor file for update checker
         *
         * @var string
         */
        private static $vendor_file = QUANTUM_THEME_DIR . 'vendor/yahnis-elsts/plugin-update-checker/plugin-update-checker.php';

        /**
         * Remote path for the theme meta data
         *
         * @var string
         */
        private static $remote_path = 'http://qbitone.de/quantum.json';

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
            if (file_exists(self::$vendor_file)) {

                require $vendor_file;

                $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
                    self::$remote_path,
                    QUANTUM_THEME_DIR . 'functions.php',
                    'quantum'
                );
            } else {
                add_action('admin_notices', 'action_admin_notices');
            }
        }

        /**
         * Prints admin screen notices.
         * 
         * @param none
         * @return void
         */
        function action_admin_notices(): void
        {
            echo '<div class="notice notice-info is-dismissible">';
            echo '<p>Composer ist nicht installiert!</p>';
            echo '</div>';
        }
    }
endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
QT_Update_Checker::get_instance();
