<?php
/**
 * The template used for displaying content in jetpack-testimonials area
 *
 * @package Toivo Lite
 */
?>

<?php if( is_page_template( 'pages/front-page.php' ) || is_archive() ) : ?>

	<div class="entry-testimonial" <?php hybrid_attr( 'post' ); ?>>
	
		<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
			
			<?php
				the_post_thumbnail( 'toivo-testimonial', array( 'alt' => get_the_title() ) );
			?>
			
			<div class="entry-wrapper">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Read more %s', 'toivo-lite' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );
				?>
				<div class="entry-footer">
					<p>
						<?php
							echo _x( '&ndash;' , 'dash before testimonial title', 'toivo-lite' ) . ' ';				
							the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' );
						?>
					</p>
				</div><!-- .entry-footer -->
				
			</div><!-- .entry-wrapper -->
			
		</div><!-- .entry-content -->
		
	</div><!-- .entry-testimonial -->

<?php else : ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

		<div class="entry-inner">

			<header class="entry-header">
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
					the_post_thumbnail( 'toivo-testimonial', array( 'alt' => get_the_title() ) );
				?>
			
				<div class="entry-wrapper">
					<?php
						/* translators: %s: Name of current post */
						the_content( sprintf(
							__( 'Read more %s', 'toivo-lite' ),
							the_title( '<span class="screen-reader-text">', '</span>', false )
						) );
					?>
				</div><!-- .entry-wrapper -->
				
			</div><!-- .entry-content -->
		
		</div><!-- .entry-inner -->

	</article><!-- #post-## -->

<?php endif; ?>
