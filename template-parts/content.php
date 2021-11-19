<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

?>

<article id="post-<?php the_ID(); ?>" <?php post_class((!is_singular() ? 'qu-flex-grid__item' : '')); ?>>

	<header class="entry-header">

		<?php quantum_post_thumbnail(); ?>

		<?php
		if (is_singular()) :
			quantum_categories();
		endif;
		?>

		<?php echo get_quantum_title(); ?>

		<?php if (is_singular()) : ?>
			<div>
				<?php quantum_posted_by(); ?>

				<?php

				if (get_theme_mod('qt-set-modified-on', false)) :
					quantum_modified_on();
				else :
					quantum_posted_on();
				endif;

				?>
			</div>
		<?php endif ?>


	</header><!-- .entry-header -->

	<?php if (is_singular()) : ?>

		<div class="entry-content">

			<?php the_content() ?>

			<?php
			wp_link_pages(
				[
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'quantum'),
					'after'  => '</div>',
				]
			);
			?>

		</div><!-- .entry-content -->

	<?php endif ?>


	<?php if (!is_singular() && has_excerpt()) :  ?>

		<div class="entry-excerpt">

			<?php the_excerpt(); ?>

		</div><!-- .entry-excerpt -->

	<?php endif ?>


	<?php if (is_singular()) : ?>
		<hr>
	<?php endif; ?>


	<footer class="entry-footer">

		<?php quantum_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->