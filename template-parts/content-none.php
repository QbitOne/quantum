<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum
 */

?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Keine Inhalte gefunden', 'quantum'); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) :

            printf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __('Bereit deinen ersten Inhalt zu veröffentlichen? <a href="%1$s">Beginne hier</a>.', 'quantum'),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );

        elseif (is_search()) :
        ?>

            <p><?php esc_html_e('Es wurden keine Inhalte gefunden. Bitte versuche andere Schlagwörter.', 'quantum'); ?></p>
        <?php
            get_search_form();

        else :
        ?>

            <p><?php esc_html_e('Es scheint wir haben hierzu nichts gefunden. Vielleicht kann dir die Suchfunktion weiterhelfen.', 'quantum'); ?></p>
        <?php
            get_search_form();

        endif;
        ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
