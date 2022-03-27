	<footer class="site group">
		<section class="dynamic-width container">
			<?php if( function_exists( 'dynamic_sidebar' ) ) {
				dynamic_sidebar( 'footer_widgets' );
			} ?>
		</section>

		<?php wp_footer( ); ?>
	</footer>

	<div id="copyright">
		<div class="dynamic-width container">
			<p>© Ropecon 2022 | Palvelintilan tarjoaa Säätöyhteisö B2 ry | Kuvat Marko Saari, Sami Eräluoto, MiiaLiina, Tuomas Puikkonen ja Mikael Peltomaa | Sivusto käyttää evästeitä</p>
		</div>
	</div>

</body>
</html>
