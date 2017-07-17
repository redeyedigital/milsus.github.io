<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Html\HtmlWriter;

add_filter(FILTER_WP_NAV_MENU_ITEMS, function ($items, $args) {
	if ($args->theme_location === MENU_NAVIGATION_LEFT || $args->theme_location === MENU_NAVIGATION_RIGHT) {
		$search = '<ul class="sub-menu';
		$insert = '<a href="#toggle" class="dropdown-toggle hidden-lg-up" data-toggle="dropdown" role="button" aria-expanded="true"><span class="caret"></span></a>';

		$items = str_replace($search, $insert . $search, $items);
	}

	return $items;
}, 100, 2);

add_filter(FILTER_WP_EDIT_NAV_MENU_WALKER, function () {
	return '\Openmarco\Seriously\Navigation\MenuEditWalker';
});

add_filter(FILTER_OMT_NAV_MENU_ITEM_STYLES, function () {
	return [
		'none'         => esc_html__('None', 'seriously'),
		'button'       => esc_html__('Button', 'seriously'),
	];
});

add_filter(FILTER_OMT_WALKER_NAV_MENU_EDIT_FIELDS, function ($htmlContent, $item, $depth) {

	$html = HtmlWriter::init();

	if ($depth === 0) {
		
		
		$fieldId = 'edit-menu-item-om-style-' . $item->ID;

		$value = get_post_meta($item->db_id, '_menu_item_om_style', true);

		$html->p(['class' => ['field-om-style', 'description', 'description-thin']])
		     ->label(['for' => $fieldId])
		     ->text(esc_html__('Item style', 'seriously'))
		     ->br('', true)
		     ->select([
			     'type'  => 'text',
			     'id'    => $fieldId,
			     'class' => ['widefat', 'code', 'edit-menu-item-om-style'],
			     'name'  => "menu-item-om-style[$item->ID]",
			     'value' => $value
		     ]);

		$options = apply_filters(FILTER_OMT_NAV_MENU_ITEM_STYLES, []);

		foreach ((array)$options as $optionValue => $label) {
			$html->option('value="' . $optionValue . '"' . selected($value, $optionValue, false), $label, true);
		}

		$html->end(3);
	}

	return $htmlContent . (string)$html;
}, 10, 5);

add_action(ACTION_WP_UPDATE_NAV_MENU_ITEM, function ($menuId, $dataBaseId) {
	if (array_key_exists('menu-item-om-style', $_REQUEST)) {
		$styleList = (array)$_REQUEST['menu-item-om-style'];

		$styles = array_keys(apply_filters(FILTER_OMT_NAV_MENU_ITEM_STYLES, []));

		if (array_key_exists($dataBaseId, $styleList) && in_array($styleList[$dataBaseId], $styles, true)) {
			update_post_meta($dataBaseId, '_menu_item_om_style', sanitize_key($styleList[$dataBaseId]));
		}
	}
}, 10, 2);

add_filter(FILTER_WP_NAV_MENU_LINK_ATTRIBUTES, function (array $attributes, $item, $args, $depth) {
	if ($depth === 0) {
		$style = get_post_meta($item->ID, '_menu_item_om_style', true);

		if ($style && $style !== 'none') {
			if ($style === 'button') {
				$class = 'navbar-btn';
			} else {
				$class = '';
			}

			$attributes['class'] = (array_key_exists('class', $attributes) ? $attributes['class'] . ' ' : '') . $class;
		}
	}

	return $attributes;
}, 10, 4);

add_filter(FILTER_WP_NAV_MENU_ITEM_TITLE, function ($title, $item, $args, $depth) {
	if ($depth === 0) {
		$style = get_post_meta($item->ID, '_menu_item_om_style', true);

		if ($style === 'link') {
			$title .= apply_filters(FILTER_OMT_NAV_MENU_ITEM_TITLE_LINK_ICON, ' <span class="icon d-inline ion-arrow-right-c"></span>');
		}
	}

	return $title;
}, 10, 4);
