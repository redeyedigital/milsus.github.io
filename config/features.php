<?php

namespace Openmarco\Seriously\std;

add_action(ACTION_WP_AFTER_SETUP_THEME, function () {
	
	global $content_width;
	
	$content_width = 1140;
	
	add_theme_support('creative-content-blocks');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
//	add_theme_support('post-formats', [
//		'aside',
//		'gallery',
//		'link',
//		'image',
//		'quote',
//		'status',
//		'video',
//		'audio',
//		'chat'
//	]);
	add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
	//add_theme_support('woocommerce');
}, 9);