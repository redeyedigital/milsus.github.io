<?php

namespace Openmarco\Seriously\Basic;

use ArrayAccess;
use Iterator;
use RuntimeException;

/**
 * Container.
 */
class Container implements ArrayAccess, Iterator {
	
	/**
	 * @var string -- item type
	 */
	private $_type = null;
	
	/**
	 * @var object[] -- items
	 */
	private $_items = [];
	
	/**
	 * Constructor.
	 *
	 * @param string|NULL   $aType  -- item type
	 * @param object[]|NULL $aItems -- items
	 *
	 * @throws RuntimeException -- Invalid item type "%s"
	 */
	public function __construct($aType, array $aItems = null) {
		$aType = (string)$aType;
		if (!class_exists($aType) && !interface_exists($aType)) {
			throw new RuntimeException('Invalid item type "' . $aType . '"');
		}
		$this->_type = $aType;
		if ($aItems) {
			$this->add($aItems);
		}
	}
	
	/**
	 * Check if item exists.
	 *
	 * @param string $aOffset -- item offset
	 *
	 * @return boolean -- item exists
	 */
	public function offsetExists($aOffset) {
		return array_key_exists((string)$aOffset, $this->_items);
	}
	
	/**
	 * Get item.
	 *
	 * @param string $aOffset -- item offset
	 *
	 * @return object -- item
	 * @throws RuntimeException -- Item "%s" is not defined
	 */
	public function offsetGet($aOffset) {
		$aOffset = (string)$aOffset;
		if (!array_key_exists($aOffset, $this->_items)) {
			throw new RuntimeException('Item "' . $aOffset . '" is not defined');
		}
		
		return $this->_items[$aOffset];
	}
	
	/**
	 * Set item.
	 *
	 * @param string $aOffset -- item offset
	 * @param object $aValue  -- item
	 *
	 * @throws RuntimeException -- Item "%s" already exists
	 * @throws RuntimeException -- Invalid item
	 */
	public function offsetSet($aOffset, $aValue) {
		$aOffset = (string)$aOffset;
		if (array_key_exists($aOffset, $this->_items)) {
			throw new RuntimeException('Item "' . $aOffset . '" already exists');
		}
		if (!($aValue instanceof $this->_type)) {
			throw new RuntimeException('Invalid item');
		}
		$this->_items[$aOffset] = $aValue;
	}
	
	/**
	 * Delete item.
	 *
	 * @param string $aOffset -- item offset
	 *
	 * @throws RuntimeException -- Item "%s" is not defined
	 */
	public function offsetUnset($aOffset) {
		$aOffset = (string)$aOffset;
		if (!array_key_exists($aOffset, $this->_items)) {
			throw new RuntimeException('Item "' . $aOffset . '" is not defined');
		}
		
		unset($this->_items[$aOffset]);
	}
	
	/**
	 * Get current item.
	 * @return object|FALSE -- current item
	 */
	public function current() {
		return current($this->_items);
	}
	
	/**
	 * Move forward to next item.
	 */
	public function next() {
		next($this->_items);
	}
	
	/**
	 * Get current item identifier.
	 * @return string|NULL -- current item identifier
	 */
	public function key() {
		return key($this->_items);
	}
	
	/**
	 * Checks if current position is valid.
	 * @return boolean -- current position is valid.
	 */
	public function valid() {
		return key($this->_items) !== null;
	}
	
	/**
	 * Rewind the Iterator to the first item.
	 */
	public function rewind() {
		reset($this->_items);
	}
	
	/**
	 * Add items.
	 *
	 * @param object[]|NULL $aItems -- items
	 *
	 * @throws RuntimeException -- Invalid items
	 */
	public function add(array $aItems) {
		if ($aItems) {
			foreach ($aItems as $id => $item) {
				if (!($item instanceof $this->_type)) {
					throw new RuntimeException('Invalid items');
				}
				$this->_items[(string)$id] = $item;
			}
		}
	}
}