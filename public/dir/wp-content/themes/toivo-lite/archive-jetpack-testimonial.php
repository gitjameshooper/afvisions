<?php
/**
 * Archive for testimonials.
 *
 * @package Toivo Lite
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		
		<div id="testimonial-area" class="testimonial-area front-page-area">
				
			<?php // Get Jetpack testimonial options.
				$jetpack_options = get_theme_mod( 'jetpack_testimonials' );
			?>
				
			<?php if ( '' != wp_get_attachment_image( (int)$jetpack_options['featured-image'], 'full' ) ) : ?>

				<div class="entry-content">
					<?php	
						echo '<p>' . wp_get_attachment_image( (int)$jetpack_options['featured-image'], 'full' ) . '</p>';
					?>
				</div>

			<?php endif; ?>
					
			<div class="testimonial-wrapper">
		
				<?php do_action( 'toivo_before_loop' ); // Action hook before loop. ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Load content-jetpack-testimonial template. */
						get_template_part( 'content', 'jetpack-testimonial' );
					?>

				<?php endwhile; ?>
			
			</div><!-- .testimonial-wrapper -->
				
		</div><!-- #testimonial-area -->
			
		<?php
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'toivo-lite' ),
				'next_text'          => __( 'Next page', 'toivo-lite' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'toivo-lite' ) . ' </span>',
			) );
		?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>
		
	<?php do_action( 'toivo_after_loop' ); // Action hook after loop. ?>

<?php get_footer(); ?>
