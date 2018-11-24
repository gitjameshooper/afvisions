<?php
/**
 * The info text customize control extends the WP_Customize_Control class.
 *
 * @package Toivo Lite
 */

/**
 * Info text customize control class.
 *
 * @since 1.0.2
 */
class Toivo_Lite_Customize_Control_Info_Text extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since 1.0.2
	 */
	public $type = 'info-text';

	/**
	 * Displays the info text on the customize screen.
	 *
	 * @since 1.0.2
	 */
	public function render_content() { ?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<span class="description customize-control-description">
				<?php echo $this->description; ?>
			</span>
		</label>
	<?php }
}