/* SmoothScroll */
jQuery('a[href^="#"]').click(function() {
	var header = 0;
	var speed = 300;
	var id = jQuery(this).attr("href");
	var target = jQuery("#" == id ? "html" : id);
	var position = jQuery(target).offset().top - header;

	if ("fixed" === jQuery("#header").css("position")) {
		header = jQuery("#header").height();
		position = position - header;
	}
	if (0 > position) {
		position = 0;
	}
	jQuery("html, body").animate(
		{
			scrollTop: position
		},
		speed
	);
});

/* ToTop */
jQuery(window).on("scroll", function() {
	if (500 < jQuery(this).scrollTop()) {
		jQuery(".totop").show();
	} else {
		jQuery(".totop").hide();
	}
});

/* Polyfill */
Stickyfill.add(document.querySelectorAll("#sidebar-fixed"));

/* widget_nav_menu */
jQuery(".widget_nav_menu .menu > .menu-item-has-children").append("<span>");
jQuery(".menu-item-has-children span").on("click", function() {
	jQuery(this)
		.parent(".menu-item-has-children")
		.toggleClass("m_open");
});

/* widget_nav_menu fixed */
jQuery(".drawer-list > .menu-item-has-children").append("<span>");
jQuery(".menu-item-has-children span").on("click", function() {
	jQuery(this)
		.parent(".menu-item-has-children")
		.toggleClass("m_open");
});

/* Hamburger */
jQuery(".hamburger-icon").on("click", function() {
	jQuery(this).toggleClass("m_checked");
	jQuery(".hamburger-close").toggleClass("m_checked");

	if (jQuery(this).hasClass("m_modal")) {
		jQuery(".modal-content").toggleClass("m_checked");
	} else if (jQuery(this).hasClass("m_drawer")) {
		jQuery(".drawer-content").toggleClass("m_checked");
	}
});
