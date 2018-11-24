<?php
/**
 * Loop meta content for displaying title and description in the header.
 *
 * @package Toivo Lite
 */
?>

<div class="loop-meta" <?php hybrid_attr( 'loop-meta' ); ?>>

	<?php
		if ( is_home() && !is_front_page() ) :
			$toivo_archive_title = get_post_field( 'post_title', get_queried_object_id() );
			$toivo_loop_desc     = get_post_field( 'post_content', get_queried_object_id(), 'raw' );
		elseif( is_search() ) :
			/* Translators: %s is the search query. The HTML entities are opening and closing curly quotes. */
			$toivo_archive_title = sprintf( __( 'Search results for &#8220;%s&#8221;', 'toivo' ), get_search_query() );
			$toivo_loop_desc     = sprintf( __( 'You are browsing the search results for &#8220;%s&#8221;', 'toivo' ), get_search_query() );;
		elseif( is_author() ) :
			$toivo_archive_title = get_the_archive_title();
			$toivo_loop_desc     = get_the_author_meta( 'description', get_query_var( 'author' ) );
		else :
			$toivo_archive_title = get_the_archive_title();
			$toivo_loop_desc     = get_the_archive_description();		
		endif;
	?>

	<h1 class="site-title loop-title" <?php hybrid_attr( 'loop-title' ); ?>><?php echo $toivo_archive_title; ?></h1>

	<?php if ( $toivo_loop_desc ) : ?>

		<div class="site-description loop-description" <?php hybrid_attr( 'loop-description' ); ?>>
			<?php echo $toivo_loop_desc; ?>
		</div><!-- .loop-description -->
		
	<?php endif; // End paged check. ?>

</div><!-- .loop-meta -->