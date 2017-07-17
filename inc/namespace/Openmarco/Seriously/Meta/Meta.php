<?php

namespace Openmarco\Seriously\Meta;

use Openmarco\Seriously\Basic\Container;
use Openmarco\Seriously\Service\Data;

/**
 * WordPress meta.
 */
class Meta extends Container {

	/**
	 * Check if metadata exists.
	 *
	 * @param integer $aPostId -- associated WordPress post identifier
	 * @param string  $aId     -- metadata identifier
	 *
	 * @return boolean -- metadata exists
	 */
	public static function exists($aPostId, $aId) {
		$aId   = (string)$aId;
		$value = get_post_meta((integer)$aPostId, $aId, false);

		return Field::exists($aId) || (is_array($value) && count($value));
	}

	/**
	 * Get metadata value.
	 *
	 * @param integer $aPostId  -- associated WordPress post identifier
	 * @param string  $aId      -- metadata identifier
	 * @param mixed   $aDefault -- default value
	 *
	 * @return mixed -- metadata value
	 */
	public static function get($aPostId, $aId, $aDefault = null) {
		$aId   = (string)$aId;
		$aPostId = (int)$aPostId;
		$value = get_post_meta($aPostId, $aId, false);
		if (!is_array($value) || !count($value)) {
			if (Field::exists($aId)) {
				return Field::get($aId)->getDefault();
			}

			return $aDefault;
		}
		
		// Cleanup meta
		if(count($value) > 1) {
			delete_post_meta($aPostId, $aId);
			update_post_meta($aPostId, $aId, $value[0]);
		}
		

		return Data::unpack((string)$value[0]);
	}

	/**
	 * Set metadata value.
	 *
	 * @param integer $aPostId -- associated WordPress post identifier
	 * @param string  $aId     -- metadata identifier
	 * @param mixed   $aValue  -- value
	 */
	public static function set($aPostId, $aId, $aValue) {
		update_post_meta((integer)$aPostId, (string)$aId, Data::pack($aValue));
	}
	
	/**
	 * Constructor.
	 *
	 * @param Meta[]|NULL $aBoxes -- child boxes
	 */
	public function __construct(array $aBoxes = null) {
		parent::__construct(__NAMESPACE__ . '\\Box', $aBoxes);
	}
	
	/**
	 * Register meta in WordPress.
	 */
	public function register() {
		foreach ($this as $id => $box) {
			$box->register($id);
		}
	}
}