<?php

namespace Openmarco\Seriously\Navigation;

use Openmarco\Seriously\Basic\Container;

/**
 * WordPress navigation.
 */
class Navigation extends Container {

	/**
	 * Constructor.
	 *
	 * @param Menu[]|NULL $aMenus -- menus
	 */
	public function __construct(array $aMenus = null) {
		parent::__construct(__NAMESPACE__ . '\\Menu', $aMenus);
	}

	/**
	 * Register navigation in WordPress.
	 */
	public function register() {
		foreach ($this as $id => $menu) {
			$menu->register($id);
		}
	}
}