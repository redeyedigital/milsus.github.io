<?php

namespace Openmarco\Seriously\Customizer;

use Openmarco\Seriously\Basic\UAccessory;
use Openmarco\Seriously\Service\Constraint;
use Openmarco\Seriously\Service\Data;
use Openmarco\Seriously\std;
use WP_Customize_Manager;

/**
 * WordPress customizer field (control and setting).
 */
class Field {

	use UAccessory;

	/**
	 * @var string|NULL -- field title
	 */
	private $_title = null;

	/**
	 * @var string|NULL -- field description
	 */
	private $_description = null;

	/**
	 * @var mixed -- field default value
	 */
	private $_default = null;

	/**
	 * @var string -- field type (control name, WordPress control name with prefix 'wp:' or successor of WP_Customize_Control)
	 */
	private $_type = null;

	/**
	 * @var array -- field attributes
	 */
	private $_attributes = null;

	/**
	 * @var Constraint -- field constraint
	 */
	private $_constraint = null;

	/**
	 * @var Behavior -- field behavior
	 */
	private $_behavior = null;

	/**
	 * @var integer -- field priority
	 */
	private $_priority = null;

	/**
	 * Constructor.
	 *
	 * @param string|NULL $aTitle       -- field title
	 * @param string|NULL $aDescription -- field description
	 * @param mixed       $aDefault     -- field default value
	 * @param string      $aType        -- field type
	 * @param array|NULL  $aAttributes  -- field attributes
	 * @param Constraint  $aConstraint  -- field constraint
	 * @param Behavior    $aBehavior    -- field behavior
	 * @param integer     $aPriority    -- field priority
	 */
	public function __construct($aTitle = null, $aDescription = null, $aDefault = null, $aType = 'text', array $aAttributes = null, Constraint $aConstraint = null, Behavior $aBehavior = null, $aPriority = 10) {
		$this->_title       = $aTitle === null ? null : (string)$aTitle;
		$this->_description = $aDescription === null ? null : (string)$aDescription;
		$this->_default     = $aDefault;
		$this->_type        = (string)$aType;
		$this->_attributes  = $aAttributes ?: [];
		$this->_constraint  = $aConstraint === null ? new Constraint() : $aConstraint;
		$this->_behavior    = $aBehavior === null ? new Behavior() : $aBehavior;
		$this->_priority    = (integer)$aPriority;
	}

	/**
	 * Register setting in WordPress.
	 *
	 * @param WP_Customize_Manager $aManager -- WordPress customizer manager
	 * @param string               $aId      -- field identifier
	 */
	private function _registerSetting(WP_Customize_Manager $aManager, $aId) {
		if (null === $capability = $this->_constraint->getCapability()) {
			$capability = 'edit_theme_options';
		}
		$options = [
			'capability'        => $capability,
			'transport'         => $this->_behavior->getLive() ? 'postMessage' : 'refresh',
			'default'           => Data::pack($this->_default),
			'sanitize_callback' => function ($aValue) {
				$aValue = (string)$aValue;
				if ($serverFilter = $this->_behavior->getServerFilter()) {
					return $serverFilter($aValue);
				}

				return $aValue;
			}
		];
		if (null !== $option = $this->_behavior->getClientFilter()) {
			$options['sanitize_js_callback'] = $option;
		}
		if (null !== $option = $this->_constraint->getFeatures()) {
			$options['theme_support'] = $option;
		}
		$aManager->add_setting($aId, $options);
	}

	/**
	 * Register control in WordPress.
	 *
	 * @param WP_Customize_Manager $aManager   -- WordPress customizer manager
	 * @param string               $aId        -- field identifier
	 * @param string               $aSectionId -- parent section identifier
	 */
	private function _registerControl(WP_Customize_Manager $aManager, $aId, $aSectionId) {
		$this->_registerSetting($aManager, $aId);
		$options = [
			'priority' => $this->_priority,
			'section'  => $aSectionId
		];
		if ($this->_title !== null) {
			$options['label'] = $this->_title;
		}
		if ($this->_description !== null) {
			$options['description'] = $this->_description;
		}
		if (null !== $option = $this->_constraint->getCallback()) {
			$options['active_callback'] = $option;
		}
		$native = strpos($this->_type, 'wp:') === 0;
		if ($native || is_subclass_of($this->_type, 'WP_Customize_Control')) {
			if ($this->_attributes) {
				foreach ($this->_attributes as $name => $value) {
					if (!array_key_exists($name, $options)) {
						$options[$name] = $value;
					}
				}
			}
			if ($native) {
				$options['type'] = substr($this->_type, 3);
				$aManager->add_control($aId, $options);
			} else {
				$class = $this->_type;
				$aManager->add_control(new $class($aManager, $aId, $options));
			}
		} else {
			$options['type']        = 'custom';
			$options['control']     = $this->_type;
			$options['input_attrs'] = $this->_attributes;
			$control                = new WP_Customize_Custom($aManager, $aId, $options);
			$aManager->add_control($control);
			add_action(std\ACTION_WP_CUSTOMIZE_CONTROLS_ENQUEUE_SCRIPTS, function () use ($control) {
				$control->enqueue_assets();
			}, 0);
		}
	}

	/**
	 * Get field default value.
	 * @return string|NULL -- field default value
	 */
	public function getDefault() {
		return $this->_default;
	}

	/**
	 * Register field in WordPress.
	 *
	 * @param string $aId        -- field identifier
	 * @param string $aSectionId -- parent section identifier
	 */
	public function register($aId, $aSectionId) {
		$aId        = (string)$aId;
		$aSectionId = (string)$aSectionId;
		add_action(std\ACTION_WP_CUSTOMIZE_REGISTER, function (WP_Customize_Manager $aManager) use ($aId, $aSectionId) {
			$this->_registerSetting($aManager, $aId);
			$this->_registerControl($aManager, $aId, $aSectionId);
		}, 12, 1);
		$this->_publish($aId);
	}
}