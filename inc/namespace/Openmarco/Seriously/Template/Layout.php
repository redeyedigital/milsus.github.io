<?php

namespace Openmarco\Seriously\Template;

use Openmarco\Seriously\std;

class Layout {
	
	/**
	 * @var Layout
	 */
	private static $_instance;
	
	/**
	 * @var string Relative path to layout template without extension.
	 */
	private $_layout;
	
	/**
	 * @var string The path of the template to include.
	 */
	private $_body;
	
	/**
	 * Layout constructor.
	 *
	 * @param string $layout Relative path to layout template without extension.
	 */
	public function __construct($layout) {
		$this->_layout = $layout;
	}
	
	/**
	 * @param string $body The path of the template to include.
	 *
	 * @return string The path of the template layout to include.
	 */
	public function _wrap_($body) {
		$this->_body = $body;
		
		return locate_template($this->_layout . '.php');
	}
	
	/**
	 * Register layout in WordPress.
	 */
	public function register() {
		self::$_instance = $this;
		add_filter(std\FILTER_WP_TEMPLATE_INCLUDE, [$this, '_wrap_'], 90);
	}
	
	/**
	 * Render body
	 */
	public static function body() {
		$instance = self::$_instance;
		
		if (file_exists($instance->_body)) {
			load_template($instance->_body, true);
		}
	}
}