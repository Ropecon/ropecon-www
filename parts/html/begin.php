<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
<head>
	<title><?php ropecon_wp_title( true ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="copyright" content="&copy; Ropecon" />
	<meta name="description" content="<?php ropecon_description( true ); ?>" />

	<?php get_template_part( 'parts/tpl/favicon' ); ?>
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />

	<?php wp_head( ); ?>
</head>

<body <?php body_class( ); ?>>
