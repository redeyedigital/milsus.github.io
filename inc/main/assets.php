<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Asset\Script;
use Openmarco\Seriously\Customizer\Customizer;

add_action(ACTION_OMT_PUBLIC_ASSETS, function(array $styles, array $scripts) {
	/** @var Script[] $scripts */
	if(Customizer::get(MOD_SPLASH_ENABLED)) {
		$wpScripts = wp_scripts();
		
		if(array_key_exists(SCRIPT_IMAGESLOADED, $wpScripts->registered)) {
			$dependency = SCRIPT_IMAGESLOADED;
		} else if(array_key_exists(SCRIPT_MASONRY, $wpScripts->registered)) {
			$dependency = SCRIPT_MASONRY;
		} else {
			$dependency = null;
		}
		
		if($dependency) {
			$themeNeeds   = $scripts[SCRIPT_OM_THEME]->getNeeds();
			$themeNeeds[] = $dependency;
			$scripts[SCRIPT_OM_THEME]->setNeeds($themeNeeds);
		}
	}
}, 10, 2);

add_action(ACTION_WP_CUSTOMIZE_CONTROLS_PRINT_STYLES, function () {
	echo '<link rel="stylesheet" id="omt-customize-sections" href="' . get_template_directory_uri() . '/assets/css/admin/customizer-sections.css" type="text/css" media="all">';
});
