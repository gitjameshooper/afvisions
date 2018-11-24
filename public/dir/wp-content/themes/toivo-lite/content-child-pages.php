<?php
/**
 * The template used for displaying child pages content in pages/front-page.php and pages/child-pages.php
 *
 * @package Toivo Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php toivo_lite_post_thumbnail(); ?>

	<div class="entry-inner">
		
		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		
		</header><!-- .entry-header -->
		
		<?php if( has_excerpt( get_the_ID() ) ) : ?>
		
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			
		<?php else : ?>
		
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
			
		<?php endif; ?>
	
	</div><!-- .entry-inner -->

</article><!-- #post-## -->
