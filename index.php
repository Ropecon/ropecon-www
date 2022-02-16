<?php get_header( ); ?>

	<main class="site group">
		<?php
			if( have_posts( ) ) {
				get_template_part( 'content', get_post_type( ) );
			} else {
				?>
				<section id="content" <?php post_class( 'site group' ) ?>>
					<div class="wp-block-cover alignfull is-style-full-height"><img class="wp-block-cover__image-background" src="<?php echo get_stylesheet_directory_uri( ); ?>/images/block-pattern-preview/title-cover.svg" data-object-fit="cover">
						<div class="wp-block-cover__inner container" style="z-index: 1000;">
							<h1 class="has-text-align-center has-white-color has-text-color"><?php _e( 'Content not found', 'ropecon' ); ?></h1>
							<p class="has-text-align-center has-white-color has-text-color"><?php _e( 'The content you were looking for was not found.', 'ropecon' ); ?></p>
						</div>
					</div>
				</section>
				<?php
			}
		?>
	</main>

<?php get_footer( ); ?>
