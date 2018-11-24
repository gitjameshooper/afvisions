<?php
/**
 * The template for displaying status post format content.
 *
 * @package Toivo Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<div class="entry-inner">

		<?php if ( is_single() ) : // If viewing a single post. ?>
		
			<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
		
				<?php
					echo get_avatar( get_the_author_meta( 'email' ), 70, '', get_the_author_meta( 'display_name' ) );
				?>
				
				<div class="entry-wrapper">
					<?php the_content(); ?>
				</div><!-- .entry-wrapper -->
			
			</div><!-- .entry-content -->
		
			<footer class="entry-footer">
				<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
			
				<?php toivo_lite_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'toivo-lite' ) ) ); ?>
				<?php toivo_lite_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'toivo-lite' ), 'before' => '<br />' ) ); ?>
			</footer><!-- .entry-footer -->
		
		<?php else : // If not viewing a single post. ?>

			<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
	
				<?php if ( get_option( 'show_avatars' ) ) : // If avatars are enabled. ?>

					<a href="<?php esc_url( the_permalink() ); ?>"><?php echo get_avatar( get_the_author_meta( 'email' ), 70, '', get_the_author_meta( 'display_name' ) ); ?></a>
			
				<?php endif; // End check avatar. ?>
				
				<div class="entry-wrapper">
					<?php the_content(); ?>
				</div><!-- .entry-wrapper -->
			
			</div><!-- .entry-content -->

		<?php endif; // End single post check. ?>
		
	</div><!-- .entry-inner -->
	
</article><!-- #post-## -->