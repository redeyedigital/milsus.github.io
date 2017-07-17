<?php

namespace Openmarco\Seriously\std;

// Actions & filters

//region WordPress Actions
const ACTION_WP_ADD_META_BOXES                     = 'add_meta_boxes';
const ACTION_WP_ADMIN_ENQUEUE_SCRIPTS              = 'admin_enqueue_scripts';
const ACTION_WP_ADMIN_NOTICES                      = 'admin_notices';
const ACTION_WP_AFTER_SETUP_THEME                  = 'after_setup_theme';
const ACTION_WP_COMMENT_FORM                       = 'comment_form';
const ACTION_WP_COMMENT_FORM_TOP                   = 'comment_form_top';
const ACTION_WP_CUSTOMIZE_CONTROLS_ENQUEUE_SCRIPTS = 'customize_controls_enqueue_scripts';
const ACTION_WP_CUSTOMIZE_CONTROLS_PRINT_STYLES    = 'customize_controls_print_styles';
const ACTION_WP_CUSTOMIZE_REGISTER                 = 'customize_register';
const ACTION_WP_ENQUEUE_SCRIPTS                    = 'wp_enqueue_scripts';
const ACTION_WP_HEAD                               = 'wp_head';
const ACTION_WP_INIT                               = 'init';
const ACTION_WP_SAVE_POST                          = 'save_post';
const ACTION_WP_UPDATE_NAV_MENU_ITEM               = 'wp_update_nav_menu_item';
const ACTION_WP_WIDGETS_INIT                       = 'widgets_init';
//endregion
//region Theme Actions
const ACTION_OMT_BEFORE_CONTENT     = 'omt_before_content';
const ACTION_OMT_AFTER_CONTENT      = 'omt_after_content';
const ACTION_OMT_BEFORE_SPLASH      = 'omt_before_splash';
const ACTION_OMT_AFTER_SPLASH       = 'omt_after_splash';
const ACTION_OMT_BEFORE_NAVIGATION  = 'omt_before_navigation';
const ACTION_OMT_AFTER_NAVIGATION   = 'omt_after_navigation';
const ACTION_OMT_PAGE_HEADER        = 'omt_page_header';
const ACTION_OMT_BEFORE_PAGE_HEADER = 'omt_before_page_header';
const ACTION_OMT_AFTER_PAGE_HEADER  = 'omt_after_page_header';
const ACTION_OMT_BEFORE_COMMENTS    = 'omt_before_comments';
const ACTION_OMT_AFTER_COMMENTS     = 'omt_after_comments';
const ACTION_OMT_BEFORE_FOOTER      = 'omt_before_footer';
const ACTION_OMT_AFTER_FOOTER       = 'omt_after_footer';
//endregion
//region Theme Config Actions
const ACTION_OMT_PUBLIC_ASSETS    = 'omt_public_assets';
const ACTION_OMT_DASHBOARD_ASSETS = 'omt_dashboard_assets';
const ACTION_OMT_DESKTOP          = 'omt_desktop';
const ACTION_OMT_META             = 'omt_meta';
const ACTION_OMT_NAVIGATION       = 'omt_navigation';
//endregion
//region Visual Composer Actions
const ACTION_VC_AFTER_INIT  = 'vc_after_init';
const ACTION_VC_BEFORE_INIT = 'vc_before_init';
//endregion
//region TGMPA Actions
const ACTION_TGMPA_REGISTER = 'tgmpa_register';
//endregion
//region Creative Content Blocks Actions
const ACTION_OMP_CREATIVE_FOOTER      = 'omp_content_blocks_footer';
const ACTION_OMP_CREATIVE_PAGE_HEADER = 'omp_content_blocks_page_header';
//endregion

//region WordPress Filters
const FILTER_WP_BODY_CLASS                  = 'body_class';
const FILTER_WP_COMMENT_FORM_DEFAULTS       = 'comment_form_defaults';
const FILTER_WP_COMMENT_FORM_DEFAULT_FIELDS = 'comment_form_default_fields';
const FILTER_WP_COMMENT_REPLY_LINK          = 'comment_reply_link';
const FILTER_WP_EDIT_COMMENT_LINK           = 'edit_comment_link';
const FILTER_WP_EDIT_NAV_MENU_WALKER        = 'wp_edit_nav_menu_walker';
const FILTER_WP_EXCERPT_MORE                = 'excerpt_more';
const FILTER_WP_GET_AVATAR                  = 'get_avatar';
const FILTER_WP_NAV_MENU_ITEMS              = 'wp_nav_menu_items';
const FILTER_WP_NAV_MENU_ITEM_TITLE         = 'nav_menu_item_title';
const FILTER_WP_NAV_MENU_LINK_ATTRIBUTES    = 'nav_menu_link_attributes';
const FILTER_WP_TEMPLATE_INCLUDE            = 'template_include';
const FILTER_WP_THE_CONTENT_MORE_LINK       = 'the_content_more_link';
const FILTER_WP_THE_PASSWORD_FORM           = 'the_password_form';
const FILTER_WP_THE_PERMALINK               = 'the_permalink';
const FILTER_WP_TINY_MCE_BEFORE_INIT        = 'tiny_mce_before_init';
const FILTER_WP_UPLOAD_MIMES                = 'upload_mimes';
//endregion
//region Theme Filters
const FILTER_OMT_ADMIN_TGMPA_PLUGINS           = 'omt_admin_tgmpa_plugins';
const FILTER_OMT_ARROW_LEFT                    = 'omt_arrow_left';
const FILTER_OMT_ARROW_RIGHT                   = 'omt_arrow_right';
const FILTER_OMT_COMMENT_FORM_LABEL            = 'omt_comment_form_label';
const FILTER_OMT_CONTENT_FOOTER_TYPE           = 'omt_content_footer_type';
const FILTER_OMT_CONTENT_HEADER_TYPE           = 'omt_content_header_type';
const FILTER_OMT_CUSTOM_STYLES                 = 'omt_custom_styles';
const FILTER_OMT_GLOBAL_PAGINATION_SETTINGS    = 'omt_global_pagination_settings';
const FILTER_OMT_NAVBAR_ATTRIBUTES             = 'omt_navbar_attributes';
const FILTER_OMT_NAVBAR_CLASSES                = 'omt_navbar_classes';
const FILTER_OMT_NAV_MENU_ITEM_STYLES          = 'omt_nav_menu_item_styles';
const FILTER_OMT_NAV_MENU_ITEM_TITLE_LINK_ICON = 'omt_nav_menu_item_title_link_icon';
const FILTER_OMT_NEXT_COMMENTS_LINK_LABEL      = 'omt_next_comments_link_label';
const FILTER_OMT_PREV_COMMENTS_LINK_LABEL      = 'omt_prev_comments_link_label';
const FILTER_OMT_NEXT_POSTS_CLASSES            = 'omt_next_posts_classes';
const FILTER_OMT_PREV_POSTS_CLASSES            = 'omt_prev_posts_classes';
const FILTER_OMT_NEXT_POSTS_LINK_LABEL         = 'omt_next_posts_link_label';
const FILTER_OMT_PREV_POSTS_LINK_LABEL         = 'omt_prev_posts_link_label';
const FILTER_OMT_PHP_VERSION_ERROR             = 'omt_php_version_error';
const FILTER_OMT_SPLASH_ICON                   = 'omt_splash_icon';
const FILTER_OMT_WALKER_NAV_MENU_EDIT_FIELDS   = 'omt_walker_nav_menu_edit_fields';
//endregion
//region Creative Content Blocks Filters
const FILTER_OMP_CONTENT_BLOCKS_POSTS = 'omp_content_blocks_posts';
//endregion
//region Visual Composer Filters
const FILTER_VC_ICONPICKER_TYPE_ = 'vc_iconpicker-type-';
const FILTER_VC_SHORTCODE_OUTPUT = 'vc_shortcode_output';
//endregion
//region Contact Form 7 Filters
const FILTER_WPCF7_AJAX_LOADER = 'wpcf7_ajax_loader';
//endregion
//region Ninja Forms Filters
const FILTER_NINJA_FORMS_FIELD_LOAD_SETTINGS = 'ninja_forms_field_load_settings';
//endregion

