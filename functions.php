<?php

/*
 *  Initialize theme
 *
 */

add_action( 'after_setup_theme', function ( ) {
	/*  Load text domain  */
	load_theme_textdomain( 'ropecon', get_template_directory( ) . '/languages' );

	/*  HTML5 support  */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	/*  Wide/full aligned Gutenberg blocks  */
	add_theme_support( 'align-wide' );

	/*  Featured images  */
	add_theme_support( 'post-thumbnails' );

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
		'navi_main' => __( 'Main navigation', 'ropecon' ),
		'navi_guide' => __( 'Guide navigation', 'ropecon' )
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
} );

/*
 *  Include stylesheets and scripts
 *
 */

add_action( 'wp_enqueue_scripts', function ( ) {
	$ver = '20230726.0';

	// Eric Meyer: CSS reset | http://meyerweb.com/eric/thoughts/2007/05/01/reset-reloaded/
	wp_enqueue_style( 'css-reset', get_template_directory_uri( ) . '/css/reset.css' );

	// Main style sheets
	wp_enqueue_style( get_template( ), get_template_directory_uri( ) . '/style.css', array( 'css-reset' ), $ver );
	wp_enqueue_style( get_template( ) . '-layout', get_template_directory_uri( ) . '/css/layout.css', array( get_template( ) ), $ver );
	wp_enqueue_style( get_template( ) . '-header', get_template_directory_uri( ) . '/css/header.css', array( get_template( ) ), $ver );
	wp_enqueue_style( get_template( ) . '-common', get_template_directory_uri( ) . '/css/common.css', array( get_template( ) ), $ver );
	wp_enqueue_style( get_template( ) . '-font-icomoon', get_template_directory_uri( ) . '/fonts/icomoon/icomoon.css', array( get_template( ) ), $ver );
	wp_enqueue_style( get_template( ) . '-fonts', get_template_directory_uri( ) . '/fonts/fonts.css', array( get_template( ) ), $ver );

	// Register bundled libraries
	wp_register_script( 'jquery-browser-mobile', get_template_directory_uri( ) . '/lib/jquery.browser.mobile.js', array( 'jquery' ), '2014-08-01' );
	wp_register_script( 'jquery-waitforimages', get_template_directory_uri( ) . '/lib/jquery.waitforimages.min.js', array( 'jquery' ), '2.4.0' );
	wp_register_script( 'css-vars-ponyfill', get_template_directory_uri( ) . '/lib/css-vars-ponyfill.js', array( ), '2.4.7' );

	// Dynamic header menu
	wp_enqueue_script( get_template( ) . '-header', get_template_directory_uri( ) . '/js/header.js', array( 'jquery', 'jquery-waitforimages', 'wp-i18n' ), $ver );
	wp_set_script_translations( get_template( ) . '-header', 'ropecon', get_template_directory( ) . '/languages' );
	wp_localize_script( get_template( ) . '-header', 'theme', array( 'template_directory_uri' => get_template_directory_uri( ) ) );

	// Frontend scripts
	wp_enqueue_script( get_template( ) . '-frontend', get_template_directory_uri( ) . '/js/frontend.js', array( 'jquery', 'jquery-browser-mobile', 'css-vars-ponyfill' ), $ver );
} );

/*
 *  Enqueue block editor assets
 *
 */

add_action( 'enqueue_block_editor_assets', function ( ) {
	wp_enqueue_style( get_template( ) . '-gutenberg', get_template_directory_uri( ) . '/css/gutenberg.css' );
	wp_enqueue_style( get_template( ) . '-fonts', get_template_directory_uri( ) . '/css/fonts.css' );

	wp_enqueue_script( get_template( ) . '-gutenberg', get_template_directory_uri( ) . '/js/gutenberg.js', array( 'wp-blocks', 'wp-dom', 'wp-i18n' ), time( ), true );
	wp_set_script_translations( get_template( ) . '-gutenberg', 'ropecon', get_template_directory( ) . '/languages/' );
}, 10000 );

require_once( 'blocks/blocks.php' );
require_once( 'block-patterns/block-patterns.php' );
require_once( 'includes/admin-dashboard.php' );
require_once( 'includes/admin-settings.php' );
require_once( 'includes/common.php' );
require_once( 'includes/meta.php' );
require_once( 'includes/feat/image-information.php' );
require_once( 'includes/feat/mobile-guide.php' );

?>
