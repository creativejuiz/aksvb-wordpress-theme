<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

/**
 * Get post datas depending on wpml_object_id filter and current language
 * 
 * @var int    The original post ID
 * @var string The type of post ('page' by default)
 *
 * @return object Post object
 * @since  1.0
 * @author Geoffrey Crofte
 */
function aksvb_get_i18n_page( $id, $pt = 'page' ) {
	$i18n_page = get_post( aksvb_get_i18n_id( $id, $pt ) );
	return $i18n_page;
}

/**
 * Get post ID depending on wpml_object_id filter and current language
 *
 * @var int    The original post ID
 * @var string The type of post ('page' by default)
 *
 * @return int The translated (or not) post ID.
 * @since  1.0
 * @author Geoffrey Crofte
 */
function aksvb_get_i18n_id( $id, $pt = 'page' ) {

	if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
		$icl_get_current_language = ICL_LANGUAGE_CODE;

		// if array
		if( is_array( $id ) ){
			$translated_object_ids = array();
			foreach ( $id as $id ) {
				$translated_object_ids[] = apply_filters( 'wpml_object_id', $id, $pt, true, $icl_get_current_language );
			}
			return $translated_object_ids;
		}
		// if string
		elseif( is_string( $id ) ) {
			// check if we have a comma separated ID string
			$is_comma_separated = strpos( $id,',' );

			if( $is_comma_separated !== FALSE ) {
				// explode the comma to create an array of IDs
				$id = explode( ',', $id );

				$translated_object_ids = array();
				foreach ( $id as $id ) {
					$translated_object_ids[] = apply_filters ( 'wpml_object_id', $id, $pt, true, $icl_get_current_language );
				}

				// make sure the output is a comma separated string (the same way it came in!)
				return implode ( ',', $translated_object_ids );
			}
			// if we don't find a comma in the string then this is a single ID
			else {
				return apply_filters( 'wpml_object_id', intval( $id ), $pt, true, $icl_get_current_language );
			}
		}
		// if int
		else {
			return apply_filters( 'wpml_object_id', $id, $pt, true, $icl_get_current_language );
		}
	}
	else {
		return $id;
	}
}