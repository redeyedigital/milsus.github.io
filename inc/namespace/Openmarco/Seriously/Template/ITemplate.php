<?php

namespace Openmarco\Seriously\Template;

/**
 * Template.
 */
interface ITemplate {

	/**
	 * Render template.
	 *
	 * @param array $aVariables -- variables
	 */
	public function render(array $aVariables);
}