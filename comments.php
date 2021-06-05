<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) return;
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
        <?php
                    $quantum_comment_count = get_comments_number();
                    if ( '1' === $quantum_comment_count ) {
                        printf(
                            /* translators: 1: title. */
                            esc_html__( 'Ein Kommentar zu &ldquo;%1$s&rdquo;', 'quantum' ),
                            '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                        );
                    } else {
                        printf(
                            /* translators: 1: comment count number, 2: title. */
                            esc_html( _nx( '%1$s Kommentar zu &ldquo;%2$s&rdquo;', '%1$s Kommentare zu &ldquo;%2$s&rdquo;', $quantum_comment_count, 'comments title', 'quantum' ) ),
                            number_format_i18n( $quantum_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                        );
                    }
                ?>
    </h2><!-- .comments-title -->

    <?php the_comments_navigation(); ?>

    <ol class="comment-list">
        <?php
                wp_list_comments(
                    array(
                        'style'      => 'ol',
                        'short_ping' => true,
                    )
                );
            ?>
    </ol><!-- .comment-list -->

    <?php the_comments_navigation(); ?>

    <?php if ( ! comments_open() ) : // If comments are closed and there are comments, let's leave a little note, shall we? ?>
    <p class="no-comments"><?php esc_html_e( 'Kommentare sind deaktiviert', 'quantum' ); ?></p>
    <?php endif; ?>

    <?php endif; // Check for have_comments(). ?>

    <?php comment_form(); ?>

</div><!-- #comments -->