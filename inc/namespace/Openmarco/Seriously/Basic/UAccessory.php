<?php

namespace Openmarco\Seriously\Basic;

use RuntimeException;

/**
 * Accessory.
 */
trait UAccessory {
	
	/**
	 * @var array -- published accessories
	 */
	private static $_published = [];
	
	/**
	 * Check if accessory is published.
	 *
	 * @param string $aId -- accessory identifier
	 *
	 * @return boolean -- accessory is published
	 */
	public static function exists($aId) {
		$class = get_called_class();

		return array_key_exists($class, self::$_published) && array_key_exists((string)$aId, self::$_published[$class]);
	}
	
	/**
	 * Get published accessory.
	 *
	 * @param string $aId -- published accessory identifier
	 *
	 * @return static -- published accessory
	 * @throws RuntimeException -- Accessory "%s" is not published
	 */
	public static function get($aId) {
		$aId   = (string)$aId;
		$class = get_called_class();
		if (!array_key_exists($class, self::$_published) || !array_key_exists($aId, self::$_published[$class])) {
			throw new RuntimeException(basename(get_called_class()) . ' "' . $aId . '" is not published');
		}
		
		return self::$_published[$class][$aId];
	}

	/**
	 * Publish accessory.
	 *
	 * @param string $aId -- accessory identifier
	 *
	 * @throws RuntimeException -- Accessory "%s" already published
	 */
	private function _publish($aId) {
		$aId   = (string)$aId;
		$class = get_called_class();
		if (array_key_exists($class, self::$_published) && array_key_exists($aId, self::$_published[$class])) {
			throw new RuntimeException(basename(get_called_class()) . ' "' . $aId . '" already published');
		}
		self::$_published[$class][$aId] = $this;
	}
}