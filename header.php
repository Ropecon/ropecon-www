<!DOCTYPE html>
<?php
	$title = wp_title( '&laquo;', false, 'right' ) . get_bloginfo( 'name' );

	if( has_excerpt( ) ) {
		$description = get_the_excerpt( );
	} elseif( strlen( get_bloginfo( 'description' ) ) > 0 ) {
		$description = get_bloginfo( 'description' );
	} else {
		$description = get_bloginfo( 'name' );
	}

	$meta_url = home_url( add_query_arg( array(), $wp->request ) );
	$meta_domain = parse_url( home_url( ) )['host'];

	$meta_image = '';

	global $post;
	if( get_the_post_thumbnail( $post->ID ) != '' ) {
		$meta_image = get_the_post_thumbnail_url( null, array( 1200, 630 ) );
 	} else {
	 	$content = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches );
	 	if( !empty( $matches[1][0] ) ) {
			// first image is the image
			$meta_image = $matches[1][0];
		} else {
			// no images in post found, fallback to default
			$meta_image = get_stylesheet_directory_uri( ) . '/images/meta-default.png';
		}
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
<head>
	<title><?php echo $title; ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="copyright" content="&copy; Ropecon" />
	<meta name="description" content="<?php echo $description; ?>" />

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri( ); ?>/images/ropecon_icon.png">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />

	<!-- FB meta -->
	<meta property="og:url" content="<?php echo $meta_url; ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo $title; ?>">
	<meta property="og:description" content="<?php echo $description; ?>">
	<meta property="og:image" content="<?php echo $meta_image; ?>">

	<!-- Twitter meta -->
	<meta name="twitter:card" content="summary_large_image">
	<meta property="twitter:domain" content="<?php echo $meta_domain; ?>">
	<meta property="twitter:url" content="<?php echo $meta_url; ?>">
	<meta name="twitter:title" content="<?php echo $title; ?>">
	<meta name="twitter:description" content="<?php echo $description; ?>">
	<meta name="twitter:image" content="<?php echo $meta_image; ?>">

	<?php wp_head( ); ?>
</head>

<body <?php body_class( ); ?>>

<header id="header" class="site full">
	<section class="dynamic-width group">
		<div id="title_main">
			<h1 id="title">
				<a href="<?php print home_url( '/' ); ?>">
					<img src="<?php echo get_stylesheet_directory_uri( ); ?>/images/Ropecon_logo_white.png" alt="<?php bloginfo( 'name' ); ?>" loading="eager" />
				</a>
			</h1>
		</div>
		<nav id="navi_main" class="group open-on-hover no-js">
			<?php wp_nav_menu( array( 'theme_location' => 'navi_main', 'fallback_cb' => false ) ); ?>
		</nav>
	</section>
</header>
