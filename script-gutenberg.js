// Modify settings for core blocks

wp.hooks.addFilter( 'blocks.registerBlockType',
  'ropecon/gutenberg-defaults', ( settings, name ) => {
		if( name == 'core/cover' ) {
			return lodash.assign( {}, settings, {
				attributes: lodash.assign( {}, settings.attributes, { dimRatio: { type: 'number', default: 0 } } ),
			} );
		}

		return settings;
	}
);
