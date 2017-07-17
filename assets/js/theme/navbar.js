!function ($, global) {
	'use strict';
	var document = global.document;

	var $document = $(document);
	var $body     = $(document.body);
	var $wrapper  = $('.navbar-wrapper');
	var $navbar   = $('nav.navbar');
	var ACTIVE_EVENT = 'navbar-wrapper-active';
	var $wrapperStylesheet = {
		'd': $('<style>').appendTo('head'), // desktop
		'm': $('<style>').appendTo('head')	// mobile
	};

	var isOverlay = {
		'd': $('nav.navbar').hasClass('navbar-overlay'),
		'm': $('nav.navbar').hasClass('navbar-mobile-overlay')
	};

	var whichTransitionEvent = function () {
		var t,
			el = document.createElement("fakeelement");

		var transitions = {
			"transition": "transitionend",
			"OTransition": "oTransitionEnd",
			"MozTransition": "transitionend",
			"WebkitTransition": "webkitTransitionEnd"
		};

		for (t in transitions) {
			if (el.style[t] !== undefined) {
				return transitions[t];
			}
		}
	};

	var transitionEvent  = whichTransitionEvent();

	var DEFAULTS = {
		classes: []
	};

	var primary   = $.extend({}, DEFAULTS, $navbar.data('omtNavbarPrimary'));
	var secondary = $.extend({}, DEFAULTS, $navbar.data('omtNavbarSecondary'));

	var mobileBreakpoint = 991;
	var isDesktop = global.innerWidth > mobileBreakpoint;

	var saveNavbarHeight = function (event) {
		if (!event || event.target == $navbar[0]) {
			if (isDesktop) {
				if ($navbar.hasClass('navbar-primary')) {
					if (!$navbar.data('primaryHeight')) {
						$navbar.data('primaryHeight', $navbar.outerHeight());
						setWrapperHeight($navbar.data('primaryHeight'), 'd');
					}
				} else if ($navbar.hasClass('navbar-secondary')) {
					if (!$navbar.data('secondaryHeight')) {
						$navbar.data('secondaryHeight', $navbar.outerHeight());
					}
				}
			} else {
				if (!$navbar.data('mobileHeight')) {
					$navbar.data('mobileHeight', $navbar.outerHeight());
					setWrapperHeight($navbar.data('mobileHeight'), 'm');
				}
			}
		}
	};

	$navbar.on(transitionEvent, saveNavbarHeight);

	// WRAPPER INIT
	// ============

	var checkWrapper = function (resizeEvent) {
		var mediaRule,
			activeClass,
			stickyClass,
			overlayClass;

		isDesktop = global.innerWidth > mobileBreakpoint;
		var mode = isDesktop ? 'd' : 'm';

		if (isDesktop) {
			activeClass  = 'wrapper-active';
			stickyClass  = 'navbar-sticky';
			overlayClass = 'navbar-overlay';
		} else {
			activeClass  = 'wrapper-active-mobile';
			stickyClass  = 'navbar-mobile-sticky';
			overlayClass = 'navbar-mobile-overlay';
		}

		if (!$wrapper.hasClass(activeClass)) {
			if ($navbar.hasClass(stickyClass) && !isOverlay[mode]) {
				var height = isDesktop ? $navbar.data('primaryHeight') || $navbar.outerHeight()
					: $navbar.data('mobileHeight') || $navbar.outerHeight();

				setWrapperHeight(height, mode);
			}

			$wrapper.addClass(activeClass);
			$document.trigger(ACTIVE_EVENT);
		}
	};

	var setWrapperHeight = function (height, mode) {
		if (isOverlay[mode]) {
			return;
		}

		var css = '',
			mediaRule = '';

		var isDesktop = mode === 'd';

		if (isDesktop) {
			mediaRule = 'min-width: ' + (mobileBreakpoint + 1) + 'px';
		} else {
			mediaRule = 'max-width: ' + mobileBreakpoint + 'px';
		}

		if (mode === 'd') {
			css = '@media(' + mediaRule + ') {.navbar-wrapper {height:' + height + 'px;}}';
		} else if (mode === 'm') {
			css = '@media(' + mediaRule + ') {.navbar-wrapper {height:' + height + 'px;}}';
		}

		if ($wrapperStylesheet[mode]) {
			$wrapperStylesheet[mode].text(css);
		}
	};


	// MODE
	// ====
	if ($navbar.hasClass('navbar-use-secondary')) {
		var setModeFn = function (addData, removeData) {
			var addClasses    = addData.classes.join(' ');
			var removeClasses = $(removeData.classes).not(addData.classes).get().join(' ');

			return function () {
				$navbar.addClass(addClasses).removeClass(removeClasses);
			};
		};

		var setPrimaryMode   = setModeFn(primary, secondary);
		var setSecondaryMode = setModeFn(secondary, primary);

		$document
			.on('top.om.scroll-position', setPrimaryMode)
			.on('no-top.om.scroll-position', setSecondaryMode);

		if ($body.hasClass('no-window-scroll-top')) {
			setSecondaryMode();
		} else {
			setPrimaryMode();
		}
		saveNavbarHeight(); // save navbar ready size on page init
	}

	if ($wrapper.length && $navbar.length) {
		$(global).resize(checkWrapper);
		checkWrapper();
	}


	// Extra classes
	// ====
	var COLLAPSE_HIDDEN = 'collapse-hidden',
		COLLAPSE_HIDE   = 'collapse-hide',
		COLLAPSE_SHOWN  = 'collapse-shown',
		COLLAPSE_SHOW   = 'collapse-show';

	$navbar.on('hidden.bs.collapse', function () {
		$(this).addClass(COLLAPSE_HIDDEN).removeClass([COLLAPSE_HIDE, COLLAPSE_SHOWN, COLLAPSE_SHOW].join(' '));
	});
	$navbar.on('hide.bs.collapse', function () {
		$(this).addClass(COLLAPSE_HIDE).removeClass([COLLAPSE_HIDDEN, COLLAPSE_SHOWN, COLLAPSE_SHOW].join(' '));
	});
	$navbar.on('show.bs.collapse', function () {
		$(this).addClass(COLLAPSE_SHOW).removeClass([COLLAPSE_HIDDEN, COLLAPSE_SHOWN, COLLAPSE_HIDE].join(' '));
	});
	$navbar.on('shown.bs.collapse', function () {
		$(this).addClass(COLLAPSE_SHOWN).removeClass([COLLAPSE_HIDDEN, COLLAPSE_HIDE, COLLAPSE_SHOW].join(' '));
	});

} (jQuery, window);
