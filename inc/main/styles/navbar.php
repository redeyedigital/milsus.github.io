<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Html\CssWriter;

/**
 * @param string $bgColor
 * @param string $borderColor
 * @param int    $borderWidth
 * @param string $shadowColor
 * @param int    $shadowBlur
 * @param int    $verticalPadding
 * @param int    $logoHeight
 * @param string $modeSelector
 * @param bool   $mobile
 *
 * @return CssWriter
 */
function mixinNavbar($bgColor, $borderColor, $borderWidth, $shadowColor, $shadowBlur, $verticalPadding, $logoHeight, $modeSelector = '', $mobile = false) {
	$selector = '.navbar' . $modeSelector;
	
	$css = CssWriter::init();
	
	if ($borderColor && !is_numeric($borderWidth)) {
		$borderWidth = 1;
	}
	
	if ($shadowColor && !is_numeric($shadowBlur)) {
		$shadowBlur = 8;
	}
	
	$css->set($selector, [
		'background-color'    => $bgColor,
		'border-bottom-color' => $borderColor,
		'border-bottom-width' => $borderColor ? $borderWidth . 'px' : null,
		'box-shadow'          => $shadowColor ? "0 -1px {$shadowBlur}px $shadowColor" : null,
		'padding-top'         => $verticalPadding ? $verticalPadding . 'px' : null,
		'padding-bottom'      => $verticalPadding ? $verticalPadding . 'px' : null,
	]);
	
	if ($logoHeight) {
		$css
			->set("$selector .logo-img", 'height', $logoHeight . 'px')
			->set([
				"$selector .navbar-brand",
			], 'line-height', $logoHeight . 'px');
		
		if (!$mobile) {
			$css->set([
				"$selector .navbar-nav > .menu-item"
			], 'line-height', $logoHeight . 'px');
		}
	}
	
	return $css;
}

/**
 * @param int $innerSpace
 * @param int $rightSpace
 *
 * @return CssWriter
 */
function mixinNavbarLogo($innerSpace, $rightSpace) {
	$css = CssWriter::init();
	
	$css
		->set('.navbar .navbar-brand', 'margin-right', is_numeric($rightSpace) ? "{$rightSpace}px" : null)
		->set('.navbar .navbar-brand-text', 'margin-left', is_numeric($innerSpace) ? "{$innerSpace}px" : null);
	
	return $css;
}

/**
 * @param string $logoColor
 * @param string $logoColorHover
 * @param bool   $mobile
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinNavbarLogoColors($logoColor, $logoColorHover, $mobile = false, $dark = false) {
	$scheme = $dark ? 'dark' : 'light';
	if ($mobile) {
		$scheme = 'mobile-' . $scheme;
	}
	
	$selector = ".navbar.navbar-$scheme-scheme";
	
	$css = CssWriter::init();
	
	$css
		->set("$selector .navbar-brand", 'color', $logoColor)
		->set([
			"$selector .navbar-brand:hover",
			"$selector .navbar-brand:focus"
		], 'color', $logoColorHover);
	
	return $css;
}

/**
 * @param int $innerSpace
 * @param int $logoHeight
 * @param int $verticalItemsSpace
 *
 * @return CssWriter
 */
function mixinNavbarToggle($innerSpace, $logoHeight, $verticalItemsSpace) {
	$css = CssWriter::init();
	
	$css
		->set('.navbar .navbar-toggle .icon-bar + .navbar-toggle-title', 'margin-right', is_numeric($innerSpace) ? "{$innerSpace}px" : null)
		->set([
			'.navbar .navbar-nav',
			'.navbar .navbar-nav .sub-menu'
		], 'line-height', is_numeric($verticalItemsSpace) ? "{$verticalItemsSpace}px" : null);
	
	if ($logoHeight) {
		$togglePadding = ($logoHeight - 11) / 2;
		
		$css
			->set('.navbar .navbar-brand', 'line-height', $logoHeight . 'px')
			->set('.navbar .navbar-toggle', [
				'padding-top'    => $togglePadding . 'px',
				'padding-bottom' => $togglePadding . 'px'
			]);
	}
	
	return $css;
}

