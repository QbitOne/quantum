<?php

/**
 * This is the main logo for the header
 *
 * Usage of the filter:
 * -> default is null
 * Filter excepts either False which will
 * output the h1 tags with the WP page title,
 * or the filename of the logo in the active theme
 * as 'logo-name.fileformat' which will then output the
 * logo with its markup. Besides those two valid values
 * the output will be a placeholder image logo
 */
?>

<div class="site-header__inner__branding">

    <a href="<?php echo esc_url(home_url('/')) ?>" rel="home">

        <?php

        $logo_filename = apply_filters('quantum_logo_filename', null);

        if ($logo_filename === false) :

            echo '<h1>' . get_bloginfo('title') . '</h1>';

        else :


            $logo_path = get_stylesheet_directory() . '/assets/img/' . $logo_filename;

            if (is_file($logo_path)) :

                $logo_uri = esc_url(get_stylesheet_directory_uri() . '/assets/img/' . $logo_filename);

            else :

                // use dummy image if no logo file is given
                $logo_uri = 'https://via.placeholder.com/240x60.png?text=Logo';

            endif;

            $logo_alt = apply_filters('quantum_logo_alt', 'Logo');
        ?>

            <img class="site-header__inner__branding__logo" src="<?php echo $logo_uri ?>" alt="<?php echo $logo_alt; ?>">

        <?php endif; ?>

    </a>
</div>
