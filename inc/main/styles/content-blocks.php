<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Html\CssWriter;

/**
 * Header LS/DS colors
 *
 * @param string $bgColor
 * @param string $headingsColor
 * @param string $textColor
 * @param string $linkColor
 * @param string $linkColorHover
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinPageHeader($bgColor, $headingsColor, $textColor, $linkColor, $linkColorHover, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	
	$css = CssWriter::init();
	
	$css
		->set("$pre .page-header", [
			'color'            => $textColor,
			'background-color' => $bgColor
		])
		->set("$pre .page-header a", 'color', $linkColor)
		->set([
			"$pre .page-header a:hover",
			"$pre .page-header a:focus"
		], 'color', $linkColorHover)
		->set([
			"$pre .page-header h1, $pre .page-header h2, $pre .page-header h3, $pre .page-header h4, $pre .page-header h5, $pre .page-header h6",
			"$pre .page-header .h1, $pre .page-header .h2, $pre .page-header .h3, $pre .page-header .h4, $pre .page-header .h5, $pre .page-header .h6"
		], 'color', $headingsColor);
	
	return $css;
}

/**
 * Footer LS/DS colors
 *
 * @param string $bgColor
 * @param string $headingsColor
 * @param string $textColor
 * @param string $linkColor
 * @param string $linkColorHover
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinFooter($bgColor, $headingsColor, $textColor, $linkColor, $linkColorHover, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	
	$css = CssWriter::init();
	
	$css
		->set("$pre .content-info", [
			'color'            => $textColor,
			'background-color' => $bgColor,
		])
		->set("$pre .content-info a", 'color', $linkColor)
		->set([
			"$pre .content-info a:hover",
			"$pre .content-info a:focus"
		], 'color', $linkColorHover)
		->set([
			"$pre .content-info h1, $pre .content-info h2, $pre .content-info h3, $pre .content-info h4, $pre .content-info h5, $pre .content-info h6",
			"$pre .content-info .h1, $pre .content-info .h2, $pre .content-info .h3, $pre .content-info .h4, $pre .content-info .h5, $pre .content-info .h6"
		], 'color', $headingsColor);
	
	return $css;
}
