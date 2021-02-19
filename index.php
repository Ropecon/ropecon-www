<?php get_header( ); ?>

	<main class="site group">
		<?php
			if( have_posts( ) ) {
				get_template_part( 'content', get_post_type( ) );
			} else {
				echo '<h1>' . __( 'Content not found.', 'ropecon' ) . '</h1>';
				echo '<p>' . __( 'The content you were looking for was not found.', 'ropecon' ) . '</p>';
			}
		?>
	</main>

<?php get_footer( ); ?>
