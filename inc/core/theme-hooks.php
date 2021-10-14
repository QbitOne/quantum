<?php

/**
 * Theme Hook Alliance hook stub list.
 *
 * @see  https://github.com/zamoose/themehookalliance
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

function quantum_header_before()
{
    do_action('quantum_header_before');
}

function quantum_header()
{
    do_action('quantum_header');
}

function quantum_header_after()
{
    do_action('quantum_header_after');
}

function quantum_main_before()
{
    do_action('quantum_main_before');
}

function quantum_footer_before()
{
    do_action('quantum_footer_before');
}

function quantum_footer()
{
    do_action('quantum_footer');
}

function quantum_footer_after()
{
    do_action('quantum_footer_after');
}
