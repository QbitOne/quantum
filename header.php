<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
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

        <?php
        // TODO @Michael link aus dem Frontend nehmen; soll nur für screenreader von nutzen sein
        // die ursprünglichen _s styles haben das hier sicher passend gestyled
        // die styles haben wir ja doch noch in style_.css?!
        ?>
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Springe zum Inhalt', 'quantum'); ?></a>

        <?php get_template_part('template-parts/header'); ?>