<?php

/**
 * Author base slug controller class.
 * 
 * @author Andreas Geyer <andreas@qbitone.de>
 * @since 2.10.0
 */

if (!class_exists('QT_Author_Base_Controller')) :
    /**
     * Author base slug controller class.
     * 
     * This class controls the author base which 
     * can be accessed inside 
     * the WP settings > permalinks as a new input field.
     * 
     * @since 2.10.0
     */
    class QT_Author_Base_Controller
    {
        /**
         * Initialize the Author Base Controller.
         * 
         * @since 2.10.0
         */
        function __construct()
        {
            add_action('init', [$this, 'author_base_rewrite']);
            add_action('admin_init', [$this, 'author_base_add_settings_field']);
            add_action('admin_init', [$this, 'author_base_update']);
        }

        /**
         * Rewrite author base to custom.
         *
         * @return void
         * @since 2.10.0
         */
        function author_base_rewrite(): void
        {
            global $wp_rewrite;
            $author_base_db = get_option('qt_author_base');
            if (!empty($author_base_db)) {
                $wp_rewrite->author_base = $author_base_db;
            }
        }

        /**
         * Render textinput for Author base 
         * 
         * Callback for the add_settings_function().
         *
         * @return void
         * @since 2.10.0
         */
        function author_base_render_field(): void
        {
            global $wp_rewrite;
            printf(
                '<input name="qt_author_base" id="qt_author_base" type="text" value="%s" class="regular-text code">',
                esc_attr($wp_rewrite->author_base)
            );
        }

        /**
         * Add a setting field for Author Base to the "Optional" Section
         * of the Permalinks Page
         *
         * @return void
         * @since 2.10.0
         */
        function author_base_add_settings_field()
        {
            add_settings_field(
                'qt_author_base',
                esc_html__('Autor-Basis', 'quantum'),
                [$this, 'author_base_render_field'],
                'permalink',
                'optional',
                array('label_for' => 'qt_author_base')
            );
        }

        /**
         * Sanitize and save the given Author Base value to the database.
         *
         * @return void
         * @since 2.10.0
         */
        function author_base_update(): void
        {
            $author_base_db = get_option('qt_author_base');

            if (
                isset($_POST['qt_author_base']) &&
                isset($_POST['permalink_structure']) &&
                check_admin_referer('update-permalink')
            ) {
                $author_base = sanitize_title($_POST['qt_author_base']);

                if (empty($author_base)) {
                    add_settings_error(
                        'qt_author_base',
                        'qt_author_base',
                        esc_html__('Ungültige Autor-Basis.', 'quantum'),
                        'error'
                    );
                } elseif ($author_base_db != $author_base) {
                    update_option('qt_author_base', $author_base);
                }
            }
        }
    }
endif;

// init class
new QT_Author_Base_Controller();
