<?php
/**
 * Template Name: Front Page
 *
 * This is the page template for Front Page.
 *
 * @package Toivo Lite
 */

get_header(); ?>
		
	<?php while ( have_posts() ) : the_post(); ?>
					
		<?php	
			/* If there is no page content, show only callout. */
			$content = trim( get_the_content() ); // Get page content.
			if( '' == $content ) :
				toivo_lite_echo_callout( $placement = 'top' ); // Echo callout which is set in the Customizer. Function is in inc/customizer.php file.
			else :
		?>
					
			<div id="toivo-page-template-content" class="toivo-page-template-content toivo-front-page-content">
					
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
						
					<?php toivo_lite_echo_callout( $placement = 'top' ); // Echo callout which is set in the Customizer. Function is in inc/customizer.php file. ?>
						
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
					
			</div><!-- .toivo-front-page-content -->
				
		<?php endif; // End check for post content. ?>

	<?php endwhile; // End of the loop. ?>
		
	<?php do_action( 'toivo_before_front_page_sidebar' ); // Hook before sidebar. ?>
		
	<?php get_sidebar( 'front-page' ); // Loads the sidebar-front-page.php template. ?>
		
	<?php do_action( 'toivo_after_front_page_sidebar' ); // Hook after sidebar. ?>
			
	<?php
		get_template_part( 'area-testimonial' ); // Add testimonial area.
		get_template_part( 'area-featured' );    // Add featured area.
	?>
	
<?php get_footer(); ?>