// Taxonomies
const TAX_POST_CATEGORY = 'category';
const TAX_POST_TAG      = 'post_tag';

// CSS

const CSS_BTN_PADDING_X    = 16;
const CSS_BTN_PADDING_Y    = 8;
const CSS_BTN_PADDING_X_SM = 8;
const CSS_BTN_PADDING_Y_SM = 4;
const CSS_BTN_PADDING_X_LG = 24;
const CSS_BTN_PADDING_Y_LG = 12;

/* WordPress Panels */

const WP_PANEL_MENUS = 'nav_menus';

/* Panels and Sections. */

const PANEL_MAIN                 = 'omt_main';
const SECTION_MAIN_GENERAL       = 'omt_main_general';
const SECTION_MAIN_LS            = 'omt_main_ls';
const SECTION_MAIN_DS            = 'omt_main_ds';
const SECTION_SPLASH             = 'omt_splash';
const SECTION_FORMS_GENERAL      = 'omt_forms_general';
const SECTION_FORMS_LS           = 'omt_forms_ls';
const SECTION_FORMS_DS           = 'omt_forms_ds';
const SECTION_BUTTONS_GENERAL    = 'omt_buttons_general';
const SECTION_BUTTONS_LS         = 'omt_buttons_ls';
const SECTION_BUTTONS_DS         = 'omt_buttons_ds';
const SECTION_PAGINATION_GENERAL = 'omt_pagination_general';
const SECTION_PAGINATION_LS      = 'omt_pagination_section_ls';
const SECTION_PAGINATION_DS      = 'omt_pagination_section_ds';

const PANEL_POSTS                   = 'omt_posts';
const SECTION_POSTS_GENERAL         = 'omt_posts_general';
const SECTION_POSTS_LS              = 'omt_posts_ls';
const SECTION_POSTS_DS              = 'omt_posts_ds';
const SECTION_POSTS_TOP_BAR_GENERAL = 'omt_posts_top_bar_general';
const SECTION_POSTS_TOP_BAR_LS      = 'omt_posts_top_bar_ls';
const SECTION_POSTS_TOP_BAR_DS      = 'omt_posts_top_bar_ds';
const SECTION_POSTS_SIDEBAR_GENERAL = 'omt_posts_sidebar_general';
const SECTION_POSTS_SIDEBAR_LS      = 'omt_posts_sidebar_ls';
const SECTION_POSTS_SIDEBAR_DS      = 'omt_posts_sidebar_ds';
const SECTION_POSTS_SINGLE          = 'omt_posts_single';

const PANEL_HEADER           = 'omt_header';
const SECTION_HEADER_GENERAL = 'omt_header_general';
const SECTION_HEADER_LS      = 'omt_header_ls';
const SECTION_HEADER_DS      = 'omt_header_ds';

const PANEL_FOOTER           = 'omt_footer';
const SECTION_FOOTER_GENERAL = 'omt_footer_general';
const SECTION_FOOTER_LS      = 'omt_footer_ls';
const SECTION_FOOTER_DS      = 'omt_footer_ds';

// WP_PANEL_MENUS
const SECTION_NAVBAR_GENERAL        = 'omt_navbar_general';
const SECTION_NAVBAR_SECONDARY      = 'omt_navbar_secondary';
const SECTION_NAVBAR_LS             = 'omt_navbar_ls';
const SECTION_NAVBAR_DS             = 'omt_navbar_ds';
const SECTION_NAVBAR_MOBILE_GENERAL = 'omt_navbar_mobile_general';
const SECTION_NAVBAR_MOBILE_LS      = 'omt_navbar_mobile_ls';
const SECTION_NAVBAR_MOBILE_DS      = 'omt_navbar_mobile_ds';

/* Theme modifications. */

//region Main
const OPTION_BODY_BG_COLOR   = 'omt_body_bg_color';
const MOD_SELECTION_BG_COLOR = 'omt_selection_bg_color';
const MOD_SELECTION_COLOR    = 'omt_selection_color';
const MOD_LINK_STYLE_STATIC  = 'omt_link_style_static';
const MOD_LINK_STYLE_HOVER   = 'omt_link_style_hover';
const MOD_ARROWS_TYPE        = 'omt_arrows_type';

const MOD_LS_TEXT_COLOR                = 'omt_ls_text_color';
const MOD_LS_LINK_COLOR                = 'omt_ls_link_color';
const MOD_LS_LINK_STYLING_COLOR_STATIC = 'omt_ls_link_styling_color_static';
const MOD_LS_LINK_COLOR_HOVER          = 'omt_ls_link_color_hover';
const MOD_LS_LINK_STYLING_COLOR_HOVER  = 'omt_ls_link_styling_color_hover';
const MOD_LS_HEADINGS_COLOR            = 'omt_ls_headings_color';

const MOD_DS_TEXT_COLOR                = 'omt_ds_text_color';
const MOD_DS_LINK_COLOR                = 'omt_ds_link_color';
const MOD_DS_LINK_STYLING_COLOR_STATIC = 'omt_ds_link_styling_color_static';
const MOD_DS_LINK_COLOR_HOVER          = 'omt_ds_link_color_hover';
const MOD_DS_LINK_STYLING_COLOR_HOVER  = 'omt_ds_link_styling_color_hover';
const MOD_DS_HEADINGS_COLOR            = 'omt_ds_headings_color';
//endregion Main
//region Splash
const MOD_SPLASH_ENABLED              = 'omt_splash_enabled';
const MOD_SPLASH_BG_COLOR             = 'omt_splash_bg_color';
const MOD_SPLASH_PROGRESS_BAR_ENABLED = 'omt_splash_progress_bar_enabled';
const MOD_SPLASH_PROGRESS_BAR_HEIGHT  = 'omt_splash_progress_bar_height';
const MOD_SPLASH_PROGRESS_BAR_COLOR   = 'omt_splash_progress_bar_color';
const MOD_SPLASH_ICON                 = 'omt_splash_icon';
const MOD_SPLASH_ICON_IMAGE           = 'omt_splash_icon_image';
const MOD_SPLASH_ICON_COLOR           = 'omt_splash_icon_color';
//endregion Splash
//region Buttons
const MOD_BTN_BORDER_WIDTH  = 'omt_btn_border_width';
const MOD_BTN_BORDER_RADIUS = 'omt_btn_border_radius';

