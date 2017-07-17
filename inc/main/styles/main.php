<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Html\CssWriter;

/**
 * Combine patterns with link selectors
 *
 * @param array $patterns -- list of patterns
 *
 * @return string
 */
function getContentLinks(array $patterns) {
	static $linkSelectors = [
		'h1 a[href]:not([class])',
		'h2 a[href]:not([class])',
		'h3 a[href]:not([class])',
		'h4 a[href]:not([class])',
		'h5 a[href]:not([class])',
		'h6 a[href]:not([class])',
		'p a[href]:not([class])',
		'dl a[href]:not([class])',
		'li a[href]:not([class])',
		'figure a[href]:not([class])',
		'a.customize-unpreviewable'
	];
	
	$selectors = [];
	
	foreach ($patterns as $pattern) {
		foreach ($linkSelectors as $link) {
			$selectors[] = sprintf($pattern, $link);
		}
	}
	
	return implode(',', $selectors);
}

;

/**
 * Type colors
 *
 * @param string $textColor
 * @param string $linkColor
 * @param string $linkHoverColor
 * @param string $headingsColor
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinType($textColor, $linkColor, $linkHoverColor, $headingsColor, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	
	$css = CssWriter::init();
	
	$css->set($pre, 'color', $textColor)
	    ->set("$pre a", 'color', $linkColor)
	    ->set("$pre a:hover,$pre a:focus", 'color', $linkHoverColor)
	    ->set("$pre h1, $pre h2, $pre h3, $pre h4, $pre h5, $pre h6,$pre .h1, $pre .h2, $pre .h3, $pre .h4, $pre .h5, $pre .h6", 'color', $headingsColor);
	
	return $css;
}

/**
 * Type link underline
 *
 * @param string $parentSelector
 * @param string $linkStaticStyle
 * @param string $linkHoverStyle
 *
 * @return CssWriter
 */
function mixinLinkUnderline($parentSelector, $linkStaticStyle, $linkHoverStyle) {
	
	$css = CssWriter::init();
	
	if ($linkStaticStyle === 'underline' || $linkHoverStyle === 'underline') {
		$css->set(getContentLinks([
			"$parentSelector %s"
		]), [
			'border-bottom-style' => 'solid',
			'border-bottom-width' => '1px',
			'-webkit-transition'  => 'all .15s',
			'transition'          => 'all .15s'
		]);
	}
	
	return $css;
}

/**
 * Type link underline color
 *
 * @param string $parentSelector
 * @param string $linkStaticStyle
 * @param string $linkUnderlineColor
 * @param string $linkHoverStyle
 * @param string $linkUnderlineColorHover
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinLinkUnderlineColor($parentSelector, $linkStaticStyle, $linkUnderlineColor, $linkHoverStyle, $linkUnderlineColorHover, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	
	$css = CssWriter::init();
	
	$css
		->set(getContentLinks([
			"$pre $parentSelector %s"
		]), 'border-color', $linkStaticStyle === 'underline' ? $linkUnderlineColor : 'transparent')
		->set(getContentLinks([
			"$pre $parentSelector %s:hover",
			"$pre $parentSelector %s:focus"
		]), 'border-color', $linkHoverStyle === 'underline' ? $linkUnderlineColorHover : 'transparent');
	
	return $css;
}

/**
 * Buttons colors
 *
 * @param string $textColor
 * @param string $borderColor
 * @param string $bgColor
 * @param string $textColorHover
 * @param string $borderColorHover
 * @param string $bgColorHover
 * @param string $textColorCurrent
 * @param string $borderColorCurrent
 * @param string $bgColorCurrent
 * @param string $type
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinButtons($textColor, $borderColor, $bgColor, $textColorHover, $borderColorHover, $bgColorHover, $textColorCurrent, $borderColorCurrent, $bgColorCurrent, $type = 'primary', $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	
	$css = CssWriter::init();
	
	$css
		->set("$pre .btn-$type", [
			'color'            => $textColor,
			'background-color' => $bgColor,
			'border-color'     => $borderColor
		])
		->set([
			"$pre .btn-$type:focus",
			"$pre .btn-$type:hover"
		], [
			'color'            => $textColorHover,
			'background-color' => $bgColorHover,
			'border-color'     => $borderColorHover
		])
		->set([
			"$pre .btn-$type:active",
			"$pre .btn-$type:active:focus",
			"$pre .btn-$type:active:hover",
			"$pre .btn-$type.active",
			"$pre .btn-$type.active:focus",
			"$pre .btn-$type.active:hover"
		], [
			'color'            => $textColorCurrent,
			'background-color' => $bgColorCurrent,
			'border-color'     => $borderColorCurrent
		])
		->set([
			"$pre .btn-$type:disabled:focus",
			"$pre .btn-$type:disabled:hover",
			"$pre .btn-$type.disabled:focus",
			"$pre .btn-$type.disabled:hover"
		], [
			'background-color' => $bgColor,
			'border-color'     => $borderColor
		]);
	
	return $css;
}

/**
 * Buttons sizes
 *
 * @param string $borderWidth
 * @param string $borderRadius
 *
 * @return CssWriter
 */
