<?php

namespace Openmarco\Seriously\Customizer;

/**
 * WordPress customizer field behavior.
 */
class Behavior {

	/**
	 * @var boolean -- field is live (doesn't refresh WordPress customizer's preview window automatically)
	 */
	private $_live = null;

	/**
	 * @var callable|NULL -- field server filtering callback
	 */
	private $_serverFilter = null;

	/**
	 * @var string|NULL -- field client filtering callback
	 */
	private $_clientFilter = null;

	/**
	 * Constructor.
	 *
	 * @param boolean       $aLive         -- field is live
	 * @param callable|NULL $aServerFilter -- field server filtering callback
	 * @param string|NULL   $aClientFilter -- field client filtering callback
	 */
	public function __construct($aLive = false, callable $aServerFilter = null, $aClientFilter = null) {
		$this->_live         = (boolean)$aLive;
		$this->_serverFilter = $aServerFilter;
		$this->_clientFilter = $aClientFilter === null ? null : (string)$aClientFilter;
	}

	/**
	 * Check if field is live.
	 * @return boolean -- field is live
	 */
	public function getLive() {
		return $this->_live;
	}

	/**
	 * Get field server filtering callback.
	 * @return callable|NULL -- field server filtering callback
	 */
	public function getServerFilter() {
		return $this->_serverFilter;
	}

	/**
	 * Get field client filtering callback.
	 * @return string|NULL -- field client filtering callback
	 */
	public function getClientFilter() {
		return $this->_clientFilter;
	}
}