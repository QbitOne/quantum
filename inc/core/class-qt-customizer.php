<?php

/**
 * Customizer API class.
 */

class QT_Customizer_API
{
    /**
     * Main panel name
     *
     * @var string
     */
    private $panel_name = 'qt_quantum';

    public function __construct()
    {
        add_action('customize_register', [$this, 'action_customize_register']);
    }

    /**
     * Fires once WordPress has loaded, allowing scripts and styles to be initialized.
     */
    function action_customize_register($wp_customize): void
    {
        $this->register_main_panel($wp_customize);
        $this->register_blog_section($wp_customize);
    }

    public function register_main_panel($wp_customize): void
    {
        $wp_customize->add_panel(
            $this->panel_name,
            [
                'title' => 'Quantum',
                'description' => esc_html__('Quantum Theme Einstellungen', 'quantum'),
            ]
        );
    }

    function register_blog_section($wp_customize): void
    {
        $sec_name = 'qt-sec-quantum';

        $wp_customize->add_section(
            $sec_name,
            [
                'title' => 'Blog',
                'description' => esc_html__('Blog Einstellungen', 'quantum'),
                'panel' => $this->panel_name,
            ]
        );

        $setting_name = 'qt-set-modified-on';
        $wp_customize->add_setting(
            $setting_name,
            [
                'type' => 'theme_mod',
            ]
        );
        $wp_customize->add_control(
            $setting_name,
            [
                'type' => 'checkbox',
                'section' => $sec_name,
                'label' => esc_html__('Anzeige für: \'Aktualisiert am\'', 'quantum'),
                'description' => esc_html__('Gibt an, ob die Anzeige \'Aktualisiert am\' ausgegeben werden soll.', 'quantum'),
            ]
        );
    }
}
