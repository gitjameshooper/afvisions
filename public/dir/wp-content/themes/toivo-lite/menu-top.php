<?php
/**
 * Top menu.
 *
 * @package Toivo Lite
 */
?>

<?php if ( has_nav_menu( 'top' ) ) : // Check if there's a menu assigned to the 'top' location. ?>
	
	<nav id="menu-top" class="menu top-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'toivo-lite' ); ?>" <?php hybrid_attr( 'menu', 'top' ); ?>>
		<h2 class="screen-reader-text"><?php esc_attr_e( 'Top Menu', 'toivo-lite' ); ?></h2>
		
		<?php wp_nav_menu(
			array(
				'theme_location' => 'top',
				'menu_id'        => 'menu-top-items',
				'depth'          => 1,
				'menu_class'     => 'menu-items',
				'fallback_cb'    => ''
			)
		); ?>
	</nav><!-- #menu-top -->

<?php endif; // End check for menu. ?>