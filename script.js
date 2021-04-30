jQuery( function( e ) {
	if( jQuery.browser.mobile ) {
		jQuery( '#header #navi_main' ).removeClass( 'open-on-hover' ).addClass( 'open-on-click' );
	}

	jQuery( '.image-information .icon' ).on( 'click', function( e ) {
		jQuery( this ).closest( '.image-information' ).toggleClass( 'information-visible' );
	} );
} );
