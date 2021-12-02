<?php

/**
 * Enqueue scripts.
 * 
 * @see inc/classes/enqueue-scripts.class.php
 * @since 2.10.0
 */

$QT_Enqueue_Scripts = new QT_Enqueue_Scripts(QUANTUM_THEME_URI, 'qt', QUANTUM_THEME_VERSION);

$QT_Enqueue_Scripts->add_style('style');
$QT_Enqueue_Scripts->add_script('siteNavigation');
