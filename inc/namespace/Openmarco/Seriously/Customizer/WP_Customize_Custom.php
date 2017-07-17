<?php

namespace Openmarco\Seriously\Customizer;

use WP_Customize_Control;

use Openmarco\Seriously\std;
use Openmarco\Seriously\Service\Data;
use Openmarco\Seriously\Control\Control;

/**
 * Custom WordPress customizer control.
 */
class WP_Customize_Custom extends WP_Customize_Control {

	/**
	 * @var string -- control name
	 */
	public $control;

	/**
	 * Enqueue control.
	 */
	public function enqueue_assets() {
		Control::get($this->control)->enqueue();
	}

	/**
	 * Render control.
	 */
	protected function render_content() {
		$control       = Control::get($this->control);
		$attributes    = $control->getAttributes($this->input_attrs);
		$separateLabel = array_key_exists(std\ATTR_SEPARATE_LABEL, $attributes) && $attributes[std\ATTR_SEPARATE_LABEL];
		if (!empty($this->label)) {
			echo '<label><span class="customize-control-title">' . esc_html($this->label) . '</span>';
			if (!empty($this->description)) {
				echo '<span class="description customize-control-description">' . esc_html($this->description) . '</span>';
			}
			if ($separateLabel) {
				echo '</label>';
			}
		}
		$renderAttributes                           = $this->input_attrs;
		$renderAttributes[std\ATTR_VALUE]           = Data::unpack($this->value('default'));
		$renderAttributes[std\ATTR_CUSTOMIZER_LINK] = $this->settings['default']->id;
		$control->render($renderAttributes);
		if (!empty($this->label) && !$separateLabel) {
			echo '</label>';
		}
	}
}