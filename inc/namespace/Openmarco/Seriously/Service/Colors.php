<?php

namespace Openmarco\Seriously\Service;

use Primal\Color\Parser;

class Colors {
	
	/**
	 * Detect if color dark or light
	 *
	 * @param string $color
	 *
	 * @return bool
	 */
	public static function isDark($color) {
		if (!$color) {
			return false;
		}
		
		$color = Parser::Parse($color);
		
		return ($color->red * 299 + $color->green * 587 + $color->blue * 114) / 1000 < 128;
	}
}