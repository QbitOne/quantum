<?php

/**
 * Loader for core files
 */

$path = QUANTUM_THEME_DIR . 'inc/core/';

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
 * Implementation for theme updates via WP Backend
 */
// TODO @Andreas hier erst einbinden wenn es über functions.php läuft (code muss dann noch etwas angepasst werden)
// require_once $path . 'update-checker.php';

/**
 * All theme hooks
 */
require_once $path . 'theme-hooks.php';
