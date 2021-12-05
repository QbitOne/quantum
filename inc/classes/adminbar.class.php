<?php

/**
 * Handling the WP backend adminbar
 *
 * @since 2.6.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!class_exists('QT_AdminBar')) :
    class QT_AdminBar
    {
        function __construct()
        {
            add_action('admin_bar_menu', [$this, 'admin_bar_menu'], 999);
        }

        /**
         * Load all necessary admin bar items.
         *
         * @param \WP_Admin_Bar $wp_admin_bar WP_Admin_Bar instance, passed by reference
         */
        public function admin_bar_menu(\WP_Admin_Bar $wp_admin_bar): void
        {

            $this->remove_default_nodes($wp_admin_bar);
            $this->add_git_branches($wp_admin_bar);
            $this->add_default_nodes($wp_admin_bar);
        }

        private function remove_default_nodes($wp_admin_bar): void
        {
            $wp_admin_bar->remove_node('wp-logo');
            $wp_admin_bar->remove_node('customize');
            $wp_admin_bar->remove_node('comments');
            $wp_admin_bar->remove_node('search');
        }

        private function add_git_branches($wp_admin_bar): void
        {
            if (file_exists(QUANTUM_THEME_DIR . '.git')) :
                $gitStr = file_get_contents(QUANTUM_THEME_DIR . '.git' . '/HEAD');
                $gitBranchName = rtrim(preg_replace("/(.*?\/){2}/", '', $gitStr));

                // add a parent item
                $args = array(
                    'id'        => 'git-branch-qt',
                    'title'     => 'QT: ' . $gitBranchName,
                    'parent'    => 'top-secondary',
                    'meta'         => [
                        'title'     => 'Git Branch Name',
                    ],
                );
                $wp_admin_bar->add_node($args);
            endif;


            if (defined('QUANTUM_CHILD_DIR') && file_exists(QUANTUM_CHILD_DIR . '.git')) :
                $gitStr = file_get_contents(QUANTUM_CHILD_DIR . '.git' . '/HEAD');
                $gitBranchName = rtrim(preg_replace("/(.*?\/){2}/", '', $gitStr));

                // add a parent item
                $args = array(
                    'id'        => 'git-branch-qc',
                    'title'     => 'QC: ' . $gitBranchName,
                    'parent'    => 'top-secondary',
                    'meta'         => [
                        'title'     => 'Git Branch Name',
                    ],
                );
                $wp_admin_bar->add_node($args);

            endif;
        }

        private function add_default_nodes($wp_admin_bar): void
        {
            // add a parent item
            $args = array(
                'id'        => 'quantum',
                'title'     => 'v.' . QUANTUM_THEME_VERSION,
                'parent'    => 'top-secondary',
                'meta'         => [
                    'title'     => 'Quantum Version',
                ],
            );
            $wp_admin_bar->add_node($args);

            if (defined('QUANTUM_CHILD_VERSION')) :
                // add a parent item
                $args = array(
                    'id'        => 'quantum-child',
                    'title'     => 'v.' . QUANTUM_CHILD_VERSION,
                    'parent'    => 'top-secondary',
                    'meta'         => [
                        'title'     => 'Quantum Child Version',
                    ],
                );
                $wp_admin_bar->add_node($args);
            endif;

            if (defined('QUANTUM_PROJECT_VERSION')) :
                // add a parent item
                $args = array(
                    'id'        => 'quantum-project',
                    'title'     => 'v.' . QUANTUM_PROJECT_VERSION,
                    'parent'    => 'top-secondary',
                    'meta'         => [
                        'title'     => 'Quantum Project Version',
                    ],
                );
                $wp_admin_bar->add_node($args);
            endif;

            // add a parent item
            $args = array(
                'id'        => 'qbitone',
                'title'     => 'QbitOne',
                'parent'    => 'top-secondary',
                'href'       => 'https://qbitone.de/',
                'meta'         => [
                    'title'     => 'zu QbitOne',
                    'target'    => '_blank',
                ],
            );
            $wp_admin_bar->add_node($args);
        }
    }
endif;
