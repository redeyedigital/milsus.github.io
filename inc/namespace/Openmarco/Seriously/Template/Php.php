<?php

namespace Openmarco\Seriously\Template;

use RuntimeException;

/**
 * PHP template.
 */
class Php implements ITemplate {

	/**
	 * @var string -- path to PHP file
	 */
	private $_path = null;

	/**
	 * Constructor.
	 *
	 * @param string $aPath -- path to PHP file
	 *
	 * @throws RuntimeException -- Invalid path "%s"
	 */
	public function __construct($aPath) {
		$aPath = (string)$aPath;
		if (!is_file($aPath)) {
			throw new RuntimeException('Invalid file "' . $aPath . '"');
		}
		$this->_path = $aPath;
	}

	/**
	 * Render PHP template.
	 *
	 * @param array|NULL $aVariables -- variables
	 */
	public function render(array $aVariables = null) {
		php_template_render($this->_path, $aVariables ?: []);
	}
}

/**
 * Render PHP template.
 * External function required to prevent private access to $this which allowed in PHP anonymous functions since version 5.4.
 *
 * @param string $php_template_file      -- path to PHP file
 * @param array  $php_template_variables -- variables
 */
function php_template_render($php_template_file, array $php_template_variables) {
	extract($php_template_variables, EXTR_OVERWRITE);
	require $php_template_file;
}