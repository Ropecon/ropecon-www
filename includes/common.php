<?php

/**
 *  Add functions for custom title and description output
 *
 */

function ropecon_wp_title( $echo = false ) {
	$title = wp_title( '&laquo;', false, 'right' ) . get_bloginfo( 'name' );
	if( !$echo ) {
		return $title;
	} else {
		echo $title;
	}
}

function ropecon_description( $echo = false ) {
	if( has_excerpt( ) ) {
		$description = get_the_excerpt( );
	} elseif( strlen( get_bloginfo( 'description' ) ) > 0 ) {
		$description = get_bloginfo( 'description' );
	} else {
		$description = get_bloginfo( 'name' );
	}

	if( !$echo ) {
		return $description;
	} else {
		echo $description;
	}
}

?>
