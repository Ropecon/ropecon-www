<?php

/*
 *  Register an extra navigation menu for Guide
 *
 */

add_filter( 'wp_nav_menu_args', function( $args ) {
	if( isset( $_GET['mode'] ) && $_GET['mode'] == 'opas' ) {
		$args['theme_location'] = 'navi_guide';
	}
	return $args;
}, 1 );

/*
 *  When browsing the Guide, make sure all links include the Guide URL parameter
 *
 */

add_filter( 'nav_menu_link_attributes', function( $args ) {
	if( isset( $_GET['mode'] ) && $_GET['mode'] == 'opas' ) {
		$args['href'] = $args['href']  . '?mode=opas';
	}
	return $args;
} );

/*
 *  Register style
 *
 */

add_action( 'wp_enqueue_styles', function ( ) {
	if( isset( $_GET['mode'] ) && $_GET['mode'] == 'opas' ) {
		wp_enqueue_style( get_template( ) . '-mobile-guide', get_template_directory_uri( ) . '/css/mobile-guide.css', array( get_template( ) ), $ver );
	}
} );

?>
