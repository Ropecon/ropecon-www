<?php

/*
 *  Register extra settings
 *
 */

add_action( 'admin_menu', function( ) {
	add_submenu_page( 'options-general.php', __( 'Settings for Ropecon', 'ropecon' ), 'Ropecon', 'manage_options', 'ropecon', 'ropecon_settings_page' );
} );

function ropecon_settings_page( ) {
	?>
		<div class="wrap">
			<form action="options.php" method="POST">
			<h1><?php _e( 'Settings for Ropecon', 'ropecon' ); ?></h1>
			<?php
				settings_fields( 'ropecon' );
				do_settings_sections( 'ropecon' );
				submit_button( __( 'Save Changes', 'ropecon' ) );
			?>
			</form>
		</div>
	<?php
}

add_action( 'admin_init', function( ) {
	/*  Settings section  */
	add_settings_section( 'general', _x( 'General', 'settings section title', 'ropecon' ), null, 'ropecon' );

	/*  404 page  */
	register_setting(
		'ropecon',
		'ropecon_404_page',
		array(
			'type' => 'integer',
			'description' => __( '404 Error Page', 'ropecon' ),
			'sanitize_callback' => 'ropecon_sanitize_page',
			'default' => 0
		)
	);

	add_settings_field(
		'ropecon_404_page',
		__( '404 Error Page', 'ropecon' ),
		'ropecon_404_page_field',
		'ropecon',
		'general'
	);

	/*  Footer content  */
	register_setting(
		'ropecon',
		'ropecon_footer_copy',
		array(
			'type' => 'string',
			'description' => __( 'Footer Copyright Content', 'ropecon' ),
			'sanitize_callback' => 'sanitize_text_field',
			'default' => ''
		)
	);

	add_settings_field(
		'ropecon_footer_copy',
		__( 'Footer Copyright Content', 'ropecon' ),
		'ropecon_text_field',
		'ropecon',
		'general',
		array( 'key' => 'ropecon_footer_copy' )
	);

	if( function_exists( 'pll_register_string' ) ) {
		pll_register_string( 'ropecon_footer_copy', get_option( 'ropecon_footer_copy' ), 'Ropecon', false );
	}
} );

function ropecon_sanitize_page( $input ) {
	if( 'page' == get_post_type( $input ) ) {
		return $input;
	}
	return 0;
}

function ropecon_404_page_field( ) {
	wp_dropdown_pages( array(
		'selected' => get_option( 'ropecon_404_page' ),
		'name' => 'ropecon_404_page',
		'show_option_none' => __( '-- Use built-in --', 'ropecon' ),
		'option_none_value' => 0
	) );
}

function ropecon_text_field( $args ) {
	$value = get_option( $args['key'] );
	echo '<input type="text" class="widefat" name="' . $args['key'] . '" value="' . $value . '" />';
}

add_filter( 'display_post_states', function( $states, $post ) {
	if( $post->ID == get_option( 'ropecon_404_page' ) ||
		( function_exists( 'pll_get_post' ) && function_exists( 'pll_default_language' ) && pll_get_post( $post->ID, pll_default_language( ) ) == get_option( 'ropecon_404_page' ) ) ) {
		$states['ropecon_404_page'] = __( '404 Error Page', 'ropecon' );
	}

	return $states;
}, 10, 2 );

?>
