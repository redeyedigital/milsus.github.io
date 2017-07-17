<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Asset\Script;
use Openmarco\Seriously\Asset\Style;
use Openmarco\Seriously\Service\Protocol;

/* Common */

/** @var Style[] $styles */
$styles = [];

$styles[STYLE_IONICONS] = new Style(STYLE_IONICONS, Protocol::request('url:assets://css/ionicons.min.css'));
$styles[STYLE_ET_LINE]  = new Style(STYLE_ET_LINE, Protocol::request('url:assets://css/et-line.css'));

/* Public */

/** @var Style[] $publicStyles */
$publicStyles = array_merge($styles, []);

$publicStyles[STYLE_OM_THEME] = new Style(STYLE_OM_THEME, Protocol::request('url:assets://css/style.min.css'));

/** @var Script[] $publicScripts */
$publicScripts = [];

$publicScripts[SCRIPT_MODERNIZR]              = new Script(SCRIPT_MODERNIZR, Protocol::request('url:assets://js/vendor/modernizr.min.js'), null, false);
$publicScripts[SCRIPT_JQUERY_REACTIVE_IMAGES] = new Script(SCRIPT_JQUERY_REACTIVE_IMAGES, Protocol::request('url:assets://js/vendor/reactive-images-css.umd.min.js'), [SCRIPT_JQUERY]);
$publicScripts[SCRIPT_SELECT2]                = new Script(SCRIPT_SELECT2, Protocol::request('url:assets://js/vendor/select2.full.min.js'), [SCRIPT_JQUERY]);
$publicScripts[SCRIPT_OM_THEME]               = new Script(SCRIPT_OM_THEME, Protocol::request('url:assets://js/scripts.min.js'), [SCRIPT_JQUERY]);

do_action(ACTION_OMT_PUBLIC_ASSETS, $publicStyles, $publicScripts);

foreach ($publicStyles as $style) {
	$style->add(Style::TARGET_PUBLIC);
}

foreach ($publicScripts as $script) {
	$script->add(Script::TARGET_PUBLIC);
}

/* Dashboard */

/** @var Style[] $dashboardStyles */
$dashboardStyles = array_merge($styles, []);

$dashboardStyles[STYLE_OM_DB_VISUAL_COMPOSER] = new Style(STYLE_OM_DB_VISUAL_COMPOSER, Protocol::request('url:assets://css/admin/visual-composer.css'));

/** @var Script[] $dashboardScripts */
$dashboardScripts = [];

do_action(ACTION_OMT_DASHBOARD_ASSETS, $dashboardStyles, $dashboardScripts);

foreach ($dashboardStyles as $style) {
	$style->add(Style::TARGET_DASHBOARD);
}

foreach ($dashboardScripts as $script) {
	$script->add(Script::TARGET_DASHBOARD);
}
