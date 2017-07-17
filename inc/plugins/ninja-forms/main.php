<?php

namespace Openmarco\Seriously\std;

add_filter('ninja_forms_display_fields', function (array $fields) {
	
	$formControls = [
		'textbox',
		'email',
		'lastname',
		'firstname',
		'listselect',
		'number',
		'textarea'
	];
	
	$formControlsExcludes = [
		'product'
	];
	
	$buttonControls = [
		'button'
	];
	
	foreach ($fields as &$field) {
		if (array_key_exists('type', $field)) {
			$type      = $field['type'];
			$templates = $field['element_templates'];
			$classes   = array_key_exists('element_class', $field) ? explode(' ', trim($field['element_class'])) : [];
			
			if (!in_array($type, $formControlsExcludes, true)
			    && count(array_intersect($templates, $formControls))
			) {
				$classes[] = 'form-control';
			}
			
			if (count(array_intersect($templates, $buttonControls))) {
				$classes[] = 'btn';
				$classes[] = 'btn-primary';
			}
			
			$field['element_class'] = implode(' ', array_unique($classes));
		}
	}
	
	return $fields;
}, 10, 1);