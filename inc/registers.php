<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

/**
 * Registering main menu
 */
register_nav_menu( 'main_navigation', __( 'The main top header menu', 'aksvb' ) );

/**
 * Register CPT Slideshow
 *
 * @since  1.0
 * @author Geoffrey Crofte
 */
add_action( 'init', 'aksvb_register_slideshow_cpt' );
function aksvb_register_slideshow_cpt() {
	$labels = array(
		'name'                 => __( 'Slideshows', 'aksvb' ),
		'singular_name'        => __( 'Slideshow', 'aksvb' ),
		'menu_name'            => __( 'Slideshow', 'aksvb' ),
		'all_items'            => __( 'Slideshows', 'aksvb' ),
		'add_new'              => __( 'Add new slideshow', 'aksvb' ),
		'add_new_item'         => __( 'Add new slideshow', 'aksvb' ),
		'edit_item'            => __( 'Edit Slideshow', 'aksvb' ),
		'new_item'             => __( 'New Slideshow', 'aksvb' ),
		'view_item'            => __( 'View Slideshow', 'aksvb' ),
		'search_items'         => __( 'Search Slideshow', 'aksvb' ),
		'not_found'            => __( 'Nothing found', 'aksvb' ),
		'not_found_in_trash'   => __( 'Nothing found in Trash', 'aksvb' ),
		'parent_item_colon'    => __( 'Parent slideshow', 'aksvb' ),
		'featured_image'       => __( 'Main Image', 'aksvb' ),
		'set_featured_image'   => __( 'Set Main Image', 'aksvb' ),
		'remove_featured_image'=> __( 'Remove Main Image', 'aksvb' ),
		'use_featured_image'   => __( 'Use Main Image', 'aksvb' ),
		'archives'             => __( 'Archives', 'aksvb' ),
		'insert_into_item'     => __( 'Insert into slideshow', 'aksvb' ),
		'uploaded_to_this_item'=> __( 'Uploaded to this slideshow', 'aksvb' ),
		'filter_items_list'    => __( 'Filters Slideshows List', 'aksvb' ),
		'items_list_navigation'=> __( 'Slideshow list navigation', 'aksvb' ),
		'items_list'           => __( 'Slideshow List', 'aksvb' ),
		'parent_item_colon'    => __( 'Parent slideshow', 'aksvb' )
	);

	$args = array(
		'label'              => __( 'Slideshows', 'aksvb' ),
		'labels'             => $labels,
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_rest'       => false,
		'rest_base'          => 'slideshow',
		'has_archive'        => false,
		'show_in_menu'       => true,
		'exclude_from_search'=> true,
		'capability_type'    => 'post',
		'map_meta_cap'       => true,
		'hierarchical'       => false,
		'rewrite'            => array( 'slug' => 'slideshow', 'with_front' => true ),
		'query_var'          => 'slideshow',
		'menu_position'      => 25,'menu_icon' => 'dashicons-images-alt',
		'supports'           => array( 'title', 'thumbnail' )
	);

	register_post_type( 'slideshow', $args );
}

