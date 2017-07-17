<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Html\CssWriter;

/**
 * @param string $titleColor
 * @param string $titleColorHover
 * @param string $postSeparatorColor
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinPosts($titleColor, $titleColorHover, $postSeparatorColor, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	$css = CssWriter::init();
	
	$css
		->set("$pre .entries-classic .hentry .entry-title a", 'color', $titleColor)
		->set("$pre .entries-classic .hentry .entry-title a:hover", 'color', $titleColorHover)
		->set("$pre .entries-classic .hentry", 'border-bottom-color', $postSeparatorColor);
	
	return $css;
}

/**
 * @param string $termTextColor
 * @param string $termBgColor
 * @param string $termBorderColor
 * @param string $termTextColorHover
 * @param string $termBgColorHover
 * @param string $termBorderColorHover
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinPostsTerms($termTextColor, $termBgColor, $termBorderColor, $termTextColorHover, $termBgColorHover, $termBorderColorHover, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	$css = CssWriter::init();
	
	$css
		->set("$pre .entry-terms a", [
			'color'            => $termTextColor,
			'background-color' => $termBgColor,
			'border-color'     => $termBorderColor,
		])
		->set("$pre .entry-terms a:hover", [
			'color'            => $termTextColorHover,
			'background-color' => $termBgColorHover,
			'border-color'     => $termBorderColorHover,
		]);
	
	return $css;
}

/**
 * Posts top bar colors
 *
 * @param string $bgColor
 * @param string $borderTopColor
 * @param string $borderBottomColor
 * @param string $shadowTopColor
 * @param string $shadowBottomColor
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinPostsTopBar($bgColor, $borderTopColor, $borderBottomColor, $shadowTopColor, $shadowBottomColor, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	$css = CssWriter::init();
	
	$shadows = [];
	if ($shadowTopColor) {
		$shadows[] = "0 -6px 10px -8px $shadowTopColor";
	}
	if ($shadowBottomColor) {
		$shadows[] = "0 6px 10px -8px $shadowBottomColor";
	}
	
	$css->set("$pre .posts-top-bar", [
		'background-color' => $bgColor,
		'border-top'       => $borderTopColor ? "1px solid $borderTopColor" : null,
		'border-bottom'    => $borderBottomColor ? "1px solid $borderBottomColor" : null,
		'box-shadow'       => implode(',', $shadows)
	]);
	
	return $css;
}

/**
 * Posts top bar colors
 *
 * @param string $termColor
 * @param string $termBorderColor
 * @param string $termBgColor
 * @param string $termColorHover
 * @param string $termBorderColorHover
 * @param string $termBgColorHover
 * @param string $termColorCurrent
 * @param string $termBorderColorCurrent
 * @param string $termBgColorCurrent
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinPostsTopBarTerms($termColor, $termBorderColor, $termBgColor, $termColorHover, $termBorderColorHover, $termBgColorHover, $termColorCurrent, $termBorderColorCurrent, $termBgColorCurrent, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	$css = CssWriter::init();
	
	$css
		->set("$pre .posts-top-bar .nav>.nav-item>a", [
			'color'            => $termColor,
			'border-color'     => $termBorderColor,
			'background-color' => $termBgColor
		])
		->set([
			"$pre .posts-top-bar .nav>.nav-item>a:hover",
			"$pre .posts-top-bar .nav>.nav-item>a:focus"
		], [
			'color'            => $termColorHover,
			'border-color'     => $termBorderColorHover,
			'background-color' => $termBgColorHover
		])
		->set("$pre .posts-top-bar .nav>.nav-item.active>a", [
			'color'            => $termColorCurrent,
			'border-color'     => $termBorderColorCurrent,
			'background-color' => $termBgColorCurrent
		]);
	
	return $css;
}

/**
 * Posts top bar colors
 *
 * @param string $searchBgColor
 * @param string $searchBorderColor
 * @param string $searchShadowColor
 * @param string $searchIconColor
 * @param string $searchBgColorFocus
 * @param string $searchBorderColorFocus
 * @param string $searchShadowColorFocus
 * @param string $searchIconColorFocus
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinPostsTopBarSearch($searchBgColor, $searchBorderColor, $searchShadowColor, $searchIconColor, $searchBgColorFocus, $searchBorderColorFocus, $searchShadowColorFocus, $searchIconColorFocus, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	$css = CssWriter::init();
	
	$css
		->set("$pre .posts-top-bar .search-field", [
			'background-color' => $searchBgColor,
			'box-shadow'       => $searchShadowColor ? "0 1px 6px -1px $searchShadowColor inset" : '',
			'border-color'     => $searchBorderColor,
		])
		->set("$pre .posts-top-bar .search-field:focus", [
			'background-color' => $searchBgColorFocus,
			'border-color'     => $searchBorderColorFocus,
			'box-shadow'       => $searchShadowColorFocus ? "0 1px 6px -1px $searchShadowColorFocus inset" : '',
		])
		->set([
			"$pre .posts-top-bar .prefix-icon",
			"$pre .posts-top-bar .search-field::-moz-placeholder",
			"$pre .posts-top-bar .search-field:-ms-input-placeholder",
			"$pre .posts-top-bar .search-field::-webkit-input-placeholder"
		], 'color', $searchIconColor)
		->set([
			"$pre .posts-top-bar .prefix-icon:focus",
			"$pre .posts-top-bar .search-field::-moz-placeholder:focus",
			"$pre .posts-top-bar .search-field:-ms-input-placeholder:focus",
			"$pre .posts-top-bar .search-field::-webkit-input-placeholder:focus"
		], 'color', $searchIconColorFocus);
	
	return $css;
}

/**
 * Posts sidebar
 *
 * @param int $verticalPadding
 * @param int $horizontalPadding
 * @param int $borderWidth
 * @param int $space
 *
 * @return CssWriter
 */
