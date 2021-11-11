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

$button_link_default_args = [
    'href'      => '#',
    'class'     => 'qu-button',
    'innerHTML' => 'Link',
];

$args = wp_parse_args($args, $button_link_default_args);


$button_link_attrs = '';
if ($args['class']) :
    $button_link_attrs .= 'class="' . $args['class'] . '" ';
endif;
?>

<div <?php echo $button_link_attrs ?>>

    <?php
    $button_link_attrs = '';
    if ($args['href']) :
        $button_link_attrs .= 'href=' . $args['href'] . ' ';
    endif;
    if ($args['target']) :
        $button_link_attrs .= 'target="' . $args['target'] . '" ';
    endif;
    ?>

    <a <?php echo $button_link_attrs ?>><?php echo $args['innerHTML'] ?></a>
</div>

<?php
unset($button_link_default_args);
unset($button_link_attrs);
