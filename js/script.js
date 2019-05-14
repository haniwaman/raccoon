/* Drawer */
jQuery( '.drawer-open, .drawer-close' ).on( 'click', function() {
	jQuery( '.drawer-open' ).toggleClass( 'm_checked' );
	jQuery( '.drawer-close' ).toggleClass( 'm_checked' );
	jQuery( '.drawer-content' ).toggleClass( 'm_checked' );
});

jQuery( '.drawer-list > .menu-item-has-children' ).append( '<span>' );
jQuery( '.menu-item-has-children span' ).on( 'click', function() {
	jQuery( this )
		.parent( '.menu-item-has-children' )
		.toggleClass( 'm_open' );
});

/* SmoothScroll */
jQuery( 'a[href^="#"]' ).click( function() {
	var header = 0;
	if ( 'fixed' === jQuery( '#header' ).css( 'position' ) ) {
		header = jQuery( '#header' ).height();
	}
	var speed = 300;
	var id = jQuery( this ).attr( 'href' );
	var target = jQuery( '#' == id ? 'html' : id );
	var position = jQuery( target ).offset().top - header;
	if ( 0 > position ) {
		position = 0;
	}
	jQuery( 'html, body' ).animate(
		{
			scrollTop: position
		},
		speed
	);
});

/* To Top */
jQuery( window ).on( 'scroll', function( $ ) {
	if ( 100 < jQuery( this ).scrollTop() ) {
		jQuery( '.totop' ).show();
	} else {
		jQuery( '.totop' ).hide();
	}
});
