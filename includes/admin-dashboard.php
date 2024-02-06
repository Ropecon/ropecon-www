<?php

/*
 *  Register a dashboard widget
 *
 */

add_action( 'wp_dashboard_setup', function( ) {
	wp_add_dashboard_widget( 'ropecon_theme', __( 'Ropecon theme', 'ropecon' ), 'ropecon_theme_dashboard_widget', null, null, null, 'high' );
} );

function ropecon_theme_dashboard_widget( ) {
	echo '<p><a class="button button-primary" href="https://github.com/Ropecon/ropecon-www/tree/main/guide">' . __( 'Quick Guide', 'ropecon' ) . '</a></p>';
	echo '<p><a class="button" href="https://github.com/Ropecon/ropecon-www/issues">' . __( 'Open Issues', 'ropecon' ) . '</a> ';
	echo '<a class="button" href="https://github.com/Ropecon/ropecon-www/issues/new">' . __( 'File New Issue', 'ropecon' ) . '</a></p>';
	$channel = '<code>#nettisivutekniikka</code>';
	# translators: Slack channel name
	echo '<p>' . __( 'Still need help or have other questions?', 'ropecon' ) . ' ' . sprintf( __( 'Find us on the Ropecon Slack on %s', 'ropecon' ), $channel ) . '</p>';
}

/*
 *  Enqueue complementary CSS file
 *
 */

add_action( 'admin_enqueue_scripts', function ( ) {
	wp_enqueue_style( get_template( ) . '-admin-dashboard', get_template_directory_uri( ) . '/css/dashboard.css' );
} );

?>
