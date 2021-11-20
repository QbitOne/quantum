<?php

/**
 * Template part for displaying page content in page.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (get_edit_post_link()) : ?>
		<?php quantum_edit_post_link() ?>
	<?php endif; ?>

	<header class="entry-header">

		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>

	</header><!-- .entry-header -->

	<?php quantum_post_thumbnail(); ?>

	<div class="entry-content">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if (get_edit_post_link()) : ?>
			<?php quantum_edit_post_link() ?>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->