const MOD_LS_BTN_PRIMARY_BG_COLOR               = 'omt_ls_btn_primary_bg_color';
const MOD_LS_BTN_PRIMARY_BORDER_COLOR           = 'omt_ls_btn_primary_border_color';
const MOD_LS_BTN_PRIMARY_COLOR                  = 'omt_ls_btn_primary_color';
const MOD_LS_BTN_PRIMARY_BG_COLOR_HOVER         = 'omt_ls_btn_primary_bg_color_hover';
const MOD_LS_BTN_PRIMARY_BORDER_COLOR_HOVER     = 'omt_ls_btn_primary_border_color_hover';
const MOD_LS_BTN_PRIMARY_COLOR_HOVER            = 'omt_ls_btn_primary_color_hover';
const MOD_LS_BTN_PRIMARY_BG_COLOR_CURRENT       = 'omt_ls_btn_primary_bg_color_current';
const MOD_LS_BTN_PRIMARY_BORDER_COLOR_CURRENT   = 'omt_ls_btn_primary_border_color_current';
const MOD_LS_BTN_PRIMARY_COLOR_CURRENT          = 'omt_ls_btn_primary_color_current';
const MOD_LS_BTN_SECONDARY_BG_COLOR             = 'omt_ls_btn_secondary_bg_color';
const MOD_LS_BTN_SECONDARY_BORDER_COLOR         = 'omt_ls_btn_secondary_border_color';
const MOD_LS_BTN_SECONDARY_COLOR                = 'omt_ls_btn_secondary_color';
const MOD_LS_BTN_SECONDARY_BG_COLOR_HOVER       = 'omt_ls_btn_secondary_bg_color_hover';
const MOD_LS_BTN_SECONDARY_BORDER_COLOR_HOVER   = 'omt_ls_btn_secondary_border_color_hover';
const MOD_LS_BTN_SECONDARY_COLOR_HOVER          = 'omt_ls_btn_secondary_color_hover';
const MOD_LS_BTN_SECONDARY_BG_COLOR_CURRENT     = 'omt_ls_btn_secondary_bg_color_current';
const MOD_LS_BTN_SECONDARY_BORDER_COLOR_CURRENT = 'omt_ls_btn_secondary_border_color_current';
const MOD_LS_BTN_SECONDARY_COLOR_CURRENT        = 'omt_ls_btn_secondary_color_current';

const MOD_DS_BTN_PRIMARY_BG_COLOR               = 'omt_ds_btn_primary_bg_color';
const MOD_DS_BTN_PRIMARY_BORDER_COLOR           = 'omt_ds_btn_primary_border_color';
const MOD_DS_BTN_PRIMARY_COLOR                  = 'omt_ds_btn_primary_color';
const MOD_DS_BTN_PRIMARY_BG_COLOR_HOVER         = 'omt_ds_btn_primary_bg_color_hover';
const MOD_DS_BTN_PRIMARY_BORDER_COLOR_HOVER     = 'omt_ds_btn_primary_border_color_hover';
const MOD_DS_BTN_PRIMARY_COLOR_HOVER            = 'omt_ds_btn_primary_color_hover';
const MOD_DS_BTN_PRIMARY_BG_COLOR_CURRENT       = 'omt_ds_btn_primary_bg_color_current';
const MOD_DS_BTN_PRIMARY_BORDER_COLOR_CURRENT   = 'omt_ds_btn_primary_border_color_current';
const MOD_DS_BTN_PRIMARY_COLOR_CURRENT          = 'omt_ds_btn_primary_color_current';
const MOD_DS_BTN_SECONDARY_BG_COLOR             = 'omt_ds_btn_secondary_bg_color';
const MOD_DS_BTN_SECONDARY_BORDER_COLOR         = 'omt_ds_btn_secondary_border_color';
const MOD_DS_BTN_SECONDARY_COLOR                = 'omt_ds_btn_secondary_color';
const MOD_DS_BTN_SECONDARY_BG_COLOR_HOVER       = 'omt_ds_btn_secondary_bg_color_hover';
const MOD_DS_BTN_SECONDARY_BORDER_COLOR_HOVER   = 'omt_ds_btn_secondary_border_color_hover';
const MOD_DS_BTN_SECONDARY_COLOR_HOVER          = 'omt_ds_btn_secondary_color_hover';
const MOD_DS_BTN_SECONDARY_BG_COLOR_CURRENT     = 'omt_ds_btn_secondary_bg_color_current';
const MOD_DS_BTN_SECONDARY_BORDER_COLOR_CURRENT = 'omt_ds_btn_secondary_border_color_current';
const MOD_DS_BTN_SECONDARY_COLOR_CURRENT        = 'omt_ds_btn_secondary_color_current';
//endregion Buttons
//region Form controls
const MOD_FORM_CONTROL_BORDER_WIDTH  = 'omt_form_control_border_width';
const MOD_FORM_CONTROL_BORDER_RADIUS = 'omt_form_control_border_radius';

const MOD_LS_FORM_CONTROL_COLOR              = 'omt_ls_form_control_color';
const MOD_LS_FORM_CONTROL_BG_COLOR           = 'omt_ls_form_control_bg_color';
const MOD_LS_FORM_CONTROL_BORDER_COLOR       = 'omt_ls_form_control_border_color';
const MOD_LS_FORM_CONTROL_COLOR_FOCUS        = 'omt_ls_form_control_color_focus';
const MOD_LS_FORM_CONTROL_BG_COLOR_FOCUS     = 'omt_ls_form_control_bg_color_focus';
const MOD_LS_FORM_CONTROL_BORDER_COLOR_FOCUS = 'omt_ls_form_control_border_color_focus';
const MOD_LS_FORM_CONTROL_SHADOW             = 'omt_ls_form_control_shadow';
const MOD_LS_FORM_CONTROL_SHADOW_FOCUS       = 'omt_ls_form_control_shadow_focus';
const MOD_LS_FORM_CONTROL_PLACEHOLDER        = 'omt_ls_form_control_placeholder';
const MOD_LS_FORM_CONTROL_PLACEHOLDER_FOCUS  = 'omt_ls_form_control_placeholder_focus';
const MOD_LS_FORM_CONTROL_ACCENT             = 'omt_ls_form_control_accent';

const MOD_DS_FORM_CONTROL_COLOR              = 'omt_ds_form_control_color';
const MOD_DS_FORM_CONTROL_BG_COLOR           = 'omt_ds_form_control_bg_color';
const MOD_DS_FORM_CONTROL_BORDER_COLOR       = 'omt_ds_form_control_border_color';
const MOD_DS_FORM_CONTROL_COLOR_FOCUS        = 'omt_ds_form_control_color_focus';
const MOD_DS_FORM_CONTROL_BG_COLOR_FOCUS     = 'omt_ds_form_control_bg_color_focus';
const MOD_DS_FORM_CONTROL_BORDER_COLOR_FOCUS = 'omt_ds_form_control_border_color_focus';
const MOD_DS_FORM_CONTROL_SHADOW             = 'omt_ds_form_control_shadow';
const MOD_DS_FORM_CONTROL_SHADOW_FOCUS       = 'omt_ds_form_control_shadow_focus';
const MOD_DS_FORM_CONTROL_PLACEHOLDER        = 'omt_ds_form_control_placeholder';
const MOD_DS_FORM_CONTROL_PLACEHOLDER_FOCUS  = 'omt_ds_form_control_placeholder_focus';
const MOD_DS_FORM_CONTROL_ACCENT             = 'omt_ds_form_control_accent';
//endregion Form controls
//region Pagination
const MOD_PAGINATION_TYPE                    = 'omt_pagination_type';
const MOD_PAGINATION_NEXT_PREVIOUS_CONTAINER = 'omt_single_next_previous_container';

