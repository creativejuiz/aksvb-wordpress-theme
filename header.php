<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

$page_title = get_bloginfo( 'title' ) . ' - ' . get_bloginfo( 'description' );

?><!DOCTYPE html><!--[if lte IE 8]><html class="no-js ie8 lte-ie9 lte-ie8" lang=""> <![endif]--><!--[if IE 9]><html class="no-js ie9 lte-ie9" lang=""> <![endif]--><!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php
		if ( is_front_page() ) {
			echo $page_title;
		} else {
			echo ( get_the_title() ? get_the_title() . ' - ' . $page_title : $page_title );
		}
	?></title>
	
	<link rel="icon" type="images/png" href="<?php echo AKSVB_THEME_IMGS; ?>icons/bookmark.png">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo AKSVB_THEME_IMGS; ?>icons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo AKSVB_THEME_IMGS; ?>icons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo AKSVB_THEME_IMGS; ?>icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo AKSVB_THEME_IMGS; ?>icons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo AKSVB_THEME_IMGS; ?>icons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo AKSVB_THEME_IMGS; ?>icons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo AKSVB_THEME_IMGS; ?>icons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo AKSVB_THEME_IMGS; ?>icons/apple-touch-icon-152x152.png">
	<link rel="icon" type="image/png" href="<?php echo AKSVB_THEME_IMGS; ?>icons/favicon-196x196.png" sizes="196x196">
	<link rel="icon" type="image/png" href="<?php echo AKSVB_THEME_IMGS; ?>icons/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="<?php echo AKSVB_THEME_IMGS; ?>icons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo AKSVB_THEME_IMGS; ?>icons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php echo AKSVB_THEME_IMGS; ?>icons/favicon-32x32.png" sizes="32x32">

	<meta name="msapplication-TileColor" content="#000000">
	<meta name="msapplication-TileImage" content="<?php echo AKSVB_THEME_IMGS; ?>icons/mstile-144x144.png">

	<?php wp_head(); ?>
</head>
<body>
<!--[if lt IE 8]>
        <p class="browsehappy">[!] Votre navigateur est périmé. Il contient des failles de sécurité et pourrait ne pas afficher certaines fonctionnalités du site internet. [!]<br /><a href="http://browsehappy.com/">Découvrez comment mettre votre navigateur à jour</a></p><![endif]-->
	<div class="layout" id="top">
		<div class="header">
			<div class="header-top">
				<div class="header-options">
					<a class="facebook-logo hide-on-minimobile" href="https://www.facebook.com/pages/AKSVB-Association-Kung-Fu-Shaolin-Vu-Ba-de-Strasbourg/132182993618772" title="Page Facebook de l'AKSVB Strasbourg"><span class="visuallyhidden">Facebook</span></a>

					<div id="control-menu-mobile" class="control-menu-mobile hide-on-desktop">
						<span></span>
					</div>
					
					<?php
					$link_id = get_aksvb_option( 'header_link' );

					if ( intval( $link_id ) > 0 && defined( 'ICL_LANGUAGE_CODE' ) && ICL_LANGUAGE_CODE === 'fr' ) {
						$header_page = aksvb_get_i18n_page( $link_id );
					?>

						<a id="m-lettre-ouverte" href="<?php echo get_the_permalink( $header_page->ID ); ?>" class="letter-master hide-on-mobility"><?php echo $header_page->post_title; ?></a>

					<?php
					}

					// we don't have multilingual blog, so don't show lang-switcher in blog page case
					if ( ! is_home() ) {
						aksvb_lang_switcher();
					}
					?>
				</div>

				<?php
					$logo = get_aksvb_logo();

					if ( ! is_front_page() ) {
						echo '<a class="headline" href="<?php echo get_home_url(); ?>">' . $logo . '</a>';
					} else {
						echo '<span class="headline">' . $logo . '</span>';
					}
				?>
			</div><!-- .header-top -->

		<?php
			$main_nav = array(
				'menu'            => 'main_navigation',
				'container'       => 'div',
				'container_id'    => 'header-menu',
				'container_class' => 'header-menu',
				'theme_location'  => 'main_navigation'
				//'walker'          => new AKSVB_Walker_Nav_Menu()
			);

			wp_nav_menu( $main_nav );
		?>
		</div><!-- .header -->
