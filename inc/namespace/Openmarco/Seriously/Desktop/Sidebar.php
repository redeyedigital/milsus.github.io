<?php

namespace Openmarco\Seriously\Desktop;

use Openmarco\Seriously\Basic\UAccessory;
use Openmarco\Seriously\Html\Fragment;
use Openmarco\Seriously\std;
use RuntimeException;

/**
 * WordPress sidebar.
 */
class Sidebar {

	use UAccessory;

	/**
	 * Check if sidebar is active.
	 *
	 * @param string $aId -- sidebar identifier
	 *
	 * @return boolean -- sidebar is active
	 */
	public static function active($aId) {
		$aId = (string)$aId;

		return self::exists($aId) && is_active_sidebar($aId);
	}

	/**
	 * @var string|NULL -- registered sidebar identifier
	 */
	private $_id = null;

	/**
	 * @var string -- sidebar title
	 */
	private $_title = null;

	/**
	 * @var string -- sidebar description
	 */
	private $_description = null;
	
	/**
	 * @var string|NULL -- sidebar CSS class for dashboard
	 */
	private $_class = null;

	/**
	 * @var Fragment -- sidebar header
	 */
	private $_header = null;
	
	/**
	 * @var Fragment -- sidebar widget
	 */
	private $_widget = null;

	/**
	 * Constructor.
	 *
	 * @param string        $aTitle       -- sidebar title
	 * @param string|NULL   $aDescription -- sidebar description
	 * @param string|NULL   $aClass       -- sidebar CSS class for dashboard
	 * @param Fragment|NULL $aHeader      -- sidebar header
	 * @param Fragment|NULL $aWidget      -- sidebar widget
	 */
	public function __construct($aTitle, $aDescription = null, $aClass = null, Fragment $aHeader = null, Fragment $aWidget = null) {
		$this->_title       = (string)$aTitle;
		$this->_description = $aDescription === null ? null : (string)$aDescription;
		$this->_class       = $aClass === null ? null : (string)$aClass;
		$this->_header      = $aHeader === null ? new Fragment('<h3 class="widget-title">', '</h3>') : $aHeader;
		$this->_widget      = $aWidget === null ? new Fragment('<section class="widget %1$s %2$s">', '</section>') : $aWidget;
	}

	/**
	 * Register sidebar in WordPress.
	 *
	 * @param string $aId -- sidebar identifier
	 */
	public function register($aId) {
		$aId = (string)$aId;
		
		add_action('widgets_init', function () use ($aId) {
			$options = [
				'id'   => $aId,
				'name' => $this->_title
			];
			if ($this->_description !== null) {
				$options['description'] = $this->_description;
			}
			if ($this->_class !== null) {
				$options['class'] = $this->_class;
			}
			if (null !== $option = $this->_header->getBefore()) {
				$options['before_title'] = $option;
			}
			if (null !== $option = $this->_header->getAfter()) {
				$options['after_title'] = $option;
			}
			if (null !== $option = $this->_widget->getBefore()) {
				$options['before_widget'] = $option;
			}
			if (null !== $option = $this->_widget->getAfter()) {
				$options['after_widget'] = $option;
			}
			register_sidebar($options);
		}, 10);
		
		$this->_id = $aId;
		$this->_publish($aId);
	}

	/**
	 * Render sidebar.
	 * @throws RuntimeException -- Sidebar must be registered before render
	 */
	public function render() {
		if ($this->_id === null) {
			throw new RuntimeException('Sidebar must be registered before render');
		}
		dynamic_sidebar($this->_id);
	}
}