<?php

use Openmarco\Seriously\Plugins\Context;

if (Context::isContactForm7()) {
	require_once __DIR__ . '/contact-form-7/main.php';
}

if(Context::isNinjaForms()) {
	require_once __DIR__ . '/ninja-forms/main.php';
}

if (Context::isVisualComposer()) {
	require_once __DIR__ . '/visual-composer/main.php';
}

if (Context::isWPJobManager()) {
	require_once __DIR__ . '/job-manager/main.php';
}
