<?php

namespace Openmarco\Seriously\Service;

use RuntimeException;

/**
 * Data.
 */
class Data {

	/**
	 * @const string -- packed value signature
	 */
	const SIGNATURE = 'data@@';

	/**
	 * Pack value.
	 *
	 * @param mixed $aValue -- raw value
	 *
	 * @return string -- packed value
	 */
	public static function pack($aValue) {
		if ($aValue === null) {
			return '';
		}
		if (is_string($aValue)) {
			return $aValue;
		}

		return self::SIGNATURE . json_encode($aValue);
	}

	/**
	 * Unpack value.
	 *
	 * @param string $aValue -- packed value
	 *
	 * @return mixed -- raw value
	 * @throws RuntimeException -- JSON error: %s
	 */
	public static function unpack($aValue) {
		$aValue = (string)$aValue;
		if ($aValue === '') {
			return null;
		}
		if (strpos($aValue, self::SIGNATURE) === 0) {
			$aValue = substr($aValue, strlen(self::SIGNATURE));
			if ($aValue === '') {
				return null;
			}
			$result = json_decode($aValue, true);
			if (json_last_error() !== JSON_ERROR_NONE) {
				throw new RuntimeException('JSON error: ' . json_last_error_msg());
			}

			return $result;
		}

		return $aValue;
	}
}