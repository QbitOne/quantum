<?php

/**
 * Helper functions.
 * 
 * These functions are not intented to
 * be used further used in development.
 * 
 * @author Andreas Geyer <andreas@qbitone.de>
 * @since 2.7.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly


if (!function_exists('wp_body_open')) :
    /**
     * Shim for wp_body_open, ensuring backward compatibility 
     * with versions of WordPress older than 5.2.
     *
     * @link https://core.trac.wordpress.org/ticket/12563
     * @link https://en.wikipedia.org/wiki/Shim_(computing)
     * @return void
     * @since 2.7.0
     */
    function wp_body_open(): void
    {
        do_action('wp_body_open');
    }
endif;


if (!function_exists('quantum_filter_document_title_separator')) {
    /**
     * Filters the separator for the document title.
     *
     * @param string $sep Document title separator. Default '-'.
     * @return string Document title separator. Default '-'.
     */
    function quantum_filter_document_title_separator(string $sep): string
    {
        $sep = '|';
        return $sep;
    }
    add_filter('document_title_separator', 'quantum_filter_document_title_separator', 10, 1);
}


if (!function_exists('quantum_filter_wp_robots')) {
    /**
     * Filters the directives to be included in the 'robots' meta tag.
     *
     * @param   array $robots Associative array of directives. Every key must be the name of the directive, and the
     *                  corresponding value must either be a string to provide as value for the directive or a
     *                  boolean true if it is a boolean directive, i.e. without a value.
     * @return  array Associative array of directives. Every key must be the name of the directive, and the
     *                  corresponding value must either be a string to provide as value for the directive or a
     *                  boolean true if it is a boolean directive, i.e. without a value.
     * @since 2.7.0
     */
    function quantum_filter_wp_robots(array $robots): array
    {
        if (is_archive()) {
            $robots['noindex'] = true;
        }
        return $robots;
    }
    add_filter('wp_robots', 'quantum_filter_wp_robots', 10, 1);
}


if (!function_exists('quantum_no_webpage_selected')) :
    /**
     * Fallback if no webpage is selected in registered menu.
     *
     * @return void
     * @since 2.7.0
     */
    function quantum_no_webpage_selected(): void
    {
        echo "<div>Keine Webseite im Menu ausgewählt</div>";
    }
endif;


if (!function_exists('quantum_login_logo_url')) {
    /**
     * Change the URL for the login page logo.
     *
     * @return void
     * @since 2.7.0
     */
    function quantum_login_logo_url()
    {
        return esc_url(home_url('/'));
    }
    add_filter('login_headerurl', 'quantum_login_logo_url');
}


if (!function_exists('quantum_disable_emojis')) :
    /**
     * Disable emoji's.
     * 
     * Disable emoji's by removing WP default actions and filters.
     * 
     * @return void
     * @see /wp-includes/default-filters.php
     * @link https://kinsta.com/de/wissensdatenbank/deaktivierst-emojis-wordpress/#disable-emojis-plugin
     * @since 2.8.0
     */
    function quantum_disable_emojis(): void
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');

        // RSS filters.
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');

        // Email filters.
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

        // Embeds.
        remove_action('embed_head', 'print_emoji_detection_script');

        add_filter('tiny_mce_plugins', 'quantum_disable_emojis_tinymce');
        add_filter('wp_resource_hints', 'quantum_disable_emojis_remove_dns_prefetch', 10, 2);
    }
    add_action('init', 'quantum_disable_emojis');
endif;


if (!function_exists('quantum_disable_emojis_tinymce')) :
    /**
     * Filter function used to remove the tinymce emoji plugin.
     * 
     * @param array $plugins
     * @return array Difference betwen the two arrays
     * @see quantum_disable_emojis()
     * @since 2.7.0
     */
    function quantum_disable_emojis_tinymce(array $plugins): array
    {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        } else {
            return array();
        }
    }
endif;


