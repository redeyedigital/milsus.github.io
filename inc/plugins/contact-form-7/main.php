<?php

namespace Openmarco\Seriously\std;

add_filter(FILTER_WPCF7_AJAX_LOADER, function () {
	return get_template_directory_uri() . '/assets/img/three-dots.svg';
});

