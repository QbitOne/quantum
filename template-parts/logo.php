<?php

/**
 * This is the main Logo for the header
 */
?>

<?php

$logo_filename = apply_filters('quantum_logo_filename', '');
$logo_alt = apply_filters('quantum_logo_alt', 'Logo');

if ($logo_filename) {
    $logo_path = esc_url(get_stylesheet_directory_uri() . '/assets/img/ ' . $logo_filename);
} else {
    // use dummy image if no logo file is given
    $logo_path = 'https://via.placeholder.com/240x60.png?text=Logo';
}

?>


<div class="site-header__inner__branding">
    <a href="<?php echo esc_url(home_url('/')) ?>" rel="home">
        <img class="site-header__inner__branding__logo" src="<?php echo $logo_path ?>" alt="<?php echo $logo_alt; ?>">
    </a>
</div>
