<?php

/**
 * Loader for core files
 */

$path = QUANTUM_THEME_DIR . 'inc/core/';

/**
 * Functions which enhance the theme by hooking into WP
 */
require_once $path . 'core-actions.php';

/**
 * Functions which use WP core filters
 */
require_once $path . 'core-filter.php';

/**
 * Functions which generally enchance the theme
 * e.g. callback/fallback functions
 */
require_once $path . 'core-functions.php';

/**
 * Enqueues sccripts (css/js) into the theme
 */
require_once $path . 'enqueue-scripts.php';

/**
 * Functions which can be uses inside template-parts
 */
require_once $path . 'utility-functions.php';

/**
 * Implementation for theme updates via WP Backend
 */
// TODO @Andreas hier erst einbinden wenn es über functions.php läuft (code muss dann noch etwas angepasst werden)
// require_once $path . 'update-checker.php';
