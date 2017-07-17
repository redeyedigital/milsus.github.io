<?php

namespace Openmarco\Seriously\Feature;

use Openmarco\Seriously\std;

/**
 * WordPress custom header.
 * TODO: random-default
 * TODO: uploads
 */
class CustomHeader {

	/**
	 * @var integer|NULL -- header width
	 */
	private $_width = null;

	/**
	 * @var integer|NULL -- header height
	 */
	private $_height = null;

	/**
	 * @var boolean|NULL -- use flex width
	 */
	private $_flexWidth = false;
	
	/**
	 * @var boolean|NULL -- use flex height
	 */
	private $_flexHeight = null;
	
	/**
	 * @var string|NULL -- image URL
	 */
	private $_image = null;
	
	/**
	 * @var boolean|NULL -- use text in header
	 */
	private $_text = true;
	
	/**
	 * @var string|NULL -- color CSS value
	 */
	private $_textColor = null;

	/**
	 * @var Renderer -- renderer
	 */
	private $_renderer = null;

	/**
	 * Constructor.
	 *
	 * @param integer|NULL  $aWidth      -- header width
	 * @param integer|NULL  $aHeight     -- header height
	 * @param boolean|NULL  $aFlexWidth  -- use flex width
	 * @param boolean|NULL  $aFlexHeight -- use flex height
	 * @param string|NULL   $aImage      -- image URL
	 * @param boolean|NULL  $aText       -- use text in header
	 * @param string|NULL   $aTextColor  -- color CSS value
	 * @param Renderer|NULL $aRenderer   -- renderer
	 */
	public function __construct($aWidth = null, $aHeight = null, $aFlexWidth = null, $aFlexHeight = null, $aImage = null, $aText = null, $aTextColor = null, Renderer $aRenderer = null) {
		$this->_width      = $aWidth === null ? null : (integer)$aWidth;
		$this->_height     = $aHeight === null ? null : (integer)$aHeight;
		$this->_flexWidth  = $aFlexWidth === null ? null : (boolean)$aFlexWidth;
		$this->_flexHeight = $aFlexHeight === null ? null : (boolean)$aFlexHeight;
		$this->_image      = $aImage === null ? null : (string)$aImage;
		$this->_text       = $aText === null ? null : (string)$aText;
		$this->_textColor  = $aTextColor === null ? null : (string)$aTextColor;
		$this->_renderer   = $aRenderer === null ? new Renderer() : $aRenderer;
	}
	
	/**
	 * Register custom header in WordPress.
	 */
	public function register() {
		add_action(std\ACTION_WP_AFTER_SETUP_THEME, function () {
			$options = [/*
				'random-default' => false,
				'uploads'        => true,
			*/
			];
			if ($this->_width !== null) {
				$options['width'] = $this->_width;
			}
			if ($this->_height !== null) {
				$options['height'] = $this->_height;
			}
			if ($this->_flexWidth !== null) {
				$options['flex-width'] = $this->_flexWidth;
			}
			if ($this->_flexHeight !== null) {
				$options['flex-height'] = $this->_flexHeight;
			}
			if ($this->_image !== null) {
				$options['default-image'] = $this->_image;
			}
			if ($this->_text !== null) {
				$options['header-text'] = $this->_text;
			}
			if ($this->_textColor !== null) {
				$options['default-text-color'] = $this->_textColor;
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
				add_theme_support('custom-header', $options);
			} else {
				add_theme_support('custom-header');
			}
		}, 10);
	}
}