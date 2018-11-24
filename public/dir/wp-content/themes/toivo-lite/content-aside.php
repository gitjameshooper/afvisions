<?php
/**
 * The template for displaying aside post format content.
 *
 * @package Toivo Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<div class="entry-inner">

		<?php if ( is_single() ) : ?>
	
			<header class="entry-header">
				<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
				<?php the_title( sprintf( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			</header><!-- .entry-header -->
		
		<?php endif; ?>

		<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<?php if ( is_single() ) : // Hide category and tag text for non singular views. ?>
			<footer class="entry-footer">
				<?php toivo_lite_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'toivo-lite' ) ) ); ?>
				<?php toivo_lite_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'toivo-lite' ), 'before' => '<br />' ) ); ?>
			</footer><!-- .entry-footer -->
		<?php endif; // End if singular views. ?>
	
	</div><!-- .entry-inner -->
	
</article><!-- #post-## -->