const MOD_LS_PAGINATION_NUM_COLOR                 = 'omt_ls_pagination_number_color';
const MOD_LS_PAGINATION_NUM_BG_COLOR              = 'omt_ls_pagination_number_bg_color';
const MOD_LS_PAGINATION_NUM_BORDER_COLOR          = 'omt_ls_pagination_number_border_color';
const MOD_LS_PAGINATION_NUM_COLOR_HOVER           = 'omt_ls_pagination_number_color_hover';
const MOD_LS_PAGINATION_NUM_BG_COLOR_HOVER        = 'omt_ls_pagination_number_bg_color_hover';
const MOD_LS_PAGINATION_NUM_BORDER_COLOR_HOVER    = 'omt_ls_pagination_number_border_color_hover';
const MOD_LS_PAGINATION_NUM_COLOR_CURRENT         = 'omt_ls_pagination_number_color_current';
const MOD_LS_PAGINATION_NUM_BG_COLOR_CURRENT      = 'omt_ls_pagination_number_bg_color_current';
const MOD_LS_PAGINATION_NUM_BORDER_COLOR_CURRENT  = 'omt_ls_pagination_number_border_color_current';
const MOD_LS_PAGINATION_PREVNEXT_TEXT_COLOR       = 'omt_ls_pagination_prevnext_text_color';
const MOD_LS_PAGINATION_PREVNEXT_TEXT_COLOR_HOVER = 'omt_ls_pagination_prevnext_text_color_hover';

const MOD_DS_PAGINATION_NUM_COLOR                 = 'omt_ds_pagination_number_color';
const MOD_DS_PAGINATION_NUM_BG_COLOR              = 'omt_ds_pagination_number_bg_color';
const MOD_DS_PAGINATION_NUM_BORDER_COLOR          = 'omt_ds_pagination_number_border_color';
const MOD_DS_PAGINATION_NUM_COLOR_HOVER           = 'omt_ds_pagination_number_color_hover';
const MOD_DS_PAGINATION_NUM_BG_COLOR_HOVER        = 'omt_ds_pagination_number_bg_color_hover';
const MOD_DS_PAGINATION_NUM_BORDER_COLOR_HOVER    = 'omt_ds_pagination_number_border_color_hover';
const MOD_DS_PAGINATION_NUM_COLOR_CURRENT         = 'omt_ds_pagination_number_color_current';
const MOD_DS_PAGINATION_NUM_BG_COLOR_CURRENT      = 'omt_ds_pagination_number_bg_color_current';
const MOD_DS_PAGINATION_NUM_BORDER_COLOR_CURRENT  = 'omt_ds_pagination_number_border_color_current';
const MOD_DS_PAGINATION_PREVNEXT_TEXT_COLOR       = 'omt_ds_pagination_prevnext_text_color';
const MOD_DS_PAGINATION_PREVNEXT_TEXT_COLOR_HOVER = 'omt_ds_pagination_prevnext_text_color_hover';
//endregion Pagination
//region Posts page
const MOD_POSTS_PAGE_CONTENT                = 'omt_posts_page_content';
const MOD_POSTS_PAGE_AVATAR_ENABLED         = 'omt_posts_page_avatar_enabled';
const MOD_POSTS_PAGE_AUTHOR_ENABLED         = 'omt_posts_page_author_enabled';
const MOD_POSTS_PAGE_DATE_ENABLED           = 'omt_posts_page_date_enabled';
const MOD_POSTS_PAGE_FEATURED_IMAGE_ENABLED = 'omt_posts_page_featured_image_enabled';
const MOD_POSTS_PAGE_READ_MORE_ENABLED      = 'omt_posts_page_read_more_enabled';
const MOD_POSTS_PAGE_COMMENTS_LINK_ENABLED  = 'omt_posts_page_comments_link_enabled';
const MOD_POSTS_PAGE_TAXONOMY               = 'omt_posts_page_taxonomy';

const MOD_LS_POSTS_PAGE_TITLE_COLOR             = 'omt_ls_posts_page_title_color';
const MOD_LS_POSTS_PAGE_TITLE_COLOR_HOVER       = 'omt_ls_posts_page_title_color_hover';
const MOD_LS_POSTS_PAGE_TERM_TEXT_COLOR         = 'omt_ls_posts_page_term_text_color';
const MOD_LS_POSTS_PAGE_TERM_BG_COLOR           = 'omt_ls_posts_page_term_bg_color';
const MOD_LS_POSTS_PAGE_TERM_BORDER_COLOR       = 'omt_ls_posts_page_term_border_color';
const MOD_LS_POSTS_PAGE_TERM_TEXT_HOVER_COLOR   = 'omt_ls_posts_page_term_text_hover_color';
const MOD_LS_POSTS_PAGE_TERM_BG_HOVER_COLOR     = 'omt_ls_posts_page_term_bg_hover_color';
const MOD_LS_POSTS_PAGE_TERM_BORDER_HOVER_COLOR = 'omt_ls_posts_page_term_border_hover_color';
const MOD_LS_POSTS_PAGE_POST_SEPARATOR_COLOR    = 'omt_ls_posts_page_post_separator_color';

const MOD_DS_POSTS_PAGE_TITLE_COLOR             = 'omt_ds_posts_page_title_color';
const MOD_DS_POSTS_PAGE_TITLE_COLOR_HOVER       = 'omt_ds_posts_page_title_color_hover';
const MOD_DS_POSTS_PAGE_TERM_TEXT_COLOR         = 'omt_ds_posts_page_term_text_color';
const MOD_DS_POSTS_PAGE_TERM_BG_COLOR           = 'omt_ds_posts_page_term_bg_color';
const MOD_DS_POSTS_PAGE_TERM_BORDER_COLOR       = 'omt_ds_posts_page_term_border_color';
const MOD_DS_POSTS_PAGE_TERM_TEXT_HOVER_COLOR   = 'omt_ds_posts_page_term_text_hover_color';
const MOD_DS_POSTS_PAGE_TERM_BG_HOVER_COLOR     = 'omt_ds_posts_page_term_bg_hover_color';
const MOD_DS_POSTS_PAGE_TERM_BORDER_HOVER_COLOR = 'omt_ds_posts_page_term_border_hover_color';
const MOD_DS_POSTS_PAGE_POST_SEPARATOR_COLOR    = 'omt_ds_posts_page_post_separator_color';
//endregion Posts page
//region Post
const MOD_POST_FEATURED_IMAGE_ENABLED = 'omt_post_featured_image_enabled';
const MOD_POST_TAXONOMY               = 'omt_post_taxonomy';
//endregion Post
//region Posts top bar
const MOD_POSTS_TOP_BAR_TAXONOMY       = 'omt_posts_top_bar_taxonomy';
const MOD_POSTS_TOP_BAR_TAXONOMY_TYPE  = 'omt_posts_top_bar_taxonomy_type';
const MOD_POSTS_TOP_BAR_SEARCH_ENABLED = 'omt_posts_top_bar_search_enabled';