function mixinButtonsSizes($borderWidth, $borderRadius) {
	$css = CssWriter::init();
	
	$css->set('.btn', [
		'border-radius' => is_numeric($borderRadius) ? $borderRadius . 'px' : '',
		'border-width'  => is_numeric($borderWidth) ? $borderWidth . 'px' : ''
	]);
	
	if (is_numeric($borderWidth)) {
		$css
			->set('.btn', 'padding', (CSS_BTN_PADDING_Y - $borderWidth + 1) . 'px ' . (CSS_BTN_PADDING_X - $borderWidth + 1) . 'px')
			->set('.btn-sm', 'padding', (CSS_BTN_PADDING_Y_SM - $borderWidth + 1) . 'px ' . (CSS_BTN_PADDING_X_SM - $borderWidth + 1) . 'px')
			->set('.btn-lg', 'padding', (CSS_BTN_PADDING_Y_LG - $borderWidth + 1) . 'px ' . (CSS_BTN_PADDING_X_LG - $borderWidth + 1) . 'px');
	}
	
	return $css;
}

/**
 * Forms colors
 *
 * @param string $borderWidth
 * @param string $borderRadius
 * @param string $bgColor
 * @param string $borderColor
 * @param string $shadowColor
 * @param string $textColor
 * @param string $bgColorFocus
 * @param string $borderColorFocus
 * @param string $shadowColorFocus
 * @param string $textColorFocus
 * @param string $placeholderColor
 * @param string $placeholderColorFocus
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinForms($borderWidth, $borderRadius, $bgColor, $borderColor, $shadowColor, $textColor, $bgColorFocus, $borderColorFocus, $shadowColorFocus, $textColorFocus, $placeholderColor, $placeholderColorFocus, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	
	$css = CssWriter::init();
	
	$css->set("$pre .form-control", [
		'background-color' => $bgColor,
		'box-shadow'       => $shadowColor ? "0 1px 6px -1px $shadowColor inset" : '',
		'color'            => $textColor,
		'border-width'     => $borderWidth ? $borderWidth . 'px' : '',
		'border-color'     => $borderColor,
		'border-radius'    => $borderRadius ? $borderRadius . 'px' : '',
	]);
	
	$css->set("$pre .form-control:focus", [
		'background-color' => $bgColorFocus,
		'border-color'     => $borderColorFocus,
		'box-shadow'       => $shadowColorFocus ? "0 1px 6px -1px $shadowColorFocus inset" : '',
		'color'            => $textColorFocus
	]);
	
	$css->set([
		"$pre .form-control::-moz-placeholder",
		"$pre .form-control:-ms-input-placeholder",
		"$pre .form-control::-webkit-input-placeholder"
	], 'color', $placeholderColor);
	
	$css->set([
		"$pre .form-control::-moz-placeholder:focus",
		"$pre .form-control:-ms-input-placeholder:focus",
		"$pre .form-control::-webkit-input-placeholder:focus"
	], 'color', $placeholderColorFocus);
	
	$css->set("$pre .custom-control-indicator", 'background-color', $borderColor);
	
	return $css;
}

/**
 * @param int $borderWidth
 * @param int $borderRadius
 *
 * @return CssWriter
 */
function mixinFormsSelect2($borderWidth, $borderRadius) {
	
	$css = CssWriter::init();
	
	$css->set([
		'.select2-container--default .select2-selection--single',
		'.select2-container--default .select2-selection--multiple',
		'.select2-container--default.select2-container--focus .select2-selection--multiple'
	], [
		'border-width'  => is_numeric($borderWidth) ? $borderWidth . 'px' : '',
		'border-radius' => is_numeric($borderRadius) ? $borderRadius . 'px' : '',
	]);
	
	$css->set('.select2-container--default .select2-selection--single .select2-selection__arrow', [
		'top'   => is_numeric($borderWidth) ? $borderWidth . 'px' : '',
		'right' => is_numeric($borderWidth) ? $borderWidth . 'px' : '',
	]);
	
	return $css;
}

