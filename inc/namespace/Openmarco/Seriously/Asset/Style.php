<?php

namespace Openmarco\Seriously\Asset;

use Openmarco\Seriously\std;

/**
 * Style.
 */
class Style implements IAsset {

	/**
	 * @var string -- style handle
	 */
	private $_handle = null;

	/**
	 * @var string -- style source URL
	 */
	private $_source = null;

	/**
	 * @var string[] -- required styles handles
	 */
	private $_needs = [];

	/**
	 * @var string -- target devices
	 */
	private $_media = null;

	/**
	 * Constructor.
	 *
	 * @param string     $aHandle -- style handle
	 * @param string     $aSource -- style source URL
	 * @param array|NULL $aNeeds  -- required styles handles
	 * @param string     $aMedia  -- target devices
	 */
	public function __construct($aHandle, $aSource, array $aNeeds = null, $aMedia = 'all') {
		$this->_handle = (string)$aHandle;
		$this->_source = (string)$aSource;
		if ($aNeeds) {
			foreach ($aNeeds as $need) {
				$this->_needs[] = (string)$need;
			}
		}
		$this->_media = (string)$aMedia;
		add_action(std\ACTION_WP_INIT, function () {
			$this->register();
		}, 0);
	}

	/**
	 * Register style.
	 */
	public function register() {
		wp_register_style($this->_handle, $this->_source, $this->_needs, null, $this->_media);
	}

	/**
	 * Enqueue style.
	 */
	public function enqueue() {
		if ($this->_needs) {
			foreach ($this->_needs as $need) {
				wp_enqueue_style($need);
			}
		}
		wp_enqueue_style($this->_handle);
	}

	/**
	 * Prepare script.
	 *
	 * @param int $aTarget -- prepare target. Use Style::TARGET_* constants.
	 */
	public function add($aTarget = IAsset::TARGET_NONE) {
		if (IAsset::TARGET_PUBLIC & $aTarget) {
			add_action(std\ACTION_WP_ENQUEUE_SCRIPTS, function () {
				$this->enqueue();
			});
		}
		if (IAsset::TARGET_DASHBOARD & $aTarget) {
			add_action(std\ACTION_WP_ADMIN_ENQUEUE_SCRIPTS, function () {
				$this->enqueue();
			});
		}
	}
}