const MOD_LS_POSTS_TOP_BAR_BG_COLOR                  = 'omt_ls_posts_top_bar_bg_color';
const MOD_LS_POSTS_TOP_BAR_BORDER_TOP_COLOR          = 'omt_ls_posts_top_bar_border_top_color';
const MOD_LS_POSTS_TOP_BAR_BORDER_BOTTOM_COLOR       = 'omt_ls_posts_top_bar_border_bottom_color';
const MOD_LS_POSTS_TOP_BAR_SHADOW_TOP_COLOR          = 'omt_ls_posts_top_bar_shadow_top_color';
const MOD_LS_POSTS_TOP_BAR_SHADOW_BOTTOM_COLOR       = 'omt_ls_posts_top_bar_shadow_bottom_color';
const MOD_LS_POSTS_TOP_BAR_ITEM_COLOR                = 'omt_ls_posts_top_bar_term_color';
const MOD_LS_POSTS_TOP_BAR_ITEM_BORDER_COLOR         = 'omt_ls_posts_top_bar_term_border_color';
const MOD_LS_POSTS_TOP_BAR_ITEM_BG_COLOR             = 'omt_ls_posts_top_bar_term_bg_color';
const MOD_LS_POSTS_TOP_BAR_ITEM_COLOR_HOVER          = 'omt_ls_posts_top_bar_term_color_hover';
const MOD_LS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_HOVER   = 'omt_ls_posts_top_bar_term_border_color_hover';
const MOD_LS_POSTS_TOP_BAR_ITEM_BG_COLOR_HOVER       = 'omt_ls_posts_top_bar_term_bg_color_hover';
const MOD_LS_POSTS_TOP_BAR_ITEM_COLOR_CURRENT        = 'omt_ls_posts_top_bar_term_color_current';
const MOD_LS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_CURRENT = 'omt_ls_posts_top_bar_term_border_color_current';
const MOD_LS_POSTS_TOP_BAR_ITEM_BG_COLOR_CURRENT     = 'omt_ls_posts_top_bar_term_bg_color_current';
const MOD_LS_POSTS_TOP_BAR_SEARCH_BG_COLOR           = 'omt_ls_posts_top_bar_search_bg_color';
const MOD_LS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR       = 'omt_ls_posts_top_bar_search_border_color';
const MOD_LS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR       = 'omt_ls_posts_top_bar_search_shadow_color';
const MOD_LS_POSTS_TOP_BAR_SEARCH_ICON_COLOR         = 'omt_ls_posts_top_bar_search_icon_color';
const MOD_LS_POSTS_TOP_BAR_SEARCH_BG_COLOR_FOCUS     = 'omt_ls_posts_top_bar_search_bg_color_focus';
const MOD_LS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR_FOCUS = 'omt_ls_posts_top_bar_search_border_color_focus';
const MOD_LS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR_FOCUS = 'omt_ls_posts_top_bar_search_shadow_color_focus';
const MOD_LS_POSTS_TOP_BAR_SEARCH_ICON_COLOR_FOCUS   = 'omt_ls_posts_top_bar_search_icon_color_focus';

const MOD_DS_POSTS_TOP_BAR_BG_COLOR                  = 'omt_ds_posts_top_bar_bg_color';
const MOD_DS_POSTS_TOP_BAR_BORDER_TOP_COLOR          = 'omt_ds_posts_top_bar_border_top_color';
const MOD_DS_POSTS_TOP_BAR_BORDER_BOTTOM_COLOR       = 'omt_ds_posts_top_bar_border_bottom_color';
const MOD_DS_POSTS_TOP_BAR_SHADOW_TOP_COLOR          = 'omt_ds_posts_top_bar_shadow_top_color';
const MOD_DS_POSTS_TOP_BAR_SHADOW_BOTTOM_COLOR       = 'omt_ds_posts_top_bar_shadow_bottom_color';
const MOD_DS_POSTS_TOP_BAR_ITEM_COLOR                = 'omt_ds_posts_top_bar_term_color';
const MOD_DS_POSTS_TOP_BAR_ITEM_BORDER_COLOR         = 'omt_ds_posts_top_bar_term_border_color';
const MOD_DS_POSTS_TOP_BAR_ITEM_BG_COLOR             = 'omt_ds_posts_top_bar_term_bg_color';
const MOD_DS_POSTS_TOP_BAR_ITEM_COLOR_HOVER          = 'omt_ds_posts_top_bar_term_color_hover';
const MOD_DS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_HOVER   = 'omt_ds_posts_top_bar_term_border_color_hover';
const MOD_DS_POSTS_TOP_BAR_ITEM_BG_COLOR_HOVER       = 'omt_ds_posts_top_bar_term_bg_color_hover';
const MOD_DS_POSTS_TOP_BAR_ITEM_COLOR_CURRENT        = 'omt_ds_posts_top_bar_term_color_current';
const MOD_DS_POSTS_TOP_BAR_ITEM_BORDER_COLOR_CURRENT = 'omt_ds_posts_top_bar_term_border_color_current';
const MOD_DS_POSTS_TOP_BAR_ITEM_BG_COLOR_CURRENT     = 'omt_ds_posts_top_bar_term_bg_color_current';
const MOD_DS_POSTS_TOP_BAR_SEARCH_BG_COLOR           = 'omt_ds_posts_top_bar_search_bg_color';
const MOD_DS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR       = 'omt_ds_posts_top_bar_search_border_color';
const MOD_DS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR       = 'omt_ds_posts_top_bar_search_shadow_color';
const MOD_DS_POSTS_TOP_BAR_SEARCH_ICON_COLOR         = 'omt_ds_posts_top_bar_search_icon_color';
const MOD_DS_POSTS_TOP_BAR_SEARCH_BG_COLOR_FOCUS     = 'omt_ds_posts_top_bar_search_bg_color_focus';
const MOD_DS_POSTS_TOP_BAR_SEARCH_BORDER_COLOR_FOCUS = 'omt_ds_posts_top_bar_search_border_color_focus';
const MOD_DS_POSTS_TOP_BAR_SEARCH_SHADOW_COLOR_FOCUS = 'omt_ds_posts_top_bar_search_shadow_color_focus';
const MOD_DS_POSTS_TOP_BAR_SEARCH_ICON_COLOR_FOCUS   = 'omt_ds_posts_top_bar_search_icon_color_focus';
//endregion Posts top bar
//region Posts side bar
const MOD_POSTS_SIDEBAR_BORDER_WIDTH      = 'omt_posts_sidebar_border_width';
const MOD_POSTS_SIDEBAR_SHADOW_BLUR       = 'omt_posts_sidebar_shadow_blur';
const MOD_POSTS_SIDEBAR_WIDGETS_SPACE     = 'omt_posts_sidebar_widgets_space';
const MOD_POSTS_SIDEBAR_WIDGET_V_PADDING  = 'omt_posts_sidebar_widget_v_padding';
const MOD_POSTS_SIDEBAR_WIDGET_H_PADDING  = 'omt_posts_sidebar_widget_h_padding';
const MOD_POSTS_SIDEBAR_LINK_STYLE_STATIC = 'omt_posts_sidebar_link_style_static';
const MOD_POSTS_SIDEBAR_LINK_STYLE_HOVER  = 'omt_posts_sidebar_link_style_hover';

