<?php

/*
 *  Register block types
 *
 */

add_action( 'init', function( ) {
   /*  Icon  */
	register_block_type(
		'ropecon/icon',
		array(
			'editor_script' => get_template( ) . '-gutenberg-blocks',
			'attributes' => array(
				'icon' => array( 'type' => 'string', 'default' => '' )
			)
		)
	);
} );

/*
 *  Enqueue block assets
 *
 */

add_action( 'enqueue_block_assets', function ( ) {
	$ver = 'blocks-1';
	//wp_enqueue_style( get_template( ) . '-blocks', get_template_directory_uri( ) . '/blocks/blocks.css', array( get_template( ) ) );
	wp_enqueue_script( get_template( ) . '-blocks', get_template_directory_uri( ) . '/blocks/blocks.js', array( 'wp-blocks', 'wp-dom', 'wp-i18n' ), $ver, true );
	wp_set_script_translations( get_template( ) . '-blocks', 'ropecon', get_template_directory( ) . '/languages/' );
} );


?>
