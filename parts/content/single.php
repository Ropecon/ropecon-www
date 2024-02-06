<?php while( have_posts( ) ) { ?>
	<?php the_post( ); ?>

	<section id="content" <?php post_class( 'site group' ) ?>>
		<?php the_content( __( 'Read the rest of this article &raquo;', 'ropecon' ) ); ?>
	</section>
<?php } ?>
