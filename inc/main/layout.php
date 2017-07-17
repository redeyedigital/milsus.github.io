<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;
use Openmarco\Seriously\Plugins\Context;
use Openmarco\Seriously\Service\Option;
use Openmarco\Seriously\Service\Page;

add_filter(FILTER_OMT_CONTENT_HEADER_TYPE, function ($type) {
	$headerDisplay = Option::get(Page::getCurrentId(), OPTION_HEADER_DISPLAY);
	
	if ($headerDisplay) {
		$type = (strpos($headerDisplay, 'id') !== false) && Context::isCreativeContentBlocks() ? 'content-block' : $headerDisplay;
	}
	
	return $type;
});

add_filter(FILTER_OMT_CONTENT_FOOTER_TYPE, function ($type) {
	$footerDisplay = Option::get(Page::getCurrentId(), OPTION_FOOTER_DISPLAY);
	
	if ($footerDisplay) {
		$type = (strpos($footerDisplay, 'id') !== false) && Context::isCreativeContentBlocks() ? 'content-block' : $footerDisplay;
	}
	
	return $type;
});

add_action(ACTION_OMT_BEFORE_CONTENT, function () {
	if (Customizer::get(MOD_SPLASH_ENABLED)) {
		get_template_part('shared/splash');
	}
});

add_action(ACTION_OMT_BEFORE_CONTENT, function () {
	if (!Option::get(Page::getCurrentId(), OPTION_NAVBAR_DISABLED)) {
		get_template_part('shared/navbar');
	}
}, 20);

add_action(ACTION_OMT_PAGE_HEADER, function () {
	$type = apply_filters(FILTER_OMT_CONTENT_HEADER_TYPE, 'builtin');
	
	if ($type !== 'none') {
		get_template_part('parts/header', $type);
	}
});

add_action(ACTION_OMT_AFTER_CONTENT, function () {
	$type = apply_filters(FILTER_OMT_CONTENT_FOOTER_TYPE, 'builtin');
	
	if ($type !== 'none') {
		get_template_part('parts/footer', $type);
	}
}, 100);
