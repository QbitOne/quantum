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
        private static $remote_path = 'https://qbitone.de/quantum.json';

        /**
         * Constructor
         */
        public function __construct()
        {
            if (file_exists(self::$vendor_file)) {

                require self::$vendor_file;

                $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
                    self::$remote_path,
                    QUANTUM_THEME_DIR . 'functions.php',
                    'quantum'
                );

                if (defined('QT_ENV') && QT_ENV === 'dev') :
                    add_action('admin_notices', [$this, 'action_admin_notices_activ_plugin_checker']);
                endif;
            } else {
                add_action('admin_notices', [$this, 'action_admin_notices_no_composer']);
            }
        }

        /**
         * Prints admin screen notices.
         * 
         * @param none
         * @return void
         */
        function action_admin_notices_no_composer(): void
        {
            echo '<div class="notice notice-info is-dismissible">';
            echo '<p>Composer ist nicht installiert!</p>';
            echo '</div>';
        }

        /**
         * Prints admin screen notices.
         * 
         * @param none
         * @return void
         */
        function action_admin_notices_activ_plugin_checker(): void
        {
            echo '<div class="notice notice-info is-dismissible">';
            echo '<p>Update Checker ist aktiv</p>';
            echo '</div>';
        }
    }
endif;
