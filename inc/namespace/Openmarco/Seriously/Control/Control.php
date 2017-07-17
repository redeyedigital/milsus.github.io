<?php

namespace Openmarco\Seriously\Control;

use RuntimeException;

use Openmarco\Seriously\Template\ITemplate;
use Openmarco\Seriously\Asset\IAsset;

/**
 * Control.
 */
class Control {

	/**
	 * @var Control[] -- existed controls
	 */
	private static $_existed = [];

	/**
	 * Check if control exists.
	 *
	 * @param string $aName -- control name
	 *
	 * @return boolean -- control exists
	 */
	public static function exists($aName) {
		return array_key_exists((string)$aName, self::$_existed);
	}

	/**
	 * Get control.
	 *
	 * @param string $aName -- control name
	 *
	 * @return Control -- control
	 * @throws RuntimeException -- Control "%s" is not exist
	 */
	public static function get($aName) {
		$aName = (string)$aName;
		if (!array_key_exists($aName, self::$_existed)) {
			throw new RuntimeException('Control "' . $aName . '" is not exist');
		}

		return self::$_existed[$aName];
	}

	/**
	 * Render HTML attributes.
	 *
	 * @param array $aAttributes -- attributes
	 */
	public static function attributes(array $aAttributes) {
		if ($aAttributes) {
			foreach ($aAttributes as $name => $value) {
				if (strpos($name, 'html:') === 0) {
					$name = substr($name, 5);
					if ($name === 'class' && is_array($value)) {
						$value = implode(' ', $value);
					}
					echo ' ' . esc_attr($name) . '="' . esc_attr($value) . '"';
				}
			}
		}
	}

	/**
	 * @var string -- control name
	 */
	private $_name = null;

	/**
	 * @var ITemplate -- control template
	 */
	private $_template = null;

	/**
	 * @var IAsset[] -- control assets
	 */
	private $_assets = [];

	/**
	 * @var array -- default control attributes
	 */
	private $_attributes = null;

	/**
	 * Constructor.
	 *
	 * @param string        $aName       -- control name
	 * @param ITemplate     $aTemplate   -- control template
	 * @param IAsset[]|NULL $aAssets     -- control assets
	 * @param array|NULL    $aAttributes -- default control attributes
	 *
	 * @throws RuntimeException -- Control "%s" already exists
	 * @throws RuntimeException -- Invalid assets
	 */
	public function __construct($aName, ITemplate $aTemplate, array $aAssets = null, array $aAttributes = null) {
		$aName = (string)$aName;
		if (array_key_exists($aName, self::$_existed)) {
			throw new RuntimeException('Control "' . $aName . '" already exists');
		}
		$this->_name     = $aName;
		$this->_template = $aTemplate;
		if ($aAssets) {
			foreach ($aAssets as $asset) {
				if (!($asset instanceof IAsset)) {
					throw new RuntimeException('Invalid assets');
				}
				$this->_assets[] = $asset;
			}
		}
		$this->_attributes      = $aAttributes ?: [];
		self::$_existed[$aName] = $this;
	}

	/**
	 * Get control attributes.
	 *
	 * @param array|NULL $aAttributes -- additional attributes
	 *
	 * @return array -- control attributes
	 */
	public function getAttributes(array $aAttributes = null) {
		$result = $this->_attributes;
		if ($aAttributes) {
			foreach ($aAttributes as $name => $value) {
				$result[$name] = $value;
			}
		}

		return $result;
	}

	/**
	 * Enqueue control.
	 */
	public function enqueue() {
		if ($this->_assets) {
			foreach ($this->_assets as $asset) {
				$asset->enqueue();
			}
		}
	}

	/**
	 * Render control.
	 *
	 * @param array|NULL $aAttributes -- additional attributes
	 */
	public function render(array $aAttributes = null) {
		$this->_template->render([
			'attr' => $this->getAttributes($aAttributes)
		]);
	}
}