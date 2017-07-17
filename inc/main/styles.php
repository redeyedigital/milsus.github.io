<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;
use Openmarco\Seriously\Html\Breakpoints;
use Openmarco\Seriously\Html\CssWriter;
use Openmarco\Seriously\Html\Helpers;
use Openmarco\Seriously\Service\Option;
use Openmarco\Seriously\Service\Page;

require_once __DIR__ . '/styles/content-blocks.php';
require_once __DIR__ . '/styles/main.php';
require_once __DIR__ . '/styles/navbar.php';
require_once __DIR__ . '/styles/posts.php';

add_action(ACTION_WP_HEAD, function () {
	$id = Page::getCurrentId();
	
	$css    = CssWriter::init();
	$styles = '';
	
	// TYPE
	// ====
	
	$css->set('body', 'background', Option::get($id, OPTION_BODY_BG_COLOR));
	
	$css->extend(mixinType(
		Customizer::get(MOD_LS_TEXT_COLOR),
		Customizer::get(MOD_LS_LINK_COLOR),
		Customizer::get(MOD_LS_LINK_COLOR_HOVER),
		Customizer::get(MOD_LS_HEADINGS_COLOR)
	))->extend(mixinType(
		Customizer::get(MOD_DS_TEXT_COLOR),
		Customizer::get(MOD_DS_LINK_COLOR),
		Customizer::get(MOD_DS_LINK_COLOR_HOVER),
		Customizer::get(MOD_DS_HEADINGS_COLOR),
		true
	));
	
	$css->extend(mixinLinkUnderline(
		'.entry-content',
		Customizer::get(MOD_LINK_STYLE_STATIC),
		Customizer::get(MOD_LINK_STYLE_HOVER)
	))->extend(mixinLinkUnderlineColor(
		'.entry-content',
		Customizer::get(MOD_LINK_STYLE_STATIC),
		Customizer::get(MOD_LS_LINK_STYLING_COLOR_STATIC),
		Customizer::get(MOD_LINK_STYLE_HOVER),
		Customizer::get(MOD_LS_LINK_STYLING_COLOR_HOVER)
	))->extend(mixinLinkUnderlineColor(
		'.entry-content',
		Customizer::get(MOD_LINK_STYLE_STATIC),
		Customizer::get(MOD_DS_LINK_STYLING_COLOR_STATIC),
		Customizer::get(MOD_LINK_STYLE_HOVER),
		Customizer::get(MOD_DS_LINK_STYLING_COLOR_HOVER),
		true
	));
	
	$css->extend(mixinLinkUnderline(
		'.entry-summary',
		Customizer::get(MOD_LINK_STYLE_STATIC),
		Customizer::get(MOD_LINK_STYLE_HOVER)
	))->extend(mixinLinkUnderlineColor(
		'.entry-summary',
		Customizer::get(MOD_LINK_STYLE_STATIC),
		Customizer::get(MOD_LS_LINK_STYLING_COLOR_STATIC),
		Customizer::get(MOD_LINK_STYLE_HOVER),
		Customizer::get(MOD_LS_LINK_STYLING_COLOR_HOVER)
	))->extend(mixinLinkUnderlineColor(
		'.entry-summary',
		Customizer::get(MOD_LINK_STYLE_STATIC),
		Customizer::get(MOD_DS_LINK_STYLING_COLOR_STATIC),
		Customizer::get(MOD_LINK_STYLE_HOVER),
		Customizer::get(MOD_DS_LINK_STYLING_COLOR_HOVER),
		true
	));
	
	$css->set(['::-moz-selection', '::selection'], [
		'background' => Customizer::get(MOD_SELECTION_BG_COLOR),
		'color'      => Customizer::get(MOD_SELECTION_COLOR)
	]);
	
	$styles .= (string)$css;
	$css->clear();
	
	// FORMS
	// =====
	
	$css->extend(mixinForms(
		Customizer::get(MOD_FORM_CONTROL_BORDER_WIDTH),
		Customizer::get(MOD_FORM_CONTROL_BORDER_RADIUS),
		Customizer::get(MOD_LS_FORM_CONTROL_BG_COLOR),
		Customizer::get(MOD_LS_FORM_CONTROL_BORDER_COLOR),
		Customizer::get(MOD_LS_FORM_CONTROL_SHADOW),
		Customizer::get(MOD_LS_FORM_CONTROL_COLOR),
		Customizer::get(MOD_LS_FORM_CONTROL_BG_COLOR_FOCUS),
		Customizer::get(MOD_LS_FORM_CONTROL_BORDER_COLOR_FOCUS),
		Customizer::get(MOD_LS_FORM_CONTROL_SHADOW_FOCUS),
		Customizer::get(MOD_LS_FORM_CONTROL_COLOR_FOCUS),
		Customizer::get(MOD_LS_FORM_CONTROL_PLACEHOLDER),
		Customizer::get(MOD_LS_FORM_CONTROL_PLACEHOLDER_FOCUS)
	))->extend(mixinForms(
		Customizer::get(MOD_FORM_CONTROL_BORDER_WIDTH),
		Customizer::get(MOD_FORM_CONTROL_BORDER_RADIUS),
		Customizer::get(MOD_DS_FORM_CONTROL_BG_COLOR),
		Customizer::get(MOD_DS_FORM_CONTROL_BORDER_COLOR),
		Customizer::get(MOD_DS_FORM_CONTROL_SHADOW),
		Customizer::get(MOD_DS_FORM_CONTROL_COLOR),
		Customizer::get(MOD_DS_FORM_CONTROL_BG_COLOR_FOCUS),
		Customizer::get(MOD_DS_FORM_CONTROL_BORDER_COLOR_FOCUS),
		Customizer::get(MOD_DS_FORM_CONTROL_SHADOW_FOCUS),
		Customizer::get(MOD_DS_FORM_CONTROL_COLOR_FOCUS),
		Customizer::get(MOD_DS_FORM_CONTROL_PLACEHOLDER),
		Customizer::get(MOD_DS_FORM_CONTROL_PLACEHOLDER_FOCUS),
		true
	))->extend(mixinFormsSelect2(
		Customizer::get(MOD_FORM_CONTROL_BORDER_WIDTH),
		Customizer::get(MOD_FORM_CONTROL_BORDER_RADIUS)
	))->extend(mixinFormsSelect2Colors(
		Customizer::get(MOD_LS_FORM_CONTROL_BG_COLOR),
		Customizer::get(MOD_LS_FORM_CONTROL_BORDER_COLOR),
		Customizer::get(MOD_LS_FORM_CONTROL_SHADOW),
		Customizer::get(MOD_LS_FORM_CONTROL_COLOR),
		Customizer::get(MOD_LS_FORM_CONTROL_BG_COLOR_FOCUS),
		Customizer::get(MOD_LS_FORM_CONTROL_BORDER_COLOR_FOCUS),
		Customizer::get(MOD_LS_FORM_CONTROL_SHADOW_FOCUS),
		Customizer::get(MOD_LS_FORM_CONTROL_COLOR_FOCUS),
		Customizer::get(MOD_LS_FORM_CONTROL_PLACEHOLDER),
		Customizer::get(MOD_LS_FORM_CONTROL_PLACEHOLDER_FOCUS),
		Customizer::get(MOD_LS_FORM_CONTROL_ACCENT)
	))->extend(mixinFormsSelect2Colors(
		Customizer::get(MOD_DS_FORM_CONTROL_BG_COLOR),
		Customizer::get(MOD_DS_FORM_CONTROL_BORDER_COLOR),
		Customizer::get(MOD_DS_FORM_CONTROL_SHADOW),
		Customizer::get(MOD_DS_FORM_CONTROL_COLOR),
		Customizer::get(MOD_DS_FORM_CONTROL_BG_COLOR_FOCUS),
		Customizer::get(MOD_DS_FORM_CONTROL_BORDER_COLOR_FOCUS),
		Customizer::get(MOD_DS_FORM_CONTROL_SHADOW_FOCUS),
		Customizer::get(MOD_DS_FORM_CONTROL_COLOR_FOCUS),
		Customizer::get(MOD_DS_FORM_CONTROL_PLACEHOLDER),
		Customizer::get(MOD_DS_FORM_CONTROL_PLACEHOLDER_FOCUS),
		Customizer::get(MOD_DS_FORM_CONTROL_ACCENT),
		true
	));
	
	$styles .= (string)$css;
	$css->clear();
	
	// BUTTONS
	// =======
	
	$css->extend(mixinButtons(
		Customizer::get(MOD_LS_BTN_PRIMARY_COLOR),
		Customizer::get(MOD_LS_BTN_PRIMARY_BORDER_COLOR),
		Customizer::get(MOD_LS_BTN_PRIMARY_BG_COLOR),
		Customizer::get(MOD_LS_BTN_PRIMARY_COLOR_HOVER),
		Customizer::get(MOD_LS_BTN_PRIMARY_BORDER_COLOR_HOVER),
		Customizer::get(MOD_LS_BTN_PRIMARY_BG_COLOR_HOVER),
		Customizer::get(MOD_LS_BTN_PRIMARY_COLOR_CURRENT),
		Customizer::get(MOD_LS_BTN_PRIMARY_BORDER_COLOR_CURRENT),
		Customizer::get(MOD_LS_BTN_PRIMARY_BG_COLOR_CURRENT),
		'primary'
	))->extend(mixinButtons(
		Customizer::get(MOD_DS_BTN_PRIMARY_BG_COLOR),
		Customizer::get(MOD_DS_BTN_PRIMARY_BORDER_COLOR),
		Customizer::get(MOD_DS_BTN_PRIMARY_COLOR),
		Customizer::get(MOD_DS_BTN_PRIMARY_BG_COLOR_HOVER),
		Customizer::get(MOD_DS_BTN_PRIMARY_BORDER_COLOR_HOVER),
		Customizer::get(MOD_DS_BTN_PRIMARY_COLOR_HOVER),
		Customizer::get(MOD_DS_BTN_PRIMARY_BG_COLOR_CURRENT),
		Customizer::get(MOD_DS_BTN_PRIMARY_BORDER_COLOR_CURRENT),
		Customizer::get(MOD_DS_BTN_PRIMARY_COLOR_CURRENT),
		'primary', true
	))->extend(mixinButtons(
		Customizer::get(MOD_LS_BTN_SECONDARY_COLOR),
		Customizer::get(MOD_LS_BTN_SECONDARY_BORDER_COLOR),
		Customizer::get(MOD_LS_BTN_SECONDARY_BG_COLOR),
		Customizer::get(MOD_LS_BTN_SECONDARY_COLOR_HOVER),
		Customizer::get(MOD_LS_BTN_SECONDARY_BORDER_COLOR_HOVER),
		Customizer::get(MOD_LS_BTN_SECONDARY_BG_COLOR_HOVER),
		Customizer::get(MOD_LS_BTN_SECONDARY_COLOR_CURRENT),
		Customizer::get(MOD_LS_BTN_SECONDARY_BORDER_COLOR_CURRENT),
		Customizer::get(MOD_LS_BTN_SECONDARY_BG_COLOR_CURRENT),
		'secondary'
	))->extend(mixinButtons(
		Customizer::get(MOD_DS_BTN_SECONDARY_BG_COLOR),
		Customizer::get(MOD_DS_BTN_SECONDARY_BORDER_COLOR),
		Customizer::get(MOD_DS_BTN_SECONDARY_COLOR),
		Customizer::get(MOD_DS_BTN_SECONDARY_BG_COLOR_HOVER),
		Customizer::get(MOD_DS_BTN_SECONDARY_BORDER_COLOR_HOVER),
		Customizer::get(MOD_DS_BTN_SECONDARY_COLOR_HOVER),
		Customizer::get(MOD_DS_BTN_SECONDARY_BG_COLOR_CURRENT),
		Customizer::get(MOD_DS_BTN_SECONDARY_BORDER_COLOR_CURRENT),
		Customizer::get(MOD_DS_BTN_SECONDARY_COLOR_CURRENT),
		'secondary', true
	))->extend(mixinButtonsSizes(
		Customizer::get(MOD_BTN_BORDER_WIDTH),
		Customizer::get(MOD_BTN_BORDER_RADIUS)
	));
	
	$styles .= (string)$css;
	$css->clear();
	
	// SPLASH
	// ======
	$css->set('.splash', 'background-color', Customizer::get(MOD_SPLASH_BG_COLOR))
	    ->set('.splash:before', [
		    'display'          => Customizer::get(MOD_SPLASH_PROGRESS_BAR_ENABLED) ? null : 'none',
		    'height'           => ($value = Customizer::get(MOD_SPLASH_PROGRESS_BAR_HEIGHT)) ? "{$value}px" : null,
		    'background-color' => Customizer::get(MOD_SPLASH_PROGRESS_BAR_COLOR)
	    ])
	    ->set([
		    '.splash .ball-pulse .ball',
		    '.splash .ball-pulse-double .ball-1',
		    '.splash .ball-pulse-double .ball-2',
		    '.splash .wave .css-loader > div',
		    '.splash .wave-spread .css-loader > div',
		    '.splash .square-split .css-loader > div:after',
		    '.splash .square-rotate-3d .css-loader .square'
	    ], 'background-color', Customizer::get(MOD_SPLASH_ICON_COLOR))
	    ->set([
		    '.circle-pulse .css-loader > div',
		    '.circle-pulse-multiple .css-loader > div',
		    '.arc-rotate2 .css-loader .arc:before',
		    '.arc-scale .css-loader .arc'
	    ], 'border-color', Customizer::get(MOD_SPLASH_ICON_COLOR))
	    ->set([
		    '.arc-rotate-double .css-loader > div',
		    '.arc-rotate .css-loader .arc'
	    ], 'border-right-color', Customizer::get(MOD_SPLASH_ICON_COLOR))
	    ->set([
		    '.arc-rotate-double .css-loader > div',
		    '.arc-rotate .css-loader .arc'
	    ], 'border-left-color', Customizer::get(MOD_SPLASH_ICON_COLOR))
	    ->set([
		    '.arc-rotate .css-loader .arc',
		    '.arc-rotate2 .css-loader .arc:after'
	    ], 'border-bottom-color', Customizer::get(MOD_SPLASH_ICON_COLOR))
	    ->set([
		    '.splash .arc-scale .css-loader .arc:before',
		    '.splash .arc-scale .css-loader .arc:after',
	    ], 'background-color', Customizer::get(MOD_SPLASH_BG_COLOR));
	
	$styles .= (string)$css;
	$css->clear();
	
	// PAGINATION
	// ==========
	
	$css->extend(mixinPagination(
		Customizer::get(MOD_LS_PAGINATION_NUM_COLOR),
		Customizer::get(MOD_LS_PAGINATION_NUM_BG_COLOR),
		Customizer::get(MOD_LS_PAGINATION_NUM_BORDER_COLOR),
		Customizer::get(MOD_LS_PAGINATION_NUM_COLOR_HOVER),
		Customizer::get(MOD_LS_PAGINATION_NUM_BG_COLOR_HOVER),
		Customizer::get(MOD_LS_PAGINATION_NUM_BORDER_COLOR_HOVER),
		Customizer::get(MOD_LS_PAGINATION_NUM_COLOR_CURRENT),
		Customizer::get(MOD_LS_PAGINATION_NUM_BG_COLOR_CURRENT),
		Customizer::get(MOD_LS_PAGINATION_NUM_BORDER_COLOR_CURRENT),
		Customizer::get(MOD_LS_PAGINATION_PREVNEXT_TEXT_COLOR),
		Customizer::get(MOD_LS_PAGINATION_PREVNEXT_TEXT_COLOR_HOVER)
	))->extend(mixinPagination(
		Customizer::get(MOD_DS_PAGINATION_NUM_COLOR),
		Customizer::get(MOD_DS_PAGINATION_NUM_BG_COLOR),
		Customizer::get(MOD_DS_PAGINATION_NUM_BORDER_COLOR),
		Customizer::get(MOD_DS_PAGINATION_NUM_COLOR_HOVER),
		Customizer::get(MOD_DS_PAGINATION_NUM_BG_COLOR_HOVER),
		Customizer::get(MOD_DS_PAGINATION_NUM_BORDER_COLOR_HOVER),
		Customizer::get(MOD_DS_PAGINATION_NUM_COLOR_CURRENT),
		Customizer::get(MOD_DS_PAGINATION_NUM_BG_COLOR_CURRENT),
		Customizer::get(MOD_DS_PAGINATION_NUM_BORDER_COLOR_CURRENT),
		Customizer::get(MOD_DS_PAGINATION_PREVNEXT_TEXT_COLOR),
		Customizer::get(MOD_DS_PAGINATION_PREVNEXT_TEXT_COLOR_HOVER),
		true
	));
	
	$styles .= (string)$css;
	$css->clear();
	
	// POSTS
	// =====
	
	$css->extend(mixinPosts(
		Customizer::get(MOD_LS_POSTS_PAGE_TITLE_COLOR),
		Customizer::get(MOD_LS_POSTS_PAGE_TITLE_COLOR_HOVER),
		Customizer::get(MOD_LS_POSTS_PAGE_POST_SEPARATOR_COLOR)
	))->extend(mixinPosts(
		Customizer::get(MOD_DS_POSTS_PAGE_TITLE_COLOR),
		Customizer::get(MOD_DS_POSTS_PAGE_TITLE_COLOR_HOVER),
		Customizer::get(MOD_DS_POSTS_PAGE_POST_SEPARATOR_COLOR),
		true
	))->extend(mixinPostsTerms(
		Customizer::get(MOD_LS_POSTS_PAGE_TERM_TEXT_COLOR),
		Customizer::get(MOD_LS_POSTS_PAGE_TERM_BG_COLOR),
		Customizer::get(MOD_LS_POSTS_PAGE_TERM_BORDER_COLOR),
		Customizer::get(MOD_LS_POSTS_PAGE_TERM_TEXT_HOVER_COLOR),
		Customizer::get(MOD_LS_POSTS_PAGE_TERM_BG_HOVER_COLOR),
		Customizer::get(MOD_LS_POSTS_PAGE_TERM_BORDER_HOVER_COLOR)
	))->extend(mixinPostsTerms(
		Customizer::get(MOD_DS_POSTS_PAGE_TERM_TEXT_COLOR),
		Customizer::get(MOD_DS_POSTS_PAGE_TERM_BG_COLOR),
		Customizer::get(MOD_DS_POSTS_PAGE_TERM_BORDER_COLOR),
		Customizer::get(MOD_DS_POSTS_PAGE_TERM_TEXT_HOVER_COLOR),
		Customizer::get(MOD_DS_POSTS_PAGE_TERM_BG_HOVER_COLOR),
		Customizer::get(MOD_DS_POSTS_PAGE_TERM_BORDER_HOVER_COLOR),
		true
	));
	
	$styles .= (string)$css;
	$css->clear();
	
	// POSTS TOP BAR
	// =============
	
	$css->extend(mixinPostsTopBar(
		Customizer::get(MOD_LS_POSTS_TOP_BAR_BG_COLOR),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_BORDER_TOP_COLOR),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_BORDER_BOTTOM_COLOR),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_SHADOW_TOP_COLOR),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_SHADOW_BOTTOM_COLOR)
	))->extend(mixinPostsTopBar(
		Customizer::get(MOD_DS_POSTS_TOP_BAR_BG_COLOR),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_BORDER_TOP_COLOR),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_BORDER_BOTTOM_COLOR),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_SHADOW_TOP_COLOR),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_SHADOW_BOTTOM_COLOR), true
	))->extend(mixinPostsTopBarTerms(
		Customizer::get(MOD_LS_POSTS_TOP_BAR_ITEM_COLOR),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_ITEM_BORDER_COLOR),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_ITEM_BG_COLOR),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_ITEM_COLOR_HOVER),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_HOVER),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_ITEM_BG_COLOR_HOVER),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_ITEM_COLOR_CURRENT),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_CURRENT),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_ITEM_BG_COLOR_CURRENT)
	))->extend(mixinPostsTopBarTerms(
		Customizer::get(MOD_DS_POSTS_TOP_BAR_ITEM_COLOR),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_ITEM_BORDER_COLOR),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_ITEM_BG_COLOR),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_ITEM_COLOR_HOVER),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_HOVER),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_ITEM_BG_COLOR_HOVER),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_ITEM_COLOR_CURRENT),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_CURRENT),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_ITEM_BG_COLOR_CURRENT), true
	))->extend(mixinPostsTopBarSearch(
		Customizer::get(MOD_LS_POSTS_TOP_BAR_SEARCH_BG_COLOR),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_SEARCH_ICON_COLOR),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_SEARCH_BG_COLOR_FOCUS),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR_FOCUS),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR_FOCUS),
		Customizer::get(MOD_LS_POSTS_TOP_BAR_SEARCH_ICON_COLOR_FOCUS)
	))->extend(mixinPostsTopBarSearch(
		Customizer::get(MOD_DS_POSTS_TOP_BAR_SEARCH_BG_COLOR),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_SEARCH_ICON_COLOR),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_SEARCH_BG_COLOR_FOCUS),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR_FOCUS),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR_FOCUS),
		Customizer::get(MOD_DS_POSTS_TOP_BAR_SEARCH_ICON_COLOR_FOCUS), true
	));
	
	$styles .= (string)$css;
	$css->clear();
	
	// POSTS SIDEBAR
	// =============
	
	$css->extend(mixinPostsSideBar(
		Customizer::get(MOD_POSTS_SIDEBAR_WIDGET_V_PADDING),
		Customizer::get(MOD_POSTS_SIDEBAR_WIDGET_H_PADDING),
		Customizer::get(MOD_POSTS_SIDEBAR_BORDER_WIDTH),
		Customizer::get(MOD_POSTS_SIDEBAR_WIDGETS_SPACE)
	))->extend(mixinPostsSideBarScheme(
		Customizer::get(MOD_LS_POSTS_SIDEBAR_BORDER_COLOR),
		Customizer::get(MOD_POSTS_SIDEBAR_SHADOW_BLUR),
		Customizer::get(MOD_LS_POSTS_SIDEBAR_SHADOW_COLOR),
		Customizer::get(MOD_LS_POSTS_SIDEBAR_TEXT_COLOR),
		Customizer::get(MOD_LS_POSTS_SIDEBAR_BG_COLOR),
		Customizer::get(MOD_LS_POSTS_SIDEBAR_TITLE_COLOR),
		Customizer::get(MOD_LS_POSTS_SIDEBAR_LINK_COLOR),
		Customizer::get(MOD_LS_POSTS_SIDEBAR_LINK_HOVER_COLOR)
	))->extend(mixinPostsSideBarScheme(
		Customizer::get(MOD_DS_POSTS_SIDEBAR_BORDER_COLOR),
		Customizer::get(MOD_POSTS_SIDEBAR_SHADOW_BLUR),
		Customizer::get(MOD_DS_POSTS_SIDEBAR_SHADOW_COLOR),
		Customizer::get(MOD_DS_POSTS_SIDEBAR_TEXT_COLOR),
		Customizer::get(MOD_DS_POSTS_SIDEBAR_BG_COLOR),
		Customizer::get(MOD_DS_POSTS_SIDEBAR_TITLE_COLOR),
		Customizer::get(MOD_DS_POSTS_SIDEBAR_LINK_COLOR),
		Customizer::get(MOD_DS_POSTS_SIDEBAR_LINK_HOVER_COLOR), true
	));
	
	$css->extend(mixinLinkUnderline(
		'.posts-sidebar .widget',
		Customizer::get(MOD_POSTS_SIDEBAR_LINK_STYLE_STATIC),
		Customizer::get(MOD_POSTS_SIDEBAR_LINK_STYLE_HOVER)
	))->extend(mixinLinkUnderlineColor(
		'.posts-sidebar .widget',
		Customizer::get(MOD_POSTS_SIDEBAR_LINK_STYLE_STATIC),
		Customizer::get(MOD_LS_POSTS_SIDEBAR_LINK_STYLING_COLOR_STATIC),
		Customizer::get(MOD_POSTS_SIDEBAR_LINK_STYLE_HOVER),
		Customizer::get(MOD_LS_POSTS_SIDEBAR_LINK_STYLING_COLOR_HOVER)
	))->extend(mixinLinkUnderlineColor(
		'.posts-sidebar .widget',
		Customizer::get(MOD_POSTS_SIDEBAR_LINK_STYLE_STATIC),
		Customizer::get(MOD_DS_POSTS_SIDEBAR_LINK_STYLING_COLOR_STATIC),
		Customizer::get(MOD_POSTS_SIDEBAR_LINK_STYLE_HOVER),
		Customizer::get(MOD_DS_POSTS_SIDEBAR_LINK_STYLING_COLOR_HOVER),
		true
	));
	
	$styles .= (string)$css;
	$css->clear();
	
	// NAVBAR
	// ======
	
	$css->extend(mixinNavbar(
		Option::get($id, OPTION_NAVBAR_BG_COLOR),
		Option::get($id, OPTION_NAVBAR_BORDER_COLOR),
		Option::get($id, OPTION_NAVBAR_BORDER_WIDTH),
		Option::get($id, OPTION_NAVBAR_SHADOW_COLOR),
		Option::get($id, OPTION_NAVBAR_SHADOW_BLUR),
		Option::get($id, OPTION_NAVBAR_V_PADDING),
		Option::get($id, OPTION_NAVBAR_LOGO_HEIGHT),
		'.navbar-primary'
	))->extend(mixinNavbar(
		Option::get($id, OPTION_NAVBAR_SECONDARY_BG_COLOR),
		Option::get($id, OPTION_NAVBAR_SECONDARY_BORDER_COLOR),
		Option::get($id, OPTION_NAVBAR_SECONDARY_BORDER_WIDTH),
		Option::get($id, OPTION_NAVBAR_SECONDARY_SHADOW_COLOR),
		Option::get($id, OPTION_NAVBAR_SECONDARY_SHADOW_BLUR),
		Option::get($id, OPTION_NAVBAR_SECONDARY_V_PADDING),
		Option::get($id, OPTION_NAVBAR_SECONDARY_LOGO_HEIGHT),
		'.navbar-secondary'
	))->extend(mixinNavbarLogo(
		Customizer::get(MOD_NAVBAR_LOGO_TEXT_LEFT_SPACE),
		Customizer::get(MOD_NAVBAR_LOGO_RIGHT_SPACE)
	))->extend(mixinNavbarLogoColors(
		Option::get($id, OPTION_LS_NAVBAR_LOGO_TEXT_COLOR),
		Option::get($id, OPTION_LS_NAVBAR_LOGO_TEXT_COLOR_HOVER),
		false
	))->extend(mixinNavbarLogoColors(
		Option::get($id, OPTION_DS_NAVBAR_LOGO_TEXT_COLOR),
		Option::get($id, OPTION_DS_NAVBAR_LOGO_TEXT_COLOR_HOVER),
		false,
		true
	))->extend(mixinNavbarMenu(
		Customizer::get(MOD_NAVBAR_MENU_ITEMS_SPACE),
		Customizer::get(MOD_NAVBAR_SUBMENU_TOP_SPACE),
		Customizer::get(MOD_NAVBAR_SUBMENU_BORDER_RADIUS)
	))->extend(mixinNavbarMenuColors(
		Option::get($id, OPTION_LS_NAVBAR_MENU_ITEM_COLOR),
		Option::get($id, OPTION_LS_NAVBAR_MENU_ITEM_COLOR_HOVER),
		Option::get($id, OPTION_LS_NAVBAR_MENU_ITEM_COLOR_CURRENT),
		false
	))->extend(mixinNavbarMenuColors(
		Option::get($id, OPTION_DS_NAVBAR_MENU_ITEM_COLOR),
		Option::get($id, OPTION_DS_NAVBAR_MENU_ITEM_COLOR_HOVER),
		Option::get($id, OPTION_DS_NAVBAR_MENU_ITEM_COLOR_CURRENT),
		false,
		true
	))->extend(mixinNavbarSubMenuColors(
		Option::get($id, OPTION_LS_NAVBAR_SUBMENU_BG_COLOR),
		Option::get($id, OPTION_LS_NAVBAR_SUBMENU_BORDER_COLOR),
		Option::get($id, OPTION_LS_NAVBAR_SUBMENU_SHADOW_COLOR),
		Option::get($id, OPTION_LS_NAVBAR_SUBMENU_SHADOW_BLUR),
		false
	))->extend(mixinNavbarSubMenuColors(
		Option::get($id, OPTION_DS_NAVBAR_SUBMENU_BG_COLOR),
		Option::get($id, OPTION_DS_NAVBAR_SUBMENU_BORDER_COLOR),
		Option::get($id, OPTION_DS_NAVBAR_SUBMENU_SHADOW_COLOR),
		Option::get($id, OPTION_DS_NAVBAR_SUBMENU_SHADOW_BLUR),
		false,
		true
	))->extend(mixinNavbarSubMenuItemColors(
		Option::get($id, OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR),
		Option::get($id, OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR_HOVER),
		Option::get($id, OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR_CURRENT),
		false
	))->extend(mixinNavbarSubMenuItemColors(
		Option::get($id, OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR),
		Option::get($id, OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR_HOVER),
		Option::get($id, OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR_CURRENT),
		false,
		true
	))->extend(mixinNavbarMenuButtons(
		Option::get($id, OPTION_LS_NAVBAR_BTN_TEXT_COLOR),
		Option::get($id, OPTION_LS_NAVBAR_BTN_BG_COLOR),
		Option::get($id, OPTION_LS_NAVBAR_BTN_BORDER_COLOR),
		Option::get($id, OPTION_LS_NAVBAR_BTN_TEXT_COLOR_HOVER),
		Option::get($id, OPTION_LS_NAVBAR_BTN_BG_COLOR_HOVER),
		Option::get($id, OPTION_LS_NAVBAR_BTN_BORDER_COLOR_HOVER)
	))->extend(mixinNavbarMenuButtons(
		Option::get($id, OPTION_DS_NAVBAR_BTN_TEXT_COLOR),
		Option::get($id, OPTION_DS_NAVBAR_BTN_BG_COLOR),
		Option::get($id, OPTION_DS_NAVBAR_BTN_BORDER_COLOR),
		Option::get($id, OPTION_DS_NAVBAR_BTN_TEXT_COLOR_HOVER),
		Option::get($id, OPTION_DS_NAVBAR_BTN_BG_COLOR_HOVER),
		Option::get($id, OPTION_DS_NAVBAR_BTN_BORDER_COLOR_HOVER),
		true
	))->extend(mixinNavbarMenuButtonsSizes(
		Option::get($id, MOD_NAVBAR_BTN_BORDER_WIDTH),
		Option::get($id, MOD_NAVBAR_BTN_BORDER_RADIUS)
	));
	
	$styles .= '@media(min-width:' . Breakpoints::LG_MIN . 'px){' . (string)$css . '}';
	$css->clear();
	
	// NAVBAR MOBILE
	$css->extend(mixinNavbar(
		Option::get($id, OPTION_NAVBAR_M_BG_COLOR),
		Option::get($id, OPTION_NAVBAR_M_BORDER_COLOR),
		Option::get($id, OPTION_NAVBAR_M_BORDER_WIDTH),
		Option::get($id, OPTION_NAVBAR_M_SHADOW_COLOR),
		Option::get($id, OPTION_NAVBAR_M_SHADOW_BLUR),
		Option::get($id, OPTION_NAVBAR_M_V_PADDING),
		Option::get($id, OPTION_NAVBAR_M_LOGO_HEIGHT),
		null,
		true
	))->extend(mixinNavbarLogo(
		Customizer::get(MOD_NAVBAR_M_LOGO_TEXT_LEFT_SPACE),
		null
	))->extend(mixinNavbarLogoColors(
		Option::get($id, OPTION_LS_NAVBAR_M_LOGO_TEXT_COLOR),
		null,
		true
	))->extend(mixinNavbarLogoColors(
		Option::get($id, OPTION_DS_NAVBAR_M_LOGO_TEXT_COLOR),
		null,
		true,
		true
	))->extend(mixinNavbarToggle(
		Customizer::get(MOD_NAVBAR_M_TOGGLE_TEXT_RIGHT_SPACE),
		Option::get($id, OPTION_NAVBAR_M_LOGO_HEIGHT),
		Customizer::get(MOD_NAVBAR_M_VERTICAL_ITEMS_SPACE)
	))->extend(mixinNavbarToggleColors(
		Option::get($id, OPTION_LS_NAVBAR_M_TOGGLE_ICON_COLOR),
		Option::get($id, OPTION_LS_NAVBAR_M_TOGGLE_TEXT_COLOR)
	))->extend(mixinNavbarToggleColors(
		Option::get($id, OPTION_DS_NAVBAR_M_TOGGLE_ICON_COLOR),
		Option::get($id, OPTION_DS_NAVBAR_M_TOGGLE_TEXT_COLOR),
		true
	))->extend(mixinNavbarMenuColors(
		Option::get($id, OPTION_LS_NAVBAR_M_MENU_ITEM_COLOR),
		null,
		Option::get($id, OPTION_LS_NAVBAR_M_MENU_ITEM_COLOR_CURRENT),
		true
	))->extend(mixinNavbarMenuColors(
		Option::get($id, OPTION_DS_NAVBAR_M_MENU_ITEM_COLOR),
		null,
		Option::get($id, OPTION_DS_NAVBAR_M_MENU_ITEM_COLOR_CURRENT),
		true,
		true
	))->extend(mixinNavbarSubMenuItemColors(
		Option::get($id, OPTION_LS_NAVBAR_M_SUBMENU_ITEM_COLOR),
		null,
		Option::get($id, OPTION_LS_NAVBAR_M_SUBMENU_ITEM_COLOR_CURRENT),
		false
	))->extend(mixinNavbarSubMenuItemColors(
		Option::get($id, OPTION_DS_NAVBAR_M_SUBMENU_ITEM_COLOR),
		null,
		Option::get($id, OPTION_DS_NAVBAR_M_SUBMENU_ITEM_COLOR_CURRENT),
		false,
		true
	));
	
	$styles .= '@media(max-width:' . Breakpoints::MD_MAX . 'px){' . (string)$css . '}';
	$css->clear();
	
	// PAGE HEADER
	// ===========
	$css->extend(mixinPageHeader(
		Option::get($id, OPTION_HEADER_BG_COLOR),
		Customizer::get(MOD_LS_HEADER_HEADINGS_COLOR),
		Customizer::get(MOD_LS_HEADER_TEXT_COLOR),
		Customizer::get(MOD_LS_HEADER_LINK_COLOR),
		Customizer::get(MOD_LS_HEADER_LINK_COLOR_HOVER)
	))->extend(mixinPageHeader(
		Option::get($id, OPTION_HEADER_BG_COLOR),
		Customizer::get(MOD_DS_HEADER_HEADINGS_COLOR),
		Customizer::get(MOD_DS_HEADER_TEXT_COLOR),
		Customizer::get(MOD_DS_HEADER_LINK_COLOR),
		Customizer::get(MOD_DS_HEADER_LINK_COLOR_HOVER),
		true
	));
	
	$css->extend(mixinLinkUnderline(
		'.page-header',
		Customizer::get(MOD_HEADER_LINK_STYLE_STATIC),
		Customizer::get(MOD_HEADER_LINK_STYLE_HOVER)
	))->extend(mixinLinkUnderlineColor(
		'.page-header',
		Customizer::get(MOD_HEADER_LINK_STYLE_STATIC),
		Customizer::get(MOD_LS_HEADER_LINK_STYLING_COLOR_STATIC),
		Customizer::get(MOD_HEADER_LINK_STYLE_HOVER),
		Customizer::get(MOD_LS_HEADER_LINK_STYLING_COLOR_HOVER)
	))->extend(mixinLinkUnderlineColor(
		'.page-header',
		Customizer::get(MOD_HEADER_LINK_STYLE_STATIC),
		Customizer::get(MOD_DS_HEADER_LINK_STYLING_COLOR_STATIC),
		Customizer::get(MOD_HEADER_LINK_STYLE_HOVER),
		Customizer::get(MOD_DS_HEADER_LINK_STYLING_COLOR_HOVER),
		true
	));
	
	$styles .= (string)$css;
	$css->clear();
	
	// FOOTER
	// ======
	$css->extend(mixinFooter(
		Option::get($id, OPTION_FOOTER_BG_COLOR),
		Customizer::get(MOD_LS_FOOTER_HEADINGS_COLOR),
		Customizer::get(MOD_LS_FOOTER_TEXT_COLOR),
		Customizer::get(MOD_LS_FOOTER_LINK_COLOR),
		Customizer::get(MOD_LS_FOOTER_LINK_COLOR_HOVER)
	))->extend(mixinFooter(
		Option::get($id, OPTION_FOOTER_BG_COLOR),
		Customizer::get(MOD_DS_FOOTER_HEADINGS_COLOR),
		Customizer::get(MOD_DS_FOOTER_TEXT_COLOR),
		Customizer::get(MOD_DS_FOOTER_LINK_COLOR),
		Customizer::get(MOD_DS_FOOTER_LINK_COLOR_HOVER),
		true
	));
	
	$css->extend(mixinLinkUnderline(
		'.content-info',
		Customizer::get(MOD_FOOTER_LINK_STYLE_STATIC),
		Customizer::get(MOD_FOOTER_LINK_STYLE_HOVER)
	))->extend(mixinLinkUnderlineColor(
		'.content-info',
		Customizer::get(MOD_FOOTER_LINK_STYLE_STATIC),
		Customizer::get(MOD_LS_FOOTER_LINK_STYLING_COLOR_STATIC),
		Customizer::get(MOD_FOOTER_LINK_STYLE_HOVER),
		Customizer::get(MOD_LS_FOOTER_LINK_STYLING_COLOR_HOVER)
	))->extend(mixinLinkUnderlineColor(
		'.content-info',
		Customizer::get(MOD_FOOTER_LINK_STYLE_STATIC),
		Customizer::get(MOD_DS_FOOTER_LINK_STYLING_COLOR_STATIC),
		Customizer::get(MOD_FOOTER_LINK_STYLE_HOVER),
		Customizer::get(MOD_DS_FOOTER_LINK_STYLING_COLOR_HOVER),
		true
	));
	
	$styles .= (string)$css;
	$css->clear();
	
	$styles = apply_filters(FILTER_OMT_CUSTOM_STYLES, $styles);
	
	if ($styles) {
		echo '<style id="om-theme-custom-styles" type="text/css">', Helpers::sanitizeCSS($styles), '</style>';
	}
}, 100);
