<?php

/**
 * Theme hook list.
 *
 * @see  https://github.com/zamoose/themehookalliance
 *
 * @package     Quantum
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

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
