<?php
/**
 * Theme Customizer
 *
 * @package Toivo Lite
 */

/**
 * Add the Customizer functionality.
 *
 * @since 1.0.0
 */
function toivo_lite_customize_register( $wp_customize ) {
	
	/* Load custom class for the Customizer. */
	require_once( get_template_directory() . '/inc/classes/customize-info-text.php' );

	/* === Theme panel === */

	/* Add the theme panel. */
	$wp_customize->add_panel(
		'theme',
		array(
			'title'       => esc_html__( 'Theme Settings', 'toivo-lite' ),
			'priority'    => 10
		)
	);
	
	/* == Layout section == */
	
	/* Add the layout section. */
	$wp_customize->add_section(
		'toivo-lite-layout',
		array(
			'title'    => esc_html__( 'Layouts', 'toivo-lite' ),
			'priority' => 10,
			'panel'    => 'theme'
		)
	);

	/* Add the layout setting. */
	$wp_customize->add_setting(
		'theme_layout',
		array(
			'default'           => '1c',
			'sanitize_callback' => 'toivo_lite_sanitize_layout'
		)
	);
	
	$layout_choices = array( 
		'1c'   => __( '1 Column', 'toivo-lite' ),
		'2c-l' => __( '2 Columns: Content / Sidebar', 'toivo-lite' ),
		'2c-r' => __( '2 Columns: Sidebar / Content', 'toivo-lite' )
	);
	
	/* Add the layout control. */
	$wp_customize->add_control(
		'theme_layout',
		array(
			'label'    => esc_html__( 'Global Layout', 'toivo-lite' ),
			'section'  => 'toivo-lite-layout',
			'priority' => 10,
			'type'     => 'radio',
			'choices'  => $layout_choices
		)
	);
	
	/* == Front page section == */
	
	/* Add the front-page section. */
	$wp_customize->add_section(
		'front-page',
		array(
			'title'       => esc_html__( 'Front Page Settings', 'toivo-lite' ),
			'description' => sprintf( __( 'Callout at the top. <a href="%s" target="_blank">Upgrade to Toivo (Pro)</a> for adding similar Callout section at the bottom.', 'toivo-lite' ), esc_url( toivo_lite_get_upgrade_link() ) ),
			'priority'    => 20,
			'panel'       => 'theme'
		)
	);
	
	/* == Callout == */
	
	/* Add the callout title setting once, in Toivo (Pro) version we have also bottom callout. */
	
	$k = 0;
	
	while ( $k < 1 ) {
		
		/* Text for placement in settings. */
		if ( 0 == $k ) {
			$placement = 'top';
		} else {
			$placement = 'bottom';
		}
		
		/* Text for placement in the Customizer. */
		if ( 0 == $k ) {
			$placement_text = _x( 'Top', 'position of callout text', 'toivo-lite' );
		} else {
			$placement_text = _x( 'Bottom', 'position of callout text', 'toivo-lite' );
		}
	
		$wp_customize->add_setting(
			'callout_title_' . $placement,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
	
		/* Add the callout title control. */
		$wp_customize->add_control(
			'callout_title_' . $placement,
			array(
				'label'    => sprintf( esc_html__( '%s Callout title', 'toivo-lite' ), $placement_text ),
				'section'  => 'front-page',
				'priority' => 20 + $k*100,
				'type'     => 'text'
			)
		);
	
		/* Add the callout text setting. */
		$wp_customize->add_setting(
			'callout_text_' . $placement,
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_textarea'
			)
		);
	
		/* Add the callout text control. */
		$wp_customize->add_control(
			'callout_text_' . $placement,
			array(
				'label'    => sprintf( esc_html__( '%s Callout text', 'toivo-lite' ), $placement_text ),
				'section'  => 'front-page',
				'priority' => 30 + $k*100,
				'type'     => 'textarea'
			)
		);
	
		/* Add the callout link setting. */
		$wp_customize->add_setting(
			'callout_url_' . $placement,
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw'
			)
		);
 	
		/* Add the callout link control. */
		$wp_customize->add_control(
			'callout_url_' . $placement,
			array(
				'label'    => sprintf( esc_html__( '%s Callout URL', 'toivo-lite' ), $placement_text ),
				'section'  => 'front-page',
				'priority' => 50 + $k*100,
				'type'     => 'url'
			)
		);
 	
		/* Add the callout url text setting. */
		$wp_customize->add_setting(
			'callout_url_text_' . $placement,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
 	
		/* Add the callout url text control. */
		$wp_customize->add_control(
			'callout_url_text_' . $placement,
			array(
				'label'    => sprintf( esc_html__( '%s Callout URL text', 'toivo-lite' ), $placement_text ),
				'section'  => 'front-page',
				'priority' => 60 + $k*100,
				'type'     => 'text'
			)
		);
	
		$k++; // Add +1 before loop ends.
	
	} // End while loop.
	
	/* Add hide and order testimonial setting. */
	if( class_exists( 'Jetpack' ) && current_theme_supports( 'jetpack-testimonial' ) ) {
		
		$wp_customize->add_setting(
			'hide_testimonials',
			array(
				'default'           => '',
				'sanitize_callback' => 'toivo_lite_sanitize_checkbox'
			)
		);
	
		/* Add hide testimonial control. */
		$wp_customize->add_control(
			'hide_testimonials',
			array(
				'label'       => esc_html__( 'Hide testimonials', 'toivo-lite' ),
				'description' => esc_html__( 'Check this if you want to hide testimonials from the Front Page Template.', 'toivo-lite' ),
				'section'     => 'front-page',
				'priority'    => 70,
				'type'        => 'checkbox'
			)
		);
		
		$wp_customize->add_setting(
			'order_testimonials',
			array(
				'default'           => '',
				'sanitize_callback' => 'toivo_lite_sanitize_checkbox'
			)
		);
	
		/* Add order testimonial control. */
		$wp_customize->add_control(
			'order_testimonials',
			array(
				'label'       => esc_html__( 'Testimonials after featured area', 'toivo-lite' ),
				'description' => esc_html__( 'Check this if you want to move testimonials after Featured area in the Front Page Template.', 'toivo-lite' ),
				'section'     => 'front-page',
				'priority'    => 75,
				'type'        => 'checkbox'
			)
		);
		
	} // End check for testimonials.
	
	/* Add the featured setting where we can select do we use child pages, blog posts or portfolios in front page template. */
	$wp_customize->add_setting(
		'front_page_featured',
		array(
			'default'           => 'child-pages',
			'sanitize_callback' => 'toivo_lite_sanitize_featured'
		)
	);
	
	$front_page_featured_choices = array( 
		'child-pages' => esc_html__( 'Child Pages', 'toivo-lite' ),
		'blog-posts'  => esc_html__( 'Blog Posts', 'toivo-lite' ),
		'portfolios'  => esc_html__( 'Portfolios', 'toivo-lite' )
	);
	
	/* Add the featured control. */
	$wp_customize->add_control(
		'front_page_featured',
		array(
			'label'       => esc_html__( 'Featured Content', 'toivo-lite' ),
			'description' => esc_html__( 'Select do you want to feature Child Pages, Blog Posts or Portfolios in Front Page.', 'toivo-lite' ),
			'section'     => 'front-page',
			'priority'    => 80,
			'type'        => 'radio',
			'choices'     => $front_page_featured_choices
		)
	);
	
	/* Add the setting for Callout image. */
	$wp_customize->add_setting(
		'callout_image',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitaze_text_field'
		) );
	
	/* Add the Callout image link control. */
	$wp_customize->add_control(
		'callout_image',
		array(
			'label'       => esc_html__( 'Callout Image', 'toivo-lite' ),
			'description' => sprintf( __( '<a href="%s" target="_blank">Upgrade to Toivo (Pro)</a> for adding Callout Image.', 'toivo-lite' ), esc_url( toivo_lite_get_upgrade_link() ) ),
			'section'     => 'front-page',
			'priority'    => 170,
			'type'        => 'text'
		)
	);
	
	/* == Background section == */
	
	/* Add the background section. */
	$wp_customize->add_section(
		'background',
		array(
			'title'    => esc_html__( 'Background Settings', 'toivo-lite' ),
			'priority' => 30,
			'panel'    => 'theme'
		)
	);

	/* Add custom header background color setting. */
	$wp_customize->add_setting(
		'header_background_color',
		array(
			'default'           => apply_filters( 'toivo_lite_default_bg_color', '#3b5667' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	/* Add custom header background color control. */
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'header_background_color',
		array(
			'label'       => esc_html__( 'Header Background Color', 'toivo-lite' ),
			'section'     => 'background',
			'priority'    => 40,
		)
	) );
	
	/* Add custom header background color opacity setting. */
	$wp_customize->add_setting(
		'header_background_color_opacity',
		array(
			'default'           => absint( apply_filters( 'toivo_lite_default_bg_opacity', 70 ) ),
			'sanitize_callback' => 'absint',
		)
	);
	
	$wp_customize->add_control(
		'header_background_color_opacity',
			array(
				'type'        => 'range',
				'priority'    => 50,
				'section'     => 'background',
				'label'       => esc_html__( 'Header Color Opacity.', 'toivo-lite' ),
				'description' => esc_html__( 'Set Header Color opacity.', 'toivo-lite' ),
				'input_attrs' =>
					array(
						'min'   => 0,
						'max'   => 100,
						'step'  => 1
					),
			)
		);
		
	/* Add the setting for subsidiary sidebar background image. */
	$wp_customize->add_setting(
		'callout_image',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitaze_text_field'
		) );
	
	/* Add the Callout image link control. */
	$wp_customize->add_control(
		new Toivo_Lite_Customize_Control_Info_Text(
			$wp_customize,
			'callout_image',
				array(
					'label'       => esc_html__( 'Subsidiary Sidebar Background', 'toivo-lite' ),
					'description' => sprintf( __( '<a href="%s" target="_blank">Upgrade to Toivo (Pro)</a> for adding Subsidiary Sidebar Background Image and Color.', 'toivo-lite' ), esc_url( toivo_lite_get_upgrade_link() ) ),
					'section'     => 'background',
					'priority'    => 60,
					'type'        => 'info-text'
				)
			)
		);
	
	/* == Portfolio section == */
	
	if( post_type_exists( 'jetpack-portfolio' ) ) {
	
		/* Add the portfolio section. */
		$wp_customize->add_section(
			'portfolio',
			array(
				'title'    => esc_html__( 'Portfolio Settings', 'toivo-lite' ),
				'priority' => 40,
				'panel'    => 'theme'
			)
		);
	
		/* Add the portfolio title setting. */
		$wp_customize->add_setting(
			'portfolio_title',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
	
		/* Add the portfolio title control. */
		$wp_customize->add_control(
			new Toivo_Lite_Customize_Control_Info_Text(
				$wp_customize,
				'portfolio_title',
					array(
						'label'       => esc_html__( 'Portfolio Page Title', 'toivo-lite' ),
						'description' => sprintf( __( '<a href="%s" target="_blank">Upgrade to Toivo (Pro)</a> for changing Portfolio title and description.', 'toivo-lite' ), esc_url( toivo_lite_get_upgrade_link() ) ),
						'section'     => 'portfolio',
						'type'        => 'info-text'
					)
				)
			);
	
	}
	
	/* == Footer section == */
	
	/* Add the footer section. */
	$wp_customize->add_section(
		'footer',
		array(
			'title'    => esc_html__( 'Footer Settings', 'toivo' ),
			'priority' => 50,
			'panel'    => 'theme'
		)
	);
	
	/* Add the footer section setting. */
	$wp_customize->add_setting(
		'footer_section',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	/* Add the text control for the 'footer_section' setting. */
	$wp_customize->add_control(
		new Toivo_Lite_Customize_Control_Info_Text(
			$wp_customize,
			'footer_section',
				array(
					'label'       => esc_html__( 'Enter footer text', 'toivo-lite' ),
					'description' => sprintf( __( '<a href="%s" target="_blank">Upgrade to Toivo (Pro)</a> for hiding or changing Footer text.', 'toivo-lite' ), esc_url( toivo_lite_get_upgrade_link() ) ),
					'section'     => 'footer',
					'type'        => 'info-text'
				)
			)
		);
	
}
add_action( 'customize_register', 'toivo_lite_customize_register' );

/**
 * Enqueues front-end CSS for backgrounds.
 *
 * @since 1.0.0
 * @see   wp_add_inline_style()
 */
function toivo_lite_color_backgrounds_css() {
	
	/* Get header colors. */
	$header_bg_color = get_theme_mod( 'header_background_color', '#3b5667' );
	$header_bg_color_opacity = absint( get_theme_mod( 'header_background_color_opacity', absint( apply_filters( 'toivo_lite_default_bg_opacity', 70 ) ) ) );
	$header_bg_color_opacity = $header_bg_color_opacity / 100;

	/* Convert hex color to rgba. */
	$header_bg_color_rgb = toivo_lite_hex2rgb( $header_bg_color );
	
	/* Header bg styles. */	
	if ( '#3b5667' !== $header_bg_color || 70 !== $header_bg_color_opacity ) {
			
		$bg_color_css = "
			.site-header,
			.custom-header-image .site-header > .wrap::before {
				background-color: rgba( {$header_bg_color_rgb['red'] }, {$header_bg_color_rgb['green']}, {$header_bg_color_rgb['blue']}, {$header_bg_color_opacity});
			}";
				
	}
		
	wp_add_inline_style( 'toivo-lite-style', $bg_color_css );
}
add_action( 'wp_enqueue_scripts', 'toivo_lite_color_backgrounds_css' );

/**
 * Sanitize the Global layout value.
 *
 * @since 1.0.0
 *
 * @param string $layout Layout type.
 * @return string Filtered layout type (1c|2c-l|2c-r).
 */
function toivo_lite_sanitize_layout( $layout ) {

	if ( ! in_array( $layout, array( '1c', '2c-l', '2c-r' ) ) ) {
		$layout = '2c-l';
	}

	return $layout;
	
}

/**
 * Sanitize the Featured Content value.
 *
 * @since 1.0.0
 *
 * @param  string $featured content type.
 * @return string Filtered featured content type (child-pages|blog-posts|portfolios).
 */
function toivo_lite_sanitize_featured( $featured ) {

	if ( ! in_array( $featured, array( 'child-pages', 'blog-posts', 'portfolios' ) ) ) {
		$featured = 'child-pages';
	}

	return $featured;
	
}

/**
 * Sanitize the checkbox value.
 *
 * @since 1.0.0
 *
 * @param  string $input checkbox.
 * @return string (1 or null).
 */
function toivo_lite_sanitize_checkbox( $input ) {

	if ( 1 == $input ) {
		return 1;
	} else {
		return '';
	}

}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function toivo_lite_customize_register_pm( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
}
add_action( 'customize_register', 'toivo_lite_customize_register_pm' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since  1.0.0
 */
function toivo_lite_customize_preview_js() {
	wp_enqueue_script( 'toivo-lite-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), TOIVO_LITE_VERSION, true );
}
add_action( 'customize_preview_init', 'toivo_lite_customize_preview_js' );

/**
* Callout text and link in front page template.
*
* @since  1.0.0
*/
function toivo_lite_callout_output( $placement ) {
	
	/* Set default placement of the callout. */
	if( empty( $placement ) ) {
		$placement = 'top';
	}
	
	/* Start output. */
	$output = '';

	/* Output callout link and text on page templates. */
	if ( get_theme_mod( 'callout_title_' . $placement ) || get_theme_mod( 'callout_url_' . $placement ) || get_theme_mod( 'callout_url_text_' . $placement ) || get_theme_mod( 'callout_text_' . $placement ) ) {
		
		/* Start output. */
		$output .= '<div class="toivo-callout toivo-callout-' . $placement . '"><div class="entry-inner">';
		
		/* Callout title. */
		if( get_theme_mod( 'callout_title_' . $placement ) ) {
			$output .= '<div class="entry-header"><h2 class="toivo-callout-title entry-title">' . esc_attr( get_theme_mod( 'callout_title_' . $placement ) ) . '</h2></div>';
		}
		
		/* Callout text. */
		if( get_theme_mod( 'callout_text_' . $placement ) ) {
			$output .= '<div class="toivo-callout-text">' . apply_filters( 'toivo_the_content', esc_html( get_theme_mod( 'callout_text_' . $placement ) ) ) . '</div>';
		}
		
		/* Callout link. */
		if( get_theme_mod( 'callout_url_' . $placement ) && get_theme_mod( 'callout_url_text_' . $placement ) ) {
			$output .= '<div class="toivo-callout-link"><a class="toivo-button toivo-callout-link-anchor" href="' . esc_url( get_theme_mod( 'callout_url_' . $placement ) ) . '">' . esc_html( get_theme_mod( 'callout_url_text_' . $placement ) ) . '</a></div>';
		}
		
		/* End output. */
		$output .= '</div></div>';
		
	}
	
	return $output;
	
}

/**
* Echo Callout in front page template.
*
* @since  1.0.0
*/
function toivo_lite_echo_callout( $placement ) {
	
	/* Set default placement of the callout. */
	if( empty( $placement ) ) {
		$placement = 'top';
	}

	$echo_output = toivo_lite_callout_output( $placement );

	if( !empty( $echo_output ) ) {
		echo $echo_output;
	}

}
