__ = wp.i18n.__;
// Modify settings for core blocks

wp.hooks.addFilter( 'blocks.registerBlockType',
  'ropecon/gutenberg-defaults', ( settings, name ) => {
		// Cover: No background dimming
		if( name == 'core/cover' ) {
			settings.attributes.dimRatio = { type: 'number', default: 0 };
		}

		return settings;
	}
);

wp.domReady( function( ) {
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
} );
