<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

/**
 * Adds a select in Rich Editor to allow custom style selection
 *
 * @since  1.0
 * @author Geoffrey Crofte
 */
add_filter( 'mce_buttons_2', 'aksvb_add_styleselect_in_editors' );
function aksvb_add_styleselect_in_editors( $buttons ) {
	array_unshift( $buttons, 'styleselect' );

	return $buttons;
}

/**
 * Adds styles inside the styleselect dropdown
 *
 * @since  1.0
 * @author Geoffrey Crofte
 */
add_filter( 'tiny_mce_before_init', 'juiz_mce_before_init' );
function juiz_mce_before_init( $styles ) {
	
	$style_formats = array (
		array(
			'title'    => __('Proverb', 'aksvb'),
			'selector' => 'p',
			'block'    => 'p',
			'classes'  => 'proverb',
			'wrapper'  => true
		),
		array(
			'title'    => __('Proverb’s author', 'aksvb'),
			'selector' => 'p',
			'block'    => 'p',
			'classes'  => 'author',
			'wrapper'  => true
		),
		array(
			'title'    => __('Numeric Title', 'aksvb'),
			'selector' => 'p',
			'block'    => 'p',
			'classes'  => 'title-num',
			'wrapper'  => true
		)
	);

	// replacing existing styles by our own styles
	$styles['style_formats'] = json_encode( $style_formats );

	return $styles;
}

/**
 * Adds a stylesheet for the back-end editor
 *
 * @since  1.0
 * @author Geoffrey Crofte
 */
add_action( 'after_setup_theme', 'aksvb_add_editor_stylesheet' );
function aksvb_add_editor_stylesheet() {
	add_editor_style();
}
