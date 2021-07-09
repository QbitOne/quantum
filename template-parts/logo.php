<?php

/**
 * This is the main Logo for the header
 */
?>

<!-- <div class="site-branding">
    <?php
    // the_custom_logo();
    // if (is_front_page() && is_home()) :
    ?>
        <h1 class="site-title"><a href="<?php // echo esc_url(home_url('/'));
                                        ?>" rel="home"><?php // bloginfo('name');
                                                        ?></a></h1>
    <?php
    // else :
    ?>
        <p class="site-title"><a href="<?php // echo esc_url(home_url('/'));
                                        ?>" rel="home"><?php // bloginfo('name');
                                                        ?></a></p>
    <?php
    // endif;
    // $quantum_description = get_bloginfo('description', 'display');
    // if ($quantum_description || is_customize_preview()) :
    ?>
        <p class="site-description">
            <?php // echo $quantum_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            ?>
        </p>
    <?php // endif;
    ?>
</div> -->
<!-- .site-branding -->


<div class="site-header__inner__branding">
    <a href="<?php echo esc_url(home_url('/')) ?>" rel="home">
        <img class="site-header__inner__branding__logo" src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/img/logo-sgdettingen.png" alt="Logo der SG Dettingen">
    </a>
</div>