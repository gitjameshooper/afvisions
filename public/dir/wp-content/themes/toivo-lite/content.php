<?php
/**
 * The default template for displaying content.
 *
 * @package Toivo Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php toivo_lite_post_thumbnail(); ?>
	
	<div class="entry-inner">

		<header class="entry-header">
	
			<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
		
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
			?>
		
		</header><!-- .entry-header -->
		
		<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Read more %s', 'toivo-lite' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
				
				wp_link_pages( array(
					'before'    => '<div class="page-links">' . __( 'Pages:', 'toivo-lite' ),
					'after'     => '</div>',
					'pagelink'  => '<span class="screen-reader-text">' . __( 'Page', 'toivo-lite' ) . ' </span>%',
					'separator' => '<span class="screen-reader-text">,</span> ',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php toivo_lite_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'toivo-lite' ) ) ); ?>
			<?php toivo_lite_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'toivo-lite' ), 'before' => '<br />' ) ); ?>
		</footer><!-- .entry-footer -->
		
	</div><!-- .entry-inner -->
	
</article><!-- #post-## -->