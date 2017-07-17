<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Service\Colors;
use Openmarco\Seriously\Service\Page;
use Openmarco\Seriously\Customizer\Customizer;
use Openmarco\Seriously\Html\Helpers;
use Openmarco\Seriously\Service\Option;

add_filter(FILTER_WP_BODY_CLASS, function ($classes) {
	$id = Page::getCurrentId();
	
	$backgroundColor = Option::get($id, OPTION_BODY_BG_COLOR);
	
	// Deprecated
	if ($backgroundColor) {
		$classes[] = Colors::isDark($backgroundColor) ? 'background-dark' : 'background-light';
	}
	
	$classes[] = ($backgroundColor && Colors::isDark($backgroundColor)) ? 'bg-dark' : 'bg-light';
	
	if (Customizer::get(MOD_SPLASH_ENABLED)) {
		$classes[] = 'splash-enabled';
	}
	
	return $classes;
});

add_filter(FILTER_WP_EXCERPT_MORE, function () {
	return '&hellip;';
});

add_filter(FILTER_WP_THE_PASSWORD_FORM, function ($form) {
	$search = [
		'class="post-password-form"',
		'name="post_password"',
		'name="Submit"'
	];
	
	$replace = [
		'class="post-password-form form-inline"',
		'name="post_password" class="form-control"',
		'name="Submit" class="btn btn-primary"'
	];
	
	$search = str_replace($search, $replace, $form);
	
	return $search;
});

add_filter(FILTER_OMT_GLOBAL_PAGINATION_SETTINGS, function () {
	return [
		'classes'            => ['pagination', 'pagination-sm', 'hidden-xs-down'],
		'itemClasses'        => ['page-item', 'page-number'],
		'itemPrevClasses'    => ['page-item', 'page-prev'],
		'itemNextClasses'    => ['page-item', 'page-next'],
		'itemDotsClasses'    => ['page-item', 'page-dots'],
		'itemCurrentClasses' => ['active'],
		'linkClasses'        => ['page-link'],
	];
});

add_filter(FILTER_WP_GET_AVATAR, function ($html, $userId, $size, $default, $alt, $args) {
	return Helpers::getAvatar($userId, [48, 40], $args);
}, 10, 6);