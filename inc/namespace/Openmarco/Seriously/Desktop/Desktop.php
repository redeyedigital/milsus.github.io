<?php

namespace Openmarco\Seriously\Desktop;

use Openmarco\Seriously\Basic\Container;

/**
 * WordPress desktop.
 */
class Desktop extends Container {

	/**
	 * Constructor.
	 *
	 * @param Sidebar[]|NULL $aSidebars -- sidebars
	 */
	public function __construct(array $aSidebars = null) {
		parent::__construct(__NAMESPACE__ . '\\Sidebar', $aSidebars);
	}

	/**
	 * Register desktop in WordPress.
	 */
	public function register() {
		foreach ($this as $id => $sidebar) {
			$sidebar->register($id);
		}
	}
}