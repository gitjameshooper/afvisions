<?php
/**
 * The template for displaying quote post format content.
 *
 * @package Toivo Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
	
	<div class="entry-inner">
		
		<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		
		<header class="entry-footer">
	
			<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
		
		</header><!-- .entry-footer -->
			
	</div><!-- .entry-inner -->
		
</article><!-- #post-## -->