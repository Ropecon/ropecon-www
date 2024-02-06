<header id="header" class="site full">
	<section class="dynamic-width group">
		<div id="title_main">
			<h1 id="title">
				<a href="<?php print home_url( '/' ); ?>">
					<?php get_template_part( 'parts/tpl/logo' ); ?>
				</a>
			</h1>
		</div>
		<nav id="navi_main" class="group open-on-hover no-js">
			<?php wp_nav_menu( array( 'theme_location' => 'navi_main', 'fallback_cb' => false ) ); ?>
		</nav>
	</section>
</header>
