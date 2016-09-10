<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

/**
 * Prints the logo block (image + texts )
 * 
 * @return void
 * @since  1.0
 * @author Geoffrey Crofte
 */
function aksvb_logo( $color = 'y' ) {
	echo '
		<div class="logo-aksvb-' . $color . '"></div>
		<p class="title">
			' . __( 'School of Kung Fu Shaolin Vu Ba', 'aksvb' ) . '
		<p class="subtitle">
			' . __( 'Sino-Vietnamese Traditionnal Martial Arts ', 'aksvb' ) . '
		</p>
	';
}

/**
 * Prints the asian-styled divider
 * 
 * @return void
 * @since  1.0
 * @author Geoffrey Crofte
 */
function aksvb_hr() {
	echo get_aksvb_hr();
}

/**
 * Returns the asian-styled divider
 * 
 * @return string    HTML separator
 * @since  1.0
 * @author Geoffrey Crofte
 */
function get_aksvb_hr() {
	return '<div class="grid-100 hr-line"><hr></div>';
}

/**
 * Prints the lang switcher inside the header
 * @return void
 * @since  1.0
 * @author Geoffrey Crofte
 */
function aksvb_lang_switcher() {
?>
	<div id="control-lang" class="lang-menu">
		<?php
		$langs = icl_get_languages('skip_missing=0&orderby=id&order=desc');

		$av_langs = $curr_lang = '';

		foreach( $langs as $lang ) {
			if( $lang['active'] ) {
				$curr_lang .= '<p>' . strtoupper( $lang['language_code'] ) . '</p>' . "\n\t";
				$av_langs  .= '<li><a href="' . $lang['url'] . '" class="on href-lang-' . $lang['language_code'] . '" hreflang="' . $lang['language_code'] . '" title="' . $lang['native_name'] . '">' . strtoupper( $lang['language_code'] ) . '</a></li>' . "\n\t";
			} else {
				$av_langs  .= '<li><a href="' . $lang['url'] . '" class="href-lang-' . $lang['language_code'] . '" hreflang="' . $lang['language_code'] . '" title="' . $lang['native_name'] . '">' . strtoupper( $lang['language_code'] ) . '</a></li>' . "\n\t";
			}
		}
		?>
		<?php echo $curr_lang; ?>
		<ul>
			<?php echo $av_langs; ?>
		</ul>
	</div>
<?php
}

/**
 * Edit link for a post or page
 * 
 * @return void
 */
function aksvb_edit() {
	if ( is_user_logged_in() && current_user_can( 'edit_pages' ) ) {
?>

	<div class="grid-100 acenter">
		<br>
		<?php edit_post_link(); ?>
		<br>
	</div>

<?php
	}
}

