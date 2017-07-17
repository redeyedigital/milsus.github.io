<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Meta\Box as MetaBox;
use Openmarco\Seriously\Meta\Field as MetaField;
use Openmarco\Seriously\Meta\Meta;

$postTypes = function ($metaId) {
	$postTypes = get_post_types(['public' => true, 'show_ui' => true]);
	$postTypes = array_diff($postTypes, ['attachment', 'omp_content_block']);
	
	return $postTypes;
};

$headers = [
	''          => esc_html__('Default', 'seriously'),
	'builtin'   => esc_html__('Built-in header', 'seriously'),
	'invisible' => esc_html__('Invisible header', 'seriously'),
	'none'      => esc_html__('No header', 'seriously'),
];
$headers = apply_filters(FILTER_OMP_CONTENT_BLOCKS_POSTS, $headers);
$footers = [
	''        => esc_html__('Default', 'seriously'),
	'builtin' => esc_html__('Built-in widgetized footer', 'seriously'),
	'none'    => esc_html__('No footer', 'seriously'),
];
$footers = apply_filters(FILTER_OMP_CONTENT_BLOCKS_POSTS, $footers);

$meta = new Meta();

$meta[METABOX_PAGE_SETTINGS] = new MetaBox(esc_html__('Page Settings', 'seriously'), null, $postTypes, [
	OPTION_BODY_BG_COLOR => new MetaField(esc_html__('Page background color', 'seriously'), null, null, CONTROL_COLOR),
]);

$meta[METABOX_CONTENT_BLOCKS_SETTINGS] = new MetaBox(esc_html__('Header/Footer Settings', 'seriously'), null, $postTypes, [
	OPTION_HEADER_DISPLAY  => new MetaField(esc_html__('Choose header', 'seriously'), null, null, CONTROL_SELECT, [
		'choices' => $headers
	]),
	OPTION_HEADER_BG_COLOR => new MetaField(esc_html__('Header background color', 'seriously'), null, null, CONTROL_COLOR),
	OPTION_FOOTER_DISPLAY  => new MetaField(esc_html__('Choose footer', 'seriously'), null, null, CONTROL_SELECT, [
		'choices' => $footers
	]),
	OPTION_FOOTER_BG_COLOR => new MetaField(esc_html__('Footer background color', 'seriously'), null, null, CONTROL_COLOR),
]);

