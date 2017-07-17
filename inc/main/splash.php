<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;
use Openmarco\Seriously\Html\HtmlWriter;
use Openmarco\Seriously\Service\Image;

add_filter(FILTER_OMT_SPLASH_ICON, function () {
	$loader = '';
	$type   = Customizer::get(MOD_SPLASH_ICON);
	
	if ($type && $type !== 'none') {
		$html = HtmlWriter::init();
		
		$html->div(['class' => ['splash-icon', 'loader-container', $type]])
		     ->div(['class' => 'css-loader']);
		
		switch ($type) {
			case 'ball-pulse':
				$html->div(['class' => 'ball']);
				
				break;
			case 'ball-pulse-double':
				$html->div(['class' => 'ball-1'], '', true)
				     ->div(['class' => 'ball-2'], '', true);
				
				break;
			case 'wave':
				$html->div(['class' => 'line-1'], '', true)
				     ->div(['class' => 'line-2'], '', true)
				     ->div(['class' => 'line-3'], '', true)
				     ->div(['class' => 'line-4'], '', true)
				     ->div(['class' => 'line-5'], '', true);
				
				break;
			case 'wave-spread':
				$html->div(['class' => 'line-1'], '', true)
				     ->div(['class' => 'line-2'], '', true)
				     ->div(['class' => 'line-3'], '', true)
				     ->div(['class' => 'line-4'], '', true)
				     ->div(['class' => 'line-5'], '', true);
				
				break;
			case 'circle-pulse':
				$html->div(['class' => 'circle']);
				
				break;
			case 'circle-pulse-multiple':
				$html->div(['class' => 'circle-1'], '', true)
				     ->div(['class' => 'circle-2'], '', true)
				     ->div(['class' => 'circle-3'], '', true);
				
				break;
			case 'arc-rotate':
				$html->div(['class' => 'arc'], '', true);
				
				break;
			case 'arc-rotate2':
				$html->div(['class' => 'arc'], '', true);
				
				break;
			case 'arc-scale':
				$html->div(['class' => 'arc'], '', true);
				
				break;
			case 'arc-rotate-double':
				$html->div(['class' => 'arc-1'], '', true)
				     ->div(['class' => 'arc-2'], '', true);
				
				break;
			case 'square-split':
				$html->div(['class' => 'square-1'], '', true)
				     ->div(['class' => 'square-2'], '', true)
				     ->div(['class' => 'square-3'], '', true)
				     ->div(['class' => 'square-4'], '', true);
				
				break;
			case 'square-rotate-3d':
				$html->div(['class' => 'square'], '', true);
				
				break;
		}
		
		$loader = (string)$html;
	}
	
	return $loader;
});

add_filter(FILTER_OMT_SPLASH_ICON, function ($html) {
	$customIcon = Customizer::get(MOD_SPLASH_ICON_IMAGE);
	
	if (Image::exists($customIcon)) {
		$imageUrl = Image::getUrl($customIcon, 'full');
		$html     = '<img class="splash-icon" src="' . esc_url($imageUrl) . '"/>';
	}
	
	return $html;
});