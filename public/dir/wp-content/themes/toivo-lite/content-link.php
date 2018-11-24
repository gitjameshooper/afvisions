<?php
/**
 * The template for displaying link post format content.
 *
 * @package Toivo Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<div class="entry-inner">
	
		<header class="entry-header">
		
			<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
	
			<?php
			/* Arrow for right to left. */
			if( is_rtl() ) :
				$toivo_left_or_right = _x( '&larr;', 'Arrow for link post format in right to left languages', 'toivo-lite' );
			else :
				$toivo_left_or_right = _x( '&rarr;', 'Arrow for link post format in left to right languages', 'toivo-lite' );
			endif;
			?>
		
			<?php if ( is_single() ) : // If viewing a single post.
				$heading = 'h1';
			else : // If not viewing a single post.
				$heading = 'h2';
			endif; // End single post check. ?>
		
			<<?php echo $heading; ?> class="entry-title" <?php echo hybrid_get_attr( 'entry-title' ); ?>>
				<a href="<?php echo esc_url( toivo_lite_get_link_url() ); ?>"><?php the_title(); ?> <span class="meta-nav"><?php echo esc_attr( $toivo_left_or_right ); ?></span></a>
			</<?php echo $heading; ?>>
		
		</header><!-- .entry-header -->

		<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Read more %s', 'toivo-lite' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
			?>
		</div><!-- .entry-content -->

		<?php if ( is_single() ) : // Hide category and tag text for non singular views. ?>
			<footer class="entry-footer">
				<?php toivo_lite_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'toivo-lite' ) ) ); ?>
				<?php toivo_lite_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'toivo-lite' ), 'before' => '<br />' ) ); ?>
			</footer><!-- .entry-footer -->
		<?php endif; // End single post check. ?>
		
	</div><!-- .entry-inner -->
	
</article><!-- #post-## -->