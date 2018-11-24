<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package Toivo Lite
 */
?><!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php hybrid_attr( 'body' ); ?>>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'toivo-lite' ); ?></a>

	<?php if ( has_nav_menu( 'top' ) || has_nav_menu( 'social' ) || ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) ) : ?>
		<div id="top-header" class="top-header">
			
			<div id="top-header-buttons" class="top-header-buttons">
				<?php if ( has_nav_menu( 'top' ) ) : ?>
					<button id="top-nav-toggle"><?php _e( 'Top Menu', 'toivo-lite' ); ?></button>
				<?php endif; ?>
			
				<?php if ( has_nav_menu( 'social' ) ) : ?>
					<button id="social-nav-toggle"><?php _e( 'Social Menu', 'toivo-lite' ); ?></button>
				<?php endif; ?>
			</div><!-- .top-header-buttons -->
				
			<?php get_template_part( 'menu', 'top' );    // Loads the menu-top.php template. ?>
			<?php get_template_part( 'menu', 'social' ); // Loads the menu-social.php template. ?>
		</div>
	<?php endif; ?>
	
	<?php do_action( 'toivo_before_header' ); // Hook before header. ?>
	
	<header id="masthead" class="site-header" role="banner" aria-labelledby="site-title" <?php hybrid_attr( 'header' ); ?>>
		
		<div class="wrap">
		
			<?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
	
			<div class="site-branding">
			
				<?php
					if ( !is_front_page() && !is_singular() && !is_404() ) : // If viewing a multi-post page

						get_template_part( 'loop', 'meta' ); // Loads the loop-meta.php template.
						
					else:
					
						if ( is_front_page() || is_home() ) : ?>
							<h1 id="site-title" class="site-title" <?php hybrid_attr( 'site-title' ); ?>>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</h1>
						<?php else : ?>
							<div id="site-title" class="site-title" <?php hybrid_attr( 'site-title' ); ?>>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</div>
						
						<?php endif; ?>
				
						<div id="site-description" class="site-description" <?php hybrid_attr( 'site-description' ); ?>><?php bloginfo( 'description' ); ?></div>
			
				<?php endif; // End check for multi-post page. ?>
			
			</div><!-- .site-branding -->
			
		</div><!-- .wrap -->
			
	</header><!-- #masthead -->
	
	<?php do_action( 'toivo_after_header' ); // Hook after header. ?>
	
	<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>

	<div id="content" class="site-content">
		<div class="wrap">
			<div class="wrap-inside">
				
				<?php
					if ( function_exists( 'breadcrumb_trail' ) && current_theme_supports( 'breadcrumb-trail' ) ) :
						breadcrumb_trail( array( 'container' => 'nav', 'show_on_front' => false, 'show_browse' => false, 'before' => '<h2 class="screen-reader-text">' . esc_attr__( 'Breadcrumbs', 'toivo-lite' ) . '</h2><div class="wrap">', 'after' => '</div>' ) );
					endif;
				?>
				
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>
