<?php

namespace Openmarco\Seriously\Navigation;

use Openmarco\Seriously\Basic\UAccessory;
use Openmarco\Seriously\Html\Block;
use Openmarco\Seriously\Html\Fragment;
use Openmarco\Seriously\std;
use RuntimeException;

/**
 * WordPress navigation menu.
 */
class Menu {

	use UAccessory;
	
	/**
	 * @const integer -- all menu levels
	 */
	const DEPTH_ALL = 0;
	
	/**
	 * @const integer -- all menu levels in flat list
	 */
	const DEPTH_FLAT = -1;

	/**
	 * Check if menu is active.
	 *
	 * @param string $aId -- menu identifier
	 *
	 * @return boolean -- menu is active
	 */
	public static function active($aId) {
		$aId = (string)$aId;

		return self::exists($aId) && has_nav_menu($aId);
	}

	/**
	 * @var string|NULL -- registered menu identifier
	 */
	private $_id = null;

	/**
	 * @var string -- menu description
	 */
	private $_description = null;

	/**
	 * @var integer|NULL -- menu depth
	 */
	private $_depth = null;

	/**
	 * @var Block -- menu container
	 */
	private $_container = null;

	/**
	 * @var Block -- menu wrap
	 */
	private $_wrap = null;

	/**
	 * @var Fragment -- menu anchor
	 */
	private $_anchor = null;
	
	/**
	 * @var Fragment -- menu text
	 */
	private $_text = null;

	/**
	 * Constructor.
	 *
	 * @param string        $aDescription -- menu description
	 * @param integer|NULL  $aDepth       -- menu depth
	 * @param Block|NULL    $aContainer   -- menu container
	 * @param Block|NULL    $aWrap        -- menu wrap
	 * @param Fragment|NULL $aAnchor      -- menu anchor
	 * @param Fragment|NULL $aText        -- menu text
	 */
	public function __construct($aDescription, $aDepth = null, Block $aContainer = null, Block $aWrap = null, Fragment $aAnchor = null, Fragment $aText = null) {
		$this->_description = (string)$aDescription;
		$this->_depth       = $aDepth === null ? null : (integer)$aDepth;
		$this->_container   = $aContainer === null ? new Block() : $aContainer;
		$this->_wrap        = $aWrap === null ? new Block() : $aWrap;
		$this->_anchor      = $aAnchor === null ? new Fragment() : $aAnchor;
		$this->_text        = $aText === null ? new Fragment() : $aText;
	}

	/**
	 * Register menu in WordPress.
	 *
	 * @param string $aId -- menu identifier
	 */
	public function register($aId) {
		$aId = (string)$aId;
		add_action(std\ACTION_WP_INIT, function () use ($aId) {
			register_nav_menu($aId, $this->_description);
		}, 10);
		$this->_id = $aId;
		$this->_publish($aId);
	}

	/**
	 * Render menu.
	 * @throws RuntimeException -- Menu must be registered before render
	 */
	public function render() {
		if ($this->_id === null) {
			throw new RuntimeException('Menu must be registered before render');
		}
		$options = [
			'theme_location' => $this->_id,
			'fallback_cb'    => false
		];
		if ($this->_depth !== null) {
			$options['depth'] = $this->_depth;
		}
		if (null !== $option = $this->_container->getPattern()) {
			$options['container'] = $option;
		}
		if (null !== $option = $this->_container->getClass()) {
			$options['container_class'] = $option;
		}
		if (null !== $option = $this->_container->getId()) {
			$options['container_id'] = $option;
		}
		if (null !== $option = $this->_wrap->getPattern()) {
			$options['items_wrap'] = $option;
		}
		if (null !== $option = $this->_wrap->getClass()) {
			$options['menu_class'] = $option;
		}
		if (null !== $option = $this->_wrap->getId()) {
			$options['menu_id'] = $option;
		}
		if (null !== $option = $this->_anchor->getBefore()) {
			$options['before'] = $option;
		}
		if (null !== $option = $this->_anchor->getAfter()) {
			$options['after'] = $option;
		}
		if (null !== $option = $this->_text->getBefore()) {
			$options['link_before'] = $option;
		}
		if (null !== $option = $this->_text->getAfter()) {
			$options['link_after'] = $option;
		}
		wp_nav_menu($options);
	}
}