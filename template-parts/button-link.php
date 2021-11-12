<?php

/**
 * Button link template part.
 * 
 * This template part defines the markup
 * of a standard anchor tag <a> implemented
 * as a button.
 * 
 * @author Andreas Geyer <andreas@qbitone.de>
 * @since 2.9.0
 */

$default_args = [
    'href'      => '#',
    'class'     => 'qu-button',
    'innerHTML' => 'Link',
];

$args = wp_parse_args($args, $default_args);


if (!function_exists('quantum_button_link_attr_is_valid')) :
    function quantum_button_link_attr_is_valid($check, $args)
    {
        $attr = '';
        if (isset($args[$check]) && !empty($args[$check])) :
            $attr = $check . '="' . $args[$check] . '" ';

            if ($check === 'download' && $args[$check] === True) :

                $attr = $check . ' ';
            endif;
        endif;
        return $attr;
    }
endif;

$attrs_div = '';
$attrs_div .= quantum_button_link_attr_is_valid('class', $args);
$attrs_div .= quantum_button_link_attr_is_valid('id', $args);


$attrs_link = '';
$attrs_link .= quantum_button_link_attr_is_valid('href', $args);
$attrs_link .= quantum_button_link_attr_is_valid('target', $args);
$attrs_link .= quantum_button_link_attr_is_valid('download', $args);

?>

<div <?php echo $attrs_div ?>>
    <a <?php echo $attrs_link ?>><?php echo $args['innerHTML'] ?></a>
</div>