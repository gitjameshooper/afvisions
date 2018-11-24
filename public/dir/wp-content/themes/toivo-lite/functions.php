<?php
/**
 * Toivo functions, definitions, filters and actions.
 *
 * @package Toivo Lite
 */

/**
 * The current version of the theme.
 */
define( 'TOIVO_LITE_VERSION', '1.0.4' );

if ( ! function_exists( 'toivo_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function toivo_lite_setup() {

	/**
	* Set the content width based on the theme's design and stylesheet.
	*/
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1260; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Toivo Lite, use a find and replace
	 * to change 'toivo-lite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'toivo-lite', get_template_directory() . '/languages' );

	/* Add default posts and comments RSS feed links to head. */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1260, 9999, false );
	
	/* Add custom image sizes. */
	add_image_size( 'toivo-site-logo', 300, 300, true );
	add_image_size( 'toivo-testimonial', 140, 140, true );

	/* This theme uses wp_nav_menu() in 3 locations. */
	register_nav_menus( array( 
		'primary' => _x( 'Primary', 'nav menu location', 'toivo-lite' ),
		'top'     => _x( 'Top', 'nav menu location', 'toivo-lite' ),
		'social'  => _x( 'Social', 'nav menu location', 'toivo-lite' )
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	 
	add_theme_support( 'post-formats', array(
		'audio', 'aside', 'image', 'video', 'quote', 'link', 'status', 'gallery'
	) );
	
	/* Add support for WP title. */
	add_theme_support( 'title-tag' );
	
	/* Add theme support for site logo. */
	add_theme_support( 'site-logo', array(
		'size' => 'toivo-site-logo',
	) );

	/* Add theme support for responsive videos. */
	add_theme_support( 'jetpack-responsive-videos' );
	
	/* Add theme support for breadcrumb trail. */
	add_theme_support( 'breadcrumb-trail' );
	
	/* Add editor styles. */
	add_editor_style( toivo_lite_get_editor_styles() );
	
	/* Add excerpt to pages. */
	add_post_type_support( 'page', 'excerpt' );
	
}
endif; // toivo_lite_setup
add_action( 'after_setup_theme', 'toivo_lite_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function toivo_lite_widgets_init() {

	$sidebar_primary_args = array(
		'id'            => 'primary',
		'name'          => _x( 'Primary', 'sidebar', 'toivo-lite' ),
		'description'   => __( 'The main sidebar. It is displayed on the right or left side of the page.', 'toivo-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	);
	
	$sidebar_subsidiary_args = array(
		'id'            => 'subsidiary',
		'name'          => _x( 'Subsidiary', 'sidebar', 'toivo-lite' ),
		'description'   => __( 'A sidebar located in the footer of the site.', 'toivo-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	);
	
	$sidebar_front_page_args = apply_filters( 'toivo_sidebar_front_page_args', array(
		'id'            => 'front-page',
		'name'          => _x( 'Front Page', 'sidebar', 'toivo-lite' ),
		'description'   => __( 'A sidebar located in the Front Page Template.', 'toivo-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
	
	/* Register sidebars. */
	register_sidebar( $sidebar_primary_args );
	register_sidebar( $sidebar_subsidiary_args );
	register_sidebar( $sidebar_front_page_args );
	
}
add_action( 'widgets_init', 'toivo_lite_widgets_init' );

/**
 * Return the Google font stylesheet URL
 */
function toivo_lite_fonts_url() {

	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Lato, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$lato = _x( 'on', 'Lato font: on or off', 'toivo-lite' );

	/* Translators: If there are characters in your language that are not
	 * supported by Raleway, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$raleway = _x( 'on', 'Raleway font: on or off', 'toivo-lite' );

	if ( 'off' !== $lato || 'off' !== $raleway ) {
		$font_families = array();

		if ( 'off' !== $lato )
			$font_families[] = 'Lato:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $raleway )
			$font_families[] = 'Raleway:400,600,500,700,800';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function toivo_lite_scripts() {

	/* Enqueue fonts. */
	wp_enqueue_style( 'toivo-lite-fonts', toivo_lite_fonts_url(), array(), null );
	
	/* Add Genericons font, used in the main stylesheet. */
	wp_enqueue_style( 'genericons', trailingslashit( get_template_directory_uri() ) . 'fonts/genericons/genericons/genericons.css', array(), '3.3' );
	
	/* Enqueue parent theme styles if using child theme. */
	if ( is_child_theme() ) {
		wp_enqueue_style( 'toivo-lite-parent-style', trailingslashit( get_template_directory_uri() ) . 'style.css', array(), TOIVO_LITE_VERSION );
	}
	
	/* Enqueue active theme styles. */
	wp_enqueue_style( 'toivo-lite-style', get_stylesheet_uri() );
	
	/* Enqueue responsive navigation. */
	wp_enqueue_script( 'toivo-lite-navigation', get_template_directory_uri() . '/js/responsive-nav.js', array(), TOIVO_LITE_VERSION, true );
	
	/* Enqueue responsive navigation settings. */
	wp_enqueue_script( 'toivo-lite-settings', trailingslashit( get_template_directory_uri() ) . 'js/settings.js', array( 'toivo-lite-navigation' ), TOIVO_LITE_VERSION, true );
	
	/* Enqueue functions. */
	wp_enqueue_script( 'toivo-lite-script', get_template_directory_uri() . '/js/functions.js', array(), TOIVO_LITE_VERSION, true );
	
	/* Enqueue comment reply. */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'toivo_lite_scripts' );

/**
 * Function for deciding which pages should have a one-column layout.
 *
 * @since  1.0.0
 */
function toivo_lite_one_column() {

	if ( is_page_template( 'pages/front-page.php' ) || is_page_template( 'pages/no-sidebar.php' ) || is_page_template( 'pages/child-pages.php' ) ) {
		add_filter( 'theme_mod_theme_layout', 'toivo_lite_theme_layout_one_column' );
	}
	elseif ( is_post_type_archive( 'jetpack-testimonial' ) || is_post_type_archive( 'jetpack-portfolio' ) ) {
		add_filter( 'theme_mod_theme_layout', 'toivo_lite_theme_layout_one_column' );
	}
	elseif ( is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
		add_filter( 'theme_mod_theme_layout', 'toivo_lite_theme_layout_one_column' );
	}
	elseif ( is_attachment() && wp_attachment_is_image() ) {
		add_filter( 'theme_mod_theme_layout', 'toivo_lite_theme_layout_one_column' );
	}
	
}
add_action( 'template_redirect', 'toivo_lite_one_column' );

/**
 * Filters 'get_theme_layout' by returning 'layout-1c'.
 *
 * @since  1.0.0
 * @param  string $layout The layout of the current page.
 * @return string
 */
function toivo_lite_theme_layout_one_column( $layout ) {
	return '1c';
}

/**
 * Change [...] to ... Read more.
 *
 * @since 1.0.0
 */
function toivo_lite_excerpt_more() {

	/* Translators: The %s is the post title shown to screen readers. */
	$text = sprintf( __( 'Read more %s', 'toivo-lite' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' );
	$more = sprintf( '&hellip; <p class="toivo-read-more"><a href="%s" class="more-link">%s</a></p>', esc_url( get_permalink() ), $text );

	return $more;

}
add_filter( 'excerpt_more', 'toivo_lite_excerpt_more' );

/**
 * Display descriptions in main navigation.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  Menu item with possible description.
 * @since  1.0.0
 */
function toivo_lite_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$extra_class = ( 0 === $depth ) ? ' top-depth' : '';
		$item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description' . $extra_class . '"><span class="menu-item-description-mark">' . ' ' . _x( '&ndash;' , 'dash before menu item description', 'toivo-lite' ) . '</span> ' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'toivo_lite_nav_description', 10, 4 );

/**
 * Add body classes.
 *
 * @param  array  $classes  body classes.
 * @return array  $classes  body classes.
 * @since  1.0.0
 */
function toivo_lite_extra_layout_classes( $classes ) {
	
	/* Add the '.custom-header-image' class if the user is using a custom header image. */
	if ( get_header_image() ) {
		$classes[] = 'custom-header-image';
	}
	
	/* Add the 'top-menus-disabled' class if the user is not using top and social menu. */
	if ( !has_nav_menu( 'top' ) && !has_nav_menu( 'social' ) ) {
		$classes[] = 'top-menus-disabled';
	}
	
	/* Add global layout. */
	$classes[] = 'layout-' . sanitize_html_class( get_theme_mod( 'theme_layout', '1c' ) );
	
	/* Add 'no-content' class in Front Page Template if content is empty. */
	if ( is_page_template( 'pages/front-page.php' ) && '' == trim( get_post_field( 'post_content', get_the_ID() ) ) ) {
		$classes[] = 'no-content';
    }
	
	/* Adds a class of group-blog to blogs with more than 1 published author. */
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	
    return $classes;
	
}
add_filter( 'body_class', 'toivo_lite_extra_layout_classes' );

/**
 * Add infinity sign after aside post format.
 *
 * @param  $content The the_content field
 * @return string   The content with infinity sign
 * @since  1.0.0
 */
function toivo_lite_infinity_after_aside( $content ) {
	if ( has_post_format( 'aside' ) && !is_singular() ) {
		$content .= ' <a href="' . get_permalink() . '">&#8734;</a>';
	}
	
	return $content;
}
add_filter( 'the_content', 'toivo_lite_infinity_after_aside', 9 ); // run before wpautop

/**
 * Callback function for adding editor styles. Use along with the add_editor_style() function.
 *
 * @author  Justin Tadlock, justintadlock.com
 * @link    http://themehybrid.com/themes/stargazer
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since   1.0.0
 * @return  array
 */
function toivo_lite_get_editor_styles() {

	/* Set up an array for the styles. */
	$editor_styles = array();

	/* Add the theme's editor styles. This also checks child theme's css/editor-style.css file. */
	$editor_styles[] = 'css/editor-style.css';
	
	/* Add genericons styles. */
	$editor_styles[] = trailingslashit( get_template_directory_uri() ) . 'fonts/genericons/genericons/genericons.css';
	
	/* Add theme fonts. */
	$editor_styles[] = toivo_lite_fonts_url();

	/* Add the locale stylesheet. */
	$editor_styles[] = get_locale_stylesheet_uri();

	/* Return the styles. */
	return $editor_styles;
}

/**
 * Convert HEX to RGB.
 *
 * @author    Twenty Fifteen
 * @copyright Automattic
 * @license  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * @since  1.0.0
 * @param  string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function toivo_lite_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) == 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) == 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @copyright Twenty Thirteen Theme
 * @since 1.0.0
 *
 * @return string The Link format URL.
 */
function toivo_lite_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Use a template for individual comment output.
 *
 * @param object $comment Comment to display.
 * @param int    $depth   Depth of comment.
 * @param array  $args    An array of arguments.
 *
 * @since 1.0.0
 */
function toivo_lite_comment_callback( $comment, $args, $depth ) {
	include( locate_template( 'comment.php') );
}

/**
 * Generate a link to the Toivo theme page.
 *
 * @return string The link.
 * @since  1.0.0
 */
function toivo_lite_get_upgrade_link() {
	$url = 'https://foxland.fi/downloads/toivo/';
	return esc_url( $url );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Background feature.
 */
require get_template_directory() . '/inc/custom-background.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load breadcrumb trail. Check that there is no Plugin version around.
 */
if( !function_exists( 'breadcrumb_trail' ) ) {
	require_once( get_template_directory() . '/inc/breadcrumb-trail.php' );
}

/**
 * Load Schema.org file.
 */
require_once( get_template_directory() . '/inc/schema.php' );

/**
 * Load media grabber file.
 */
require_once( get_template_directory() . '/inc/media-grabber.php' );

/**
 * Load meta boxes.
 */
require_once( get_template_directory() . '/inc/meta-boxes.php' );
