<?php

namespace Openmarco\Seriously\Meta;

use RuntimeException;

use WP_Post;

use Openmarco\Seriously\std;
use Openmarco\Seriously\Basic\UAccessory;
use Openmarco\Seriously\Service\Data;
use Openmarco\Seriously\Control\Control;

/**
 * WordPress meta field.
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
	 * @var string -- field type (control name with prefix 'om:')
	 */
	private $_type = null;

	/**
	 * @var array -- field attributes
	 */
	private $_attributes = null;

	/**
	 * Constructor.
	 *
	 * @param string|NULL $aTitle       -- field title
	 * @param string|NULL $aDescription -- field description
	 * @param mixed       $aDefault     -- field default value
	 * @param string      $aType        -- field type
	 * @param array|NULL  $aAttributes  -- field attributes
	 *
	 * @throws RuntimeException -- Invalid type "%s"
	 */
	public function __construct($aTitle = null, $aDescription = null, $aDefault = null, $aType = 'text', array $aAttributes = null) {
		$this->_title       = $aTitle === null ? null : (string)$aTitle;
		$this->_description = $aDescription === null ? null : (string)$aDescription;
		$this->_default     = $aDefault;
		$this->_type        = (string)$aType;
		$this->_attributes  = $aAttributes ?: [];
	}

	/**
	 * Get field default value.
	 * @return mixed -- field default value
	 */
	public function getDefault() {
		return $this->_default;
	}

	/**
	 * Register field.
	 *
	 * @param string $aId -- field identifier
	 */
	public function register($aId) {
		$this->_publish($aId);
	}

	/**
	 * Publish field.
	 */
	public function enqueue() {
		Control::get($this->_type)->enqueue();
	}

	/**
	 * Render field.
	 *
	 * @param string  $aId   -- field identifier
	 * @param WP_Post $aPost -- current WordPress post
	 */
	public function render($aId, WP_Post $aPost) {
		$aId                                  = (string)$aId;
		$control                              = Control::get($this->_type);
		$attributes                           = $control->getAttributes($this->_attributes);
		$renderAttributes                     = $this->_attributes;
		$value                                = Meta::get((integer)$aPost->ID, $aId, $this->_default);
		$renderAttributes[std\ATTR_VALUE]     = $value;
		$renderAttributes[std\ATTR_HTML_ID]   = $aId;
		$renderAttributes[std\ATTR_HTML_NAME] = $aId;
		if (!array_key_exists(std\ATTR_CUSTOM_VALUE, $attributes) || !$attributes[std\ATTR_CUSTOM_VALUE]) {
			$renderAttributes[std\ATTR_HTML_VALUE] = Data::pack($value);
		}
		$separateLabel = array_key_exists(std\ATTR_SEPARATE_LABEL, $attributes) && $attributes[std\ATTR_SEPARATE_LABEL];
		echo '<div class="om-meta-field">';
		if ($this->_title !== null) {
			echo '<label><div class="om-meta-field-title">' . esc_html($this->_title) . '</div>';
			if ($separateLabel) {
				echo '</label>';
			}
		}
		echo '<div class="om-meta-field-control">';
		$control->render($renderAttributes);
		if ($this->_description !== null) {
			echo '<div class="om-meta-field-description">' . esc_html($this->_description) . '</div>';
		}
		echo '</div>';
		if ($this->_title !== null && !$separateLabel) {
			echo '</label>';
		}
		echo '</div>';
	}

	/**
	 * Save field metadata.
	 *
	 * @param string  $aId   -- field identifier
	 * @param WP_Post $aPost -- current WordPress post
	 */
	public function save($aId, WP_Post $aPost) {
		$aId = (string)$aId;
		Meta::set((integer)$aPost->ID, $aId, array_key_exists($aId, $_POST) ? $_POST[$aId] : $this->_default);
	}
}