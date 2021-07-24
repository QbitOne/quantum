<?php

/**
 * Update Checker for this theme
 */

require QUANTUM_THEME_DIR . 'vendor/yahnis-elsts/plugin-update-checker/plugin-update-checker.php';

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'http://qbitone.de/dev/themes/quantum.json',
    __FILE__, //Full path to the main plugin file or functions.php.
    'unique-plugin-or-theme-slug'
);
