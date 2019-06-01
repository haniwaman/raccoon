/* Slider */
var swiper = new Swiper( '.swiper-container', {
	loop: true,
	speed: 1000,
	autoplay: {
		delay: 5000,
		disableOnInteraction: true
	},
	loopAdditionalSlides: 1,
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev'
	},
	pagination: {
		el: '.swiper-pagination',
		type: 'bullets',
		clickable: true
	},
	autoHeight: false
});

/* Drawer */
jQuery( '.drawer-open, .drawer-close' ).on( 'click', function() {
	jQuery( '.drawer-icon' ).toggleClass( 'm_checked' );
	jQuery( '.drawer-close' ).toggleClass( 'm_checked' );
	jQuery( '.drawer-content' ).toggleClass( 'm_checked' );
});

/* SmoothScroll */
jQuery( 'a[href^="#"]' ).click( function() {
	var header = 0;
	var speed = 300;
	var id = jQuery( this ).attr( 'href' );
	var target = jQuery( '#' == id ? 'html' : id );
	var position = jQuery( target ).offset().top - header;

	if ( 'fixed' === jQuery( '#header' ).css( 'position' ) ) {
		header = jQuery( '#header' ).height();
		position = position - header;
	}
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

/* ToTop */
jQuery( window ).on( 'scroll', function() {
	if ( 500 < jQuery( this ).scrollTop() ) {
		jQuery( '.totop' ).show();
	} else {
		jQuery( '.totop' ).hide();
	}
});

/* Polyfill */
Stickyfill.add( document.querySelectorAll( '#sidebar-fixed' ) );

/* Highlight */
hljs.initHighlightingOnLoad();
hljs.configure({
	tabReplace: '  '
});

/* Object Fit */
objectFitImages();

/* Modal */
jQuery( '.modal-open, .modal-close' ).on( 'click', function() {
	jQuery( '.modal-icon' ).toggleClass( 'm_checked' );
	jQuery( '.modal-close' ).toggleClass( 'm_checked' );
	jQuery( '.modal-content' ).toggleClass( 'm_checked' );
});

/* widget_nav_menu */
jQuery( '.widget_nav_menu .menu > .menu-item-has-children' ).append( '<span>' );
jQuery( '.menu-item-has-children span' ).on( 'click', function() {
	jQuery( this )
		.parent( '.menu-item-has-children' )
		.toggleClass( 'm_open' );
});

/* widget_nav_menuと統一する */
jQuery( '.drawer-list > .menu-item-has-children' ).append( '<span>' );
jQuery( '.menu-item-has-children span' ).on( 'click', function() {
	jQuery( this )
		.parent( '.menu-item-has-children' )
		.toggleClass( 'm_open' );
});
