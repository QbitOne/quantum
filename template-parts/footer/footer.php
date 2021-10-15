<?php

/**
 * Template part for the footer
 *
 * @since 2.7.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<footer id="footer" class="site-footer">
	<div class="qu-container">
		<div id="footer-content">
			<?php get_template_part('template-parts/footer/content'); ?>
		</div>
		<div id="footerbar">
			<div class="qu-flex justify--between">
				<?php get_template_part('template-parts/footer/copyright'); ?>
				<?php get_template_part('template-parts/footer/meta'); ?>
				<?php get_template_part('template-parts/footer/social'); ?>
			</div>
			<div>
				<?php get_template_part('template-parts/footer/nav'); ?>
			</div>
		</div>
	</div>
</footer>