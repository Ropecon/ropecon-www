<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
<head>
	<title><?php wp_title( '&laquo;', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="copyright" content="&copy; Ropecon" />
	<?php
		if( has_excerpt( ) ) {
			$description = get_the_excerpt( );
		} elseif( strlen( get_bloginfo( 'description' ) ) > 0 ) {
			$description = get_bloginfo( 'description' );
		} else {
			$description = get_bloginfo( 'name' );
		}
	?>
	<meta name="description" content="<?php echo $description; ?>" />

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri( ); ?>/images/ropecon_icon.png">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />

	<?php wp_head( ); ?>
</head>

<body <?php body_class( ); ?>>

<header id="header" class="site full">
	<section class="dynamic-width group">
		<div id="title_main">
			<h1 id="title">
				<a href="<?php print home_url( '/' ); ?>">
					<img src="<?php echo get_stylesheet_directory_uri( ); ?>/images/Ropecon_logo_white.png" alt="<?php bloginfo( 'name' ); ?>" />
				</a>
			</h1>
		</div>
		<nav id="navi_main" class="group open-on-hover no-js">
			<?php wp_nav_menu( array( 'theme_location' => 'navi_main', 'fallback_cb' => false ) ); ?>
		</nav>
	</section>
</header>
