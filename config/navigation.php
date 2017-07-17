<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Html\Block;
use Openmarco\Seriously\Navigation\Menu;
use Openmarco\Seriously\Navigation\Navigation;

$navigation = new Navigation();

$navigation[MENU_NAVIGATION_LEFT]  = new Menu('Left navigation', 2, new Block(''), new Block(null, 'nav navbar-nav'));
$navigation[MENU_NAVIGATION_RIGHT] = new Menu('Right navigation', 2, new Block(''), new Block(null, 'nav navbar-nav float-lg-right'));

do_action(ACTION_OMT_NAVIGATION, $navigation);

$navigation->register();