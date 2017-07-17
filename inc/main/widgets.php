<?php

// Add class to Categories widget

use Openmarco\Seriously\Service\Hooks;

Hooks::addFilters([
	'widget_categories_dropdown_args',
	'woocommerce_product_categories_widget_dropdown_args'
], function ($args) {
	$args['class'] = 'postform form-control';
	return $args;
}, 10, 1);
