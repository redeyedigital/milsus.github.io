<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Customizer\Customizer;

add_filter(FILTER_OMT_ARROW_LEFT, function ($iconHtml) {
	static $content;
	
	if ($content === null) {
		$type = Customizer::get(MOD_ARROWS_TYPE);
		
		$arrows = [
			'type1'    => 'ion-arrow-left-a',
			'type2'    => 'ion-arrow-left-b',
			'type3'    => 'ion-arrow-left-c',
			'chevron'  => 'ion-chevron-left',
			'skip'     => 'ion-skip-backward',
			'ios'      => 'ion-ios-arrow-back',
			'ios2'     => 'ion-ios-arrow-left',
			'ios3'     => 'ion-ios-arrow-thin-left',
			'android'  => 'ion-android-arrow-back',
			'android2' => 'ion-android-arrow-dropleft',
			'android3' => 'ion-android-arrow-dropleft-circle',
		];
		
		$content = array_key_exists($type, $arrows)
			? '<span class="icon icon-arrow ' . $arrows[$type] . '" aria-hidden="true"></span>'
			: $iconHtml;
	}
	
	return $content;
});

add_filter(FILTER_OMT_ARROW_RIGHT, function ($iconHtml) {
	static $content;
	
	if ($content === null) {
		$type = Customizer::get(MOD_ARROWS_TYPE);
		
		$arrows = [
			'type1'    => 'ion-arrow-right-a',
			'type2'    => 'ion-arrow-right-b',
			'type3'    => 'ion-arrow-right-c',
			'chevron'  => 'ion-chevron-right',
			'skip'     => 'ion-skip-forward',
			'ios'      => 'ion-ios-arrow-forward',
			'ios2'     => 'ion-ios-arrow-right',
			'ios3'     => 'ion-ios-arrow-thin-right',
			'android'  => 'ion-android-arrow-forward',
			'android2' => 'ion-android-arrow-dropright',
			'android3' => 'ion-android-arrow-dropright-circle',
		];
		
		$content = array_key_exists($type, $arrows)
			? '<span class="icon icon-arrow ' . $arrows[$type] . '" aria-hidden="true"></span>'
			: $iconHtml;
	}
	
	return $content;
});
