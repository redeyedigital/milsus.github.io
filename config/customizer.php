<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;
use Openmarco\Seriously\Customizer\Field;
use Openmarco\Seriously\Customizer\Panel;
use Openmarco\Seriously\Customizer\Section;

// List of Content blocks for Header and Footer
$headers = [
	'builtin'   => esc_html__('Built-in header', 'seriously'),
	'invisible' => esc_html__('Invisible header', 'seriously'),
	'none'      => esc_html__('No header', 'seriously'),
];
$headers = apply_filters(FILTER_OMP_CONTENT_BLOCKS_POSTS, $headers);
$footers = [
	'builtin' => esc_html__('Built-in widgetized footer', 'seriously'),
	'none'    => esc_html__('No footer', 'seriously'),
];
$footers = apply_filters(FILTER_OMP_CONTENT_BLOCKS_POSTS, $footers);

// Add fields to default WP panels
$menus = [
	SECTION_NAVBAR_GENERAL        => new Section(esc_html__('General Menu', 'seriously'), '', [
		OPTION_NAVBAR_BG_COLOR     => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_NAVBAR_BORDER_COLOR => new Field(esc_html__('Border color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_NAVBAR_BORDER_WIDTH => new Field(esc_html__('Border width, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		OPTION_NAVBAR_SHADOW_COLOR => new Field(esc_html__('Shadow color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_NAVBAR_SHADOW_BLUR  => new Field(esc_html__('Shadow blur, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		
		MOD_NAVBAR_LOGO_IMAGE           => new Field(esc_html__('Default logo image', 'seriously'), null, null, CONTROL_IMAGE),
		OPTION_NAVBAR_LOGO_HEIGHT       => new Field(esc_html__('Logo image height, px', 'seriously'), null, 36, CONTROL_NUMBER, [
			'min' => 10,
			'max' => 300,
		]),
		MOD_NAVBAR_LOGO_TEXT            => new Field(esc_html__('Logo text', 'seriously'), null, null, CONTROL_TEXT),
		MOD_NAVBAR_LOGO_TEXT_SITE_TITLE => new Field(null, null, true, CONTROL_CHECKBOX, ['caption' => esc_html__('Use Site title as logo text instead', 'seriously')]),
		MOD_NAVBAR_LOGO_TEXT_LEFT_SPACE => new Field(esc_html__('Logo text left margin, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => -100,
			'max' => 100
		]),
		MOD_NAVBAR_LOGO_RIGHT_SPACE     => new Field(esc_html__('Logo right margin, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		
		OPTION_NAVBAR_V_PADDING => new Field(esc_html__('Bar top/bottom padding, px', 'seriously'), null, 10, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100,
		]),
		OPTION_NAVBAR_LAYOUT    => new Field(esc_html__('Layout', 'seriously'), null, 'fixed', 'wp:select', [
			'choices' => [
				'fixed' => esc_html__('Fixed', 'seriously'),
				'fluid' => esc_html__('Fluid', 'seriously'),
			]
		]),
		OPTION_NAVBAR_OVERLAY   => new Field(null, null, false, CONTROL_CHECKBOX, ['caption' => esc_html__('Bar overlay', 'seriously')]),
		
		MOD_NAVBAR_MENU_ITEMS_SPACE => new Field(esc_html__('Space between menu items, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		
		MOD_NAVBAR_BTN_BORDER_WIDTH      => new Field(esc_html__('Bar button border width, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		MOD_NAVBAR_BTN_BORDER_RADIUS     => new Field(esc_html__('Bar button border radius, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		MOD_NAVBAR_SUBMENU_BORDER_RADIUS => new Field(esc_html__('Submenu border radius, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		
		MOD_NAVBAR_SUBMENU_TOP_SPACE => new Field(esc_html__('Submenu top margin, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		
		OPTION_NAVBAR_DISABLED => new Field(null, null, false, CONTROL_CHECKBOX, ['caption' => esc_html__('Hide navigation bar', 'seriously')]),
	], null, 0),
	SECTION_NAVBAR_SECONDARY      => new Section(esc_html__('Sticky Menu', 'seriously'), '', [
		OPTION_NAVBAR_SECONDARY_ENABLED => new Field(null, null, false, CONTROL_CHECKBOX, ['caption' => esc_html__('Use sticky menu', 'seriously')]),
		
		OPTION_NAVBAR_SECONDARY_BG_COLOR     => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_NAVBAR_SECONDARY_BORDER_COLOR => new Field(esc_html__('Border color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_NAVBAR_SECONDARY_BORDER_WIDTH => new Field(esc_html__('Border width, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		OPTION_NAVBAR_SECONDARY_SHADOW_COLOR => new Field(esc_html__('Shadow color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_NAVBAR_SECONDARY_SHADOW_BLUR  => new Field(esc_html__('Shadow blur, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		
		OPTION_NAVBAR_SECONDARY_LOGO_HEIGHT => new Field(esc_html__('Logo image height, px', 'seriously'), null, 24, CONTROL_NUMBER, [
			'min' => 10,
			'max' => 300,
		]),
		
		OPTION_NAVBAR_SECONDARY_V_PADDING => new Field(esc_html__('Bar top/bottom padding, px', 'seriously'), null, 4, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100,
		]),
	
	], null, 0),
	SECTION_NAVBAR_LS             => new Section(esc_html__('Light Scheme', 'seriously'), '', [
		MOD_LS_NAVBAR_LOGO_IMAGE               => new Field(esc_html__('Logo image', 'seriously'), null, null, CONTROL_IMAGE),
		OPTION_LS_NAVBAR_LOGO_TEXT_COLOR       => new Field(esc_html__('Logo text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_LOGO_TEXT_COLOR_HOVER => new Field(esc_html__('Logo hover text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		
		OPTION_LS_NAVBAR_MENU_ITEM_COLOR         => new Field(esc_html__('Menu item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_MENU_ITEM_COLOR_HOVER   => new Field(esc_html__('Menu hover item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_MENU_ITEM_COLOR_CURRENT => new Field(esc_html__('Menu current item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		
		OPTION_LS_NAVBAR_SUBMENU_BG_COLOR     => new Field(esc_html__('Submenu background color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_SUBMENU_BORDER_COLOR => new Field(esc_html__('Submenu border color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_SUBMENU_SHADOW_COLOR => new Field(esc_html__('Submenu shadow color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_SUBMENU_SHADOW_BLUR  => new Field(esc_html__('Submenu shadow blur, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		
		OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR         => new Field(esc_html__('Submenu item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR_HOVER   => new Field(esc_html__('Submenu hover item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR_CURRENT => new Field(esc_html__('Submenu current item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		
		OPTION_LS_NAVBAR_BTN_BG_COLOR           => new Field(esc_html__('Bar button background color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_BTN_BORDER_COLOR       => new Field(esc_html__('Bar button border color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_BTN_TEXT_COLOR         => new Field(esc_html__('Bar button text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_BTN_BG_COLOR_HOVER     => new Field(esc_html__('Bar button hover background color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_BTN_BORDER_COLOR_HOVER => new Field(esc_html__('Bar button hover border color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_BTN_TEXT_COLOR_HOVER   => new Field(esc_html__('Bar button hover text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
	], null, 0),
	SECTION_NAVBAR_DS             => new Section(esc_html__('Dark Scheme', 'seriously'), '', [
		MOD_DS_NAVBAR_LOGO_IMAGE               => new Field(esc_html__('Logo image', 'seriously'), null, null, CONTROL_IMAGE),
		OPTION_DS_NAVBAR_LOGO_TEXT_COLOR       => new Field(esc_html__('Logo text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_LOGO_TEXT_COLOR_HOVER => new Field(esc_html__('Logo hover text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		
		OPTION_DS_NAVBAR_MENU_ITEM_COLOR         => new Field(esc_html__('Menu item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_MENU_ITEM_COLOR_HOVER   => new Field(esc_html__('Menu hover item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_MENU_ITEM_COLOR_CURRENT => new Field(esc_html__('Menu current item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		
		OPTION_DS_NAVBAR_SUBMENU_BG_COLOR     => new Field(esc_html__('Submenu background color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_SUBMENU_BORDER_COLOR => new Field(esc_html__('Submenu border color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_SUBMENU_SHADOW_COLOR => new Field(esc_html__('Submenu shadow color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_SUBMENU_SHADOW_BLUR  => new Field(esc_html__('Submenu shadow blur, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		
		OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR         => new Field(esc_html__('Submenu item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR_HOVER   => new Field(esc_html__('Submenu hover item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR_CURRENT => new Field(esc_html__('Submenu current item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		
		OPTION_DS_NAVBAR_BTN_BG_COLOR           => new Field(esc_html__('Bar button background color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_BTN_BORDER_COLOR       => new Field(esc_html__('Bar button border color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_BTN_TEXT_COLOR         => new Field(esc_html__('Bar button text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_BTN_BG_COLOR_HOVER     => new Field(esc_html__('Bar button hover background color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_BTN_BORDER_COLOR_HOVER => new Field(esc_html__('Bar button hover border color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_BTN_TEXT_COLOR_HOVER   => new Field(esc_html__('Bar button hover text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
	], null, 0),
	SECTION_NAVBAR_MOBILE_GENERAL => new Section(esc_html__('Mobile Menu', 'seriously'), '', [
		OPTION_NAVBAR_M_BG_COLOR     => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_NAVBAR_M_BORDER_COLOR => new Field(esc_html__('Border color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_NAVBAR_M_BORDER_WIDTH => new Field(esc_html__('Border width, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		OPTION_NAVBAR_M_SHADOW_COLOR => new Field(esc_html__('Shadow color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_NAVBAR_M_SHADOW_BLUR  => new Field(esc_html__('Shadow blur, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		
		MOD_NAVBAR_M_LOGO_IMAGE           => new Field(esc_html__('Default logo image', 'seriously'), null, null, CONTROL_IMAGE),
		OPTION_NAVBAR_M_LOGO_HEIGHT       => new Field(esc_html__('Logo image height, px', 'seriously'), null, 36, CONTROL_NUMBER, [
			'min' => 10,
			'max' => 300,
		]),
		MOD_NAVBAR_M_LOGO_TEXT            => new Field(esc_html__('Logo text', 'seriously'), null, null, CONTROL_TEXT),
		MOD_NAVBAR_M_LOGO_TEXT_SITE_TITLE => new Field(null, null, false, CONTROL_CHECKBOX, ['caption' => esc_html__('Use Site title as logo text instead', 'seriously')]),
		MOD_NAVBAR_M_LOGO_TEXT_LEFT_SPACE => new Field(esc_html__('Logo text left margin, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => -100,
			'max' => 100
		]),
		
		OPTION_NAVBAR_M_V_PADDING => new Field(esc_html__('Bar top/bottom padding, px', 'seriously'), null, 10, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100,
		]),
		OPTION_NAVBAR_M_OVERLAY   => new Field(null, null, false, CONTROL_CHECKBOX, ['caption' => esc_html__('Bar overlay', 'seriously')]),
		OPTION_NAVBAR_M_BEHAVIOR  => new Field(esc_html__('Bar behavior', 'seriously'), null, 'static', 'wp:select', [
			'choices' => [
				'static' => esc_html__('Static', 'seriously'),
				'sticky' => esc_html__('Sticky', 'seriously'),
			]
		]),
		
		MOD_NAVBAR_M_TOGGLE_TYPE             => new Field(esc_html__('Burger menu', 'seriously'), null, 'icon', 'wp:select', [
			'choices' => [
				'icon' => esc_html__('Icon', 'seriously'),
				'text' => esc_html__('Text', 'seriously'),
				'both' => esc_html__('Text & icon', 'seriously'),
			]
		]),
		MOD_NAVBAR_M_TOGGLE_TEXT             => new Field(esc_html__('Custom burger menu text', 'seriously'), null, null, CONTROL_TEXT),
		MOD_NAVBAR_M_TOGGLE_TEXT_RIGHT_SPACE => new Field(esc_html__('Burger text right margin, px', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
		MOD_NAVBAR_M_VERTICAL_ITEMS_SPACE    => new Field(esc_html__('Vertical space between menu items', 'seriously'), null, null, CONTROL_NUMBER, [
			'min' => 0,
			'max' => 100
		]),
	], null, 0),
	SECTION_NAVBAR_MOBILE_LS      => new Section(esc_html__('Light Scheme', 'seriously'), '', [
		MOD_LS_NAVBAR_M_LOGO_IMAGE                    => new Field(esc_html__('Logo image', 'seriously'), null, null, CONTROL_IMAGE),
		OPTION_LS_NAVBAR_M_LOGO_TEXT_COLOR            => new Field(esc_html__('Logo text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_M_TOGGLE_ICON_COLOR          => new Field(esc_html__('Burger menu icon color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_M_TOGGLE_TEXT_COLOR          => new Field(esc_html__('Burger menu text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_M_MENU_ITEM_COLOR            => new Field(esc_html__('Menu item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_M_MENU_ITEM_COLOR_CURRENT    => new Field(esc_html__('Menu current item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_M_SUBMENU_ITEM_COLOR         => new Field(esc_html__('Submenu item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_LS_NAVBAR_M_SUBMENU_ITEM_COLOR_CURRENT => new Field(esc_html__('Submenu current item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
	], null, 0),
	SECTION_NAVBAR_MOBILE_DS      => new Section(esc_html__('Dark Scheme', 'seriously'), '', [
		MOD_DS_NAVBAR_M_LOGO_IMAGE                    => new Field(esc_html__('Logo image', 'seriously'), null, null, CONTROL_IMAGE),
		OPTION_DS_NAVBAR_M_LOGO_TEXT_COLOR            => new Field(esc_html__('Logo text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_M_TOGGLE_ICON_COLOR          => new Field(esc_html__('Burger menu icon color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_M_TOGGLE_TEXT_COLOR          => new Field(esc_html__('Burger menu text color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_M_MENU_ITEM_COLOR            => new Field(esc_html__('Menu item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_M_MENU_ITEM_COLOR_CURRENT    => new Field(esc_html__('Menu current item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_M_SUBMENU_ITEM_COLOR         => new Field(esc_html__('Submenu item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
		OPTION_DS_NAVBAR_M_SUBMENU_ITEM_COLOR_CURRENT => new Field(esc_html__('Submenu current item color', 'seriously'), null, null, CONTROL_COLOR, [
			'alpha' => true
		]),
	], null, 0),
];

foreach ($menus as $id => $section) {
	$section->register($id, WP_PANEL_MENUS);
}

// Add fields to custom panel
$custom = [
	PANEL_MAIN => new Panel(esc_html__('Main Settings', 'seriously'), '', [
		SECTION_MAIN_GENERAL => new Section(esc_html__('General', 'seriously'), '', [
			OPTION_BODY_BG_COLOR   => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_SELECTION_BG_COLOR => new Field(esc_html__('Selection background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_SELECTION_COLOR    => new Field(esc_html__('Selection text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LINK_STYLE_STATIC  => new Field(esc_html__('Default link style', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					'none'      => esc_html__('Undecorated', 'seriously'),
					'underline' => esc_html__('Underline', 'seriously'),
				]
			]),
			MOD_LINK_STYLE_HOVER   => new Field(esc_html__('Hover link style', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					'none'      => esc_html__('Undecorated', 'seriously'),
					'underline' => esc_html__('Underline', 'seriously'),
				]
			]),
			MOD_ARROWS_TYPE        => new Field(esc_html__('Arrows type', 'seriously'), null, 'ios', 'wp:select', [
				'choices' => [
					'type1'    => esc_html__('Type A', 'seriously'),
					'type2'    => esc_html__('Type B', 'seriously'),
					'type3'    => esc_html__('Type C', 'seriously'),
					'chevron'  => esc_html__('Chevron', 'seriously'),
					'skip'     => esc_html__('Skip', 'seriously'),
					'ios'      => esc_html__('iOS', 'seriously'),
					'ios2'     => esc_html__('iOS 2', 'seriously'),
					'ios3'     => esc_html__('iOS Thin', 'seriously'),
					'android'  => esc_html__('Android', 'seriously'),
					'android2' => esc_html__('Android 2', 'seriously'),
					'android3' => esc_html__('Android Circle', 'seriously')
				]
			]),
		]),
		SECTION_MAIN_LS      => new Section(esc_html__('Light Scheme', 'seriously'), '', [
			MOD_LS_TEXT_COLOR                => new Field(esc_html__('Text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_LINK_COLOR                => new Field(esc_html__('Link color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_LINK_STYLING_COLOR_STATIC => new Field(esc_html__('Link underline color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_LINK_COLOR_HOVER          => new Field(esc_html__('Link hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_LINK_STYLING_COLOR_HOVER  => new Field(esc_html__('Link underline hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_HEADINGS_COLOR            => new Field(esc_html__('Headings color', 'seriously'), null, null, CONTROL_COLOR),
		]),
		SECTION_MAIN_DS      => new Section(esc_html__('Dark Scheme', 'seriously'), '', [
			MOD_DS_TEXT_COLOR                => new Field(esc_html__('Text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_LINK_COLOR                => new Field(esc_html__('Link color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_LINK_STYLING_COLOR_STATIC => new Field(esc_html__('Link underline color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_LINK_COLOR_HOVER          => new Field(esc_html__('Link hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_LINK_STYLING_COLOR_HOVER  => new Field(esc_html__('Link underline hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_HEADINGS_COLOR            => new Field(esc_html__('Headings color', 'seriously'), null, null, CONTROL_COLOR),
		]),
		
		SECTION_SPLASH => new Section(esc_html__('Splash', 'seriously'), '', [
			MOD_SPLASH_ENABLED              => new Field(null, null, true, CONTROL_CHECKBOX, ['caption' => esc_html__('Enable splash', 'seriously')]),
			MOD_SPLASH_BG_COLOR             => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_SPLASH_PROGRESS_BAR_ENABLED => new Field(null, null, true, CONTROL_CHECKBOX, ['caption' => esc_html__('Enable progress bar', 'seriously')]),
			MOD_SPLASH_PROGRESS_BAR_HEIGHT  => new Field(esc_html__('Progress bar height, px', 'seriously'), null, null, CONTROL_NUMBER, [
				'min' => 1,
				'max' => 50,
			]),
			MOD_SPLASH_PROGRESS_BAR_COLOR   => new Field(esc_html__('Progress bar color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_SPLASH_ICON                 => new Field(esc_html__('Loader icon', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					'none'                  => esc_html__('None', 'seriously'),
					'ball-pulse'            => esc_html__('Ball pulse', 'seriously'),
					'ball-pulse-double'     => esc_html__('Ball pulse double', 'seriously'),
					'wave'                  => esc_html__('Wave', 'seriously'),
					'wave-spread'           => esc_html__('Wave spread', 'seriously'),
					'circle-pulse'          => esc_html__('Circle pulse', 'seriously'),
					'circle-pulse-multiple' => esc_html__('Circle pulse multiple', 'seriously'),
					'arc-rotate'            => esc_html__('Arc rotate', 'seriously'),
					'arc-rotate2'           => esc_html__('Arc rotate 2', 'seriously'),
					'arc-rotate-double'     => esc_html__('Arc rotate double', 'seriously'),
					'arc-scale'             => esc_html__('Arc scale', 'seriously'),
					'square-split'          => esc_html__('Square split', 'seriously'),
					'square-rotate-3d'      => esc_html__('Square rotate 3D', 'seriously')
				]
			]),
			MOD_SPLASH_ICON_COLOR           => new Field(esc_html__('Loader icon color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_SPLASH_ICON_IMAGE           => new Field(esc_html__('Custom loader icon', 'seriously'), null, null, CONTROL_IMAGE),
		]),
		
		SECTION_FORMS_GENERAL => new Section(esc_html__('Forms', 'seriously'), '', [
			MOD_FORM_CONTROL_BORDER_WIDTH  => new Field(esc_html__('Form border width, px', 'seriously'), null, null, CONTROL_NUMBER, [
				'min' => 0,
				'max' => 100
			]),
			MOD_FORM_CONTROL_BORDER_RADIUS => new Field(esc_html__('Form border radius, px', 'seriously'), null, null, CONTROL_NUMBER, [
				'min' => 0,
				'max' => 100
			]),
		]),
		SECTION_FORMS_LS      => new Section(esc_html__('Light scheme', 'seriously'), '', [
			MOD_LS_FORM_CONTROL_COLOR              => new Field(esc_html__('Text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_FORM_CONTROL_BG_COLOR           => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_LS_FORM_CONTROL_BORDER_COLOR       => new Field(esc_html__('Border color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_LS_FORM_CONTROL_SHADOW             => new Field(esc_html__('Inner shadow color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_LS_FORM_CONTROL_ACCENT             => new Field(esc_html__('Accent color', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_FORM_CONTROL_PLACEHOLDER        => new Field(esc_html__('Placeholder color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_FORM_CONTROL_COLOR_FOCUS        => new Field(esc_html__('Focused text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_FORM_CONTROL_BG_COLOR_FOCUS     => new Field(esc_html__('Focused background color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_LS_FORM_CONTROL_BORDER_COLOR_FOCUS => new Field(esc_html__('Focused border color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_LS_FORM_CONTROL_SHADOW_FOCUS       => new Field(esc_html__('Focused shadow color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_LS_FORM_CONTROL_PLACEHOLDER_FOCUS  => new Field(esc_html__('Focused placeholder color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
		]),
		SECTION_FORMS_DS      => new Section(esc_html__('Dark scheme', 'seriously'), '', [
			MOD_DS_FORM_CONTROL_COLOR              => new Field(esc_html__('Text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_FORM_CONTROL_BG_COLOR           => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_DS_FORM_CONTROL_BORDER_COLOR       => new Field(esc_html__('Border color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_DS_FORM_CONTROL_SHADOW             => new Field(esc_html__('Inner shadow color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_DS_FORM_CONTROL_ACCENT             => new Field(esc_html__('Accent color', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_FORM_CONTROL_PLACEHOLDER        => new Field(esc_html__('Placeholder color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_FORM_CONTROL_COLOR_FOCUS        => new Field(esc_html__('Focused text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_FORM_CONTROL_BG_COLOR_FOCUS     => new Field(esc_html__('Focused background color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_DS_FORM_CONTROL_BORDER_COLOR_FOCUS => new Field(esc_html__('Focused border color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_DS_FORM_CONTROL_SHADOW_FOCUS       => new Field(esc_html__('Focused shadow color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_DS_FORM_CONTROL_PLACEHOLDER_FOCUS  => new Field(esc_html__('Focused placeholder color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
		]),
		
		SECTION_BUTTONS_GENERAL => new Section(esc_html__('Buttons', 'seriously'), '', [
			MOD_BTN_BORDER_WIDTH  => new Field(esc_html__('Button border width, px', 'seriously'), null, null, CONTROL_NUMBER, [
				'min' => 0,
				'max' => 100
			]),
			MOD_BTN_BORDER_RADIUS => new Field(esc_html__('Button border radius, px', 'seriously'), null, null, CONTROL_NUMBER, [
				'min' => 0,
				'max' => 100
			]),
		]),
		SECTION_BUTTONS_LS      => new Section(esc_html__('Light Scheme', 'seriously'), '', [
			MOD_LS_BTN_PRIMARY_BG_COLOR               => new Field(esc_html__('Primary button background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_PRIMARY_BORDER_COLOR           => new Field(esc_html__('Primary button border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_PRIMARY_COLOR                  => new Field(esc_html__('Primary button text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_PRIMARY_BG_COLOR_HOVER         => new Field(esc_html__('Primary button hover background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_PRIMARY_BORDER_COLOR_HOVER     => new Field(esc_html__('Primary button hover border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_PRIMARY_COLOR_HOVER            => new Field(esc_html__('Primary button hover text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_PRIMARY_BG_COLOR_CURRENT       => new Field(esc_html__('Primary button active background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_PRIMARY_BORDER_COLOR_CURRENT   => new Field(esc_html__('Primary button active border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_PRIMARY_COLOR_CURRENT          => new Field(esc_html__('Primary button active text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_SECONDARY_BG_COLOR             => new Field(esc_html__('Secondary button background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_SECONDARY_BORDER_COLOR         => new Field(esc_html__('Secondary button border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_SECONDARY_COLOR                => new Field(esc_html__('Secondary button text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_SECONDARY_BG_COLOR_HOVER       => new Field(esc_html__('Secondary button hover background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_SECONDARY_BORDER_COLOR_HOVER   => new Field(esc_html__('Secondary button hover border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_SECONDARY_COLOR_HOVER          => new Field(esc_html__('Secondary button hover text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_SECONDARY_BG_COLOR_CURRENT     => new Field(esc_html__('Secondary button active background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_SECONDARY_BORDER_COLOR_CURRENT => new Field(esc_html__('Secondary button active border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_LS_BTN_SECONDARY_COLOR_CURRENT        => new Field(esc_html__('Secondary button active text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
		]),
		SECTION_BUTTONS_DS      => new Section(esc_html__('Dark Scheme', 'seriously'), '', [
			MOD_DS_BTN_PRIMARY_BG_COLOR               => new Field(esc_html__('Primary button background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_PRIMARY_BORDER_COLOR           => new Field(esc_html__('Primary button border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_PRIMARY_COLOR                  => new Field(esc_html__('Primary button text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_PRIMARY_BG_COLOR_HOVER         => new Field(esc_html__('Primary button hover background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_PRIMARY_BORDER_COLOR_HOVER     => new Field(esc_html__('Primary button hover border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_PRIMARY_COLOR_HOVER            => new Field(esc_html__('Primary button hover text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_PRIMARY_BG_COLOR_CURRENT       => new Field(esc_html__('Primary button active background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_PRIMARY_BORDER_COLOR_CURRENT   => new Field(esc_html__('Primary button active border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_PRIMARY_COLOR_CURRENT          => new Field(esc_html__('Primary button active text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_SECONDARY_BG_COLOR             => new Field(esc_html__('Secondary button background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_SECONDARY_BORDER_COLOR         => new Field(esc_html__('Secondary button border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_SECONDARY_COLOR                => new Field(esc_html__('Secondary button text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_SECONDARY_BG_COLOR_HOVER       => new Field(esc_html__('Secondary button hover background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_SECONDARY_BORDER_COLOR_HOVER   => new Field(esc_html__('Secondary button hover border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_SECONDARY_COLOR_HOVER          => new Field(esc_html__('Secondary button hover text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_SECONDARY_BG_COLOR_CURRENT     => new Field(esc_html__('Secondary button active background', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_SECONDARY_BORDER_COLOR_CURRENT => new Field(esc_html__('Secondary button active border', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
			MOD_DS_BTN_SECONDARY_COLOR_CURRENT        => new Field(esc_html__('Secondary button active text', 'seriously'), null, null, CONTROL_COLOR, ['alpha' => true]),
		]),
		
		SECTION_PAGINATION_GENERAL => new Section(esc_html__('Pagination', 'seriously'), '', [
			MOD_PAGINATION_TYPE                    => new Field(esc_html__('Pagination type', 'seriously'), null, 'pager', 'wp:select', [
				'choices' => [
					'numbers' => esc_html__('Page numbers', 'seriously'),
					'pager'   => esc_html__('Next/Previous', 'seriously'),
				]
			]),
			MOD_PAGINATION_NEXT_PREVIOUS_CONTAINER => new Field(esc_html__('Next/Previous layout', 'seriously'), null, 'container', 'wp:select', [
				'choices' => [
					'container'       => esc_html__('Fixed', 'seriously'),
					'container-fluid' => esc_html__('Fluid', 'seriously')
				]
			]),
		]),
		SECTION_PAGINATION_LS      => new Section(esc_html__('Light Scheme', 'seriously'), '', [
			MOD_LS_PAGINATION_NUM_COLOR                 => new Field(esc_html__('Page number color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_PAGINATION_NUM_BG_COLOR              => new Field(esc_html__('Page number background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_PAGINATION_NUM_BORDER_COLOR          => new Field(esc_html__('Page number border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_PAGINATION_NUM_COLOR_HOVER           => new Field(esc_html__('Page number hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_PAGINATION_NUM_BG_COLOR_HOVER        => new Field(esc_html__('Page number hover background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_PAGINATION_NUM_BORDER_COLOR_HOVER    => new Field(esc_html__('Page number hover border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_PAGINATION_NUM_COLOR_CURRENT         => new Field(esc_html__('Current page number color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_PAGINATION_NUM_BG_COLOR_CURRENT      => new Field(esc_html__('Current page number background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_PAGINATION_NUM_BORDER_COLOR_CURRENT  => new Field(esc_html__('Current page number border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_PAGINATION_PREVNEXT_TEXT_COLOR       => new Field(esc_html__('Next/previous text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_PAGINATION_PREVNEXT_TEXT_COLOR_HOVER => new Field(esc_html__('Next/previous hover text color', 'seriously'), null, null, CONTROL_COLOR),
		]),
		SECTION_PAGINATION_DS      => new Section(esc_html__('Dark Scheme', 'seriously'), '', [
			MOD_DS_PAGINATION_NUM_COLOR                 => new Field(esc_html__('Page number color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_PAGINATION_NUM_BG_COLOR              => new Field(esc_html__('Page number background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_PAGINATION_NUM_BORDER_COLOR          => new Field(esc_html__('Page number border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_PAGINATION_NUM_COLOR_HOVER           => new Field(esc_html__('Page number hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_PAGINATION_NUM_BG_COLOR_HOVER        => new Field(esc_html__('Page number hover background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_PAGINATION_NUM_BORDER_COLOR_HOVER    => new Field(esc_html__('Page number hover border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_PAGINATION_NUM_COLOR_CURRENT         => new Field(esc_html__('Current page number color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_PAGINATION_NUM_BG_COLOR_CURRENT      => new Field(esc_html__('Current page number background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_PAGINATION_NUM_BORDER_COLOR_CURRENT  => new Field(esc_html__('Current page number border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_PAGINATION_PREVNEXT_TEXT_COLOR       => new Field(esc_html__('Next/previous text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_PAGINATION_PREVNEXT_TEXT_COLOR_HOVER => new Field(esc_html__('Next/previous hover text color', 'seriously'), null, null, CONTROL_COLOR),
		]),
	], null, 25),
	
	PANEL_POSTS => new Panel(esc_html__('Blog', 'seriously'), '', [
		SECTION_POSTS_GENERAL => new Section(esc_html__('Posts Page', 'seriously'), '', [
			MOD_POSTS_PAGE_CONTENT                => new Field(esc_html__('For each article, show', 'seriously'), null, 'fulltext', 'wp:select', [
				'choices' => [
					'fulltext' => esc_html__('Full text', 'seriously'),
					'excerpt'  => esc_html__('Excerpt', 'seriously'),
					'none'     => esc_html__('None', 'seriously'),
				]
			]),
			MOD_POSTS_PAGE_AVATAR_ENABLED         => new Field(null, null, true, CONTROL_CHECKBOX, ['caption' => esc_html__('Avatar', 'seriously')]),
			MOD_POSTS_PAGE_AUTHOR_ENABLED         => new Field(null, null, true, CONTROL_CHECKBOX, ['caption' => esc_html__('Author', 'seriously')]),
			MOD_POSTS_PAGE_DATE_ENABLED           => new Field(null, null, true, CONTROL_CHECKBOX, ['caption' => esc_html__('Date', 'seriously')]),
			MOD_POSTS_PAGE_TAXONOMY               => new Field(esc_html__('Terms', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					''                => esc_html__('None', 'seriously'),
					TAX_POST_CATEGORY => esc_html__('Categories', 'seriously'),
					TAX_POST_TAG      => esc_html__('Tags', 'seriously')
				]
			]),
			MOD_POSTS_PAGE_FEATURED_IMAGE_ENABLED => new Field(null, null, true, CONTROL_CHECKBOX, ['caption' => esc_html__('Featured image', 'seriously')]),
			MOD_POSTS_PAGE_READ_MORE_ENABLED      => new Field(null, null, true, CONTROL_CHECKBOX, ['caption' => esc_html__('Read more link', 'seriously')]),
			MOD_POSTS_PAGE_COMMENTS_LINK_ENABLED  => new Field(null, null, true, CONTROL_CHECKBOX, ['caption' => esc_html__('Comments link', 'seriously')]),
		]),
		SECTION_POSTS_LS      => new Section(esc_html__('Light Scheme', 'seriously'), '', [
			MOD_LS_POSTS_PAGE_TITLE_COLOR             => new Field(esc_html__('Title color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_PAGE_TITLE_COLOR_HOVER       => new Field(esc_html__('Title hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_PAGE_TERM_TEXT_COLOR         => new Field(esc_html__('Term text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_PAGE_TERM_BG_COLOR           => new Field(esc_html__('Term background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_PAGE_TERM_BORDER_COLOR       => new Field(esc_html__('Term border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_PAGE_TERM_TEXT_HOVER_COLOR   => new Field(esc_html__('Term text hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_PAGE_TERM_BG_HOVER_COLOR     => new Field(esc_html__('Term background hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_PAGE_TERM_BORDER_HOVER_COLOR => new Field(esc_html__('Term border hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_PAGE_POST_SEPARATOR_COLOR    => new Field(esc_html__('Post separator color', 'seriously'), null, null, CONTROL_COLOR),
		]),
		SECTION_POSTS_DS      => new Section(esc_html__('Dark Scheme', 'seriously'), '', [
			MOD_DS_POSTS_PAGE_TITLE_COLOR             => new Field(esc_html__('Title color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_PAGE_TITLE_COLOR_HOVER       => new Field(esc_html__('Title hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_PAGE_TERM_TEXT_COLOR         => new Field(esc_html__('Term text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_PAGE_TERM_BG_COLOR           => new Field(esc_html__('Term background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_PAGE_TERM_BORDER_COLOR       => new Field(esc_html__('Term border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_PAGE_TERM_TEXT_HOVER_COLOR   => new Field(esc_html__('Term text hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_PAGE_TERM_BG_HOVER_COLOR     => new Field(esc_html__('Term background hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_PAGE_TERM_BORDER_HOVER_COLOR => new Field(esc_html__('Term border hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_PAGE_POST_SEPARATOR_COLOR    => new Field(esc_html__('Post separator color', 'seriously'), null, null, CONTROL_COLOR),
		]),
		
		SECTION_POSTS_TOP_BAR_GENERAL => new Section(esc_html__('Top Bar', 'seriously'), '', [
			MOD_POSTS_TOP_BAR_TAXONOMY       => new Field(esc_html__('Display top bar', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					''                => esc_html__('None', 'seriously'),
					TAX_POST_CATEGORY => esc_html__('With categories', 'seriously'),
					TAX_POST_TAG      => esc_html__('With tags', 'seriously')
				]
			]),
			MOD_POSTS_TOP_BAR_TAXONOMY_TYPE  => new Field(esc_html__('Top bar type', 'seriously'), null, 'line', 'wp:select', [
				'choices' => [
					'line'     => esc_html__('List', 'seriously'),
					'dropdown' => esc_html__('Dropdown', 'seriously'),
				]
			]),
			MOD_POSTS_TOP_BAR_SEARCH_ENABLED => new Field(null, null, false, CONTROL_CHECKBOX, ['caption' => esc_html__('Show search', 'seriously')]),
		]),
		SECTION_POSTS_TOP_BAR_LS      => new Section(esc_html__('Light Scheme', 'seriously'), '', [
			MOD_LS_POSTS_TOP_BAR_BG_COLOR                  => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_BORDER_TOP_COLOR          => new Field(esc_html__('Top border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_BORDER_BOTTOM_COLOR       => new Field(esc_html__('Bottom border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_SHADOW_TOP_COLOR          => new Field(esc_html__('Top shadow color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_SHADOW_BOTTOM_COLOR       => new Field(esc_html__('Bottom shadow color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_ITEM_BG_COLOR             => new Field(esc_html__('Item background color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_LS_POSTS_TOP_BAR_ITEM_BORDER_COLOR         => new Field(esc_html__('Item border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_ITEM_COLOR                => new Field(esc_html__('Item color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_ITEM_BG_COLOR_HOVER       => new Field(esc_html__('Item hover background color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_LS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_HOVER   => new Field(esc_html__('Item hover border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_ITEM_COLOR_HOVER          => new Field(esc_html__('Item hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_ITEM_BG_COLOR_CURRENT     => new Field(esc_html__('Current item background color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_LS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_CURRENT => new Field(esc_html__('Current item border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_ITEM_COLOR_CURRENT        => new Field(esc_html__('Current item color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_SEARCH_BG_COLOR           => new Field(esc_html__('Search background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR       => new Field(esc_html__('Search border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR       => new Field(esc_html__('Search shadow color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_SEARCH_ICON_COLOR         => new Field(esc_html__('Search icon/placeholder color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_SEARCH_BG_COLOR_FOCUS     => new Field(esc_html__('Focused search background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR_FOCUS => new Field(esc_html__('Focused search border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR_FOCUS => new Field(esc_html__('Focused search shadow color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_TOP_BAR_SEARCH_ICON_COLOR_FOCUS   => new Field(esc_html__('Focused search icon/placeholder color', 'seriously'), null, null, CONTROL_COLOR),
		]),
		SECTION_POSTS_TOP_BAR_DS      => new Section(esc_html__('Dark Scheme', 'seriously'), '', [
			MOD_DS_POSTS_TOP_BAR_BG_COLOR                  => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_BORDER_TOP_COLOR          => new Field(esc_html__('Top border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_BORDER_BOTTOM_COLOR       => new Field(esc_html__('Bottom border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_SHADOW_TOP_COLOR          => new Field(esc_html__('Top shadow color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_SHADOW_BOTTOM_COLOR       => new Field(esc_html__('Bottom shadow color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_ITEM_BG_COLOR             => new Field(esc_html__('Item background color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_DS_POSTS_TOP_BAR_ITEM_BORDER_COLOR         => new Field(esc_html__('Item border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_ITEM_COLOR                => new Field(esc_html__('Item color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_ITEM_BG_COLOR_HOVER       => new Field(esc_html__('Item hover background color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_DS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_HOVER   => new Field(esc_html__('Item hover border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_ITEM_COLOR_HOVER          => new Field(esc_html__('Item hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_ITEM_BG_COLOR_CURRENT     => new Field(esc_html__('Current item background color', 'seriously'), null, null, CONTROL_COLOR, [
				'alpha' => true
			]),
			MOD_DS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_CURRENT => new Field(esc_html__('Current item border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_ITEM_COLOR_CURRENT        => new Field(esc_html__('Current item color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_SEARCH_BG_COLOR           => new Field(esc_html__('Search background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR       => new Field(esc_html__('Search border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR       => new Field(esc_html__('Search shadow color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_SEARCH_ICON_COLOR         => new Field(esc_html__('Search icon/placeholder color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_SEARCH_BG_COLOR_FOCUS     => new Field(esc_html__('Search background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR_FOCUS => new Field(esc_html__('Search border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR_FOCUS => new Field(esc_html__('Search shadow color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_TOP_BAR_SEARCH_ICON_COLOR_FOCUS   => new Field(esc_html__('Search icon/placeholder color', 'seriously'), null, null, CONTROL_COLOR),
		]),
		
		SECTION_POSTS_SIDEBAR_GENERAL => new Section(esc_html__('Sidebar', 'seriously'), '', [
			MOD_POSTS_SIDEBAR_BORDER_WIDTH      => new Field(esc_html__('Border width, px', 'seriously'), null, null, CONTROL_NUMBER, [
				'min' => 0,
				'max' => 4
			]),
			MOD_POSTS_SIDEBAR_WIDGET_V_PADDING  => new Field(esc_html__('Widget top/bottom padding, px', 'seriously'), null, null, CONTROL_NUMBER, [
				'min' => 0,
				'max' => 100,
			]),
			MOD_POSTS_SIDEBAR_WIDGET_H_PADDING  => new Field(esc_html__('Widget left/right padding, px', 'seriously'), null, null, CONTROL_NUMBER, [
				'min' => 0,
				'max' => 100,
			]),
			MOD_POSTS_SIDEBAR_WIDGETS_SPACE     => new Field(esc_html__('Space between widgets, px', 'seriously'), null, null, CONTROL_NUMBER, [
				'min' => 0,
				'max' => 100
			]),
			MOD_POSTS_SIDEBAR_SHADOW_BLUR       => new Field(esc_html__('Shadow blur, px', 'seriously'), null, null, CONTROL_NUMBER, [
				'min' => 0,
				'max' => 100
			]),
			MOD_POSTS_SIDEBAR_LINK_STYLE_STATIC => new Field(esc_html__('Default link style', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					'none'      => esc_html__('Undecorated', 'seriously'),
					'underline' => esc_html__('Underline', 'seriously'),
				]
			]),
			MOD_POSTS_SIDEBAR_LINK_STYLE_HOVER  => new Field(esc_html__('Hover link style', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					'none'      => esc_html__('Undecorated', 'seriously'),
					'underline' => esc_html__('Underline', 'seriously'),
				]
			]),
		]),
		
		SECTION_POSTS_SIDEBAR_LS => new Section(esc_html__('Light Scheme', 'seriously'), '', [
			MOD_LS_POSTS_SIDEBAR_BG_COLOR                  => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_SIDEBAR_BORDER_COLOR              => new Field(esc_html__('Border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_SIDEBAR_SHADOW_COLOR              => new Field(esc_html__('Shadow color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_SIDEBAR_TEXT_COLOR                => new Field(esc_html__('Text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_SIDEBAR_TITLE_COLOR               => new Field(esc_html__('Title color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_SIDEBAR_LINK_COLOR                => new Field(esc_html__('Link color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_SIDEBAR_LINK_STYLING_COLOR_STATIC => new Field(esc_html__('Link underline color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_SIDEBAR_LINK_HOVER_COLOR          => new Field(esc_html__('Hover link color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_POSTS_SIDEBAR_LINK_STYLING_COLOR_HOVER  => new Field(esc_html__('Link underline hover color', 'seriously'), null, null, CONTROL_COLOR),
		]),
		SECTION_POSTS_SIDEBAR_DS => new Section(esc_html__('Dark Scheme', 'seriously'), '', [
			MOD_DS_POSTS_SIDEBAR_BG_COLOR                  => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_SIDEBAR_BORDER_COLOR              => new Field(esc_html__('Border color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_SIDEBAR_SHADOW_COLOR              => new Field(esc_html__('Shadow color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_SIDEBAR_TEXT_COLOR                => new Field(esc_html__('Text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_SIDEBAR_TITLE_COLOR               => new Field(esc_html__('Title color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_SIDEBAR_LINK_COLOR                => new Field(esc_html__('Link color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_SIDEBAR_LINK_STYLING_COLOR_STATIC => new Field(esc_html__('Link underline color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_SIDEBAR_LINK_HOVER_COLOR          => new Field(esc_html__('Hover link color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_POSTS_SIDEBAR_LINK_STYLING_COLOR_HOVER  => new Field(esc_html__('Link underline hover color', 'seriously'), null, null, CONTROL_COLOR),
		]),
		SECTION_POSTS_SINGLE     => new Section(esc_html__('Single Post Page', 'seriously'), '', [
			MOD_POST_FEATURED_IMAGE_ENABLED => new Field(null, null, true, CONTROL_CHECKBOX, ['caption' => esc_html__('Featured image', 'seriously')]),
			MOD_POST_TAXONOMY               => new Field(esc_html__('Terms', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					''                => esc_html__('None', 'seriously'),
					TAX_POST_CATEGORY => esc_html__('Categories', 'seriously'),
					TAX_POST_TAG      => esc_html__('Tags', 'seriously')
				]
			]),
		]),
	], null, 130),
	
	PANEL_HEADER => new Panel(esc_html__('Header', 'seriously'), '', [
		SECTION_HEADER_GENERAL => new Section(esc_html__('Header', 'seriously'), '', [
			OPTION_HEADER_DISPLAY        => new Field(esc_html__('Default header for all pages', 'seriously'), null, 'builtin', 'wp:select', [
				'choices' => $headers
			]),
			OPTION_HEADER_BG_COLOR       => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_HEADER_LINK_STYLE_STATIC => new Field(esc_html__('Default link style', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					'none'      => esc_html__('Undecorated', 'seriously'),
					'underline' => esc_html__('Underline', 'seriously'),
				]
			]),
			MOD_HEADER_LINK_STYLE_HOVER  => new Field(esc_html__('Hover link style', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					'none'      => esc_html__('Undecorated', 'seriously'),
					'underline' => esc_html__('Underline', 'seriously'),
				]
			]),
		]),
		SECTION_HEADER_LS      => new Section(esc_html__('Light Scheme', 'seriously'), '', [
			MOD_LS_HEADER_TEXT_COLOR                => new Field(esc_html__('Text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_HEADER_LINK_COLOR                => new Field(esc_html__('Links color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_HEADER_LINK_STYLING_COLOR_STATIC => new Field(esc_html__('Link underline color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_HEADER_LINK_COLOR_HOVER          => new Field(esc_html__('Links hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_HEADER_LINK_STYLING_COLOR_HOVER  => new Field(esc_html__('Link underline hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_HEADER_HEADINGS_COLOR            => new Field(esc_html__('Headings color', 'seriously'), null, null, CONTROL_COLOR),
		]),
		SECTION_HEADER_DS      => new Section(esc_html__('Dark Scheme', 'seriously'), '', [
			MOD_DS_HEADER_TEXT_COLOR                => new Field(esc_html__('Text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_HEADER_LINK_COLOR                => new Field(esc_html__('Links color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_HEADER_LINK_STYLING_COLOR_STATIC => new Field(esc_html__('Link underline color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_HEADER_LINK_COLOR_HOVER          => new Field(esc_html__('Links hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_HEADER_LINK_STYLING_COLOR_HOVER  => new Field(esc_html__('Link underline hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_HEADER_HEADINGS_COLOR            => new Field(esc_html__('Headings color', 'seriously'), null, null, CONTROL_COLOR),
		]),
	], null, 130),
	
	PANEL_FOOTER => new Panel(esc_html__('Footer', 'seriously'), '', [
		SECTION_FOOTER_GENERAL => new Section(esc_html__('Footer', 'seriously'), '', [
			OPTION_FOOTER_DISPLAY        => new Field(esc_html__('Default footer for all pages', 'seriously'), null, 'builtin', 'wp:select', [
				'choices' => $footers
			]),
			OPTION_FOOTER_BG_COLOR       => new Field(esc_html__('Background color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_FOOTER_LINK_STYLE_STATIC => new Field(esc_html__('Default link style', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					'none'      => esc_html__('Undecorated', 'seriously'),
					'underline' => esc_html__('Underline', 'seriously'),
				]
			]),
			MOD_FOOTER_LINK_STYLE_HOVER  => new Field(esc_html__('Hover link style', 'seriously'), null, 'none', 'wp:select', [
				'choices' => [
					'none'      => esc_html__('Undecorated', 'seriously'),
					'underline' => esc_html__('Underline', 'seriously'),
				]
			]),
		]),
		SECTION_FOOTER_LS      => new Section(esc_html__('Light Scheme', 'seriously'), '', [
			MOD_LS_FOOTER_TEXT_COLOR                => new Field(esc_html__('Text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_FOOTER_LINK_COLOR                => new Field(esc_html__('Links color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_FOOTER_LINK_STYLING_COLOR_STATIC => new Field(esc_html__('Link underline color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_FOOTER_LINK_COLOR_HOVER          => new Field(esc_html__('Links hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_FOOTER_LINK_STYLING_COLOR_HOVER  => new Field(esc_html__('Link underline hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_LS_FOOTER_HEADINGS_COLOR            => new Field(esc_html__('Headings color', 'seriously'), null, null, CONTROL_COLOR),
		]),
		SECTION_FOOTER_DS      => new Section(esc_html__('Dark Scheme', 'seriously'), '', [
			MOD_DS_FOOTER_TEXT_COLOR                => new Field(esc_html__('Text color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_FOOTER_LINK_COLOR                => new Field(esc_html__('Links color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_FOOTER_LINK_STYLING_COLOR_STATIC => new Field(esc_html__('Link underline color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_FOOTER_LINK_COLOR_HOVER          => new Field(esc_html__('Links hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_FOOTER_LINK_STYLING_COLOR_HOVER  => new Field(esc_html__('Link underline hover color', 'seriously'), null, null, CONTROL_COLOR),
			MOD_DS_FOOTER_HEADINGS_COLOR            => new Field(esc_html__('Headings color', 'seriously'), null, null, CONTROL_COLOR),
		]),
	], null, 130),
];

$customizer = new Customizer($custom);
$customizer->register();
