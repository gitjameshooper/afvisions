<?php
/**
 * Template Name: Child Pages
 *
 * This is the page template for displaying child pages.
 *
 * @package Toivo Lite
 */

get_header(); ?>
		
	<?php while ( have_posts() ) : the_post(); ?>
			
		<div id="toivo-page-template-content" class="toivo-page-template-content toivo-child-pages-content">
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
					
				<?php if( has_post_thumbnail() ) : ?>
						<div class="post-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div><!-- .post-thumbnail -->
				<?php endif; ?>
						
				<div class="entry-inner">
						
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
					</header><!-- .entry-header -->
						
					<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
						<?php the_content(); ?>
					</div><!-- .entry-content -->
						
				</div><!-- .entry-inner -->
						
			</article><!-- #post-## -->
					
		</div><!-- .toivo-page-template-content -->

	<?php endwhile; // end of the loop. ?>
		
	<?php // Child pages area
		$child_pages = new WP_Query( apply_filters( 'toivo_lite_child_pages_template_arguments', array(
			'post_type'      => 'page',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_parent'    => $post->ID,
			'posts_per_page' => 500,
			'no_found_rows'  => true,
		) ) );
	?>

	<?php if ( $child_pages->have_posts() ) : ?>

		<div id="child-pages-area" class="child-pages-area child-pages-child-pages-area">			
			<div class="child-pages-wrapper">

				<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>

					<div class="child-pages-grid">
						<?php get_template_part( 'content', 'child-pages' ); ?>
					</div><!-- .child-pages-grid -->

				<?php endwhile; ?>

			</div><!-- .child-pages-wrapper -->
		</div><!-- #child-pages-area -->

	<?php
		endif; // End loop.
		wp_reset_postdata(); // Reset post data.
	?>

<?php get_footer(); ?>
