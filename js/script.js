/* drawer */
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
