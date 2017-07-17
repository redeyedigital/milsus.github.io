<?php

namespace Openmarco\Seriously\Customizer;

use Openmarco\Seriously\Basic\Container;
use Openmarco\Seriously\Basic\UAccessory;
use Openmarco\Seriously\Service\Constraint;
use Openmarco\Seriously\std;
use WP_Customize_Manager;

/**
 * WordPress customizer panel.
 */
class Panel extends Container implements IBlock {

	use UAccessory;

	/**
	 * @var string -- panel title
	 */
	private $_title = null;

	/**
	 * @var string|NULL -- panel description
	 */
	private $_description = null;

	/**
	 * @var Constraint -- panel constraint
	 */
	private $_constraint = null;

	/**
	 * @var integer -- panel priority
	 */
	private $_priority = null;

	/**
	 * Constructor.
	 *
	 * @param string         $aTitle       -- panel title
	 * @param string|NULL    $aDescription -- panel description
	 * @param Section[]|NULL $aSections    -- child sections
	 * @param Constraint     $aConstraint  -- panel constraint
	 * @param integer        $aPriority    -- panel priority
	 */
	public function __construct($aTitle, $aDescription = null, array $aSections = null, Constraint $aConstraint = null, $aPriority = 160) {
		parent::__construct(__NAMESPACE__ . '\\Section', $aSections);
		$this->_title       = (string)$aTitle;
		$this->_description = $aDescription === null ? null : (string)$aDescription;
		$this->_constraint  = $aConstraint === null ? new Constraint() : $aConstraint;
		$this->_priority    = (integer)$aPriority;
	}

	/**
	 * Register panel in WordPress.
	 *
	 * @param string $aId -- panel identifier
	 */
	public function register($aId) {
		$aId = (string)$aId;
		add_action(std\ACTION_WP_CUSTOMIZE_REGISTER, function (WP_Customize_Manager $aManager) use ($aId) {
			if (null === $capability = $this->_constraint->getCapability()) {
				$capability = 'edit_theme_options';
			}
			$options = [
				'capability' => $capability,
				'priority'   => $this->_priority,
				'title'      => $this->_title
			];
			if ($this->_description !== null) {
				$options['description'] = $this->_description;
			}
			if ($option = $this->_constraint->getFeatures()) {
				$options['theme_support'] = $option;
			}
			if (null !== $option = $this->_constraint->getCallback()) {
				$options['active_callback'] = $option;
			}
			$aManager->add_panel($aId, $options);
		}, 10, 1);
		foreach ($this as $id => $section) {
			$section->register($id, $aId);
		}
		$this->_publish($aId);
	}
}