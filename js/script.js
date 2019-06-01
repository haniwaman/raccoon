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

jQuery( '.drawer-list > .menu-item-has-children' ).append( '<span>' );
jQuery( '.menu-item-has-children span' ).on( 'click', function() {
	jQuery( this )
		.parent( '.menu-item-has-children' )
		.toggleClass( 'm_open' );
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
	if ( 100 < jQuery( this ).scrollTop() ) {
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


/* ハンバーガーメニュー */
jQuery( function($) {
	// jQuery(window).resize(function() {
	// 	if ( jQuery(window).width() < hWidth ) {
	// 		jQuery("#modal-menu").removeClass("active");
	// 	} else {
	// 		jQuery("#modal-menu").addClass("active");
	// 	}
	// });

	// if ( jQuery(window).width() >= hWidth ) {
	// 	jQuery("#modal-menu").show();
	// 	jQuery("#modal-menu").addClass("active");
	// }
	jQuery(window).on("scroll", function() {
		if ( jQuery(window).width() < hWidth ) {
			if (jQuery(this).scrollTop() > 100) {
					jQuery("#modal-menu").show();
			} else {
					jQuery("#modal-menu").hide();
					jQuery("#modal-menu").removeClass("active");
			}
		}
	});

	// jQuery(".totop").click(function () {
	// 	if ( jQuery(window).width() < hWidth ) {
	// 		jQuery("#modal-menu").hide();
	// 		jQuery("#modal-menu").removeClass("active");
	// 	}
	// 	jQuery("body,html").animate({
	// 			scrollTop: 0
	// 	}, 500);
	// });

	$(".modal-icon").on("click", function() {
			$(this).parent().toggleClass("active");
	});
	$('#modal-toc a').on('click', function() {
			if ( $(window).width() < 768 ) {
					$('#modal-menu').toggleClass('active');
			}
	});
