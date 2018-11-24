<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Toivo Lite
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		
		<?php do_action( 'toivo_before_loop' ); // Action hook before loop. ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) );
			?>

		<?php endwhile; ?>
			
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
