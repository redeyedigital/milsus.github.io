<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Plugins\VisualComposer;
use WPBMap;

add_action(ACTION_VC_BEFORE_INIT, function () {
	vc_add_params('vc_icon', [
		[
			'type'        => 'iconpicker',
			'heading'     => esc_html__('Icon', 'seriously'),
			'param_name'  => 'icon_ionic',
			'value'       => 'ion-alert',
			'settings'    => [
				'emptyIcon'    => false,
				'type'         => 'omt_ionicons',
				'iconsPerPage' => 4000,
			],
			'dependency'  => [
				'element' => 'type',
				'value'   => 'ionic',
			],
			'description' => esc_html__('Select icon from library.', 'seriously'),
			'weight'      => 90,
		],
		[
			'type'        => 'iconpicker',
			'heading'     => esc_html__('Icon', 'seriously'),
			'param_name'  => 'icon_elegantline',
			'value'       => 'et-icon-mobile',
			'settings'    => [
				'emptyIcon'    => false,
				'type'         => 'omt_et_line',
				'iconsPerPage' => 4000,
			],
			'dependency'  => [
				'element' => 'type',
				'value'   => 'elegantline',
			],
			'description' => esc_html__('Select icon from library.', 'seriously'),
			'weight'      => 90,
		]
	]);
});

add_action(ACTION_VC_AFTER_INIT, function () {
	$param = (array)WPBMap::getParam('vc_icon', 'type');
	$types = array_merge($param['value'], [
		esc_html__('Ionicons', 'seriously')                => 'ionic',
		esc_html__('Elegant Themes 100 Line', 'seriously') => 'elegantline',
	]);
	
	VisualComposer::updateParam('vc_icon', 'type', 'value', $types);
	VisualComposer::updateParam('vc_icon', 'type', 'weight', 100);
});

