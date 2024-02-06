<?php

/**
 *  Add metadata to <head>
 *
 */

add_action( 'wp_head', function ( ) {
	global $wp;

	$title = ropecon_wp_title( );
	$description = ropecon_description( );

	$meta_url = home_url( add_query_arg( array(), $wp->request ) );
	$meta_domain = parse_url( home_url( ) )['host'];

	$post_id = 0;
	$meta_image = get_stylesheet_directory_uri( ) . '/images/meta-default.svg';

	if( ( is_front_page( ) && is_home( ) ) || is_home( ) ) {
		$post_id = get_option( 'page_for_posts' );
	} elseif( !is_404( ) ) {
		global $post;
		$post_id = $post->ID;
		$post_content = $post->post_content;
	}

	if( $post_id > 0 ) {
		if( !isset( $post_content ) ) {
			$post_content = get_the_content( null, false, $post_id );
		}

		if( get_the_post_thumbnail( $post_id ) != '' ) {
			$meta_image = get_the_post_thumbnail_url( $post_id, array( 1200, 630 ) );
	 	} else {
		 	$content = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post_content, $matches );
		 	if( !empty( $matches[1][0] ) ) {
				// first image is the image
				$meta_image = $matches[1][0];
			}
		}
	}

	echo PHP_EOL;
	// FB Meta
	echo '<meta property="og:url" content="' . $meta_url . '">' . PHP_EOL;
	echo '<meta property="og:type" content="website">' . PHP_EOL;
	echo '<meta property="og:title" content="' . $title . '">' . PHP_EOL;
	echo '<meta property="og:description" content="' . $description . '">' . PHP_EOL;
	if( !empty( $meta_image ) ) {
		echo '<meta property="og:image" content="' . $meta_image . '">' . PHP_EOL;
	}
	echo PHP_EOL;

	// Twitter meta
	echo '<meta name="twitter:card" content="summary_large_image">' . PHP_EOL;
	echo '<meta property="twitter:domain" content="' . $meta_domain . '">' . PHP_EOL;
	echo '<meta property="twitter:url" content="' . $meta_url . '">' . PHP_EOL;
	echo '<meta name="twitter:title" content="' . $title . '">' . PHP_EOL;
	echo '<meta name="twitter:description" content="' . $description . '">' . PHP_EOL;
	if( !empty( $meta_image ) ) {
		echo '<meta name="twitter:image" content="' . $meta_image . '">' . PHP_EOL;
	}
	echo PHP_EOL;
} );

?>
