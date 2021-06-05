<?php

/**
 * Footer layout
 *
 * @package Quantum
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;


$columns = apply_filters('quantum_footer_columns', quantum_count_active_footer_sidebars());
$grid_class = '';
?>



<?php
    // Footer box 2.
	if ( $columns > '0' ) :
?>
<div class="footer-box <?php echo esc_attr( $grid_class ); ?> col col-1">
    <?php dynamic_sidebar( 'footer-1' ); ?>
</div><!-- .footer-one-box -->
<?php endif; ?>

<?php do_action('quantum_footer_column_one_after'); ?>

<?php
    // Footer box 2.
	if ( $columns > '1' ) :
?>
<div class="footer-box <?php echo esc_attr( $grid_class ); ?> col col-2">
    <?php dynamic_sidebar( 'footer-2' ); ?>
</div><!-- .footer-one-box -->
<?php endif; ?>

<?php
	// Footer box 3.
	if ( $columns > '2' ) :
?>
<div class="footer-box <?php echo esc_attr( $grid_class ); ?> col col-3 ">
    <?php dynamic_sidebar( 'footer-3' ); ?>
</div><!-- .footer-one-box -->
<?php endif; ?>

<?php
	// Footer box 4.
	if ( $columns > '3' ) :
?>
<div class="footer-box <?php echo esc_attr( $grid_class ); ?> col col-4">
    <?php dynamic_sidebar( 'footer-4' ); ?>
</div><!-- .footer-box -->
<?php endif; ?>