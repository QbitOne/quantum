<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Quantum
 */

?>

</main><!-- #main -->

<footer id="footer" class="">

    <?php do_action('quantum_footer'); ?>

    <div class="footerbar">

        <div>
            <?php quantum_footerbar_copyright(); ?>
        </div>

        <div>
            <?php quantum_footerbar_meta(); ?>
        </div>

        <div>
            <?php quantum_footerbar_menu(); ?>
        </div>

    </div><!-- .footerbar -->



</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
