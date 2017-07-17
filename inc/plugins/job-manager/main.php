<?php

add_filter('job_manager_term_select_field_wp_dropdown_categories_args', function (array $fields) {
	$customClasses = 'form-control';

	if (array_key_exists('class', $fields)) {
		$fields['class'].= ' ' . $customClasses;
	} else {
		$fields['class'] = $customClasses;
	}

	return $fields;
}, 10, 1);

add_action('after_setup_theme', function() {
	remove_action('single_job_listing_start', 'job_listing_meta_display', 20);
	remove_action('single_job_listing_start', 'job_listing_company_display', 30);
}, 20);
