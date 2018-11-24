<?php
/**
 * Custom Header feature
 *
 * @package Toivo Lite
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses toivo_lite_header_style()
 */
function toivo_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'toivo_lite_custom_header_args', array(
		'default-image'          => '%s/images/header.jpg',
		'default-text-color'     => 'fff',
		'width'                  => 1920,
		'height'                 => 500,
		'flex-height'            => true,
		'wp-head-callback'       => 'toivo_lite_header_style'
	) ) );

}
add_action( 'after_setup_theme', 'toivo_lite_custom_header_setup', 15 );

if ( ! function_exists( 'toivo_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see toivo_lite_custom_header_setup().
 */
function toivo_lite_header_style() {
	
	/* Header text color. */
	$header_color = get_header_textcolor();
	
	/* Header image. */
	$header_image = esc_url( get_header_image() );
	
	/* Start header styles. */
	$style = '';
	
	/* Header image height. */
	$header_height = get_custom_header()->height;
	
	/* Header image width. */
	$header_width = get_custom_header()->width;
	
	/* When to show header image. */
	$min_width = absint( apply_filters( 'toivo_lite_header_bg_show', 1 ) );
	
	/* Background arguments. */
	$background_arguments = esc_attr( apply_filters( 'toivo_lite_header_bg_arguments', 'no-repeat 50% 50%' ) );
	
	if ( ! empty( $header_image ) ) {
		$style .= "@media screen and (min-width: {$min_width}px) { body.custom-header-image .site-header { background: url({$header_image}) {$background_arguments}; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; } }";
	}
	
	/* Site title styles. */
	if ( display_header_text() ) {
		$style .= ".site-title, .site-title a, .site-description, .site-description a { color: #{$header_color} }";
		$style .= ".site-title a { border-color: #{$header_color} }";
	}
	
	if ( ! display_header_text() ) {
		$style .= ".site-title, .site-title a, .site-description, .site-description a { clip: rect(1px, 1px, 1px, 1px); position: absolute; }";	
	}
	
	/* Echo styles if it's not empty. */
	if ( ! empty( $style ) ) {
		echo "\n" . '<style type="text/css" id="custom-header-css">' . trim( $style ) . '</style>' . "\n";
	}

}
endif; // toivo_lite_header_style
