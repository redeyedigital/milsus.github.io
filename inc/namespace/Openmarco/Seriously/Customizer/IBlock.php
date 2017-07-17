<?php

namespace Openmarco\Seriously\Customizer;

/**
 * WordPress customizer block.
 */
interface IBlock {

	/**
	 * Register block in WordPress.
	 *
	 * @param string $aId -- block identifier
	 */
	public function register($aId);
}