if (!function_exists('quantum_disable_emojis_remove_dns_prefetch')) :
    /**
     * Remove emoji CDN hostname from DNS prefetching hints.
     * 
     * @param array $urls URLs to print for resource hints.
     * @param string $relation_type The relation type the URLs are printed for.
     * @return array Difference betwen the two arrays.
     * @see quantum_disable_emojis()
     * @since 2.7.0
     */
    function quantum_disable_emojis_remove_dns_prefetch(array $urls, string $relation_type): array
    {
        if ('dns-prefetch' == $relation_type) {
            /** This filter is documented in wp-includes/formatting.php */
            $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
            $urls = array_diff($urls, array($emoji_svg_url));
        }
        return $urls;
    }
endif;


if (!function_exists('quantum_deregister_wp_embed')) {
    /**
     * Deregister the wp_embed js script from the website.
     * 
     * @link https://kinsta.com/de/wissensdatenbank/deaktivierst-embeds-wordpress/#disable-embeds-code
     * @since 2.7.0
     */
    function quantum_deregister_wp_embed(): void
    {
        wp_dequeue_script('wp-embed');
    }
    add_action('wp_footer', 'quantum_deregister_wp_embed');
}

if (!function_exists('get_quantum_branding_text')) :
    /**
     * Return the branding text.
     * 
     * If the WP theme support for ``custom-logo`` allows for ``unlink-homepage-logo``
     * the branding text will have the same behavior of not linking to the homepage
     * if you are already on the homepage
     * 
     * @return string The html string for the branding text
     * @since 2.7.3
     * 
     * @filter ``quantum_branding_text`` (default: bloginfo('name'))
     * 
     */
    function get_quantum_branding_text(): string
    {
        $html = '';
        $unlink_homepage_logo = (bool) get_theme_support('custom-logo', 'unlink-homepage-logo');
        $text = apply_filters('quantum_branding_text', get_bloginfo('name'));

        if ($unlink_homepage_logo && is_front_page() && !is_paged()) {
            // If on the home page, don't link the logo to home.
            $html = sprintf(
                '<span class="custom-logo-link">%1$s</span>',
                $text
            );
        } else {
            $aria_current = is_front_page() && !is_paged() ? 'aria-current="page"' : '';

            $html = sprintf(
                '<a href="%1$s" class="custom-logo-link" rel="home" %2$s>%3$s</a>',
                esc_url(home_url('/')),
                $aria_current,
                $text
            );
        }
        return $html;
    }
endif;


if (!function_exists('quantum_remove_generator')) :
    /**
     * Removes the genertor tag.
     *
     * @return void
     * @see wp_generator() in /wp-includes/general-template.php
     * @since 2.8.0
     */
    function quantum_remove_generator(): void
    {
        remove_action('wp_head', 'wp_generator');
    }
    add_action('init', 'quantum_remove_generator');
endif;



/**
 * Remove WP Gutenberg core styles
 */
// if ( ! function_exists( 'quantum_remove_wp_block_library_css' ) ) {
// 	function quantum_remove_wp_block_library_css() {
// 		wp_dequeue_style( 'wp-block-library' );
// 		wp_dequeue_style( 'wp-block-library-theme' );
// 		wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
// 	}
// 	add_action( 'wp_enqueue_scripts', 'quantum_remove_wp_block_library_css', 100 );
// }


if (!function_exists('quantum_filter_body_class')) :
    /**
     * Filters the list of CSS body class names for the current post or page.
     *
     * @param string[] $classes An array of body class names.
     * @param string[] $class   An array of additional class names added to the body.
     * @return string[] An array of body class names.
     * @since 2.9.0
     */
    function quantum_filter_body_class(array $classes, array $class): array
    {
        global $post;
        // add the post slug to the body classes.
        $classes[] = $post->post_name;
        return $classes;
    }
    add_filter('body_class', 'quantum_filter_body_class', 10, 2);
endif;
