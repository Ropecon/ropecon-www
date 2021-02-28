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
	wp_enqueue_style( get_template( ) . '-common', get_template_directory_uri( ) . '/style-common.css', array( get_template( ) ) );
	wp_enqueue_style( get_template( ) . '-temp', get_template_directory_uri( ) . '/style-temp.css', array( get_template( ) ) );

	// Responsive design
	// wp_enqueue_style( get_template( ) . '-resp-xxx', get_template_directory_uri( ) . '/style-resp-xxx.css', array( get_template( ) ), null, 'only screen and (min-width: xxxpx)' ); 

	// Fonts from Google Fonts
	wp_enqueue_style( get_template( ) . '-google-fonts' );

	// Javascript
	wp_enqueue_script( get_template( ), get_template_directory_uri( ) . '/script.js', array( 'jquery' ) );

	// jQuery plugins
	wp_register_script( 'jquery-browser-mobile', get_template_directory_uri( ) . '/lib/jquery-browser-mobile.js', array( 'jquery' ), '2014-08-01' );
	wp_register_script( 'jquery-waitforimages', get_template_directory_uri( ) . '/lib/jquery.waitforimages.min.js', array( 'jquery' ), '2.4.0' );

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
	wp_enqueue_style( get_template( ) . '-common', get_template_directory_uri( ) . '/style-common.css' );
	wp_enqueue_style( get_template( ) . '-gutenberg', get_template_directory_uri( ) . '/style-gutenberg.css' );
	wp_enqueue_style( get_template( ) . '-google-fonts' );
}

add_action( 'init', 'ropecon_init_block_patterns' );

function ropecon_init_block_patterns( ) {
	register_block_pattern_category(
		'ropecon',
		array( 'label' => 'Ropecon' )
	);

	$imgroot = get_template_directory_uri( ) . '/images/block-pattern-preview';

	register_block_pattern(
		'ropecon/title-cover',
		array(
			'title' => __( 'Title cover', 'ropecon' ),
			'content' => '<!-- wp:cover {"dimRatio":0,"align":"full","className":"ropecon-block-pattern ropecon-title-cover","id":0,"url":"' . $imgroot . '/title-cover.svg"} --><div class="wp-block-cover alignfull ropecon-block-pattern ropecon-title-cover" style="background-image:url(' . $imgroot . '/title-cover.svg)"><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"placeholder":"Otsikko"} --><h1 class="has-text-align-center"></h1><!-- /wp:heading --></div></div><!-- /wp:cover -->',
			'description' => __( 'Centered title on top of image.', 'ropecon' ),
			'categories' => array( 'ropecon' ),
			'viewportWidth' => 1200
		)
	);
	register_block_pattern(
		'ropecon/two-columns',
		array(
			'title' => __( 'Two columns', 'ropecon' ),
			'content' => '<!-- wp:columns {"align":"full","className":"ropecon-block-pattern ropecon-two-columns"} --><div class="wp-block-columns alignfull ropecon-block-pattern ropecon-two-columns"><!-- wp:column {"className":"is-text-column"} --><div class="wp-block-column is-text-column"><!-- wp:group {"align":"wide","backgroundColor":"white"} --><div class="wp-block-group alignwide has-white-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:heading --><h2>Otsikko</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Leipäteksti...</p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column {"className":"is-cover-column"} --><div class="wp-block-column is-cover-column"><!-- wp:cover {"dimRatio":0,"id":0,"url":"' . $imgroot . '/two-columns.svg"} --><div class="wp-block-cover" style="background-image:url(' . $imgroot . '/two-columns.svg)"><div class="wp-block-cover__inner-container"></div></div><!-- /wp:cover --></div><!-- /wp:column --></div><!-- /wp:columns -->',
			'description' => __( 'Text and image in two columns.', 'ropecon' ),
			'categories' => array( 'ropecon' ),
			'viewportWidth' => 1200
		)
	);
	register_block_pattern(
		'ropecon/three-boxes',
		array(
			'title' => __( 'Three boxes', 'ropecon' ),
			'content' => '<!-- wp:columns {"align":"full","className":"ropecon-block-pattern ropecon-three-boxes"} --><div class="wp-block-columns alignfull ropecon-block-pattern ropecon-three-boxes"><!-- wp:column --><div class="wp-block-column"><!-- wp:group {"backgroundColor":"white"} --><div class="wp-block-group has-white-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Leipäteksti..."} --><p class="has-text-align-center"></p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:group {"backgroundColor":"light-gray"} --><div class="wp-block-group has-light-gray-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Leipäteksti..."} --><p class="has-text-align-center"></p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:group {"backgroundColor":"black","textColor":"white"} --><div class="wp-block-group has-white-color has-black-background-color has-text-color has-background"><div class="wp-block-group__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Leipäteksti..."} --><p class="has-text-align-center"></p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --></div><!-- /wp:columns -->',
			'description' => __( 'Three columns with different background colors.', 'ropecon' ),
			'categories' => array( 'ropecon' ),
			'viewportWidth' => 450
		)
	);
	register_block_pattern(
		'ropecon/text-overlaying-image',
		array(
			'title' => __( 'Text overlaying image', 'ropecon' ),
			'content' => '<!-- wp:cover {"dimRatio":0,"align":"full","className":"ropecon-block-pattern ropecon-text-overlaying-image","id":0,"url":"' . $imgroot . '/text-overlaying-image.svg"} --><div class="wp-block-cover alignfull ropecon-block-pattern ropecon-text-overlaying-image" style="background-image:url(' . $imgroot . '/text-overlaying-image.svg)"><div class="wp-block-cover__inner-container"><!-- wp:columns --><div class="wp-block-columns"><!-- wp:column --><div class="wp-block-column"><!-- wp:group {"textColor":"white"} --><div class="wp-block-group has-white-color has-text-color"><div class="wp-block-group__inner-container"><!-- wp:paragraph {"placeholder":"Leipäteksti.."} --><p></p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:group {"textColor":"white"} --><div class="wp-block-group has-white-color has-text-color"><div class="wp-block-group__inner-container"><!-- wp:paragraph {"placeholder":"Leipäteksti..."} --><p></p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:cover -->',
			'description' => __( 'Text on top of image (left or right).', 'ropecon' ),
			'categories' => array( 'ropecon' ),
			'viewportWidth' => 1200
		)
	);
}

?>