/**
 * @param string $bgColor
 * @param string $borderColor
 * @param string $shadowColor
 * @param string $textColor
 * @param string $bgColorFocus
 * @param string $borderColorFocus
 * @param string $shadowColorFocus
 * @param string $textColorFocus
 * @param string $placeholderColor
 * @param string $placeholderColorFocus
 * @param string $accentColor
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinFormsSelect2Colors($bgColor, $borderColor, $shadowColor, $textColor, $bgColorFocus, $borderColorFocus, $shadowColorFocus, $textColorFocus, $placeholderColor, $placeholderColorFocus, $accentColor, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	
	$css = CssWriter::init();
	
	$css->set([
		"$pre .select2-container--default .select2-selection--multiple",
		"$pre .select2-container--default .select2-selection--single"
	], [
		'background-color' => $bgColor,
		'box-shadow'       => $shadowColor ? "0 1px 6px -1px $shadowColor inset" : '',
		'border-color'     => $borderColor,
	]);
	
	$css->set([
		"$pre .select2-container--default.select2-container--focus .select2-selection--multiple",
		"$pre .select2-container--default .select2-selection--multiple:focus",
		"$pre .select2-container--default .select2-selection--single:focus"
	], [
		'background-color' => $bgColorFocus,
		'box-shadow'       => $shadowColorFocus ? "0 1px 6px -1px $shadowColorFocus inset" : '',
		'border-color'     => $borderColorFocus,
	]);
	
	$css->set("$pre .select2-dropdown", [
		'background-color' => $bgColor,
		'border-color'     => $borderColor,
	]);
	
	$css->set([
		"$pre .select2-container--default .select2-search--inline .select2-search__field",
		"$pre .select2-container--default .select2-selection--multiple .select2-selection__rendered",
		"$pre .select2-container--default .select2-selection--single .select2-selection__rendered"
	], 'color', $textColor);
	
	$css->set([
		"$pre .select2-container--default .select2-search--inline .select2-search__field:focus",
		"$pre .select2-container--default .select2-selection--multiple:focus .select2-selection__rendered",
		"$pre .select2-container--default .select2-selection--single:focus .select2-selection__rendered"
	], 'color', $textColorFocus);
	
	$css->set("$pre .custom-control-indicator", 'background-color', $borderColor);
	
	$css->set([
		"$pre .custom-control-input:checked~.custom-control-indicator",
		"$pre .select2-container--default .select2-results__option--highlighted[aria-selected]"
	], 'background-color', $accentColor);
	
	return $css;
}

/**
 * Pagination LS/DS colors
 *
 * @param string $textColor
 * @param string $bgColor
 * @param string $borderColor
 * @param string $textColorHover
 * @param string $bgColorHover
 * @param string $borderColorHover
 * @param string $textColorCurrent
 * @param string $bgColorCurrent
 * @param string $borderColorCurrent
 * @param string $prevNextColor
 * @param string $prevNextColorHover
 * @param bool   $dark
 *
 * @return CssWriter
 */
function mixinPagination($textColor, $bgColor, $borderColor, $textColorHover, $bgColorHover, $borderColorHover, $textColorCurrent, $bgColorCurrent, $borderColorCurrent, $prevNextColor, $prevNextColorHover, $dark = false) {
	$pre = $dark ? '.bg-dark' : '.bg-light';
	
	$css = CssWriter::init();
	
	$css
		->set([
			"$pre .pagination .page-item.page-number .page-link"
		], [
			'color'            => $textColor,
			'background-color' => $bgColor,
			'border-color'     => $borderColor
		])
		->set([
			"$pre .pagination .page-item.page-number .page-link:hover",
			"$pre .pagination .page-item.page-number .page-link:focus"
		], [
			'color'            => $textColorHover,
			'background-color' => $bgColorHover,
			'border-color'     => $borderColorHover
		])
		->set([
			"$pre .pagination .page-item.page-number.active .page-link",
			"$pre .pagination .page-item.page-number.active .page-link:hover",
			"$pre .pagination .page-item.page-number.active .page-link:focus"
		], [
			'color'            => $textColorCurrent,
			'background-color' => $bgColorCurrent,
			'border-color'     => $borderColorCurrent
		])
		->set([
			"$pre .pagination .page-item.page-next .page-link",
			"$pre .pagination .page-item.page-prev .page-link"
		], 'color', $prevNextColor)
		->set([
			"$pre .pagination .page-item.page-next .page-link:hover",
			"$pre .pagination .page-item.page-next .page-link:focus",
			"$pre .pagination .page-item.page-prev .page-link:hover",
			"$pre .pagination .page-item.page-prev .page-link:focus"
		], 'color', $prevNextColorHover)
		->set([
			"$pre .pager .pager-prev>a",
			"$pre .pager .pager-next>a"
		], 'color', $prevNextColor)
		->set([
			"$pre .pager .pager-prev>a:hover",
			"$pre .pager .pager-prev>a:focus",
			"$pre .pager .pager-next>a:hover",
			"$pre .pager .pager-next>a:focus"
		], 'color', $prevNextColorHover);
	
	return $css;
}
