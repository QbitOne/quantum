<?php

/**
 * Main navigation for the Quantum Theme
 */
?>

<!-- <nav id="site-navigation" class="main-navigation">
    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php // esc_html_e('Primary Menu', 'quantum');
                                                                                    ?></button>
    <?php
    // wp_nav_menu(
    //     array(
    //         'theme_location' => 'primary-menu',
    //         'menu_id'        => 'primary-menu',
    //     )
    // );
    ?>
</nav> -->
<!-- #site-navigation -->


<!-- Navigation -->
<div class="site-header__inner__nav">
    <nav id="site-navigation">

        <?php
        // $nav_name = (is_home() ? 'home_menu' : 'primary_menu');
        wp_nav_menu(
            array(
                'theme_location'    => 'primary_menu',
                'menu_id'           => 'primary_menu',
                'fallback_cb'       => 'quantum_no_webpage_selected',
            )
        );
        ?>

    </nav>
</div>

<!-- Burger Button -->
<div class="site-header__inner__mobile-btn">
    <button id="menu-toggle" class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <span id="burger-btn" class="mobile-menu-burger-btn"></span>
    </button>
</div>
