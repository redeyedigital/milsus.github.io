<?php

namespace Openmarco\Seriously\Customizer;

use Openmarco\Seriously\Basic\Container;

/**
 * Existed WordPress customizer section.
 */
class ExistedSection extends Container implements IBlock {

	/**
	 * Constructor.
	 *
	 * @param Field[]|NULL $aFields -- child fields
	 */
	public function __construct(array $aFields = null) {
		parent::__construct(__NAMESPACE__ . '\\Field', $aFields);
	}

	/**
	 * Register section in WordPress.
	 *
	 * @param string $aId -- section identifier
	 */
	public function register($aId) {
		$aId = (string)$aId;
		foreach ($this as $id => $field) {
			$field->register($id, $aId);
		}
	}
}