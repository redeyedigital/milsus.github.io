<?php

namespace Openmarco\Seriously\Html;

/**
 * HTML fragment.
 */
class Fragment {

	/**
	 * @var string|NULL -- HTML to place before fragment
	 */
	private $_before = null;

	/**
	 * @var string|NULL -- HTML to place after fragment
	 */
	private $_after = null;

	/**
	 * Constructor.
	 *
	 * @param string|NULL $aBefore -- HTML to place before fragment
	 * @param string|NULL $aAfter  -- HTML to place after fragment
	 */
	public function __construct($aBefore = null, $aAfter = null) {
		$this->_before = $aBefore === null ? null : (string)$aBefore;
		$this->_after  = $aAfter === null ? null : (string)$aAfter;
	}

	/**
	 * Get HTML to place before fragment.
	 * @return string|NULL -- HTML to place before fragment
	 */
	public function getBefore() {
		return $this->_before;
	}

	/**
	 * Get HTML to place after fragment.
	 * @return string|NULL -- HTML to place after fragment
	 */
	public function getAfter() {
		return $this->_after;
	}
}