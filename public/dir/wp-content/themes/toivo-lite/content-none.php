<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Toivo Lite
 */
?>

<section class="no-results not-found entry">

	<div class="entry-inner">
	
		<header class="page-header entry-header">
			<h1 class="page-title entry-title"><?php _e( 'Nothing Found', 'toivo-lite' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content entry-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'toivo-lite' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p>
					<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'toivo-lite' ); ?>
				</p>
				
				<?php get_search_form(); ?>

			<?php else : ?>

				<p>
					<?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'toivo-lite' ); ?>
				</p>
				
				<?php get_search_form(); ?>

			<?php endif; ?>
		</div><!-- .page-content -->
		
	</div><!-- .entry-inner -->
		
</section><!-- .no-results -->
