<?php
/**
 * Represents the homepage
 */
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

get_template_part( 'header' );
?>

	<?php
	/**
	 * Slideshow parts
	 */

	echo do_shortcode('[slideshow id="' . aksvb_get_i18n_id( 192, 'slideshow' ) . '"]');
	?>

	<div id="package">
		<div id="main" class="main">
			<div class="grid-container">
				<?php 
				// separator
				aksvb_hr();

				// the content should not be used, see layout system (ACF)
				the_content();

				// the AKSVB content, the layout system (ACF)
				aksvb_the_content();

				// Let's add some blog posts if we are in FR
				if ( defined( 'ICL_LANGUAGE_CODE' ) && ICL_LANGUAGE_CODE === 'fr' ) {
					$news = new WP_Query(array(
						'post_type'       => 'post',
						'orderby'         => 'date',
						'order'           => 'DESC',
						'posts_per_page'  => 4,
						'nopaging'        => true,
						'cache_results'   => false,
						'update_post_meta_cache' => false,
						'update_post_term_cache' => false
					));

					if ( $news->have_posts() ) {
						// add a separator
						aksvb_hr();
					?>

					<div class="grid-100 ">
						<h1><?php _e( 'News', 'aksvb' ); ?></h1>
						<div class="events" id="events">
							<ul>
					<?php
						while ( $news->have_posts() ) {
							$news->the_post();
					?>
								<li>
									<time datetime="<?php echo get_the_time( 'U' ); ?>" class="date"><?php echo get_the_time( 'd/m/Y' ); ?></time>
									<div class="title"><?php the_title(); ?></div>
									<div class="content"><?php the_content(); ?></div>
								</li>
					<?php
						} // Eo While have posts
					?>
							</ul>
						</div>
						<p class="font-bold acenter"><a href="/blog/"><?php _e( 'See All News', 'aksvb' ); ?></a></p>
					</div>

				<?php
					} // Eo If have posts
				} // Eo if defined ICL_LANGUAGE_CODE
				?>



				<?php aksvb_hr(); ?>
			</div>
		</div>
	</div>
<?php
get_template_part( 'footer' );
