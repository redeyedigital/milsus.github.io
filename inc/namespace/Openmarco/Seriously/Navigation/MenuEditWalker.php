<?php

namespace Openmarco\Seriously\Navigation;

use Openmarco\Seriously\std;
use Walker_Nav_Menu_Edit;

/**
 * Class MenuEditWalker.
 * Used to override default WP Walker_Nav_Menu_Edit.
 * Adds filter to insert additional menu fields controls.
 * @package Openmarco\Seriously\Navigation
 */
class MenuEditWalker extends Walker_Nav_Menu_Edit {
	
	/**
	 * Start the element output.
	 * @see   Walker_Nav_Menu::start_el()
	 * @since 3.0.0
	 * @global int   $_wp_nav_menu_max_depth
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   Not used.
	 * @param int    $id     Not used.
	 */
	public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
		$startElement = '';
		parent::start_el($startElement, $item, $depth, $args, $id);
		
		$insertHtml = apply_filters(std\FILTER_OMT_WALKER_NAV_MENU_EDIT_FIELDS, '', $item, $depth);
		
		if ($insertHtml) {
			$split = strpos($startElement, '<p class="field-css-classes');
			
			$output .= substr($startElement, 0, $split - 1)
			           . apply_filters(std\FILTER_OMT_WALKER_NAV_MENU_EDIT_FIELDS, '', $item, $depth)
			           . substr($startElement, $split);
		} else {
			$output .= $startElement;
		}
	}
}