$meta[METABOX_NAVBAR_GENERAL]        = new MetaBox(esc_html__('General Menu Settings', 'seriously'), null, $postTypes, [
	OPTION_NAVBAR_BG_COLOR     => new MetaField(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_NAVBAR_BORDER_COLOR => new MetaField(esc_html__('Border color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_NAVBAR_BORDER_WIDTH => new MetaField(esc_html__('Border width, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 0,
		'max' => 100
	]),
	OPTION_NAVBAR_SHADOW_COLOR => new MetaField(esc_html__('Shadow color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_NAVBAR_SHADOW_BLUR  => new MetaField(esc_html__('Shadow blur, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 0,
		'max' => 100
	]),
	
	OPTION_NAVBAR_LOGO_HEIGHT => new MetaField(esc_html__('Logo image height, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 10,
		'max' => 300,
	]),
	OPTION_NAVBAR_V_PADDING   => new MetaField(esc_html__('Bar top/bottom padding, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 0,
		'max' => 100,
	]),
	OPTION_NAVBAR_LAYOUT      => new MetaField(esc_html__('Layout', 'seriously'), null, null, CONTROL_SELECT, [
		'choices' => [
			''      => esc_html__('Default', 'seriously'),
			'fixed' => esc_html__('Fixed', 'seriously'),
			'fluid' => esc_html__('Fluid', 'seriously'),
		]
	]),
	OPTION_NAVBAR_OVERLAY     => new MetaField(esc_html__('Bar overlay', 'seriously'), null, null, CONTROL_TRISTATE),
	
	OPTION_NAVBAR_DISABLED => new MetaField(esc_html__('Hide navigation bar', 'seriously'), null, null, CONTROL_TRISTATE),
]);
$meta[METABOX_NAVBAR_SECONDARY]      = new MetaBox(esc_html__('Sticky Menu Settings', 'seriously'), null, $postTypes, [
	OPTION_NAVBAR_SECONDARY_ENABLED => new MetaField(esc_html__('Use sticky menu', 'seriously'), null, null, CONTROL_TRISTATE),
	
	OPTION_NAVBAR_SECONDARY_BG_COLOR     => new MetaField(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_NAVBAR_SECONDARY_BORDER_COLOR => new MetaField(esc_html__('Border color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_NAVBAR_SECONDARY_BORDER_WIDTH => new MetaField(esc_html__('Border width, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 0,
		'max' => 100
	]),
	OPTION_NAVBAR_SECONDARY_SHADOW_COLOR => new MetaField(esc_html__('Shadow color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_NAVBAR_SECONDARY_SHADOW_BLUR  => new MetaField(esc_html__('Shadow blur, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 0,
		'max' => 100
	]),
	
	OPTION_NAVBAR_SECONDARY_LOGO_HEIGHT => new MetaField(esc_html__('Logo image height, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 10,
		'max' => 300,
	]),
	
	OPTION_NAVBAR_SECONDARY_V_PADDING => new MetaField(esc_html__('Bar top/bottom padding, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 0,
		'max' => 100,
	]),

]);
$meta[METABOX_NAVBAR_LS]             = new MetaBox(esc_html__('General/Sticky Menu Light Scheme Settings', 'seriously'), null, $postTypes, [
	OPTION_LS_NAVBAR_LOGO_TEXT_COLOR       => new MetaField(esc_html__('Logo text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_LOGO_TEXT_COLOR_HOVER => new MetaField(esc_html__('Logo hover text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	
	OPTION_LS_NAVBAR_MENU_ITEM_COLOR         => new MetaField(esc_html__('Menu item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_MENU_ITEM_COLOR_HOVER   => new MetaField(esc_html__('Menu hover item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_MENU_ITEM_COLOR_CURRENT => new MetaField(esc_html__('Menu current item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	
	OPTION_LS_NAVBAR_SUBMENU_BG_COLOR     => new MetaField(esc_html__('Submenu background color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_SUBMENU_BORDER_COLOR => new MetaField(esc_html__('Submenu border color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_SUBMENU_SHADOW_COLOR => new MetaField(esc_html__('Submenu shadow color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_SUBMENU_SHADOW_BLUR  => new MetaField(esc_html__('Submenu shadow blur, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 0,
		'max' => 100
	]),
	
	OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR         => new MetaField(esc_html__('Submenu item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR_HOVER   => new MetaField(esc_html__('Submenu hover item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR_CURRENT => new MetaField(esc_html__('Submenu current item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	
	OPTION_LS_NAVBAR_BTN_BG_COLOR           => new MetaField(esc_html__('Bar button background color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_BTN_BORDER_COLOR       => new MetaField(esc_html__('Bar button border color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_BTN_TEXT_COLOR         => new MetaField(esc_html__('Bar button text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_BTN_BG_COLOR_HOVER     => new MetaField(esc_html__('Bar button hover/current background color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_BTN_BORDER_COLOR_HOVER => new MetaField(esc_html__('Bar button hover/current border color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_BTN_TEXT_COLOR_HOVER   => new MetaField(esc_html__('Bar button hover/current text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
]);
$meta[METABOX_NAVBAR_DS]             = new MetaBox(esc_html__('General/Sticky Menu Dark Scheme Settings', 'seriously'), null, $postTypes, [
	OPTION_DS_NAVBAR_LOGO_TEXT_COLOR       => new MetaField(esc_html__('Logo text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_LOGO_TEXT_COLOR_HOVER => new MetaField(esc_html__('Logo hover text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	
	OPTION_DS_NAVBAR_MENU_ITEM_COLOR         => new MetaField(esc_html__('Menu item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_MENU_ITEM_COLOR_HOVER   => new MetaField(esc_html__('Menu hover item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_MENU_ITEM_COLOR_CURRENT => new MetaField(esc_html__('Menu current item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	
	OPTION_DS_NAVBAR_SUBMENU_BG_COLOR     => new MetaField(esc_html__('Submenu background color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_SUBMENU_BORDER_COLOR => new MetaField(esc_html__('Submenu border color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_SUBMENU_SHADOW_COLOR => new MetaField(esc_html__('Submenu shadow color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_SUBMENU_SHADOW_BLUR  => new MetaField(esc_html__('Submenu shadow blur, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 0,
		'max' => 100
	]),
	
	OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR         => new MetaField(esc_html__('Submenu item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR_HOVER   => new MetaField(esc_html__('Submenu hover item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR_CURRENT => new MetaField(esc_html__('Submenu current item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	
	OPTION_DS_NAVBAR_BTN_BG_COLOR           => new MetaField(esc_html__('Bar button background color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_BTN_BORDER_COLOR       => new MetaField(esc_html__('Bar button border color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_BTN_TEXT_COLOR         => new MetaField(esc_html__('Bar button text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_BTN_BG_COLOR_HOVER     => new MetaField(esc_html__('Bar button hover/current background color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_BTN_BORDER_COLOR_HOVER => new MetaField(esc_html__('Bar button hover/current border color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_BTN_TEXT_COLOR_HOVER   => new MetaField(esc_html__('Bar button hover/current text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
]);
$meta[METABOX_NAVBAR_MOBILE_GENERAL] = new MetaBox(esc_html__('Mobile Menu Settings', 'seriously'), null, $postTypes, [
	OPTION_NAVBAR_M_BG_COLOR     => new MetaField(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_NAVBAR_M_BORDER_COLOR => new MetaField(esc_html__('Border color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_NAVBAR_M_BORDER_WIDTH => new MetaField(esc_html__('Border width, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 0,
		'max' => 100
	]),
	OPTION_NAVBAR_M_SHADOW_COLOR => new MetaField(esc_html__('Shadow color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_NAVBAR_M_SHADOW_BLUR  => new MetaField(esc_html__('Shadow blur, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 0,
		'max' => 100
	]),
	
	OPTION_NAVBAR_M_LOGO_HEIGHT => new MetaField(esc_html__('Logo image height, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 10,
		'max' => 300,
	]),
	OPTION_NAVBAR_M_V_PADDING   => new MetaField(esc_html__('Bar top/bottom padding, px', 'seriously'), null, null, CONTROL_NUMBER, [
		'min' => 0,
		'max' => 100,
	]),
	OPTION_NAVBAR_M_OVERLAY     => new MetaField(esc_html__('Bar overlay', 'seriously'), null, null, CONTROL_TRISTATE),
	OPTION_NAVBAR_M_BEHAVIOR    => new MetaField(esc_html__('Bar behavior', 'seriously'), null, null, CONTROL_SELECT, [
		'choices' => [
			''       => esc_html__('Default', 'seriously'),
			'static' => esc_html__('Static', 'seriously'),
			'sticky' => esc_html__('Sticky', 'seriously'),
		]
	]),

]);
$meta[METABOX_NAVBAR_MOBILE_LS]      = new MetaBox(esc_html__('Mobile Menu Light Scheme Settings', 'seriously'), null, $postTypes, [
	OPTION_LS_NAVBAR_M_LOGO_TEXT_COLOR            => new MetaField(esc_html__('Logo text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_M_TOGGLE_ICON_COLOR          => new MetaField(esc_html__('Burger menu icon color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_M_TOGGLE_TEXT_COLOR          => new MetaField(esc_html__('Burger menu text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_M_MENU_ITEM_COLOR            => new MetaField(esc_html__('Menu item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_M_MENU_ITEM_COLOR_CURRENT    => new MetaField(esc_html__('Menu current item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_M_SUBMENU_ITEM_COLOR         => new MetaField(esc_html__('Submenu item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_LS_NAVBAR_M_SUBMENU_ITEM_COLOR_CURRENT => new MetaField(esc_html__('Submenu current item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
]);
$meta[METABOX_NAVBAR_MOBILE_DS]      = new MetaBox(esc_html__('Mobile Menu Dark Scheme Settings', 'seriously'), null, $postTypes, [
	OPTION_DS_NAVBAR_M_LOGO_TEXT_COLOR            => new MetaField(esc_html__('Logo text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_M_TOGGLE_ICON_COLOR          => new MetaField(esc_html__('Burger menu icon color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_M_TOGGLE_TEXT_COLOR          => new MetaField(esc_html__('Burger menu text color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_M_MENU_ITEM_COLOR            => new MetaField(esc_html__('Menu item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_M_MENU_ITEM_COLOR_CURRENT    => new MetaField(esc_html__('Menu current item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_M_SUBMENU_ITEM_COLOR         => new MetaField(esc_html__('Submenu item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
	OPTION_DS_NAVBAR_M_SUBMENU_ITEM_COLOR_CURRENT => new MetaField(esc_html__('Submenu current item color', 'seriously'), null, null, CONTROL_COLOR, [
		'alpha' => true
	]),
]);

do_action(ACTION_OMT_META, $meta);

$meta->register();