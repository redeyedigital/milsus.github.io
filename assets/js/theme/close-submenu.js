(function ($, global) {
	'use strict';

	var $window          = $(global);
	var $document        = $(global.document);
	var mobileBreakpoint = 991;
	var $navbarToggle    = $('.navbar-toggle');
	var isDesktop;

	var defineVariables = function () {
		isDesktop = global.innerWidth > mobileBreakpoint;
	};

	$window.resize(defineVariables);
	defineVariables();

	$(function () {
		$('.navbar .navbar-toggleable-md a[href]:not(.dropdown-toggle)').click(function () {
			if (isDesktop) {
				// emulate hover out
				// disabled now, because its not worked in edge

				// var $submenu = $(this).parents('.sub-menu');
				// if ($submenu.length) {
				// 	$submenu.hide(0).delay(1).show(0);
				// }
			} else {
				$navbarToggle.click();
			}
		});
	});

})(jQuery, window);