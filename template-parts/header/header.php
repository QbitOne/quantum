<?php

/**
 * This is the default header for the Quantum Theme
 */
?>

<header id="masthead" class="site-header">

    <div class="site-header__inner qu-container">

        <?php get_template_part('template-parts/header/site-branding'); ?>

        <?php get_template_part('template-parts/header/navigation'); ?>

    </div>

    <?php
    // TODO improve code
    // the div element below shouldnt be necessary
    ?>
	<!--
    <div class="site-header__mobile-nav">
        <nav id="mobile-site-navigation">

            <?php
            // $nav_name = (is_home() ? 'home_menu' : 'primary_menu');

            wp_nav_menu(
                array(
                    'theme_location' => 'primary_menu',
                    'menu_id'        => 'primary_menu-mobile',
                    'fallback_cb'       => false,
                )
            );
            ?>

            <?php do_action('quantum_header_navigation_mobile_extension'); ?>
        </nav>
    </div>
		-->

</header><!-- #masthead -->