/**
 * @param string $iconColor
 * @param string $textColor
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinNavbarToggleColors($iconColor, $textColor, $dark = false) {
	$scheme = $dark ? 'dark' : 'light';
	
	$selector = ".navbar.navbar-mobile-$scheme-scheme";
	
	$css = CssWriter::init();
	
	$css
		->set([
			"$selector .navbar-toggle",
			"$selector .navbar-toggle .navbar-toggle-title"
		], 'color', $textColor)
		->set("$selector .navbar-toggle .icon-bar", 'background-color', $iconColor);
	
	return $css;
}

/**
 * @param int $innerSpace
 * @param int $submenuTopSpace
 * @param int $submenuBorderRadius
 *
 * @return CssWriter
 */
function mixinNavbarMenu($innerSpace, $submenuTopSpace, $submenuBorderRadius) {
	$css = CssWriter::init();
	
	$css
		->set('.navbar-nav .menu-item + .menu-item', 'margin-left', is_numeric($innerSpace) ? "{$innerSpace}px" : null)
		->set('.navbar-nav .sub-menu', [
			'top'           => is_numeric($submenuTopSpace) ? "calc(50% + 10px + {$submenuTopSpace}px)" : null,
			'border-radius' => is_numeric($submenuBorderRadius) ? "{$submenuBorderRadius}px" : null
		])
		->set('.navbar-nav .sub-menu:after', 'height', is_numeric($submenuTopSpace) ? $submenuTopSpace . 'px' : null);
	
	return $css;
}

