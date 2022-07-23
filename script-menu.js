var __ = wp.i18n.__;

jQuery( function( e ) {
	var popup_link = jQuery( '<a href="#" class="popup-toggle" title="' + __( 'Toggle menu', 'ropecon' ) + '"></a>' );
	popup_link.prependTo( 'header#header nav' );

	jQuery( 'header#header .popup-toggle' ).click( function( e ) {
		jQuery( 'header#header' ).toggleClass( 'open' );
	} );

	jQuery( window ).on( 'resize', update_dynamic_menu );
	jQuery( 'header#header' ).waitForImages( update_dynamic_menu );

	jQuery( 'header#header nav' ).removeClass( 'no-js' );

	jQuery( 'header#header nav.open-on-click li.menu-item-has-children' ).on( 'click', function( e ) {
		if( !jQuery( this ).hasClass( 'open' ) ) { // && !jQuery( 'header#header' ).hasClass( 'compact' ) ) {
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
	var area = jQuery( 'header#header > section' );
	var menu = jQuery( '#navi_main ul.menu' );
	var content_width = 0;

	area.addClass( 'dynamic-width' );
	header.removeClass( );
	menu.find( 'li' ).addClass( 'visible' );

	var max_width = header.width( ) - parseInt( area.css( 'padding-left' ) ) * 2;
	var preferred_width = area.width( );

	area.children( ).each( function( ) {
		content_width += jQuery( this ).outerWidth( true );
	} );

	if( content_width <= preferred_width ) {
		header.addClass( 'full' );
	} else if( content_width > preferred_width && content_width <= max_width ) {
		header.addClass( 'full max' );
		area.removeClass( 'dynamic-width' );
	} else {
		header.addClass( 'compact' );

		jQuery.fn.reverse = [].reverse;
		content_width += 60; // account for popup toggle
		menu.children( 'li:not(.lang-item)' ).reverse( ).each( function( ) {
			if( content_width > preferred_width ) {
				content_width -= jQuery( this ).outerWidth( ) + 5;
				jQuery( this ).removeClass( 'visible' );
			} else {
				return;
			}
		} );
		// language links should be the last ones to go...
		if( content_width > preferred_width ) {
			menu.children( 'li.lang-item' ).removeClass( 'visible' );
		}

	}
}