function aksvb_the_content() {
	$nb_layouts = count( get_field( 'layout' ) );

	if ( have_rows( 'layout' ) ) {
		$nb = 0;

		while ( have_rows( 'layout' ) ) {

			the_row();
			$nb++;
			$last = $nb >= $nb_layouts ? true : false;

			switch (get_row_layout()) {
				case 'image_left':
?>

	<div id="<?php echo sanitize_key( get_sub_field( 'id' ) ); ?>" class="grid-50 push-50">

		<?php echo get_sub_field('text'); ?>

	</div>
	<div class="acenter mobile-grid-80 mobile-prefix-10 mobile-suffix-10 tablet-grid-60 tablet-prefix-20 tablet-suffix-20 grid-50 pull-50 grid-center-r">

		<?php $img = get_sub_field('image'); ?>

		<img class="img" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $img['width']; ?>" height="<?php echo $img['height']; ?>">
	</div>

<?php
					echo ! $last && get_sub_field( 'sep' ) ? get_aksvb_hr() : '';
					break;
				case 'image_right':
?>

	<div id="<?php echo sanitize_key( get_sub_field( 'id' ) ); ?>" class="grid-50 grid-center-l">

		<?php echo get_sub_field('text'); ?>
		
	</div>
	<div class="acenter mobile-grid-80 mobile-prefix-10 mobile-suffix-10 tablet-grid-60 tablet-prefix-20 tablet-suffix-20 grid-50">
		
		<?php $img = get_sub_field('image'); ?>

		<img class="img" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $img['width']; ?>" height="<?php echo $img['height']; ?>">
	</div>

<?php
					echo ! $last && get_sub_field( 'sep' ) ? get_aksvb_hr() : '';
					break;
				case 'image_left_33':
?>


	<div id="<?php echo sanitize_key( get_sub_field( 'id' ) ); ?>" class="grid-66 tablet-grid-66 mobile-grid-66 push-33 tablet-push-33 mobile-push-33 grid-center-l">

		<?php echo get_sub_field('text'); ?>

	</div>
	<div class="acenter grid-33 tablet-grid-33 mobile-grid-33 pull-66 tablet-pull-66 mobile-pull-66">
		
		<?php $img = get_sub_field('image'); ?>

		<img class="img" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $img['width']; ?>" height="<?php echo $img['height']; ?>">
	</div>

<?php
					echo ! $last && get_sub_field( 'sep' ) ? get_aksvb_hr() : '';
					break;
				case 'image_right_33':
?>
	<div id="<?php echo sanitize_key( get_sub_field( 'id' ) ); ?>" class="grid-66 tablet-grid-50">

		<?php echo get_sub_field('text'); ?>

	</div>
	<div class="acenter grid-33 tablet-grid-50 hide-on-mobiles">

		<?php $img = get_sub_field('image'); ?>

		<img class="img" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="<?php echo $img['width']; ?>" height="<?php echo $img['height']; ?>">
	</div>
	

<?php
					break;
				case 'text_full':
?>

	<div id="<?php echo sanitize_key( get_sub_field( 'id' ) ); ?>" class="grid-100">

		<?php echo get_sub_field('text'); ?>

	</div>

<?php
					echo ! $last && get_sub_field( 'sep' ) ? get_aksvb_hr() : '';
					break;
					case 'image_image':
?>

	<div id="<?php echo sanitize_key( get_sub_field( 'id' ) ); ?>" class="acenter grid-100 grid-parent">
		<div class="grid-50 tablet-grid-50 mobile-grid-50">

			<?php $img1 = get_sub_field('image_1'); ?>

			<img class="img" src="<?php echo $img1['url']; ?>" alt="<?php echo $img1['alt']; ?>" width="<?php echo $img1['width']; ?>" height="<?php echo $img1['height']; ?>">
		</div>
		<div class="grid-50 tablet-grid-50 mobile-grid-50">

			<?php $img2 = get_sub_field('image_2'); ?>

			<img class="img" src="<?php echo $img2['url']; ?>" alt="<?php echo $img2['alt']; ?>" width="<?php echo $img2['width']; ?>" height="<?php echo $img2['height']; ?>">
		</div>
	</div>
	

<?php
					echo ! $last && get_sub_field( 'sep' ) ? get_aksvb_hr() : '';
					break;
					case 'text_text':
?>

	<div id="<?php echo sanitize_key( get_sub_field( 'id' ) ); ?>" class="grid-100 grid-parent">
		<div class="grid-50 tablet-grid-50">

			<?php echo get_sub_field('text_1'); ?>

		</div>
		<div class="grid-50 tablet-grid-50">

			<?php echo get_sub_field('text_2'); ?>

		</div>
	</div>
	

<?php
					echo ! $last && get_sub_field( 'sep' ) ? get_aksvb_hr() : '';
					break;
				case 'text_text_text':
?>

	<div id="<?php echo sanitize_key( get_sub_field( 'id' ) ); ?>" class="grid-100 grid-parent">
		<div class="grid-33 tablet-grid-33">

			<?php echo get_sub_field('text_1'); ?>

		</div>
		<div class="grid-33 tablet-grid-33">

			<?php echo get_sub_field('text_2'); ?>

		</div>
		<div class="grid-33 tablet-grid-33">

			<?php echo get_sub_field('text_3'); ?>

		</div>
	</div>
	

<?php
					echo ! $last && get_sub_field( 'sep' ) ? get_aksvb_hr() : '';
					break;
			} // Eo Switch template
		} // Eo While have rows
	} // Eo if have rows
}
