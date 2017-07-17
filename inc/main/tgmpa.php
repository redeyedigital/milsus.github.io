<?php

namespace Openmarco\Seriously\std;

/**
 * Register the required plugins for this theme.
 */
add_action(ACTION_TGMPA_REGISTER, function () {
	
	$plugins = apply_filters(FILTER_OMT_ADMIN_TGMPA_PLUGINS, []);
	
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = [
		'menu'         => 'theme-plugins',  // Menu slug.
		'is_automatic' => true,             // Automatically activate plugins after installation or not.
	];
	
	tgmpa($plugins, $config);
});