const MOD_LS_POSTS_SIDEBAR_BG_COLOR                  = 'omt_ls_posts_sidebar_bg_color';
const MOD_LS_POSTS_SIDEBAR_BORDER_COLOR              = 'omt_ls_posts_sidebar_border_color';
const MOD_LS_POSTS_SIDEBAR_SHADOW_COLOR              = 'omt_ls_posts_sidebar_shadow_color';
const MOD_LS_POSTS_SIDEBAR_TEXT_COLOR                = 'omt_ls_posts_sidebar_text_color';
const MOD_LS_POSTS_SIDEBAR_TITLE_COLOR               = 'omt_ls_posts_sidebar_title_color';
const MOD_LS_POSTS_SIDEBAR_LINK_COLOR                = 'omt_ls_posts_sidebar_link_color';
const MOD_LS_POSTS_SIDEBAR_LINK_STYLING_COLOR_STATIC = 'omt_ls_posts_sidebar_link_styling_color_static';
const MOD_LS_POSTS_SIDEBAR_LINK_HOVER_COLOR          = 'omt_ls_posts_sidebar_link_hover_color';
const MOD_LS_POSTS_SIDEBAR_LINK_STYLING_COLOR_HOVER  = 'omt_ls_posts_sidebar_link_styling_color_hover';

const MOD_DS_POSTS_SIDEBAR_BG_COLOR                  = 'omt_ds_posts_sidebar_bg_color';
const MOD_DS_POSTS_SIDEBAR_BORDER_COLOR              = 'omt_ds_posts_sidebar_border_color';
const MOD_DS_POSTS_SIDEBAR_SHADOW_COLOR              = 'omt_ds_posts_sidebar_shadow_color';
const MOD_DS_POSTS_SIDEBAR_TEXT_COLOR                = 'omt_ds_posts_sidebar_text_color';
const MOD_DS_POSTS_SIDEBAR_TITLE_COLOR               = 'omt_ds_posts_sidebar_title_color';
const MOD_DS_POSTS_SIDEBAR_LINK_COLOR                = 'omt_ds_posts_sidebar_link_color';
const MOD_DS_POSTS_SIDEBAR_LINK_STYLING_COLOR_STATIC = 'omt_ds_posts_sidebar_link_styling_color_static';
const MOD_DS_POSTS_SIDEBAR_LINK_HOVER_COLOR          = 'omt_ds_posts_sidebar_link_hover_color';
const MOD_DS_POSTS_SIDEBAR_LINK_STYLING_COLOR_HOVER  = 'omt_ds_posts_sidebar_link_styling_color_hover';
//endregion Posts side bar
//region Navbar
const OPTION_NAVBAR_LAYOUT             = 'omt_navbar_layout';
const OPTION_NAVBAR_BG_COLOR           = 'omt_navbar_bg_color';
const OPTION_NAVBAR_BORDER_COLOR       = 'omt_navbar_border_color';
const OPTION_NAVBAR_BORDER_WIDTH       = 'omt_navbar_border_width';
const OPTION_NAVBAR_SHADOW_COLOR       = 'omt_navbar_shadow_color';
const OPTION_NAVBAR_SHADOW_BLUR        = 'omt_navbar_shadow_blur';
const OPTION_NAVBAR_OVERLAY            = 'omt_navbar_overlay';
const OPTION_NAVBAR_V_PADDING          = 'omt_navbar_v_padding';
const MOD_NAVBAR_LOGO_IMAGE            = 'omt_navbar_logo_image';
const OPTION_NAVBAR_LOGO_HEIGHT        = 'omt_navbar_logo_height';
const MOD_NAVBAR_LOGO_RIGHT_SPACE      = 'omt_navbar_logo_right_margin';
const MOD_NAVBAR_LOGO_TEXT             = 'omt_navbar_logo_text';
const MOD_NAVBAR_LOGO_TEXT_SITE_TITLE  = 'omt_navbar_logo_text_site_title';
const MOD_NAVBAR_LOGO_TEXT_LEFT_SPACE  = 'omt_navbar_logo_text_left_space';
const MOD_NAVBAR_MENU_ITEMS_SPACE      = 'omt_navbar_menu_items_space';
const MOD_NAVBAR_BTN_BORDER_WIDTH      = 'omt_navbar_btn_border_width';
const MOD_NAVBAR_BTN_BORDER_RADIUS     = 'omt_navbar_btn_border_radius';
const MOD_NAVBAR_SUBMENU_BORDER_RADIUS = 'omt_navbar_submenu_border_radius';
const MOD_NAVBAR_SUBMENU_TOP_SPACE     = 'omt_navbar_submenu_top_space';
const OPTION_NAVBAR_DISABLED           = 'omt_navbar_disabled';

const OPTION_NAVBAR_SECONDARY_ENABLED      = 'omt_navbar_secondary_enabled';
const OPTION_NAVBAR_SECONDARY_BG_COLOR     = 'omt_navbar_secondary_bg_color';
const OPTION_NAVBAR_SECONDARY_BORDER_COLOR = 'omt_navbar_secondary_border_color';
const OPTION_NAVBAR_SECONDARY_BORDER_WIDTH = 'omt_navbar_secondary_border_width';
const OPTION_NAVBAR_SECONDARY_SHADOW_COLOR = 'omt_navbar_secondary_shadow_color';
const OPTION_NAVBAR_SECONDARY_SHADOW_BLUR  = 'omt_navbar_secondary_shadow_blur';
const OPTION_NAVBAR_SECONDARY_V_PADDING    = 'omt_navbar_secondary_v_padding';
const OPTION_NAVBAR_SECONDARY_LOGO_HEIGHT  = 'omt_navbar_secondary_logo_height';

const MOD_LS_NAVBAR_LOGO_IMAGE                    = 'omt_ls_navbar_logo_image';
const OPTION_LS_NAVBAR_LOGO_TEXT_COLOR            = 'omt_ls_navbar_logo_text_color';
const OPTION_LS_NAVBAR_LOGO_TEXT_COLOR_HOVER      = 'omt_ls_navbar_logo_text_color_hover';
const OPTION_LS_NAVBAR_MENU_ITEM_COLOR            = 'omt_ls_navbar_menu_item_color';
const OPTION_LS_NAVBAR_MENU_ITEM_COLOR_HOVER      = 'omt_ls_navbar_menu_item_color_hover';
const OPTION_LS_NAVBAR_MENU_ITEM_COLOR_CURRENT    = 'omt_ls_navbar_menu_item_color_current';
const OPTION_LS_NAVBAR_SUBMENU_BG_COLOR           = 'omt_ls_navbar_submenu_bg_color';
const OPTION_LS_NAVBAR_SUBMENU_BORDER_COLOR       = 'omt_ls_navbar_submenu_border_color';
const OPTION_LS_NAVBAR_SUBMENU_SHADOW_COLOR       = 'omt_ls_navbar_submenu_shadow_color';
const OPTION_LS_NAVBAR_SUBMENU_SHADOW_BLUR        = 'omt_ls_navbar_submenu_shadow_blur';
const OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR         = 'omt_ls_navbar_submenu_item_color';
const OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR_HOVER   = 'omt_ls_navbar_submenu_item_color_hover';
const OPTION_LS_NAVBAR_SUBMENU_ITEM_COLOR_CURRENT = 'omt_ls_navbar_submenu_item_color_current';
const OPTION_LS_NAVBAR_BTN_BG_COLOR               = 'omt_ls_navbar_btn_bg_color';
const OPTION_LS_NAVBAR_BTN_BORDER_COLOR           = 'omt_ls_navbar_btn_border_color';
const OPTION_LS_NAVBAR_BTN_TEXT_COLOR             = 'omt_ls_navbar_btn_text_color';
const OPTION_LS_NAVBAR_BTN_BG_COLOR_HOVER         = 'omt_ls_navbar_btn_bg_color_hover';
const OPTION_LS_NAVBAR_BTN_BORDER_COLOR_HOVER     = 'omt_ls_navbar_btn_border_color_hover';
const OPTION_LS_NAVBAR_BTN_TEXT_COLOR_HOVER       = 'omt_ls_navbar_btn_text_color_hover';

