<?php

/**
 * Content meta.
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<div class="entry-meta">

    <?php
    quantum_categories();

    quantum_tags();

    quantum_posted_on();

    if (get_theme_mod('qt-set-modified-on', false)) :
        quantum_modified_on();
    endif;

    quantum_posted_by();
    ?>

</div><!-- .entry-meta -->