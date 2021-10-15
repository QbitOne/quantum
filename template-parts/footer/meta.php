<?php

/**
 * Template part for meta project stuff
 * 
 * @since 0.2.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly


$footer_meta_project_name = get_bloginfo('name');
$footer_meta_domain = apply_filters('footer_meta_domain', 'www.quantum.de');
$footer_meta_defaul_mail = apply_filters('footer_meta_default_mail', 'info@quantum.de');

$footer_meta_format = '%s | %s | %s';
$footer_meta_output = sprintf($footer_meta_format, $footer_meta_project_name, $footer_meta_domain, $footer_meta_defaul_mail);
?>

<div>
    <small><?php echo $footer_meta_output; ?></small>
</div>