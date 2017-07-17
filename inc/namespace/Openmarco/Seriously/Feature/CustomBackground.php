<?php

namespace Openmarco\Seriously\Feature;

use Openmarco\Seriously\std;

/**
 * WordPress custom background.
 */
class CustomBackground {
	
	/**
	 * @var string|NULL -- background-color CSS value
	 */
	private $_color = null;

	/**
	 * @var string|NULL -- background-image CSS value
	 */
	private $_image = null;

	/**
	 * @var string|NULL -- background-position-x CSS value
	 */
	private $_position = null;

	/**
	 * @var string|NULL -- background-repeat CSS value
	 */
	private $_repeat = null;

	/**
	 * @var string -- background-attachment CSS value
	 */
	private $_attachment = null;

	/**
	 * @var Renderer -- renderer
	 */
	private $_renderer = null;

	/**
	 * Constructor.
	 *
	 * @param string|NULL   $aColor      -- background-color CSS value
	 * @param string|NULL   $aImage      -- background-image CSS value
	 * @param string|NULL   $aPosition   -- background-position-x CSS value
	 * @param string|NULL   $aRepeat     -- background-repeat CSS value
	 * @param string|NULL   $aAttachment -- background-attachment CSS value
	 * @param Renderer|NULL $aRenderer   -- renderer
	 */
	public function __construct($aColor = null, $aImage = null, $aPosition = null, $aRepeat = null, $aAttachment = null, Renderer $aRenderer = null) {
		$this->_color      = $aColor === null ? null : (string)$aColor;
		$this->_image      = $aImage === null ? null : (string)$aImage;
		$this->_position   = $aPosition === null ? null : (string)$aPosition;
		$this->_repeat     = $aRepeat === null ? null : (string)$aRepeat;
		$this->_attachment = $aAttachment === null ? null : (string)$aAttachment;
		$this->_renderer   = $aRenderer === null ? new Renderer() : $aRenderer;
	}

	/**
	 * Register custom background in WordPress.
	 */
	public function register() {
		add_action(std\ACTION_WP_AFTER_SETUP_THEME, function () {
			$options = [];
			if ($this->_color !== null) {
				$options['default-color'] = $this->_color;
			}
			if ($this->_image !== null) {
				$options['default-image'] = $this->_image;
			}
			if ($this->_position !== null) {
				$options['default-position-x'] = $this->_position;
			}
			if ($this->_repeat !== null) {
				$options['default-repeat'] = $this->_color;
			}
			if ($this->_attachment !== null) {
				$options['default-attachment'] = $this->_attachment;
			}
			if (null !== $option = $this->_renderer->getPublic()) {
				$options['wp-head-callback'] = $option;
			}
			if (null !== $option = $this->_renderer->getCustomizer()) {
				$options['admin-preview-callback'] = $option;
			}
			if (null !== $option = $this->_renderer->getDashboard()) {
				$options['admin-head-callback'] = $option;
			}
			if ($options) {
				add_theme_support('custom-background', $options);
			} else {
				add_theme_support('custom-background');
			}
		}, 10);
	}
}