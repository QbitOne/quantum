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

		<?php if (is_singular()) : ?>

			<h1 class="entry-title"> <?php the_title() ?> </h1>

		<?php else : ?>

			<h2 class="entry-title">

				<a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark">

					<?php the_title(); ?>

				</a>

			</h2>

		<?php endif ?>

	</header><!-- .entry-header -->


	<?php quantum_post_thumbnail(); ?>


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