<?php
/**
 * The template for displaying comment.
 *
 * @package Toivo Lite
 */
?>

<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> <?php hybrid_attr( 'comment' ); ?>>

	<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

		<div class="comment-content" <?php hybrid_attr( 'comment-content' ); ?>>
		
			<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			
			<div class="comment-content-wrapper">
			
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p>	
						<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'toivo-lite' ); ?></em>
					</p>
				<?php endif; ?>
				
				<?php comment_text(); ?>
				
				<p class="comment-meta">
					<cite class="comment-author" <?php hybrid_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></span></cite>
					<a class="comment-permalink" <?php hybrid_attr( 'comment-permalink' ); ?> href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>"><time class="comment-published" datetime="<?php comment_time( 'c' ); ?>" <?php hybrid_attr( 'comment-published' ); ?>><?php printf( _x( '%1$s', '%1%s is for comment date', 'toivo-lite' ), get_comment_date() ); ?></time></a>
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '<span class="reply">', 'after' => '</span><!-- .reply -->' ) ) ); ?>
					<?php edit_comment_link(); ?>
				</p><!-- .comment-meta -->
		
			</div><!-- .comment-content-wrapper -->
		</div><!-- .comment-content -->
		
	</article><!-- .comment-body -->

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>