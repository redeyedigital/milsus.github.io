<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Desktop\Desktop;
use Openmarco\Seriously\Desktop\Sidebar;

$desktop = new Desktop();

$desktop[SIDEBAR_POSTS] = new Sidebar('Posts Page Right Sidebar', 'Widget area will be shown right at the posts page\'s');
$desktop[SIDEBAR_FOOTER] = new Sidebar('Footer', 'Widget area will be shown at the page\'s bottom');

do_action(ACTION_OMT_DESKTOP, $desktop);

$desktop->register();