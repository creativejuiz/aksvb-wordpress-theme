<?php
/**
 * Represents the template of blog post
 */
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

get_template_part( 'header' );
?>
	<div id="package">
		<div id="main" class="main">
			<div class="grid-container">

				<?php aksvb_hr(); ?>

				<article class="article grid-60 push-20">
					<h1><?php the_title(); ?></h1>
					<p><time datetime="<?php echo get_the_time( 'U' ); ?>"><?php echo get_the_time( 'd/M/Y' ); ?></time></p>

					<div class="the_post_content">
						<?php the_content(); ?>
					</div>
				</article>
				
				<?php aksvb_hr(); ?>

			</div>
		</div>
	</div>
<?php
get_template_part( 'footer' );
