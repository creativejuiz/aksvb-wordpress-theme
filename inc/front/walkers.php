<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

/**
 * Filterable walkers
 * (best before rewrite the entire walker menu)
 * Add parent URL into anchor sublevel menu items.
 *
 * @since  1.0
 * @author Geoffrey Crofte
 */
add_filter( 'walker_nav_menu_start_el', '_aksvb_edit_start_el_in_menu', 10, 4 );
function _aksvb_edit_start_el_in_menu( $item_output, $item, $depth, $args) {
	global $main_menus;

	// if it's a first level item, save its ID => URL
	if ( $depth === 0 ) {
		$main_menus[ $item->ID ] = $item->url;
	}
	// if it's a second level anchor URL (#something), display URL as "{parent_url}#something"
	else if ( $depth === 1 && preg_match( '#\##', $item->url ) ) {
		$new_url = $main_menus[ $item->menu_item_parent ] . $item->url;

		$item_output = preg_replace( '#href="(.+)"#', 'href="' . $new_url . '"', $item_output );
	}

	return $item_output;

}
