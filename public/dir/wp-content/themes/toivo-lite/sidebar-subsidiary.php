<?php
/**
 * Subsidiary Sidebar in Footer.
 *
 * @package Toivo Lite
 */
?>

	<aside id="sidebar-subsidiary" class="sidebar-subsidiary sidebar" role="complementary" aria-labelledby="sidebar-subsidiary-header" <?php hybrid_attr( 'sidebar', 'subsidiary' ); ?>>
		<h2 class="screen-reader-text" id="sidebar-subsidiary-header"><?php echo esc_attr_x( 'Subsidiary Sidebar', 'Sidebar aria label', 'toivo-lite' ); ?></h2>
		
		<div class="wrap">
			<div class="wrap-inside">
			
			<?php if ( is_active_sidebar( 'subsidiary' ) ) : ?>
			
				<?php dynamic_sidebar( 'subsidiary' ); ?>
				
			<?php else : // If the sidebar has no widgets. ?>
		
				<?php 
					the_widget( 'WP_Widget_Recent_Posts', '', array(
						'before_widget' => '<section class="widget widget_recent_entries">',
						'after_widget'  => '</section>',
						'before_title'  => '<h3 class="widget-title">',
						'after_title'   => '</h3>'
						) 
					);
				?>
				
				<?php
					the_widget( 'WP_Widget_Recent_Comments', '', array(
						'before_widget' => '<section class="widget widget_recent_comments">',
						'after_widget'  => '</section>',
						'before_title'  => '<h3 class="widget-title">',
						'after_title'   => '</h3>'
						)
					);
				?>
				
				<?php
					the_widget( 'WP_Widget_Categories', '', array(
						'before_widget' => '<section class="widget widget_categories">',
						'after_widget'  => '</section>',
						'before_title'  => '<h3 class="widget-title">',
						'after_title'   => '</h3>'
						)
					);
				?>
				
				<?php
					the_widget( 'WP_Widget_Search', array( 'title' => __( 'Search', 'toivo-lite' ) ), array(
						'before_widget' => '<section class="widget widget_search">',
						'after_widget'  => '</section>',
						'before_title'  => '<h3 class="widget-title">',
						'after_title'   => '</h3>'
						)
					);
				?>
				
			<?php endif; // End check for subsidiary sidebar. ?>
			
			</div><!-- .wrap-inside -->	
		</div><!-- .div -->

	</aside><!-- #sidebar-subsidiary .sidebar -->