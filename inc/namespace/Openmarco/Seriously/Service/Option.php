<?php

namespace Openmarco\Seriously\Service;

use Openmarco\Seriously\Customizer\Customizer;
use Openmarco\Seriously\Meta\Meta;

/**
 * Option.
 */
class Option {

	/**
	 * Check if option exists.
	 *
	 * @param integer $aPostId -- associated WordPress post identifier
	 * @param string  $aId     -- option identifier
	 *
	 * @return boolean -- option exists
	 */
	public static function exists($aPostId, $aId) {
		return Meta::exists($aPostId, $aId) || Customizer::exists($aId);
	}

	/**
	 * Get option value.
	 *
	 * @param integer $aPostId  -- associated WordPress post identifier
	 * @param string  $aId      -- option identifier
	 * @param mixed   $aDefault -- default value
	 *
	 * @return mixed -- option value
	 */
	public static function get($aPostId, $aId, $aDefault = null) {
		$aId = (string)$aId;
		if (null === $value = Meta::get((integer)$aPostId, $aId)) {
			if (null === $value = Customizer::get($aId)) {
				return $aDefault;
			}
		}

		return $value;
	}
}