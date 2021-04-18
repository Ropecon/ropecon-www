<?php

/*
 *  Initialize theme
 *
 */

add_action( 'after_setup_theme', 'ropecon_after_setup_theme' );

function ropecon_after_setup_theme( ) {
	/*  Load text domain  */
	load_theme_textdomain( 'ropecon', get_template_directory( ) . '/languages' );

	/*  HTML5 support  */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	/*  Wide/full aligned Gutenberg blocks  */
	add_theme_support( 'align-wide' );

	/*  Excerpts for pages  */
	add_post_type_support( 'page', 'excerpt' );

	/*  Hide core block patterns  */
	remove_theme_support( 'core-block-patterns' ); 

	/*  Sidebars  */
	register_sidebar( array(
		'name' => __( 'Footer Widgets', 'ropecon' ),
		'id' => 'footer_widgets',
		'before_widget' => '<div class="widget" role="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );

	/*  Menus  */
	register_nav_menus( array(
		'navi_main' => __( 'Main navigation', 'ropecon' )
	) );

	/*  Custom color palette  */
	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'Black', 'ropecon' ),
			'slug' => 'black',
			'color' => '#000000'
		),
		array(
			'name' => __( 'Dark Gray', 'ropecon' ),
			'slug' => 'dark-gray',
			'color' => '#232323'
		),
		array(
			'name' => __( 'Light Gray', 'ropecon' ),
			'slug' => 'light-gray',
			'color' => '#f4f4f4'
		),
		array(
			'name' => __( 'White', 'ropecon' ),
			'slug' => 'white',
			'color' => '#ffffff'
		),
		array(
			'name' => __( 'Ropecon Highlight #1', 'ropecon' ),
			'slug' => 'ropecon-highlight-one',
			'color' => '#5472d2'
		),
	) );

	/*  Options  */
}

/*
 *  Include stylesheets and scripts
 *
 */

add_action( 'init', 'ropecon_google_fonts_init' );

function ropecon_google_fonts_init( ) {
	// Fonts from Google Fonts
	wp_register_style( get_template( ) . '-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Lora:400,500' );
}


add_action( 'wp_enqueue_scripts', 'ropecon_styles_scripts' );

function ropecon_styles_scripts( ) {
	// Eric Meyer: CSS reset | http://meyerweb.com/eric/thoughts/2007/05/01/reset-reloaded/
	wp_enqueue_style( 'css-reset', get_template_directory_uri( ) . '/reset.css' );

	// Main style sheets
	wp_enqueue_style( get_template( ), get_template_directory_uri( ) . '/style.css', array( 'css-reset' ) );
	wp_enqueue_style( get_template( ) . '-layout', get_template_directory_uri( ) . '/style-layout.css', array( get_template( ) ) );
	wp_enqueue_style( get_template( ) . '-common', get_template_directory_uri( ) . '/style-common.css', array( get_template( ) ) );
	wp_enqueue_style( get_template( ) . '-temp', get_template_directory_uri( ) . '/style-temp.css', array( get_template( ) ) );

	// Responsive design
	// wp_enqueue_style( get_template( ) . '-resp-xxx', get_template_directory_uri( ) . '/style-resp-xxx.css', array( get_template( ) ), null, 'only screen and (min-width: xxxpx)' ); 

	// Fonts from Google Fonts
	wp_enqueue_style( get_template( ) . '-google-fonts' );

	// jQuery plugins
	wp_register_script( 'jquery-browser-mobile', get_template_directory_uri( ) . '/lib/jquery.browser.mobile.js', array( 'jquery' ), '2014-08-01' );
	wp_register_script( 'jquery-waitforimages', get_template_directory_uri( ) . '/lib/jquery.waitforimages.min.js', array( 'jquery' ), '2.4.0' );

	// Javascript
	wp_enqueue_script( get_template( ), get_template_directory_uri( ) . '/script.js', array( 'jquery', 'jquery-browser-mobile' ) );

	// Dynamic menu
	wp_enqueue_script( get_template( ) . '-menu', get_template_directory_uri( ) . '/script-menu.js', array( 'jquery', 'jquery-waitforimages', 'wp-i18n' ) );
	wp_set_script_translations( get_template( ) . '-menu', 'ropecon', get_template_directory( ) . '/languages' );
	wp_localize_script( get_template( ) . '-menu', 'theme', array( 'template_directory_uri' => get_template_directory_uri( ) ) );

	wp_enqueue_style( get_template( ) . '-menu', get_template_directory_uri( ) . '/style-menu.css', array( get_template( ) ) );
}

/*
 *  Gutenberg
 *
 */

add_action( 'enqueue_block_editor_assets', 'ropecon_block_editor_assets', 10000 );

function ropecon_block_editor_assets( ) {
//	wp_enqueue_style( get_template( ) . '-common', get_template_directory_uri( ) . '/style-common.css' );
	wp_enqueue_style( get_template( ) . '-gutenberg', get_template_directory_uri( ) . '/style-gutenberg.css' );
	wp_enqueue_style( get_template( ) . '-gutenberg-temp', get_template_directory_uri( ) . '/style-gutenberg-temp.css' );
	wp_enqueue_style( get_template( ) . '-google-fonts' );

	wp_enqueue_script( get_template( ) . '-gutenberg', get_template_directory_uri( ) . '/script-gutenberg.js', array( 'wp-blocks', 'wp-dom', 'wp-i18n' ), time( ), true );
}

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
/*		'two-columns' => array(
			'title' => __( 'Two columns', 'ropecon' ),
			'description' => __( 'Text and image in two columns.', 'ropecon' )
		), */
/*		'text-overlaying-image' => array(
			'title' => __( 'Text overlaying image', 'ropecon' ),
			'description' => __( 'Text on top of image (left or right).', 'ropecon' ),
		), */
		'three-icon-boxes' => array(
			'title' => __( 'Three icon boxes', 'ropecon' ),
			'description' => __( 'Three columns with icons and varying background colors.', 'ropecon' )
		),
	);

	foreach( $patterns as $slug => $labels ) {
		$content_raw = file_get_contents( get_template_directory_uri( ) . '/block-patterns/' . $slug . '.gb.html' ); 
		$content = str_replace( 'IMG_ROOT', get_template_directory_uri( ) . '/images/block-pattern-preview', $content_raw );
//		$content = '<!-- wp:group {"align":"full","className":"ropecon-block-pattern ropecon-' . $slug . '"} --><div class="wp-block-group alignfull ropecon-block-pattern ropecon-' . $slug . '">' . $content . '</div><!-- /wp:group -->';
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

/* */

add_filter( 'render_block', 'abcd', 10, 2 );

function abcd( $content, $block ) {
	if( $block['blockName'] != 'core/paragraph' ) {
		return $content;
	}

	if( !isset( $block['attrs']['className'] ) || !in_array( 'is-style-currency', explode( ' ', $block['attrs']['className'] ) ) ) {
		return $content;
	}

	echo '<script>console.log( `' . $content . '`);</script>';

	$content = substr_replace( $content, '><span class="currency">&euro;</span>', strpos( $content, '>' ), 1 );
	return $content;
}


?>