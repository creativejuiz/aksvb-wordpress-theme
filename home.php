<?php
/**
 * Represents the template of blog page
 */
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

get_template_part( 'header' );
?>
	<div id="package">
		<div id="main" class="main">
			<div class="grid-container">

				<?php 
					aksvb_hr();
			
					if ( have_posts() ) {
				?>
					<h1 class="acenter"><?php _e('News', 'aksvb' ); ?></h1>
					<p class="acenter">Les dernières actualités de l'école, démos, rentrées, évènements, etc.</p>

					<div class="grid-container">
				<?php
						$counter = 0;
						while ( have_posts() ) {
							the_post();
				?>

						<article class="article grid-50">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><time datetime="<?php echo get_the_time( 'U' ); ?>"><?php echo get_the_time( 'd M. Y' ); ?></time></p>

							<div class="the_post_content">
								<?php the_content(); ?>
							</div>
						</article>

				<?php
							if ( $counter % 2 ) {
								echo '<div class="grid-100 spaced"></div>';
							}
							$counter++;
						} // Eo While
				?>
					</div><!-- .grid-container -->
				<?php
						aksvb_hr();
					} // Eo if
				?>

			</div>
		</div>
	</div>
<?php
get_template_part( 'footer' );
