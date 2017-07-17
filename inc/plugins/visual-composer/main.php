<?php

namespace Openmarco\Seriously\std;

add_action(ACTION_VC_BEFORE_INIT, function () {
	vc_set_as_theme();
	vc_set_default_editor_post_types(['page']);
});

add_action(ACTION_VC_AFTER_INIT, function () {
	global $wp_filter;
	
	if (array_key_exists('upgrader_pre_download', $wp_filter) && array_key_exists(10, $wp_filter['upgrader_pre_download'])) {
		$filters = (array)$wp_filter['upgrader_pre_download'][10];
		
		foreach ($filters as $filter) {
			if (isset($filter['function'])
			    && is_array($filter['function'])
			    && $filter['function'][0] instanceof \Vc_Updater
			    && $filter['function'][1] === 'preUpgradeFilter'
			) {
				remove_filter('upgrader_pre_download', [$filter['function'][0], $filter['function'][1]]);
			}
		}
	}
});

// Extends

require_once __DIR__ . '/extends/vc_column.php';
require_once __DIR__ . '/extends/vc_icon.php';
require_once __DIR__ . '/extends/vc_row.php';

// Params

require_once __DIR__ . '/params-extends/iconpicker.php';