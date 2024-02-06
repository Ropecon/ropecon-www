<?php

/*  Block patterns  */

add_action( 'init', 'ropecon_init_block_patterns' );

function ropecon_init_block_patterns( ) {
	register_block_pattern_category(
		'ropecon',
		array( 'label' => 'Ropecon' )
	);

	$patterns = array(
		'title-cover' => array(
			'title' => __( 'Title cover', 'ropecon' ),
			'description' => __( 'Centered title on top of image.', 'ropecon' )
		),
		'three-icon-columns' => array(
			'title' => __( 'Three icon columns', 'ropecon' ),
			'description' => __( 'Three columns with icons and varying background colors.', 'ropecon' )
		),
	);

	foreach( $patterns as $slug => $labels ) {
		$content_raw = file_get_contents( get_template_directory_uri( ) . '/block-patterns/tpl/' . $slug . '.gb.html' );
		$content = str_replace( 'IMG_ROOT', get_template_directory_uri( ) . '/block-patterns/preview', $content_raw );
		register_block_pattern(
			'ropecon/' . $slug,
			array(
				'title' => $labels['title'],
				'content' => $content,
				'description' => $labels['description'],
				'categories' => array( 'ropecon' ),
				'viewportWidth' => 1200
			)
		);
	}
}

?>
