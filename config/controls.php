<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Service\Protocol;
use Openmarco\Seriously\Asset\Script;
use Openmarco\Seriously\Asset\Style;
use Openmarco\Seriously\Template\Php;
use Openmarco\Seriously\Control\Control;

new Control(CONTROL_TEXT, new Php(Protocol::request('controls://text/control.phtml')));

new Control(CONTROL_NUMBER, new Php(Protocol::request('controls://number/control.phtml')), [
	new Script(SCRIPT_CONTROL_NUMBER, Protocol::request('url:controls://number/assets/js/script.js'))
], [
	ATTR_CUSTOM_VALUE => true,
	'min'             => ~PHP_INT_MAX,
	'max'             => PHP_INT_MAX,
	'step'            => 1
]);

new Control(CONTROL_CHECKBOX, new Php(Protocol::request('controls://checkbox/control.phtml')), [
	new Script(SCRIPT_CONTROL_CHECKBOX, Protocol::request('url:controls://checkbox/assets/js/script.js'))
], [
	ATTR_CUSTOM_VALUE   => true,
	ATTR_SEPARATE_LABEL => true
]);

new Control(CONTROL_TRISTATE, new Php(Protocol::request('controls://tristate/control.phtml')), null, [
	ATTR_CUSTOM_VALUE => true
]);

new Control(CONTROL_SELECT, new Php(Protocol::request('controls://select/control.phtml')), [
	new Style(STYLE_SELECT2, Protocol::request('url:theme://assets/css/vendor/select2.min.css')),
	new Script(SCRIPT_SELECT2, Protocol::request('url:theme://assets/js/vendor/select2.full.min.js'), ['jquery']),
	new Script(SCRIPT_CONTROL_SELECT, Protocol::request('url:controls://select/assets/js/script.js'), [
		'jquery',
		'select2'
	])
], [
	ATTR_CUSTOM_VALUE => true
]);

new Control(CONTROL_COLOR, new Php(Protocol::request('controls://color/control.phtml')), [
	new Style(STYLE_CONTROL_COLOR, Protocol::request('url:controls://color/assets/css/style.css'), ['wp-color-picker']),
	new Script(SCRIPT_CONTROL_COLOR, Protocol::request('url:controls://color/assets/js/script.js'), [
		'jquery',
		'wp-color-picker'
	])
], [
	'alpha' => false
]);

new Control(CONTROL_IMAGE, new Php(Protocol::request('controls://image/control.phtml')), [
	new Style(STYLE_CONTROL_IMAGE, Protocol::request('url:controls://image/assets/css/style.css')),
	new Script(SCRIPT_CONTROL_IMAGE, Protocol::request('url:controls://image/assets/js/script.js'))
], [
	ATTR_CUSTOM_VALUE => true
]);
