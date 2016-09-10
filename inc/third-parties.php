<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

/**
 * Contact Form 7 Validation Message Classes
 * Doesn't work with JavaScript Activated (AJAX actions)
 * 
 * @since  1.0
 * @author Geoffrey Crofte
 */
add_filter( 'wpcf7_form_response_output', '_aksvb_wpcf7_response_output_edition', 10, 3 );
function _aksvb_wpcf7_response_output_edition( $output, $class, $content ) {
	if ( preg_match( '#errors#', $class ) ) {
		$output = preg_replace( '#errors#', 'errors alert-error', $output );
	} elseif ( preg_match( '#ok#', $class ) ) {
		$output = preg_replace( '#ok#', 'ok alert-success', $output );
	} elseif ( ! empty( $content ) ) {
		return 'lol';
	}
	return $output;
}

/**
 * ACF Option Page
 * Add an option page for this theme
 *
 * @since  1.0
 * @author Geoffrey Crofte
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	$args = array(
		'page_title'  => __( 'AKSVB options', 'aksvb' ),
		'menu_title'  => __( 'AKSVB options', 'aksvb' ),
		'menu_slug'   => AKSVB_OPTIONS_SLUG,
		'capability'  => 'edit_pages',
		'position'    => false, // default at the bottom
		'parent_slug' => '', // if set, this will become a child page
		'icon_url'    => false, // url or dashicons
		'redirect'    => true,
		'post_id'     => AKSVB_OPTIONS_SLUG,
		'autoload'    => false,
		
	);
	acf_add_options_page( $args );
}

/**
 * Get Option Datas from ACF
 */
function get_aksvb_option( $name ) {
	if ( function_exists( 'get_field' ) ) {
		return get_field( $name, AKSVB_OPTIONS_SLUG );
	}
}

/**
 * ACF ADMIN Styles
 *
 * @since  1.0
 * @author Geoffrey Crofte
 */
add_action( 'admin_head', '_aksvb_add_admin_styles_for_acf' );
function _aksvb_add_admin_styles_for_acf() {
	echo '<style>.acf-fc-layout-handle.acf-fc-layout-handle.acf-fc-layout-handle{background:#23282D; color:#F2F2F2;font-weight:bold;}</style>';
}
