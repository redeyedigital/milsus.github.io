<?php

namespace Openmarco\Seriously\Customizer;

use Openmarco\Seriously\Basic\Container;

/**
 * Existed WordPress customizer panel.
 */
class ExistedPanel extends Container implements IBlock {

	/**
	 * Constructor.
	 *
	 * @param Section[]|NULL $aSections -- child sections
	 */
	public function __construct(array $aSections = null) {
		parent::__construct(__NAMESPACE__ . '\\Section', $aSections);
	}

	/**
	 * Register panel in WordPress.
	 *
	 * @param string $aId -- panel identifier
	 */
	public function register($aId) {
		$aId = (string)$aId;
		foreach ($this as $id => $section) {
			$section->register($id, $aId);
		}
	}
}