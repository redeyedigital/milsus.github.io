<?php

namespace Openmarco\Seriously\Html;

/**
 * CSS writer.
 */
class CssWriter {

	/**
	 * Create new instance of Css class
	 * @return $this
	 */
	public static function init() {
		return new CssWriter();
	}
	
	/**
	 * @var array List of selectors with parameters
	 */
	private $_selectors = [];

	/**
	 * Return finalized CSS string
	 * @return string
	 */
	public function __toString() {
		$css = '';

		foreach ($this->_selectors as $selector => $parameters) {
			$params = null;

			foreach ((array)$parameters as $pKey => $pVal) {
				if (null !== $pVal && '' !== $pVal) {
					$params .= $pKey . ': ' . $pVal . ';';
				}
			}

			if (null !== $params) {
				$css .= "{$selector} {{$params}}";
			}
		}

		return $css;
	}
	
	/**
	 * @return array
	 */
	public function getAll() {
		return $this->_selectors;
	}
	
	/**
	 * Add parameter to selector
	 *
	 * @param string|array $selector  selector name or list of names
	 * @param string|array $parameter parameter name or list of parameters values with parameters names as keys
	 * @param string       $value     if $parameter is string, than set as value
	 *
	 * @return $this
	 */
	public function set($selector, $parameter, $value = null) {
		$selectors  = is_string($selector) ? [$selector] : (array)$selector;
		$parameters = is_string($parameter) ? [$parameter => $value] : (array)$parameter;
		
		foreach ($selectors as $singleSelector) {
			$this->_set($singleSelector, $parameters);
		}
		
		return $this;
	}
	
	/**
	 * @param CssWriter $cssWriter
	 *
	 * @return $this
	 */
	public function extend(CssWriter $cssWriter) {
		$cssSelectors = $cssWriter->getAll();
		
		foreach ($cssSelectors as $selector => $parameters) {
			$this->_set($selector, $parameters);
		}
		
		return $this;
	}
	
	/**
	 * Clear all parameters
	 * @return $this
	 */
	public function clear() {
		$this->_selectors = [];
		
		return $this;
	}
	
	/**
	 * Add parameter to selector
	 *
	 * @param string   $selector   selector name
	 * @param string[] $parameters list of parameters values with parameters names as keys
	 */
	private function _set($selector, array $parameters) {
		if (array_key_exists($selector, $this->_selectors)) {
			$this->_selectors[$selector] = array_merge($this->_selectors[$selector], $parameters);
		} else {
			$this->_selectors[$selector] = $parameters;
		}
	}
}
