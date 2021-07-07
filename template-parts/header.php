<?php

/**
 * This is the default header for the Quantum Theme
 */
?>

<header id="masthead" class="site-header">

    <div class="site-header__inner wrapper">

        <?php get_template_part('template-parts/logo'); ?>

        <?php get_template_part('template-parts/navigation'); ?>

    </div>

    <!-- <div class="site-header__mobile-nav">
        <nav id="mobile-site-navigation">

            <?php
            // $nav_name = (is_home() ? 'home_menu' : 'primary_menu');

            // wp_nav_menu(
            //     array(
            //         'theme_location' => $nav_name,
            //         'menu_id'        => $nav_name . '-mobile',
            //         'fallback_cb'       => false,
            //     )
            // );
            ?>
        </nav>
    </div> -->

</header><!-- #masthead -->
