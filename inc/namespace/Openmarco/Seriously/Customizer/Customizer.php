<?php

namespace Openmarco\Seriously\Customizer;

use Openmarco\Seriously\Service\Data;
use Openmarco\Seriously\Basic\Container;

/**
 * WordPress customizer.
 */
class Customizer extends Container {

	/**
	 * Check if theme modification exists.
	 *
	 * @param string $aId -- theme modification identifier
	 *
	 * @return boolean -- theme modification exists
	 */
	public static function exists($aId) {
		$aId = (string)$aId;

		return Field::exists($aId) || get_theme_mod($aId) !== false;
	}

	/**
	 * Get theme modification value.
	 *
	 * @param string $aId      -- theme modification identifier
	 * @param mixed  $aDefault -- default value
	 *
	 * @return mixed -- theme modification value
	 */
	public static function get($aId, $aDefault = null) {
		$aId = (string)$aId;
		if (false === $value = get_theme_mod($aId)) {
			if (Field::exists($aId)) {
				return Field::get($aId)->getDefault();
			}

			return $aDefault;
		}

		return Data::unpack((string)$value);
	}

	/**
	 * Set theme modification value.
	 *
	 * @param string $aId    -- theme modification identifier
	 * @param mixed  $aValue -- value
	 */
	public static function set($aId, $aValue) {
		set_theme_mod((string)$aId, Data::pack($aValue));
	}

	/**
	 * Constructor.
	 *
	 * @param IBlock[]|NULL $aBlocks -- blocks
	 */
	public function __construct(array $aBlocks = null) {
		parent::__construct(__NAMESPACE__ . '\\IBlock', $aBlocks);
	}

	/**
	 * Register customizer in WordPress.
	 */
	public function register() {
		foreach ($this as $id => $block) {
			$block->register($id);
		}
	}
}