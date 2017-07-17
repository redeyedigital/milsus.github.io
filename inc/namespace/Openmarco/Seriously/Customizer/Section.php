<?php

namespace Openmarco\Seriously\Customizer;

use Openmarco\Seriously\Basic\Container;
use Openmarco\Seriously\Basic\UAccessory;
use Openmarco\Seriously\Service\Constraint;
use Openmarco\Seriously\std;
use WP_Customize_Manager;

/**
 * WordPress customizer section.
 */
class Section extends Container implements IBlock {

	use UAccessory;

	/**
	 * @var string -- section title
	 */
	private $_title = null;

	/**
	 * @var string|NULL -- section description
	 */
	private $_description = null;

	/**
	 * @var Constraint -- section constraint
	 */
	private $_constraint = null;

	/**
	 * @var integer -- section priority
	 */
	private $_priority = null;

	/**
	 * Constructor.
	 *
	 * @param string       $aTitle       -- section title
	 * @param string|NULL  $aDescription -- section description
	 * @param Field[]|NULL $aFields      -- child fields
	 * @param Constraint   $aConstraint  -- section constraint
	 * @param integer      $aPriority    -- section priority
	 */
	public function __construct($aTitle, $aDescription = null, array $aFields = null, Constraint $aConstraint = null, $aPriority = 160) {
		parent::__construct(__NAMESPACE__ . '\\Field', $aFields);
		$this->_title       = (string)$aTitle;
		$this->_description = $aDescription === null ? null : (string)$aDescription;
		$this->_constraint  = $aConstraint === null ? new Constraint() : $aConstraint;
		$this->_priority    = (integer)$aPriority;
	}

	/**
	 * Register section in WordPress.
	 *
	 * @param string      $aId      -- section identifier
	 * @param string|NULL $aPanelId -- parent panel identifier
	 */
	public function register($aId, $aPanelId = null) {
		$aId      = (string)$aId;
		$aPanelId = $aPanelId === null ? null : (string)$aPanelId;
		add_action(std\ACTION_WP_CUSTOMIZE_REGISTER, function (WP_Customize_Manager $aManager) use ($aId, $aPanelId) {
			if (null === $capability = $this->_constraint->getCapability()) {
				$capability = 'edit_theme_options';
			}
			$options = [
				'capability' => $capability,
				'priority'   => $this->_priority,
				'title'      => $this->_title
			];
			if ($aPanelId !== null) {
				$options['panel'] = $aPanelId;
			}
			if ($this->_description !== null) {
				$options['description'] = $this->_description;
			}
			if ($option = $this->_constraint->getFeatures()) {
				$options['theme_support'] = $option;
			}
			if (null !== $option = $this->_constraint->getCallback()) {
				$options['active_callback'] = $option;
			}
			$aManager->add_section($aId, $options);
		}, 11, 1);
		foreach ($this as $id => $field) {
			$field->register($id, $aId);
		}
		$this->_publish($aId);
	}
}