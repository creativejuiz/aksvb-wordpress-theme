<?php defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' ); ?>

		<div class="footer">
			<div class="contact" id="contact">
				<div class="headline">
					<?php aksvb_logo( 'b' ); ?>
				</div>

				<div class="grid-container">
					<?php
					$fr = do_shortcode('[contact-form-7 id="200" title="Formulaire de contact"]');

					if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
						// show FR contact form for french
						if ( ICL_LANGUAGE_CODE === 'fr' ) {
							echo $fr;
						}
						// show EN contact form for other visitors to encourage them contact
						else {
							echo do_shortcode('[contact-form-7 id="44" title="Contact Form"]');
						}
					} else {
						echo $fr;
					}
					?>
				</div><!-- .grid-container -->
			</div><!-- .contact -->
			
			<div class="informations">
				<noscript>
					<div class="grid-container line acenter">
						<div class="grid-100">
							<?php echo get_aksvb_option( 'training_locations' ); ?>
						</div>
					</div>
				</noscript>
				<div class="grid-container line">
					<div class="grid-25 suffix-5 prefix-20 tablet-grid-35 tablet-suffix-5 tablet-prefix-10">
						<?php echo get_aksvb_option( 'contact_1' ); ?>
					</div>
					<div class="grid-30 prefix-5 suffix-15 tablet-grid-40 tablet-prefix-5 tablet-suffix-5">
						<?php echo get_aksvb_option( 'contact_2' ); ?>
					</div>
				</div><!-- .line -->

				<div class="grid-container line">
					<div class="grid-25 suffix-5 prefix-20 tablet-grid-35 tablet-suffix-5 tablet-prefix-10">
						<?php echo get_aksvb_option( 'hq' ); ?>
					</div>

					<div class="grid-30 prefix-5 suffix-15 tablet-grid-35 tablet-prefix-5 tablet-suffix-10">
						<img src="<?php echo AKSVB_THEME_IMGS; ?>ffkda-logo_2x.png" width="60" height="60" alt="Fédération Française de Karaté et disciplines associées">

						<p class="federation-line"><?php _e( 'Our school is part of French Federation of Karate and related disciplines.', 'aksvb' ); ?></p>
					</div>
				</div><!-- .line -->
			</div><!-- .informations -->

			<div class="maps" id="gmaps"></div>
			
			<div class="proverbs">
				<div class="grid-container">
					<p class="proverb">Quand l'aigle attaque, il plonge sans étendre ses ailes. Quand le tigre est sur le point de bondir sur sa proie, il rampe, les oreilles rabbatues. De même, quand un sage est sur le point d'agir, nul ne peut le deviner.</p>
					<p class="author">Funakoshi Gishin</p>
				</div>
			</div><!-- .proverbs -->

			<div class="credits">
				<div class="grid-container">
					<div class="grid-100">
						<p>Made by <a title="Opla - Studio de communication visuelle" href="http://www.opla-studio.com" class="opla-logo" target="_blank"></a> and <a href="http://www.cubestudio.fr/" class="cubestudio-logo" target="_blank">cubestudio</a><br>WordPress Theme by <a title="WebDesigner et Développeur Web spécialisé dans WordPress" href="http://geoffrey.crofte.fr/" target="_blank">Geoffrey Crofte</a>.</p>

						<a href="#top" class="top">
							<span></span>
							<p id="triangle-mot">Justesse</p>
						</a>

					</div>
				</div>
			</div><!-- .credits -->
		</div><!-- .footer -->
	</div><!-- .layout -->

	<?php wp_footer(); ?>

	<script>
		Modernizr.mq('only all') || document.write('<script src="<?php echo AKSVB_THEME_JS; ?>vendor/respond.min.js"><\/script>');
	</script>

	<script>
		Modernizr.input.placeholder || document.write('<script src="<?php echo AKSVB_THEME_JS; ?>vendor/jquery.placeholder.js"><\/script>');
	</script>

</body>
</html>