<?php

namespace Openmarco\Seriously\std;

add_editor_style('assets/css/editor.css');

add_filter(FILTER_WP_TINY_MCE_BEFORE_INIT, function ($mceInit) {
	
	if (array_key_exists('formats', $mceInit)) {
		$mceInit['formats'] = str_replace(
			['styles: {textAlign:"left"}', 'styles: {textAlign:"center"}', 'styles: {textAlign:"right"}'],
			['classes: \'text-xs-left\'', 'classes: \'text-xs-center\'', 'classes: \'text-xs-right\''],
			$mceInit['formats']
		);
		
		$mceInit['formats'] = substr_replace($mceInit['formats'],
			"alignjustify:[{selector:'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li',classes:'text-xs-justify'}],",
			1, 0);
	}
	
	if (array_key_exists('toolbar2', $mceInit)) {
		if(strpos($mceInit['toolbar2'], 'styleselect') === false) {
			$mceInit['toolbar2'] = 'styleselect,' . $mceInit['toolbar2'];
		}
		
		$mceInit['style_formats'] = json_encode([
			[
				'title' => 'Inline',
				'items' => [
					[
						'title'  => esc_html__('Small', 'seriously'),
						'inline' => 'small',
					],
					[
						'title'  => esc_html__('Marked', 'seriously'),
						'inline' => 'mark',
					],
					[
						'title'   => esc_html__('Uppercase', 'seriously'),
						'inline'  => 'span',
						'classes' => 'text-uppercase'
					],
					[
						'title'   => esc_html__('Lowercase', 'seriously'),
						'inline'  => 'span',
						'classes' => 'text-lowercase'
					],
					[
						'title'   => esc_html__('Capitalize', 'seriously'),
						'inline'  => 'span',
						'classes' => 'text-capitalize'
					],
				],
			],
			[
				'title' => 'Lists',
				'items' => [
					[
						'title'    => esc_html__('Left-shifted', 'seriously'),
						'selector' => 'ul,ol',
						'classes'  => 'list-left-shifted',
					],
					[
						'title'    => esc_html__('Unstyled', 'seriously'),
						'selector' => 'ul,ol',
						'classes'  => 'list-unstyled',
					],
					[
						'title'    => esc_html__('Inline', 'seriously'),
						'selector' => 'ul,ol',
						'classes'  => 'inline',
					],
				],
			],
			[
				'title' => 'Blocks',
				'items' => [
					[
						'title'   => esc_html__('Lead', 'seriously'),
						'block'   => 'p',
						'classes' => 'lead',
					],
					[
						'title'    => esc_html__('Heading 1 view', 'seriously'),
						'selector' => 'p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'h1',
					],
					[
						'title'    => esc_html__('Heading 2 view', 'seriously'),
						'selector' => 'p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'h2',
					],
					[
						'title'    => esc_html__('Heading 3 view', 'seriously'),
						'selector' => 'p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'h3',
					],
					[
						'title'    => esc_html__('Heading 4 view', 'seriously'),
						'selector' => 'p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'h4',
					],
					[
						'title'    => esc_html__('Heading 5 view', 'seriously'),
						'selector' => 'p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'h5',
					],
					[
						'title'    => esc_html__('Heading 6 view', 'seriously'),
						'selector' => 'p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'h6',
					],
					[
						'title'    => esc_html__('Header', 'seriously'),
						'block' => 'header',
					],
					[
						'title'    => esc_html__('Footer', 'seriously'),
						'block' => 'footer',
					],
				],
			],
			[
				'title' => 'Colors',
				'items' => [
					[
						'title'    => esc_html__('Muted', 'seriously'),
						'selector' => 'a,span,p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'text-muted',
					],
					[
						'title'    => esc_html__('Primary', 'seriously'),
						'selector' => 'a,span,p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'text-primary',
					],
					[
						'title'    => esc_html__('Success', 'seriously'),
						'selector' => 'a,span,p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'text-success',
					],
					[
						'title'    => esc_html__('Info', 'seriously'),
						'selector' => 'a,span,p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'text-info',
					],
					[
						'title'    => esc_html__('Warning', 'seriously'),
						'selector' => 'a,span,p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'text-warning',
					],
					[
						'title'    => esc_html__('Danger', 'seriously'),
						'selector' => 'a,span,p,h1,h2,h3,h4,h5,h6,div',
						'classes'  => 'text-danger',
					],
				],
			],
		]);
	}
	
	return $mceInit;
}, 100, 2);