<?php

namespace Openmarco\Seriously\std;

add_action(ACTION_WP_AFTER_SETUP_THEME, function () {
	add_image_size('xs-width', 512);
	add_image_size('sm-width', 768);
	add_image_size('md-width', 1024);
	add_image_size('lg-width', 1536);
	add_image_size('xl-width', 1920);
	
	load_theme_textdomain('seriously', get_template_directory() . '/lang');
});

add_filter(FILTER_WP_UPLOAD_MIMES, function ($existing_mimes = []) {
	$existing_mimes['svg'] = 'image/svg+xml';
	
	return $existing_mimes;
});

add_action(ACTION_WP_HEAD, function () {
	// Is mobile
	echo '<meta name="ismobile" content="', wp_is_mobile() ? 'true' : 'false', '"/>';
});