/**
 * @param string $itemColor
 * @param string $itemColorHover
 * @param string $itemColorCurrent
 * @param bool   $mobile
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinNavbarMenuColors($itemColor, $itemColorHover, $itemColorCurrent, $mobile = false, $dark = false) {
	$scheme = $dark ? 'dark' : 'light';
	if ($mobile) {
		$scheme = 'mobile-' . $scheme;
	}
	
	$selector = ".navbar.navbar-$scheme-scheme";
	
	$css = CssWriter::init();
	
	$css
		->set("$selector .navbar-nav>.menu-item>a", 'color', $itemColor)
		->set([
			"$selector .navbar-nav>.menu-item>a:hover",
			"$selector .navbar-nav>.menu-item>a:focus"
		], 'color', $itemColorHover)
		->set([
			"$selector .navbar-nav>.menu-item>a:hover",
			"$selector .navbar-nav>.menu-item>a:focus"
		], 'color', $itemColorHover)
		->set([
			"$selector .navbar-nav>.menu-item.current-menu-item>a",
			"$selector .navbar-nav>.menu-item.current-menu-ancestor>a",
			"$selector .navbar-nav>.menu-item.current-menu-item>a:focus",
			"$selector .navbar-nav>.menu-item.current-menu-ancestor>a:focus",
			"$selector .navbar-nav>.menu-item.current-menu-item>a:hover",
			"$selector .navbar-nav>.menu-item.current-menu-ancestor>a:hover"
		], 'color', $itemColorCurrent);
	
	return $css;
}

/**
 * @param string $bgColor
 * @param string $borderColor
 * @param string $shadowColor
 * @param int    $shadowBlur
 * @param bool   $mobile
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinNavbarSubMenuColors($bgColor, $borderColor, $shadowColor, $shadowBlur, $mobile = false, $dark = false) {
	$scheme = $dark ? 'dark' : 'light';
	if ($mobile) {
		$scheme = 'mobile-' . $scheme;
	}
	
	$selector = ".navbar.navbar-$scheme-scheme";
	
	if ($shadowColor && !is_numeric($shadowBlur)) {
		$shadowBlur = 4;
	}
	
	$css = CssWriter::init();
	
	$css
		->set("$selector .sub-menu", [
			'background-color' => $bgColor,
			'border'           => $borderColor ? "1px solid $borderColor" : null,
			'box-shadow'       => $shadowColor ? "0 0 {$shadowBlur}px 0 $shadowColor" : null
		])
		->set("$selector .sub-menu:before", 'box-shadow', $shadowColor ? "1.5px -1.5px {$shadowBlur}px -1px $shadowColor" : null);
	
	return $css;
}

/**
 * @param string $itemColor
 * @param string $itemColorHover
 * @param string $itemColorCurrent
 * @param bool   $mobile
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinNavbarSubMenuItemColors($itemColor, $itemColorHover, $itemColorCurrent, $mobile = false, $dark = false) {
	$scheme = $dark ? 'dark' : 'light';
	if ($mobile) {
		$scheme = 'mobile-' . $scheme;
	}
	
	$selector = ".navbar.navbar-$scheme-scheme";
	
	$css = CssWriter::init();
	
	$css
		->set("$selector .sub-menu>.menu-item>a", 'color', $itemColor)
		->set([
			"$selector .sub-menu>.menu-item>a:hover",
			"$selector .sub-menu>.menu-item>a:focus"
		], 'color', $itemColorHover)
		->set([
			"$selector .sub-menu>.menu-item.current-menu-item>a",
			"$selector .sub-menu>.menu-item.current-menu-item>a:hover",
			"$selector .sub-menu>.menu-item.current-menu-item>a:focus"
		], 'color', $itemColorCurrent);
	
	return $css;
}

/**
 * @param string $textColor
 * @param string $bgColor
 * @param string $borderColor
 * @param string $textColorHover
 * @param string $bgColorHover
 * @param string $borderColorHover
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinNavbarMenuButtons($textColor, $bgColor, $borderColor, $textColorHover, $bgColorHover, $borderColorHover, $dark = false) {
	$scheme = $dark ? 'dark' : 'light';
	
	$selector = ".navbar.navbar-$scheme-scheme";
	
	$css = CssWriter::init();
	
	$css
		->set([
			"$selector .navbar-nav>.menu-item>.navbar-btn",
			"$selector .navbar-nav>.menu-item.current-menu-item>.navbar-btn",
			"$selector .navbar-nav>.menu-item.current-menu-ancestor>.navbar-btn"
		], [
			'color'            => $textColor,
			'background-color' => $bgColor,
			'border-color'     => $borderColor
		])
		->set([
			"$selector .navbar-nav>.menu-item>.navbar-btn:hover",
			"$selector .navbar-nav>.menu-item>.navbar-btn:focus",
			"$selector .navbar-nav>.menu-item.current-menu-item>.navbar-btn:hover",
			"$selector .navbar-nav>.menu-item.current-menu-ancestor>.navbar-btn:focus",
			"$selector .navbar-nav>.menu-item.current-menu-item>.navbar-btn:hover",
			"$selector .navbar-nav>.menu-item.current-menu-ancestor>.navbar-btn:focus",
		], [
			'color'            => $textColorHover,
			'background-color' => $bgColorHover,
			'border-color'     => $borderColorHover
		]);
	
	return $css;
}

function mixinNavbarMenuButtonsSizes($borderWidth, $borderRadius) {
	// todo: move this out to constants
	$btn_padding_x = 16;
	$btn_padding_y = 8;
	
	$css = CssWriter::init();
	
	$css->set('.navbar-nav .menu-item a.navbar-btn', [
		'border-radius' => is_numeric($borderRadius) ? $borderRadius . 'px' : '',
		'border-width'  => is_numeric($borderWidth) ? $borderWidth . 'px' : ''
	]);
	
	if (is_numeric($borderWidth)) {
		$css->set('.navbar-nav .menu-item a.navbar-btn', [
			'padding' => ($btn_padding_y - $borderWidth + 1) . 'px ' . ($btn_padding_x - $borderWidth + 1) . 'px'
		]);
	}
	
	return $css;
}