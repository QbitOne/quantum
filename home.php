<?php

/**
 * The home template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

get_header();
?>

<div class="qu-container">

	<?php if (have_posts()) : ?>

		<?php if (!is_front_page()) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php endif; ?>

		<div class="posts qu-flex qu-flex-grid cols-3">

			<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();

				/*
                * Include the Post-Type-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                */
				get_template_part('template-parts/content', get_post_type());

			endwhile;
			?>
		</div>

		<?php the_posts_navigation(); ?>

	<?php else : ?>

		<?php get_template_part('template-parts/content', 'none'); ?>

	<?php endif; ?>

	<?php get_sidebar(); ?>

</div>

<?php

get_footer();
