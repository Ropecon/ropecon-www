__ = wp.i18n.__;

// Modify settings for core blocks

wp.hooks.addFilter( 'blocks.registerBlockType',
  'ropecon/gutenberg-defaults', ( settings, name ) => {
		// Cover
		if( name == 'core/cover' ) {
			// No background dimming
			settings.attributes.dimRatio = { type: 'number', default: 0 };
			// Full alignment by default
			// NOTE: This throws a warning for existing blocks with no alignment attribute
			settings.attributes.align = { type: 'string', default: 'full' };
		}

		return settings;
	}
);

// Register custom block styles
wp.domReady( function( ) {
	// Columns
	wp.blocks.registerBlockStyle(
		'core/columns',
		[
			{
				name: 'default',
				label: __( 'Default', 'ropecon' ),
				isDefault: true
			},
			{
				name: 'content-in-boxes',
				label: __( 'Content in boxes', 'ropecon' ),
			}
		]
	);

	// Cover
	wp.blocks.registerBlockStyle(
		'core/cover',
		[
			{
				name: 'default',
				label: __( 'Default', 'ropecon' ),
				isDefault: true
			},
			{
				name: 'full-height',
				label: __( 'Full height', 'ropecon' ),
			}
		]
	);

	// Media & Text
	wp.blocks.registerBlockStyle(
		'core/media-text',
		[
			{
				name: 'default',
				label: __( 'Default', 'ropecon' ),
				isDefault: true
			},
			{
				name: 'text-overlaying-image',
				label: __( 'Text overlaying image', 'ropecon' ),
			}
		]
	);

	// Paragraph
	wp.blocks.registerBlockStyle(
		'core/paragraph',
		[
			{
				name: 'default',
				label: __( 'Default', 'ropecon' ),
				isDefault: true
			},
			{
				name: 'currency',
				label: __( 'Currency', 'ropecon' ),
			}
		]
	);

} );
