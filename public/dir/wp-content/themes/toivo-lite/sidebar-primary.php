<?php
/**
 * Primary Sidebar.
 *
 * @package Toivo Lite
 */
?>

<?php if ( '1c' != get_theme_mod( 'theme_layout', '1c' ) ) : // If the layout is not one column. ?>

	<aside id="sidebar-primary" class="sidebar-primary sidebar" role="complementary" aria-labelledby="sidebar-primary-header" <?php hybrid_attr( 'sidebar', 'primary' ); ?>>
		<h2 class="screen-reader-text" id="sidebar-primary-header"><?php echo esc_attr_x( 'Primary Sidebar', 'Sidebar aria label', 'toivo-lite' ); ?></h2>
		
		<div class="wrap">
	
			<?php if ( is_active_sidebar( 'primary' ) ) : // If the sidebar has widgets. ?>
		
				<?php dynamic_sidebar( 'primary' ); ?>
			
			<?php else : // If the sidebar has no widgets. ?>
		
				<?php the_widget( 'WP_Widget_Recent_Posts', '', array(
					'before_widget' => '<section class="widget widget_recent_entries">',
					'after_widget'  => '</section>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>'
					) 
				); ?>
		
			<?php endif; // End widgets check. ?>
	
		</div><!-- .wrap -->

	</aside><!-- #sidebar-primary .sidebar -->

<?php endif; // End layout check.