const MOD_DS_NAVBAR_LOGO_IMAGE                    = 'omt_ds_navbar_logo_image';
const OPTION_DS_NAVBAR_LOGO_TEXT_COLOR            = 'omt_ds_navbar_logo_text_color';
const OPTION_DS_NAVBAR_LOGO_TEXT_COLOR_HOVER      = 'omt_ds_navbar_logo_text_color_hover';
const OPTION_DS_NAVBAR_MENU_ITEM_COLOR            = 'omt_ds_navbar_menu_item_color';
const OPTION_DS_NAVBAR_MENU_ITEM_COLOR_HOVER      = 'omt_ds_navbar_menu_item_color_hover';
const OPTION_DS_NAVBAR_MENU_ITEM_COLOR_CURRENT    = 'omt_ds_navbar_menu_item_color_current';
const OPTION_DS_NAVBAR_SUBMENU_BG_COLOR           = 'omt_ds_navbar_submenu_bg_color';
const OPTION_DS_NAVBAR_SUBMENU_BORDER_COLOR       = 'omt_ds_navbar_submenu_border_color';
const OPTION_DS_NAVBAR_SUBMENU_SHADOW_COLOR       = 'omt_ds_navbar_submenu_shadow_color';
const OPTION_DS_NAVBAR_SUBMENU_SHADOW_BLUR        = 'omt_ds_navbar_submenu_shadow_blur';
const OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR         = 'omt_ds_navbar_submenu_item_color';
const OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR_HOVER   = 'omt_ds_navbar_submenu_item_color_hover';
const OPTION_DS_NAVBAR_SUBMENU_ITEM_COLOR_CURRENT = 'omt_ds_navbar_submenu_item_color_current';
const OPTION_DS_NAVBAR_BTN_BG_COLOR               = 'omt_ds_navbar_btn_bg_color';
const OPTION_DS_NAVBAR_BTN_BORDER_COLOR           = 'omt_ds_navbar_btn_border_color';
const OPTION_DS_NAVBAR_BTN_TEXT_COLOR             = 'omt_ds_navbar_btn_text_color';
const OPTION_DS_NAVBAR_BTN_BG_COLOR_HOVER         = 'omt_ds_navbar_btn_bg_color_hover';
const OPTION_DS_NAVBAR_BTN_BORDER_COLOR_HOVER     = 'omt_ds_navbar_btn_border_color_hover';
const OPTION_DS_NAVBAR_BTN_TEXT_COLOR_HOVER       = 'omt_ds_navbar_btn_text_color_hover';
//endregion Navbar
//region Navbar mobile
const OPTION_NAVBAR_M_BG_COLOR             = 'omt_navbar_m_bg_color';
const OPTION_NAVBAR_M_BORDER_COLOR         = 'omt_navbar_m_border_color';
const OPTION_NAVBAR_M_BORDER_WIDTH         = 'omt_navbar_m_border_width';
const OPTION_NAVBAR_M_SHADOW_COLOR         = 'omt_navbar_m_shadow_color';
const OPTION_NAVBAR_M_SHADOW_BLUR          = 'omt_navbar_m_shadow_blur';
const MOD_NAVBAR_M_LOGO_IMAGE              = 'omt_navbar_m_logo_image';
const OPTION_NAVBAR_M_LOGO_HEIGHT          = 'omt_navbar_m_logo_height';
const MOD_NAVBAR_M_VERTICAL_ITEMS_SPACE    = 'omt_navbar_m_v_items_space';
const MOD_NAVBAR_M_LOGO_TEXT               = 'omt_navbar_m_logo_text';
const MOD_NAVBAR_M_LOGO_TEXT_SITE_TITLE    = 'omt_navbar_m_logo_text_site_title';
const MOD_NAVBAR_M_LOGO_TEXT_LEFT_SPACE    = 'omt_navbar_m_logo_text_left_space';
const OPTION_NAVBAR_M_BEHAVIOR             = 'omt_navbar_m_behavior';
const OPTION_NAVBAR_M_OVERLAY              = 'omt_navbar_m_overlay';
const OPTION_NAVBAR_M_V_PADDING            = 'omt_navbar_m_v_padding';
const MOD_NAVBAR_M_TOGGLE_TYPE             = 'omt_navbar_m_toggle_type';
const MOD_NAVBAR_M_TOGGLE_TEXT             = 'omt_navbar_m_toggle_text';
const MOD_NAVBAR_M_TOGGLE_TEXT_RIGHT_SPACE = 'omt_navbar_m_toggle_text_right_space';

const MOD_LS_NAVBAR_M_LOGO_IMAGE                    = 'omt_ls_navbar_m_logo_image';
const OPTION_LS_NAVBAR_M_LOGO_TEXT_COLOR            = 'omt_ls_navbar_m_logo_text_color';
const OPTION_LS_NAVBAR_M_TOGGLE_ICON_COLOR          = 'omt_ls_navbar_m_toggle_icon_color';
const OPTION_LS_NAVBAR_M_TOGGLE_TEXT_COLOR          = 'omt_ls_navbar_m_toggle_text_color';
const OPTION_LS_NAVBAR_M_MENU_ITEM_COLOR            = 'omt_ls_navbar_m_menu_item_color';
const OPTION_LS_NAVBAR_M_MENU_ITEM_COLOR_CURRENT    = 'omt_ls_navbar_m_menu_item_color_current';
const OPTION_LS_NAVBAR_M_SUBMENU_ITEM_COLOR         = 'omt_ls_navbar_m_submenu_item_color';
const OPTION_LS_NAVBAR_M_SUBMENU_ITEM_COLOR_CURRENT = 'omt_ls_navbar_m_submenu_item_color_current';

const MOD_DS_NAVBAR_M_LOGO_IMAGE                    = 'omt_ds_navbar_m_logo_image';
const OPTION_DS_NAVBAR_M_LOGO_TEXT_COLOR            = 'omt_ds_navbar_m_logo_text_color';
const OPTION_DS_NAVBAR_M_TOGGLE_ICON_COLOR          = 'omt_ds_navbar_m_toggle_icon_color';
const OPTION_DS_NAVBAR_M_TOGGLE_TEXT_COLOR          = 'omt_ds_navbar_m_toggle_text_color';
const OPTION_DS_NAVBAR_M_MENU_ITEM_COLOR            = 'omt_ds_navbar_m_menu_item_color';
const OPTION_DS_NAVBAR_M_MENU_ITEM_COLOR_CURRENT    = 'omt_ds_navbar_m_menu_item_color_current';
const OPTION_DS_NAVBAR_M_SUBMENU_ITEM_COLOR         = 'omt_ds_navbar_m_submenu_item_color';
const OPTION_DS_NAVBAR_M_SUBMENU_ITEM_COLOR_CURRENT = 'omt_ds_navbar_m_submenu_item_color_current';
//endregion Navbar mobile
//region Header
const OPTION_HEADER_DISPLAY        = 'omt_header_display';
const OPTION_HEADER_BG_COLOR       = 'omt_header_bg_color';
const MOD_HEADER_LINK_STYLE_STATIC = 'omt_header_link_style_static';
const MOD_HEADER_LINK_STYLE_HOVER  = 'omt_header_link_style_hover';

