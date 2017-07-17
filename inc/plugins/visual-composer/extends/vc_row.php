<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Plugins\Context;
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
	
	vc_add_params('vc_row', $params);
	vc_add_params('vc_row_inner', $params);
});

VisualComposer::addCssFilter(['vc_row', 'vc_row_inner'], function (array $classes, $attributes, $css) {
	$scheme = null;
	
	if ($attributes['omt_color_scheme']) {
		$scheme = $attributes['omt_color_scheme'];
	} else if (Context::isCreativeBackgroundLayers()) {
		
		for ($number = OMP_CONTAINER_LAYERS_COUNT; $number >= 1; $number--) {
			if (array_key_exists("omp_layer{$number}_type", $attributes)) {
				switch ($attributes["omp_layer{$number}_type"]) {
					case 'color':
						if (array_key_exists("omp_layer{$number}_color_color", $attributes) && $attributes["omp_layer{$number}_color_color"]) {
							$scheme = Colors::isDark($attributes["omp_layer{$number}_color_color"]) ? 'dark' : 'light';
						}
						break;
					case 'gradient':
						if (array_key_exists("omp_layer{$number}_gradient_color_start", $attributes) && $attributes["omp_layer{$number}_gradient_color_start"]) {
							$scheme = Colors::isDark($attributes["omp_layer{$number}_gradient_color_start"]) ? 'dark' : 'light';
						}
						break;
				}
				if ($scheme) {
					break;
				}
			}
		}
	}
	
	if (!$scheme && array_key_exists('background-color', $css) && $css['background-color']) {
		$scheme = Colors::isDark($css['background-color']) ? 'dark' : 'light';
	}
	
	if ($scheme) {
		$classes[] = 'bg-' . $scheme;
	}
	
	return $classes;
});
