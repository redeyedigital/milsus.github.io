<?php

namespace Openmarco\Seriously\std;

require_once __DIR__ . '/inc/vendor/autoload.php';
require_once __DIR__ . '/inc/namespace/autoload.php';
require_once __DIR__ . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';

add_filter(FILTER_OMT_PHP_VERSION_ERROR, function () {
	$message = 'It looks like your webhost runs PHP ' . phpversion() . '. However, the theme requires PHP 5.4+. Please, go to the webhost\'s admin panel and activate it.';
	
	return '<div class="error"><p>' . $message . '</p></div>';
});

if (version_compare(phpversion(), '5.4.0', '<')) {
	if (is_admin()) {
		add_action(ACTION_WP_ADMIN_NOTICES, function () {
			echo apply_filters(FILTER_OMT_PHP_VERSION_ERROR);
		});
	} else {
		echo apply_filters(FILTER_OMT_PHP_VERSION_ERROR);
	}
} else {
	add_action(ACTION_WP_AFTER_SETUP_THEME, function () {
		
		// Theme hooks
		require_once __DIR__ . '/inc/main/arrows.php';
		require_once __DIR__ . '/inc/main/assets.php';
		require_once __DIR__ . '/inc/main/comments.php';
		require_once __DIR__ . '/inc/main/content.php';
		require_once __DIR__ . '/inc/main/menu.php';
		require_once __DIR__ . '/inc/main/layout.php';
		require_once __DIR__ . '/inc/main/navbar.php';
		require_once __DIR__ . '/inc/main/posts.php';
		require_once __DIR__ . '/inc/main/splash.php';
		require_once __DIR__ . '/inc/main/styles.php';
		require_once __DIR__ . '/inc/main/tgmpa.php';
		require_once __DIR__ . '/inc/main/theme.php';
		require_once __DIR__ . '/inc/main/tiny-mce.php';
		require_once __DIR__ . '/inc/main/widgets.php';
		
		// External plugins extensions
		require_once __DIR__ . '/inc/plugins/plugins.php';
		
		// Configuration
		require_once __DIR__ . '/config/plugins.php';
		require_once __DIR__ . '/config/protocols.php';
		require_once __DIR__ . '/config/features.php';
		require_once __DIR__ . '/config/layouts.php';
		require_once __DIR__ . '/config/assets.php';
		require_once __DIR__ . '/config/controls.php';
		require_once __DIR__ . '/config/customizer.php';
		require_once __DIR__ . '/config/meta.php';
		require_once __DIR__ . '/config/navigation.php';
		require_once __DIR__ . '/config/desktop.php';
	}, 3);
}
