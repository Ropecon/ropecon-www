jQuery( function( e ) {
	if( jQuery.browser.mobile ) {
		jQuery( '#header #navi_main' ).removeClass( 'open-on-hover' ).addClass( 'open-on-click' );
	}

	jQuery( '.image-information .icon' ).on( 'click', function( e ) {
		jQuery( this ).closest( '.image-information' ).toggleClass( 'information-visible' );
	} );

	jQuery.fn.isAlmostInViewport = function( top_offset ) {
		if( !top_offset ) {
			top_offset = 100;
		}

		var elementTop = jQuery( this ).children( ).first( ).offset( ).top + top_offset;
		var elementBottom = elementTop + jQuery( this ).outerHeight( );

		var viewportTop = jQuery( window ).scrollTop( );
		var viewportBottom = viewportTop + jQuery( window ).height( );

		console.log( jQuery( this ).children( ).first( ).text( ) );

		return elementBottom > viewportTop && elementTop < viewportBottom;
	};

	jQuery( '.wp-block-media-text__content, .wp-block-cover__inner-container' ).each( function( e ) {
		jQuery( this ).addClass( 'fade-in-up is-hidden' );
	} );

	jQuery( window ).resize( checkAnimations ).scroll( checkAnimations );
	checkAnimations( );
} );

function checkAnimations( ) {
	jQuery( '.fade-in-up:not(.is-visible)' ).each( function( e ) {
		if( jQuery( this ).isAlmostInViewport( ) ) {
			jQuery( this ).addClass( 'is-visible' ).removeClass( 'is-hidden' );
		}
	} );
}
