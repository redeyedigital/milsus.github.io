<?php

namespace Openmarco\Seriously\Html;

/**
 * HTML block.
 */
class Block {

	/**
	 * @var string|NULL -- block HTML pattern
	 */
	private $_pattern = null;

	/**
	 * @var string|NULL -- block CSS class
	 */
	private $_class = null;

	/**
	 * @var string|NULL -- block HTML identifier
	 */
	private $_id = null;

	/**
	 * Constructor.
	 *
	 * @param string|NULL $aPattern -- block HTML pattern
	 * @param string|NULL $aClass   -- block CSS class
	 * @param string|NULL $aId      -- block HTML identifier
	 */
	public function __construct($aPattern = null, $aClass = null, $aId = null) {
		$this->_pattern = $aPattern === null ? null : (string)$aPattern;
		$this->_class   = $aClass === null ? null : (string)$aClass;
		$this->_id      = $aId === null ? null : (string)$aId;
	}

	/**
	 * Get block HTML pattern.
	 * @return string|NULL -- HTML block pattern
	 */
	public function getPattern() {
		return $this->_pattern;
	}

	/**
	 * Get block CSS class.
	 * @return string|NULL -- block CSS class
	 */
	public function getClass() {
		return $this->_class;
	}

	/**
	 * Get block HTML identifier.
	 * @return string|NULL -- block HTML identifier
	 */
	public function getId() {
		return $this->_id;
	}
}