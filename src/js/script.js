jQuery(function() {
	/* is Loading */
	jQuery('body')
		.delay(3000)
		.queue(function() {
			jQuery(this)
				.attr('data-loading', 'true')
				.dequeue();
		});
	jQuery(window).on('load', function() {
		jQuery('body').attr('data-loading', 'true');
	});

	/* is Scroll */
	jQuery(window).on('scroll', function() {
		if (100 < jQuery(this).scrollTop()) {
			jQuery('body').attr('data-scroll', 'true');
		} else {
			jQuery('body').attr('data-scroll', 'false');
		}
	});

	/* Smooth Scroll */
	jQuery('a[href^="#"]').click(function() {
		var header = 0;
		var speed = 300;
		var id = jQuery(this).attr('href');
		var target = jQuery('#' == id ? 'html' : id);
		var position = jQuery(target).offset().top - header;

		if ('fixed' === jQuery('.l-header').css('position')) {
			header = jQuery('.l-header').height();
			position = position - header;
		}
		if (0 > position) {
			position = 0;
		}
		jQuery('html, body').animate(
			{
				scrollTop: position
			},
			speed
		);
	});

	/* floating */
	jQuery(window).on('scroll', function() {
		if (500 < jQuery(this).scrollTop()) {
			jQuery('.p-floating').show();
		} else {
			jQuery('.p-floating').hide();
		}
	});

	/* widget_nav_menu */
	jQuery('.widget_nav_menu .menu > .menu-item-has-children').append('<span>');
	jQuery('.menu-item-has-children span').on('click', function() {
		jQuery(this)
			.parent('.menu-item-has-children')
			.toggleClass('m-open');
	});

	/* widget_nav_menu fixed */
	jQuery('.drawer-list > .menu-item-has-children').append('<span>');
	jQuery('.menu-item-has-children span').on('click', function() {
		jQuery(this)
			.parent('.menu-item-has-children')
			.toggleClass('m-open');
	});

	// Drawer
	jQuery('.js-drawer').on('click', function(e) {
		e.preventDefault();
		let targetClass = jQuery(this).attr('data-target');
		jQuery('.' + targetClass).toggleClass('is-checked');
		return false;
	});

	jQuery('.js-drawer-close a').on('click', function(e) {
		e.preventDefault();
		jQuery(this)
			.parents('.js-drawer-close')
			.parent()
			.toggleClass('is-checked');
		return false;
	});

	// Modal
	jQuery('.js-modal').on('click', function(e) {
		e.preventDefault();
		let target = jQuery(this).attr('data-target');
		jQuery('#' + target).toggleClass('is-checked');
		return false;
	});

	// Tel Link
	let userAgent = navigator.userAgent;
	if (userAgent.indexOf('iPhone') < 0 && userAgent.indexOf('Android') < 0) {
		jQuery('a[href^="tel:"]')
			.css('cursor', 'default')
			.on('click', function(e) {
				e.preventDefault();
			});
	}
});
