<?php

namespace Openmarco\Seriously\Asset;

use Openmarco\Seriously\std;

/**
 * Script.
 */
class Script implements IAsset {
	
	/**
	 * @var string -- script handle
	 */
	private $_handle = null;
	
	/**
	 * @var string -- script source URL
	 */
	private $_source = null;
	
	/**
	 * @var string[] -- required scripts handles
	 */
	private $_needs = [];
	
	/**
	 * @var boolean -- place script in footer
	 */
	private $_footer = null;
	
	/**
	 * Constructor.
	 *
	 * @param string     $aHandle -- script handle
	 * @param string     $aSource -- script source URL
	 * @param array|NULL $aNeeds  -- required scripts handles
	 * @param boolean    $aFooter -- place script in footer
	 */
	public function __construct($aHandle, $aSource, array $aNeeds = null, $aFooter = true) {
		$this->_handle = (string)$aHandle;
		$this->_source = (string)$aSource;
		if ($aNeeds) {
			foreach ($aNeeds as $need) {
				$this->_needs[] = (string)$need;
			}
		}
		$this->_footer = (boolean)$aFooter;
		add_action(std\ACTION_WP_INIT, function () {
			$this->register();
		}, 0);
	}
	
	/**
	 * Retrieve script needs
	 *
	 * @return string[]
	 */
	public function getNeeds() {
		return $this->_needs;
	}
	
	/**
	 * Set script needs
	 *
	 * @param string[] $aNeeds
	 */
	public function setNeeds(array $aNeeds) {
		$this->_needs = $aNeeds;
	}
	
	/**
	 * Register script.
	 */
	public function register() {
		wp_register_script($this->_handle, $this->_source, $this->_needs, null, $this->_footer);
	}
	
	/**
	 * Enqueue script.
	 */
	public function enqueue() {
		if ($this->_needs) {
			foreach ($this->_needs as $need) {
				wp_enqueue_script($need);
			}
		}
		wp_enqueue_script($this->_handle);
	}
	
	/**
	 * Prepare script.
	 *
	 * @param int $aTarget -- prepare target. Use Script::TARGET_* constants.
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