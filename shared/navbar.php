<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Html\Helpers;
use Openmarco\Seriously\Navigation\Menu;
use Openmarco\Seriously\Service\Option;
use Openmarco\Seriously\Service\Page;

$id               = Page::getCurrentId();
$navbarClasses    = apply_filters(FILTER_OMT_NAVBAR_CLASSES, ['navbar']);
$navbarAttributes = apply_filters(FILTER_OMT_NAVBAR_ATTRIBUTES, ['class' => $navbarClasses]);
$containerClass   = Option::get($id, OPTION_NAVBAR_LAYOUT) === 'fluid' ? 'container-fluid' : 'container';

?>

<?php do_action(ACTION_OMT_BEFORE_NAVIGATION) ?>

<div class="navbar-wrapper">
    <nav <?php Helpers::attributes($navbarAttributes); ?>>
        <div <?php Helpers::classes($containerClass); ?>>
            <div class="navbar-head clearfix-md-down">
				<?php get_template_part('parts/navbar/toggle') ?>
				<?php get_template_part('parts/navbar/brand') ?>
            </div>
            <div class="collapse navbar-toggleable-md" id="navbarResponsive">
				<?php Menu::get(MENU_NAVIGATION_LEFT)->render(); ?>
				<?php Menu::get(MENU_NAVIGATION_RIGHT)->render(); ?>
            </div>
        </div>
    </nav>
</div>

<?php do_action(ACTION_OMT_AFTER_NAVIGATION) ?>
