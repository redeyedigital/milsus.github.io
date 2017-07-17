<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Desktop\Sidebar;

add_filter(FILTER_WP_THE_CONTENT_MORE_LINK, '__return_null');

add_filter(FILTER_OMT_PREV_POSTS_CLASSES, function (array $classes) {
	if(get_post_type() === 'post') {
		$classes[] = 'col-md-5';
		$classes[] = 'offset-md-1';
		$classes[] = 'col-lg-4';
		
		if(!Sidebar::active(SIDEBAR_POSTS)) {
			$classes[] = 'offset-lg-2';
		}
	}
	
	return $classes;
});

add_filter(FILTER_OMT_NEXT_POSTS_CLASSES, function (array $classes) {
	if(get_post_type() === 'post') {
		$classes[] = 'col-md-5';
		$classes[] = 'col-lg-4';
	}
	
	return $classes;
});

add_filter(FILTER_OMT_NEXT_POSTS_LINK_LABEL, function () {
	$text  = esc_html__('Newer', 'seriously');
	$arrow = apply_filters(FILTER_OMT_ARROW_RIGHT, '');
	
	return "$text $arrow";
});

add_filter(FILTER_OMT_PREV_POSTS_LINK_LABEL, function () {
	$text  = esc_html__('Older', 'seriously');
	$arrow = apply_filters(FILTER_OMT_ARROW_LEFT, '');
	
	return "$arrow $text";
});