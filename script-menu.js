var __ = wp.i18n.__;

jQuery( function( e ) {
	var popup_link = jQuery( '<a href="#" class="popup-toggle" title="' + __( 'Toggle menu', 'ropecon' ) + '"></a>' );
	popup_link.prependTo( 'header#header nav' );

	jQuery( 'header#header .popup-toggle' ).click( function( e ) {
		jQuery( 'header#header' ).toggleClass( 'open' );
	} );

	jQuery( window ).resize( update_dynamic_menu );
	jQuery( 'header#header' ).waitForImages( update_dynamic_menu );

	jQuery( 'header#header nav' ).removeClass( 'no-js' );

	jQuery( 'header#header nav.open-on-click li.menu-item-has-children' ).on( 'click', function( e ) {
		if( !jQuery( this ).hasClass( 'open' ) && !jQuery( 'header#header' ).hasClass( 'compact' ) ) {
			jQuery( 'header#header nav li.menu-item-has-children.open' ).removeClass( 'open expand-left' );
			jQuery( this ).addClass( 'open' );

			// Check if the dropdown menu would go off viewport – if yes, add a class to prevent this
			var submenu = jQuery( this ).children( 'ul.sub-menu' ).first( );
			if( ( submenu.outerWidth( true ) + submenu.offset( ).left ) > jQuery( window ).width( ) ) {
				jQuery( this ).addClass( 'expand-left' );
			}
			e.preventDefault( );
		}
	} );

	jQuery( window ).click( function( e ) {
		if( !jQuery( e.target ).closest( 'li.menu-item-has-children' ).hasClass( 'open' ) ) {
			jQuery( 'li.menu-item-has-children.open' ).removeClass( 'open' );
		}
	} );
} );


function update_dynamic_menu( ) {
	var header = jQuery( 'header#header' );
	var area = jQuery( 'header#header section.dynamic-width' );
	var content_width = 0;

	header.removeClass( );

	area.children( ).each( function( ) {
		content_width += jQuery( this ).outerWidth( true );
	} );

	if( content_width <= area.width( ) ) {
		header.addClass( 'full' );
	} else {
		header.addClass( 'compact' );
	}
}
