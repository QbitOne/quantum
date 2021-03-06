<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Quantum
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!function_exists('quantum_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function quantum_posted_on(): void
	{
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
		);

		// $posted_on = sprintf(
		/* translators: %s: post date. */
		// esc_html_x('Veröffentlicht am %s', 'post date', 'quantum'),
		// '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		// $time_string
		// );
		$posted_on = $time_string;

		echo '<div class="posted-on">' . $posted_on . '</div>';
	}
endif;

function quantum_modified_on(): void
{
	if (get_the_time('U') !== get_the_modified_time('U')) :
		$time_string = '<time class="entry-date updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date()),
		);

		$modified_on = sprintf(
			/* translators: %s: modified date. */
			esc_html_x('Aktualisiert am %s', ',modified date', 'quantum'),
			// '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
			$time_string
		);

		echo '<div class="modified-on">' . $modified_on . '</div>';

	else :
		quantum_posted_on();
	endif;
}

if (!function_exists('quantum_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function quantum_posted_by(): void
	{
		// $byline = sprintf(
		//     /* translators: %s: post author. */
		//     esc_html_x('Von %s', 'post author', 'quantum'),
		//     '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" rel="author">' . esc_html(get_the_author()) . '</a>',
		// );
		$byline = '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" rel="author">' . esc_html(get_the_author()) . '</a>';

		echo '<div class="byline"> ' . $byline . '</div>';
	}
endif;

if (!function_exists('quantum_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function quantum_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type() && is_singular()) {
			quantum_tags();
		}

		// if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
		//     echo '<span class="comments-link">';
		//     comments_popup_link(
		//         sprintf(
		//             wp_kses(
		//                 /* translators: %s: post title */
		//                 __('Schreibe einen Kommentar<span class="screen-reader-text"> in %s</span>', 'quantum'),
		//                 array(
		//                     'span' => array(
		//                         'class' => array(),
		//                     ),
		//                 )
		//             ),
		//             wp_kses_post(get_the_title())
		//         )
		//     );
		//     echo '</span>';
		// }

		quantum_edit_post_link();
	}
endif;




function quantum_tags()
{
	$tags = get_the_tags();

	if (is_wp_error($tags)) {
		return false;
	}

	if ($tags) :
		$links = [];
		foreach ($tags as $tag) {
			if (is_wp_error($tag)) {
				return false;
			}

			if (is_object($tag)) :
				$links[] = '<a href="' . esc_url(get_term_link($tag)) . '" rel="tag">' . '#' . $tag->name . '</a>';
			endif;
		}
		$links = implode(' ', $links);

		printf('<div>' . esc_html__('%1$s', 'quantum') . '</div>', $links);
	endif;
	// quantum_print_r($tag_names);
}

function quantum_categories(): void
{
	/* translators: used between list items, there is a space after the comma */
	// $categories_list = get_the_category_list(', ');
	$categories_list = get_the_category_list(' ');
	// if ($categories_list) {
	/* translators: 1: list of categories. */
	// printf('<div class="cat-links">' . esc_html__('Veröffentlicht in %1$s', 'quantum') . '</div>', $categories_list);
	// }
	if ($categories_list) {
		echo '<div class="post-cat cat-links">' . $categories_list . '</div>';
	}
}




if (!function_exists('quantum_edit_post_link')) :
	/**
	 * Displays the edit post link for post.
	 *
	 * @return void
	 * @since 2.10.0
	 */
	function quantum_edit_post_link(): void
	{
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Bearbeiten <span class="screen-reader-text">von %s</span>', 'quantum'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			),
			'<div class="edit-link">',
			'</div>'
		);
	}
endif;


if (!function_exists('quantum_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function quantum_post_thumbnail()
	{
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()) :
?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php esc_url(the_permalink()); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

<?php
		endif; // End is_singular().
	}
endif;


if (!function_exists('get_quantum_title')) :
	/**
	 * Undocumented function
	 *
	 * @return string
	 */
	function get_quantum_title(): string
	{
		$html = '';

		if (is_singular()) :
			$html = '<h1 class="post-title">' . get_the_title() . '</h1>';
		else :
			$html = '<h2 class="post-title">';
			$html .= '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">';
			$html .= get_the_title();
			$html .= '</a>';
			$html .= '</h2>';
		endif;
		return $html;
	}
endif;
