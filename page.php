<?php
/**
 * Represents the template of a basic page
 */
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

get_template_part( 'header' );
?>
	<div id="package">
		<div id="main" class="main">
			<div class="grid-container">

				<?php //aksvb_edit();	?>
				<?php aksvb_hr(); ?>

				<div class="article">
					<?php 
						// the_content() should be empty for AKSVB, see below for Flexible contents…
						the_content();

						// Layout system
						aksvb_the_content();
					?>
				</div>

				<?php aksvb_hr(); ?>
				<?php //aksvb_edit();	?>

			</div>
		</div>
	</div>
<?php
get_template_part( 'footer' );
