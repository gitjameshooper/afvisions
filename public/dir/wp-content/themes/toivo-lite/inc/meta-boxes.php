<?php
/**
 * Add metabox for Callout info on singular page header section.
 *
 * @package Toivo Lite
 */

/**
 * Add custom meta box for wanted post types. This can be filtered in filter 'toivo_lite_when_to_show_callout_metaboxes'.
 *
 * @since 1.0.2
 * @return void
 */

function toivo_lite_create_meta_boxes() {
	
	/* When to show metaboxes. */
	$toivo_lite_when_to_show_metaboxes = apply_filters( 'toivo_lite_when_to_show_callout_metaboxes', array( 'page', 'post', 'jetpack-portfolio', 'jetpack-testimonial' ) );
	
	/* Load metaboxes. */
	foreach ( $toivo_lite_when_to_show_metaboxes as $toivo_lite_when_to_show_metabox ) {
		add_meta_box( 'toivo_lite_metabox', esc_html__( 'Header Callout text', 'toivo-lite' ), 'toivo_lite_meta_box_display', $toivo_lite_when_to_show_metabox, 'normal', 'high' );
	}
	
}
add_action( 'add_meta_boxes', 'toivo_lite_create_meta_boxes' );

/**
 * Displays the extra meta box.
 *
 * @since  1.0.2
 * @access public
 * @param  object  $post
 * @param  array   $metabox
 * @return void
 */
function toivo_lite_meta_box_display( $post, $metabox ) {

	wp_nonce_field( basename( __FILE__ ), 'toivo-metabox-nonce' ); ?>
	
	</p>
		<?php echo sprintf( __( 'Want to replace header text with Callout text and description in singular views? <a href="%s">Upgrade to Toivo (Pro)</a>.', 'toivo-lite' ), esc_url( toivo_lite_get_upgrade_link() ) ); ?>
	</p>

	<?php
	
}