const MOD_LS_HEADER_TEXT_COLOR                = 'omt_ls_header_text_color';
const MOD_LS_HEADER_LINK_COLOR                = 'omt_ls_header_link_color';
const MOD_LS_HEADER_LINK_STYLING_COLOR_STATIC = 'omt_ls_header_link_styling_color_static';
const MOD_LS_HEADER_LINK_COLOR_HOVER          = 'omt_ls_header_link_color_hover';
const MOD_LS_HEADER_LINK_STYLING_COLOR_HOVER  = 'omt_ls_header_link_styling_color_hover';
const MOD_LS_HEADER_HEADINGS_COLOR            = 'omt_ls_header_headings_color';

const MOD_DS_HEADER_TEXT_COLOR                = 'omt_ds_header_text_color';
const MOD_DS_HEADER_LINK_COLOR                = 'omt_ds_header_link_color';
const MOD_DS_HEADER_LINK_STYLING_COLOR_STATIC = 'omt_ds_header_link_styling_color_static';
const MOD_DS_HEADER_LINK_COLOR_HOVER          = 'omt_ds_header_link_color_hover';
const MOD_DS_HEADER_LINK_STYLING_COLOR_HOVER  = 'omt_ds_header_link_styling_color_hover';
const MOD_DS_HEADER_HEADINGS_COLOR            = 'omt_ds_header_headings_color';
//endregion Header
//region Footer
const OPTION_FOOTER_DISPLAY        = 'omt_footer_display';
const OPTION_FOOTER_BG_COLOR       = 'omt_footer_bg_color';
const MOD_FOOTER_LINK_STYLE_STATIC = 'omt_footer_link_style_static';
const MOD_FOOTER_LINK_STYLE_HOVER  = 'omt_footer_link_style_hover';

const MOD_LS_FOOTER_TEXT_COLOR                = 'omt_ls_footer_text_color';
const MOD_LS_FOOTER_LINK_COLOR                = 'omt_ls_footer_link_color';
const MOD_LS_FOOTER_LINK_STYLING_COLOR_STATIC = 'omt_ls_footer_link_styling_color_static';
const MOD_LS_FOOTER_LINK_COLOR_HOVER          = 'omt_ls_footer_link_color_hover';
const MOD_LS_FOOTER_LINK_STYLING_COLOR_HOVER  = 'omt_ls_footer_link_styling_color_hover';
const MOD_LS_FOOTER_HEADINGS_COLOR            = 'omt_ls_footer_headings_color';

const MOD_DS_FOOTER_TEXT_COLOR                = 'omt_ds_footer_text_color';
const MOD_DS_FOOTER_LINK_COLOR                = 'omt_ds_footer_link_color';
const MOD_DS_FOOTER_LINK_STYLING_COLOR_STATIC = 'omt_ds_footer_link_styling_color_static';
const MOD_DS_FOOTER_LINK_COLOR_HOVER          = 'omt_ds_footer_link_color_hover';
const MOD_DS_FOOTER_LINK_STYLING_COLOR_HOVER  = 'omt_ds_footer_link_styling_color_hover';
const MOD_DS_FOOTER_HEADINGS_COLOR            = 'omt_ds_footer_headings_color';
//endregion Footer

/* Metadata. */

/* Controls. */

const CONTROL_TEXT     = 'text';
const CONTROL_NUMBER   = 'number';
const CONTROL_CHECKBOX = 'checkbox';
const CONTROL_TRISTATE = 'tristate';
const CONTROL_SELECT   = 'select';
const CONTROL_COLOR    = 'color';
const CONTROL_IMAGE    = 'image';

/* Default customizer controls. */

const CONTROL_WP_TEXT           = 'wp:text';
const CONTROL_WP_CHECKBOX       = 'wp:checkbox';
const CONTROL_WP_RADIO          = 'wp:radio';
const CONTROL_WP_SELECT         = 'wp:select';
const CONTROL_WP_TEXTAREA       = 'wp:textarea';
const CONTROL_WP_DROPDOWN_PAGES = 'wp:dropdown-pages';

/* Attributes. */

const ATTR_VALUE           = ':value';
const ATTR_CUSTOM_VALUE    = ':custom-value';
const ATTR_SEPARATE_LABEL  = ':separate-label';
const ATTR_HTML_ID         = 'html:id';
const ATTR_HTML_NAME       = 'html:name';
const ATTR_HTML_VALUE      = 'html:value';
const ATTR_CUSTOMIZER_LINK = 'html:data-customize-setting-link';

/* Styles. */

const STYLE_ET_LINE  = 'et-line';
const STYLE_IONICONS = 'ionicons';
const STYLE_OM_THEME = 'om-theme';

const STYLE_SELECT2       = 'select2';
const STYLE_CONTROL_COLOR = 'om-control-color';
const STYLE_CONTROL_IMAGE = 'om-control-image';

const STYLE_OM_DB_VISUAL_COMPOSER = 'om-dashboard-visual-composer';

/* Scripts. */

const SCRIPT_IMAGESLOADED           = 'imagesloaded';
const SCRIPT_JQUERY                 = 'jquery';
const SCRIPT_JQUERY_REACTIVE_IMAGES = 'jquery_reactive_images';
const SCRIPT_MASONRY                = 'masonry';
const SCRIPT_MODERNIZR              = 'modernizr';
const SCRIPT_OM_THEME               = 'om-theme';

const SCRIPT_SELECT2          = 'select2';
const SCRIPT_CONTROL_NUMBER   = 'om-control-number';
const SCRIPT_CONTROL_CHECKBOX = 'om-control-checkbox';
const SCRIPT_CONTROL_SELECT   = 'om-control-select';
const SCRIPT_CONTROL_COLOR    = 'om-control-color';
const SCRIPT_CONTROL_IMAGE    = 'om-control-image';

/* Meta boxes. */

const METABOX_PAGE_SETTINGS           = 'omt_page_settings';
const METABOX_CONTENT_BLOCKS_SETTINGS = 'omt_content_blocks_settings';

const METABOX_NAVBAR_GENERAL        = 'omt_navbar_general';
const METABOX_NAVBAR_SECONDARY      = 'omt_navbar_secondary';
const METABOX_NAVBAR_LS             = 'omt_navbar_ls';
const METABOX_NAVBAR_DS             = 'omt_navbar_ds';
const METABOX_NAVBAR_MOBILE_GENERAL = 'omt_navbar_mobile_general';
const METABOX_NAVBAR_MOBILE_LS      = 'omt_navbar_mobile_ls';
const METABOX_NAVBAR_MOBILE_DS      = 'omt_navbar_mobile_ds';

/* Menus. */

const MENU_NAVIGATION_LEFT  = 'omt_left';
const MENU_NAVIGATION_RIGHT = 'omt_right';

/* Sidebars. */

const SIDEBAR_POSTS  = 'omt_posts';
const SIDEBAR_FOOTER = 'omt_footer';
