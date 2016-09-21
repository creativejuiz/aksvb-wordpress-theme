<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

add_shortcode( 'slideshow', 'aksvb_add_slideshow_sc' );
function aksvb_add_slideshow_sc( $attr ) {
	
	if ( ! function_exists( 'have_rows' ) ) {
		return 'You should install ACF.';
	}

	$output = '';
	$attr = shortcode_atts( array(
		'id' => '6'
	), $attr, 'slideshow' );

	// if nothing like an ID, do not continue
	if ( intval( $attr['id'] ) === 0 ) {
		return;
	}

	// If no slides, do nothing
	if ( ! have_rows( 'slide', intval( $attr['id'] ) ) ) {
		return;
	}

	$output .= '<div id="slideshow" class="slideshow slideshow-' . intval( $attr['id'] ) . '">';

	// Populate the slideshow with its slides
	while ( have_rows( 'slide', intval( $attr['id'] ) ) ) {
		the_row();

		$img_big    = get_sub_field( 'slide_image_big'    );
		$img_med    = get_sub_field( 'slide_image_medium' );
		$img_sma    = get_sub_field( 'slide_image_small'  );
		$img_fallbk = isset( $img_big['url'] ) ? $img_big : $img_med;
		$img_fallbk = isset( $img_fallbk['url'] ) ? $img_fallbk : $img_sma;

		$title      = empty( get_sub_field( 'slide_title' ) ) ? '' : '<h1>' . get_sub_field( 'slide_title' ) . '</h1>';
		$subtitle   = empty( get_sub_field( 'slide_subtitle' ) ) ? '' : '<p>' . get_sub_field( 'slide_subtitle' ) . '</p>';
		$img_alt    = get_sub_field( 'slide_title' ) . ' ' . get_sub_field( 'slide_subtitle' );

		$output .= '
			<div class="slide shadow">
				<span data-picture>
					<span data-src="' . $img_fallbk['url'] . '"></span>';
		if ( isset( $img_sma['url'] ) && ! empty( $img_sma['url'] ) ) {
			$output .= '<span data-src="' . $img_sma['url'] . '" data-media="(min-width: 670px)"></span>';
		}
		if ( isset( $img_med['url'] ) && ! empty( $img_med['url'] ) ) {
			$output .= '<span data-src="' . $img_med['url'] . '" data-media="(min-width: 897px)"></span>';
		}
		if ( isset( $img_big['url'] ) && ! empty( $img_big['url'] ) ) {
			$output .= '<span data-src="' . $img_big['url'] . '"></span>';
		}

		$output .= '<!--[if (lte IE 9) & (!IEMobile)]>
						<span data-src="' . $img_fallbk['url'] . '"></span>
					<![endif]-->
					<noscript>
						<div class="slide-img" style="background-image: url(' . $img_fallbk['url'] . ')"></div>
					</noscript>
				</span>
				<div class="slide-content">
					' . $title . '
					' . $subtitle . '
				</div>
			</div><!-- .slide -->' . "\n\t";
	}

	$output .= '</div><!-- .slideshow -->';

	return $output;
}
