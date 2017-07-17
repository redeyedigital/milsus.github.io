<?php

use Openmarco\Seriously\Service\Context;
use Openmarco\Seriously\Template\Layout;

if (Context::isPublic()) {
	$layout = new Layout('shared/layout');
	$layout->register();
}
