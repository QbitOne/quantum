<?php

/**
 * Quantum functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Quantum
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;


define('QUANTUM_THEME_VERSION', '2.6.1');
define('QUANTUM_THEME_SETTINGS', 'quantum-settings');
define('QUANTUM_THEME_DIR', trailingslashit(get_template_directory()));
define('QUANTUM_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
define('QUANTUM_UPLOADS_URI', trailingslashit(esc_url(wp_get_upload_dir()['baseurl'])));


if (!function_exists('quantum_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function quantum_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Quantum, use a find and replace
		 * to change 'quantum' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('quantum', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary_menu' => esc_html__('Hauptmenü', 'quantum'),
                'footer_menu' => esc_html__('Footer Menü', 'quantum'),
                'footerbar_menu' => esc_html__('Footer Bar Menü', 'quantum'),
                'blog_menu' => esc_html__('Blog Menü', 'quantum'),
            )
        );

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'quantum_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'quantum_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function quantum_content_width()
{
    $GLOBALS['content_width'] = apply_filters('quantum_content_width', 640);
}
add_action('after_setup_theme', 'quantum_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function quantum_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'quantum'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Füge hier neue Widgets hinzu', 'quantum'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 1', 'quantum'),
            'id'            => 'footer-1',
            'description'   => esc_html__('Widgets für die erste Footer Spalte', 'quantum'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 2', 'quantum'),
            'id'            => 'footer-2',
            'description'   => esc_html__('Widgets für die zweite Footer Spalte', 'quantum'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 3', 'quantum'),
            'id'            => 'footer-3',
            'description'   => esc_html__('Widgets für die dritte Footer Spalte', 'quantum'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 4', 'quantum'),
            'id'            => 'footer-4',
            'description'   => esc_html__('Widgets für die vierte Footer Spalte', 'quantum'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'quantum_widgets_init');






/**
 * Change the URL for the Login Page Logo
 */
if (!function_exists('quantum_login_logo_url')) {
    function quantum_login_logo_url()
    {
        return home_url('/');
    }
    add_filter('login_headerurl', 'quantum_login_logo_url');
}


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






/**
 * Disable the emoji's
 * @link    https://kinsta.com/de/wissensdatenbank/deaktivierst-emojis-wordpress/#disable-emojis-plugin
 */
// function disable_emojis() {
// 	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
// 	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
// 	remove_action( 'wp_print_styles', 'print_emoji_styles' );
// 	remove_action( 'admin_print_styles', 'print_emoji_styles' );
// 	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
// 	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
// 	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
// 	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
// 	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
// }
// add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * @param 	array $plugins
 * @return 	array Difference betwen the two arrays
 */
// function disable_emojis_tinymce( $plugins ) {
// 	if ( is_array( $plugins ) ) {
// 		return array_diff( $plugins, array( 'wpemoji' ) );
// 	} else {
// 		return array();
// 	}
// }

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 * @param 	array $urls URLs to print for resource hints.
 * @param 	string $relation_type The relation type the URLs are printed for.
 * @return 	array Difference betwen the two arrays.
 */
// function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
// 	if ( 'dns-prefetch' == $relation_type ) {
// 		/** This filter is documented in wp-includes/formatting.php */
// 		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

// 		$urls = array_diff( $urls, array( $emoji_svg_url ) );
// 	}
// 	return $urls;
// }


/**
 * Deregister the wp_embed js script from the website
 * @link    https://kinsta.com/de/wissensdatenbank/deaktivierst-embeds-wordpress/#disable-embeds-code
 */
// if ( ! function_exists( 'quantum_deregister_wp_embed' ) ) {
// 	function quantum_deregister_wp_embed() {
// 		wp_dequeue_script( 'wp-embed' );
// 	}
// 	add_action( 'wp_footer', 'quantum_deregister_wp_embed' );
// }




/**
 * Print a src for an img tag. If filename is given,
 * the src will be loaded.
 * If now filename is given (empty string excepted)
 * then a dummy image with the size given in args is loaded
 *
 * @param   string $filename
 * @param   string $args
 * @return  void
 */
// function the_quantum_image_src( string $filename, string $args ) {

//     if ( empty( $filename ) ) {

//         $format = 'https://dummyimage.com/%s';
//         printf( $format, $args );
//     } else {

//         $path = get_template_directory_uri() . '/assets/img/' . $filename;
//         echo $path;
//     }
// }

if (!function_exists('quantum_footerbar_menu')) :

    function quantum_footerbar_menu(): void
    {

        if (has_nav_menu('footerbar_menu')) :
            wp_nav_menu(
                array(
                    'theme_location'    => 'footerbar_menu',
                    'menu_id'           => 'footerbar_menu',
                    'fallback_cb'       => false,
                )
            );
        endif;

        do_action('quantum_footer_navigation_extension');
    }
endif;


if (!function_exists('quantum_footerbar_meta')) :

    function quantum_footerbar_meta(): void
    {

        $url = parse_url(home_url('/'), PHP_URL_HOST);

        // Check whether the URL is www-prefixed
        if (explode('.', $url)[0] === $url) {
            $url = 'www.' . $url;
        }
        echo $url;
    }
endif;


if (!function_exists('quantum_footerbar_copyright')) :

    function quantum_footerbar_copyright(): void
    {

        $copyright = apply_filters('quantum_copyright_text', 'Copyright');

        // TODO: implement solution you use a year of foundation
        // $year_of_foundation = apply_filters('quantum_copyright_year_of_foundation', '');

        $current_year = date('Y');
        $site_title = get_bloginfo('name');

        $format = '<span role="contentinfo">%s &copy; %s %s</span>';
        printf($format, esc_html($copyright), $current_year, $site_title);
    }
endif;

// Fallback for new php8 function
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle): bool
    {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}


function quantum_count_active_footer_sidebars(): int
{
    $count = 0;
    $sidebars = $GLOBALS['wp_registered_sidebars'];

    foreach ($sidebars as $sidebar_key => $sidebar_array) {
        if (str_contains($sidebar_key, 'footer') && is_active_sidebar($sidebar_key)) :
            $count++;
        endif;
    }
    return $count;
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';



/**
 * Enqueue the Button Template
 */
require get_template_directory() . '/template-parts/button.php';


// TODO Ship the below vendor code in a separate directory
$vendor_file = QUANTUM_THEME_DIR . 'vendor/yahnis-elsts/plugin-update-checker/plugin-update-checker.php';

if (file_exists($vendor_file)) {

    require $vendor_file;

    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
        'http://qbitone.de/quantum.json',
        __FILE__, //Full path to the main plugin file or functions.php.
        'quantum'
    );
} else {
    add_action('admin_notices', 'sample_admin_notice__success');
}

function sample_admin_notice__success()
{
?>
    <div class="notice notice-info is-dismissible">
        <p>Composer ist nicht installiert!</p>
    </div>
<?php
}




/**
 * load all included files
 */
require_once QUANTUM_THEME_DIR . 'inc/loader.php';
