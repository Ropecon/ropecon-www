jQuery( function( e ) {
	// Better mobile support for navigation

	if( jQuery.browser.mobile ) {
		jQuery( '#header #navi_main' ).removeClass( 'open-on-hover' ).addClass( 'open-on-click' );
	}

	// Image information

	jQuery( '.image-information .icon' ).on( 'click', function( e ) {
		jQuery( this ).closest( '.image-information' ).toggleClass( 'information-visible' );
	} );

	// Animate text

	jQuery.fn.isAlmostInViewport = function( top_offset ) {
		if( !top_offset ) {
			top_offset = 100;
		}

		var elementTop = jQuery( this ).children( ).first( ).offset( ).top + top_offset;
		var elementBottom = elementTop + jQuery( this ).outerHeight( );

		var viewportTop = jQuery( window ).scrollTop( );
		var viewportBottom = viewportTop + jQuery( window ).height( );

		return elementBottom > viewportTop && elementTop < viewportBottom;
	};

	jQuery( '.wp-block-media-text__content, .wp-block-cover__inner-container' ).each( function( e ) {
		jQuery( this ).addClass( 'fade-in-up is-hidden' );
	} );

	// Resize and scroll events

	jQuery( window ).resize( resize_or_scroll ).scroll( resize_or_scroll );
	resize_or_scroll( );
} );

function resize_or_scroll( ) {
	// Animate text
	jQuery( '.fade-in-up:not(.is-visible)' ).each( function( e ) {
		if( jQuery( this ).isAlmostInViewport( ) ) {
			jQuery( this ).addClass( 'is-visible' ).removeClass( 'is-hidden' );
		}
	} );
}

