<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until the <main> tag
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Quantum
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>


    <div id="page" class="site">

        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Springe zum Inhalt', 'quantum'); ?></a>
        <?php
        quantum_header_before();

        quantum_header();

        quantum_header_after();

        quantum_main_before();
        ?>

        <main id="primary" class="site-main">
