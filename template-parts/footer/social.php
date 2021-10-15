<?php

/**
 * Template part for social media icons
 *
 * @since 2.7.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly


$footer_social_icons = [
	'twitter' => [
		'name'  => 'Twitter',
		'url'   => 'https://twitter.com/qbitone',
	],
	'facebook' => [
		'name'  => 'Facebook',
		'url'   => 'https://facebook.com/qbitone',
	],
	'instagram' => [
		'name'  => 'Instagram',
		'url'   => 'https://instragram.com/qbitone',
	],
	'linkedin' => [
		'name'  => 'LinkedIn',
		'url'   => 'https://linkedin.com/company/qbitone',
	],
];
?>

<ul id="footerbar__social" class="qu-flex no-list-style">

	<?php
	/**
	 * Loop over all defined social entries
	 */
	foreach ($footer_social_icons as $key => $value) : ?>
		<li>
			<small>
				<a rel="nofollow noopener noreferrer" target="_blank" aria-label="<?php echo $value['name']; ?>" href="<?php echo $value['url']; ?>">
					<img class="" src="<?php echo get_stylesheet_directory_uri() . '/assets/svg/social/' . $key . '-icon.svg'; ?>">
				</a>
			</small>
		</li>
	<?php endforeach; ?>
</ul>
