<?php

/**
 * Branding Template Part
 * 
 * @since 1.0.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<div class="site-header__inner__branding">
    <?php
    if (!has_custom_logo()) :
        echo get_quantum_branding_text();
    else :
        the_custom_logo();
    endif;
    ?>
</div>