<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

define( 'AKSVB_THEME_VERSION', '1.0' );
define( 'AKSVB_THEME_ASSETS' , get_stylesheet_directory_uri() . '/assets/'            );
define( 'AKSVB_THEME_IMGS'   , get_stylesheet_directory_uri() . '/assets/images/'     );
define( 'AKSVB_THEME_CSS'    , get_stylesheet_directory_uri() . '/assets/css/'        );
define( 'AKSVB_THEME_JS'     , get_stylesheet_directory_uri() . '/assets/javascript/' );
define( 'AKSVB_OPTIONS_SLUG' , 'aksvb_options'                                        );

/* Registers (navs, sidebars, etc.) */
require_once( 'inc/registers.php' );

/* Styles & Scripts */
require_once( 'inc/front/enqueue.php' );

/* Pieces of reused code (HTML) */
require_once( 'inc/front/templates.php' );

/* Edit Walkers */
require_once( 'inc/front/walkers.php' );

/* Localization functions */
require_once( 'inc/front/localization.php' );

/* Shortcodes */
require_once( 'inc/front/shortcode-slideshow.php' );

/* Third Party codes (ACF Options Page, Contact Form 7, etc. ) */
require_once( 'inc/third-parties.php' );

if ( is_admin() ) {

	require_once( 'inc/back/rich-editor.php' );

}

?>