function mixinPostsSideBar($verticalPadding, $horizontalPadding, $borderWidth, $space) {
	$css = CssWriter::init();
	
	$css->set('.posts-sidebar .widget', [
		'border-width'   => $borderWidth ? "{$borderWidth}px" : null,
		'padding-top'    => $verticalPadding ? "{$verticalPadding}px" : null,
		'padding-bottom' => $verticalPadding ? "{$verticalPadding}px" : null,
		'padding-left'   => $horizontalPadding ? "{$horizontalPadding}px" : null,
		'padding-right'  => $horizontalPadding ? "{$horizontalPadding}px" : null,
		'margin-bottom'  => $space ? "{$space}px" : null,
	]);
	
	return $css;
}

/**
 * Posts sidebar colors
 *
 * @param string $borderColor
 * @param string $shadowBlur
 * @param string $shadowColor
 * @param string $textColor
 * @param string $textBgColor
 * @param string $titleColor
 * @param string $linkColor
 * @param string $linkHoverColor
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinPostsSideBarScheme($borderColor, $shadowBlur, $shadowColor, $textColor, $textBgColor, $titleColor, $linkColor, $linkHoverColor, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	$css = CssWriter::init();
	
	if ($shadowColor) {
		$shadowBlur = $shadowBlur ?: 6;
		$shadow     = "0px 2px {$shadowBlur}px -2px $shadowColor";
	} else {
		$shadow = null;
	}
	
	$css
		->set("$pre .posts-sidebar .widget .widget-title", [
			'color' => $titleColor,
		])
		->set("$pre .posts-sidebar .widget", [
			'color'            => $textColor,
			'background-color' => $textBgColor,
			'border-color'     => $borderColor ? $borderColor : null,
			'box-shadow'       => $shadow
		])
		->set("$pre .posts-sidebar .widget>a", [
			'color' => $linkColor,
		])
		->set([
			"$pre .posts-sidebar .widget a:hover",
			"$pre .posts-sidebar .widget a:focus"
		], [
			'color' => $linkHoverColor,
		]);
	
	return $css;
}