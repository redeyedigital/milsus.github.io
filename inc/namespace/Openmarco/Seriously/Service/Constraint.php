<?php

namespace Openmarco\Seriously\Service;

/**
 * Constraint.
 */
class Constraint {
	
	/**
	 * Check if theme supports features.
	 *
	 * @param string[] $aFeatures -- theme features
	 *
	 * @return boolean -- theme supports features
	 */
	public static function themeSupports(array $aFeatures) {
		if ($aFeatures) {
			foreach ($aFeatures as $feature) {
				if (!current_theme_supports((string)$feature)) {
					return false;
				}
			}
		}
		
		return true;
	}
	
	/**
	 * @var callable|NULL -- constraint callback
	 */
	private $_callback = null;
	
	/**
	 * @var string[] -- required theme features
	 */
	private $_features = [];
	
	/**
	 * @var string|NULL -- required user capability
	 */
	private $_capability = null;
	
	/**
	 * Constructor.
	 *
	 * @param callable|NULL $aCallback   -- constraint callback
	 * @param array|NULL    $aFeatures   -- required theme features
	 * @param string|NULL   $aCapability -- required user capability
	 */
	public function __construct(callable $aCallback = null, array $aFeatures = null, $aCapability = null) {
		$this->_callback = $aCallback;
		if ($aFeatures) {
			foreach ($aFeatures as $feature) {
				$this->_features[] = (string)$feature;
			}
		}
		$this->_capability = $aCapability === null ? null : (string)$aCapability;
	}
	
	/**
	 * Magic call as a function.
	 * @return boolean -- constraint adhered
	 */
	public function __invoke() {
		return
			($this->_capability === null || current_user_can($this->_capability)) &&
			(!$this->_features || self::themeSupports($this->_features)) &&
			($this->_callback === null || call_user_func($this->_callback));
	}
	
	/**
	 * Get constraint callback.
	 * @return callable|NULL -- constraint callback
	 */
	public function getCallback() {
		return $this->_callback;
	}
	
	/**
	 * Get required theme features.
	 * @return string[] -- required theme features
	 */
	public function getFeatures() {
		return $this->_features;
	}
	
	/**
	 * Get required user capability.
	 * @return string|NULL -- required user capability
	 */
	public function getCapability() {
		return $this->_capability;
	}
}