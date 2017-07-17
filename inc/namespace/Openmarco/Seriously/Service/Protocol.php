<?php

namespace Openmarco\Seriously\Service;

use RuntimeException;

/**
 * Protocol.
 */
class Protocol {

	/**
	 * @var string[] -- defined protocols
	 */
	private static $_defined = [];

	/**
	 * Get path.
	 *
	 * @param string $aRoot       -- path to root directory
	 * @param string $aDescriptor -- descriptor
	 *
	 * @return string|NULL -- path or NULL if not specified
	 * @throws RuntimeException -- Invalid path "%s"
	 */
	private static function _path($aRoot, $aDescriptor) {
		$requireExistence = $aDescriptor === '' || $aDescriptor{0} !== '?';
		if (!$requireExistence) {
			$aDescriptor = substr($aDescriptor, 1);
		}
		if (strpos($aDescriptor, '//') === 0) {
			$aDescriptor = substr($aDescriptor, 2);
			$root        = rtrim(str_replace('\\', '/', $aRoot), '/') . '/';
			$path        = $root . $aDescriptor;
			if ($requireExistence && !file_exists($path)) {
				throw new RuntimeException('Invalid path "' . $path . '"');
			}

			return $path;
		}

		return null;
	}

	/**
	 * Define protocol.
	 *
	 * @param string $aName -- protocol name
	 * @param string $aPath -- path to root directory
	 *
	 * @throws RuntimeException -- Protocol "%s" already exists
	 * @throws RuntimeException -- Invalid directory "%s"
	 */
	public static function define($aName, $aPath) {
		$aName = (string)$aName;
		$aPath = (string)$aPath;
		if (array_key_exists($aName, self::$_defined)) {
			throw new RuntimeException('Protocol "' . $aName . '" already exists');
		}
		if (!is_dir($aPath)) {
			throw new RuntimeException('Invalid directory "' . $aPath . '"');
		}
		self::$_defined[$aName] = $aPath;
	}

	/**
	 * Request.
	 *
	 * @param string $aDescriptor -- descriptor
	 *
	 * @return mixed -- response
	 * @throws RuntimeException -- Path "%s" is outside of WordPress root directory
	 * @throws RuntimeException -- Invalid descriptor "%s"
	 */
	public static function request($aDescriptor) {
		$aDescriptor = (string)$aDescriptor;
		if (false !== $position = strpos($aDescriptor, ':')) {
			$scheme     = substr($aDescriptor, 0, $position);
			$descriptor = substr($aDescriptor, $position + 1);
			if ($scheme === '') {
				return $descriptor;
			}
			switch ($scheme) {
				case 'auto':
					return $descriptor;
				case 'file':
					if (null !== $path = self::_path(ABSPATH, $descriptor)) {
						return $path;
					}
					break;
				case 'url':
					$url = rtrim(get_site_url(), '/') . '/';
					if (strpos($url, 'http:') === 0) {
						$url = substr($url, 5);
					}
					$path = self::request($descriptor);
					$root = rtrim(str_replace('\\', '/', ABSPATH), '/') . '/';
					if (strpos($path, $root) !== 0) {
						throw new RuntimeException('Path "' . $path . '" is outside of WordPress root directory');
					}

					return $url . substr($path, strlen($root));
				default:
					if (array_key_exists($scheme, self::$_defined)) {
						if (null !== $path = self::_path(self::$_defined[$scheme], $descriptor)) {
							return $path;
						}
					}
			}
		}
		throw new RuntimeException('Invalid descriptor "' . $aDescriptor . '"');
	}
}