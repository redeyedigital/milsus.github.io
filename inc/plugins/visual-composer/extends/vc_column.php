<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Plugins\VisualComposer;
use Openmarco\Seriously\Service\Colors;

add_action(ACTION_VC_BEFORE_INIT, function () {
	$params = [
		[
			'type'       => 'dropdown',
			'heading'    => esc_html__('Color scheme', 'seriously'),
			'param_name' => 'omt_color_scheme',
			'value'      => [
				esc_html__('Auto', 'seriously')  => '',
				esc_html__('Light', 'seriously') => 'light',
				esc_html__('Dark', 'seriously')  => 'dark',
			],
			'std'        => '',
		],
	];
	
	vc_add_params('vc_column', $params);
	vc_add_params('vc_column_inner', $params);
});

VisualComposer::addCssFilter(['vc_column', 'vc_column_inner'], function (array $classes, $attributes, $css) {
	if ($attributes['omt_color_scheme']) {
		$classes[] = 'bg-' . $attributes['omt_color_scheme'];
	} else if (array_key_exists('background-color', $css)) {
		$classes[] = Colors::isDark($css['background-color']) ? 'bg-dark' : 'bg-light';
	}
	
	return $classes;
});