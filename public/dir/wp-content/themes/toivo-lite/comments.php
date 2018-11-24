<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Toivo Lite
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<div class="comments-content entry-content">

	<?php // You can start editing here -- including this comment! ?>
	
	<?php if ( 0 == get_comments_number() ) : ?>
		<h2 class="comments-title-no">
			<?php echo __( 'Leave a comment', 'toivo-lite' ); ?>
		</h2>
	<?php endif; ?>

	<?php if ( have_comments() ) : ?>
	
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'toivo-lite' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php toivo_lite_comment_nav( $class = 'comment-navigation-top' ); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 70,
					'callback'    => 'toivo_lite_comment_callback'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php toivo_lite_comment_nav( $class = 'comment-navigation-bottom' ); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'toivo-lite' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
	
	</div><!-- .comments-content -->

</div><!-- #comments -->
