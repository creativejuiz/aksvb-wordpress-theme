<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

add_action( 'wp_enqueue_scripts', 'aksvb_enqueue' );
function aksvb_enqueue() {
	
	wp_dequeue_script( 'jquery' );
	wp_deregister_script( 'jquery' );

	// Load modernizr in header
	wp_enqueue_script( 'aksvb-modernizr', AKSVB_THEME_JS . 'vendor/modernizr-2.8.3.min.js', array(), '2.8.3', false );
	
	// Scripts (libraries) in footer
	wp_enqueue_script( 'aksvb-jquery', AKSVB_THEME_JS . 'vendor/jquery-1.11.1.min.js', array(), '1.11.1', true );
	wp_enqueue_script( 'aksvb-velocity', AKSVB_THEME_JS . 'vendor/jquery.velocity.min.js', array('aksvb-jquery'), AKSVB_THEME_VERSION, true );
	wp_enqueue_script( 'aksvb-fitvids', AKSVB_THEME_JS . 'vendor/jquery.fitvids.js', array('aksvb-jquery'), AKSVB_THEME_VERSION, true );
	wp_enqueue_script( 'aksvb-picturefill', AKSVB_THEME_JS . 'vendor/picturefill.js', array('aksvb-jquery'), AKSVB_THEME_VERSION, true );
	wp_enqueue_script( 'aksvb-bxslider', AKSVB_THEME_JS . 'vendor/jquery.bxslider.min.js', array('aksvb-jquery'), AKSVB_THEME_VERSION, true );
	wp_enqueue_script( 'aksvb-tablesaw', AKSVB_THEME_JS . 'vendor/tablesaw.stackonly.js', array('aksvb-jquery'), AKSVB_THEME_VERSION, true );

	// Google maps
	wp_enqueue_script( 'gmaps', 'http://maps.google.com/maps/api/js?sensor=true', array(), AKSVB_THEME_VERSION, true );
	wp_enqueue_script( 'aksvb-gmaps', AKSVB_THEME_JS . 'vendor/gmaps.js', array( 'gmaps' ), AKSVB_THEME_VERSION, true );

	// Website scripts
	wp_enqueue_script( 'aksvb-common', AKSVB_THEME_JS . 'common.js', array('aksvb-jquery'), AKSVB_THEME_VERSION, true );
	//wp_enqueue_script( 'aksvb-contact', AKSVB_THEME_JS . 'contact.js', array('aksvb-common'), AKSVB_THEME_VERSION, true );
	

	// Load main CSS
	wp_enqueue_style('aksvb-googlefont', 'http://fonts.googleapis.com/css?family=Oswald:300,700%7CKaushan+Script', array(), AKSVB_THEME_VERSION, 'all' );
	wp_enqueue_style('aksvb-css', AKSVB_THEME_CSS . 'responsive.css', array(), AKSVB_THEME_VERSION, 'all' );
}
