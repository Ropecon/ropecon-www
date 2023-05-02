	<footer class="site group">
		<section class="dynamic-width container">
			<?php if( function_exists( 'dynamic_sidebar' ) ) {
				dynamic_sidebar( 'footer_widgets' );
			} ?>
		</section>
		<nav class="dynamic-width container">
			<?php wp_nav_menu( array( 'theme_location' => 'navi_main', 'fallback_cb' => false ) ); ?>
		</nav>

		<?php wp_footer( ); ?>
	</footer>

	<div id="copyright">
		<div class="dynamic-width container">
			<p><?php echo get_option( 'ropecon_footer_copy' ); ?> | Sivusto käyttää evästeitä</p>
		</div>
	</div>

</body>
</html>
