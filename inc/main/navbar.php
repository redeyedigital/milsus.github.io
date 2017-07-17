<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Service\Colors;
use Openmarco\Seriously\Service\Option;
use Openmarco\Seriously\Service\Page;

add_filter(FILTER_OMT_NAVBAR_CLASSES, function (array $classes) {
	$id = Page::getCurrentId();

	// Desktop classes

	$classes[] = 'navbar-primary';
	$classes[] = 'collapse-hidden';

	$bgColor   = Option::get($id, OPTION_NAVBAR_BG_COLOR);
	$scheme    = ($bgColor && Colors::isDark($bgColor)) ? 'dark' : 'light';
	$classes[] = "navbar-$scheme-scheme";

	if (Option::get($id, OPTION_NAVBAR_SECONDARY_ENABLED)) {
		$classes[] = 'navbar-use-secondary';
		$behavior  = 'sticky';
	} else {
		$behavior = 'static';
	}

	$classes[] = "navbar-$behavior";

	if (!is_search() && !is_404() && Option::get($id, OPTION_NAVBAR_OVERLAY)) {
		$classes[] = 'navbar-overlay';
	}

	// Mobile classes

	$bgColor   = Option::get($id, OPTION_NAVBAR_M_BG_COLOR);
	$scheme    = ($bgColor && Colors::isDark($bgColor)) ? 'dark' : 'light';
	$classes[] = "navbar-mobile-$scheme-scheme";

	$behavior  = Option::get($id, OPTION_NAVBAR_M_BEHAVIOR);
	$classes[] = "navbar-mobile-$behavior";

	if (!is_search() && !is_404() && Option::get($id, OPTION_NAVBAR_M_OVERLAY)) {
		$classes[] = 'navbar-mobile-overlay';
	}

	return $classes;
});

add_filter(FILTER_OMT_NAVBAR_ATTRIBUTES, function (array $attributes) {
	$id = Page::getCurrentId();

	if (Option::get($id, OPTION_NAVBAR_SECONDARY_ENABLED)) {

		/**
		 * @param string $mode
		 * @param string $color
		 *
		 * @return string
		 */
		$getData = function ($mode, $color) {
			$scheme = Colors::isDark($color) ? 'dark' : 'light';

			return "{\"classes\":[\"navbar-$mode\", \"navbar-$scheme-scheme\"]}";
		};

		$attributes['data-omt-navbar-primary']   = $getData('primary', Option::get($id, OPTION_NAVBAR_BG_COLOR));
		$attributes['data-omt-navbar-secondary'] = $getData('secondary', Option::get($id, OPTION_NAVBAR_SECONDARY_BG_COLOR));
	}

	return $attributes;
});
