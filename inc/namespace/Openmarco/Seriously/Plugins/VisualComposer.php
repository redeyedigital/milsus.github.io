<?php

namespace Openmarco\Seriously\Plugins;

use Openmarco\Seriously\std;

class VisualComposer {
	
	/**
	 * @var array list of custom Visual Composer CSS Hooks;
	 */
	private static $_CssHooks = [];
	
	/**
	 * Adds filter to Visual Composer Content
	 *
	 * @param string[] $tags            Element's base names list
	 * @param callable $hook            Filter function with arguments: string $content, array $attributes
	 * @param int      $priority        Optional. Used to specify the order in which the functions
	 *                                  associated with a particular action are executed. Default 10.
	 *                                  Lower numbers correspond with earlier execution,
	 *                                  and functions with the same priority are executed
	 *                                  in the order in which they were added to the action.
	 */
	public static function addContentFilter(array $tags, callable $hook, $priority = 10) {
		
		foreach ($tags as $tag) {
			add_filter(std\FILTER_VC_SHORTCODE_OUTPUT, function ($output, $element, $attributes) use ($tag, $hook) {
				if (is_object($element)
				    && method_exists($element, 'settings')
				    && $element->settings('base') === $tag
				) {
					$attributes = vc_map_get_attributes($tag, $attributes);
					$output     = $hook($output, $attributes);
				}
				
				return $output;
			}, $priority, 3);
		}
	}
	
	/**
	 * Adds filter to Visual Composer Custom CSS
	 *
	 * @param string[] $tags            Element's base names list
	 * @param callable $hook            Filter function with arguments: string $classes, array $attributes
	 * @param int      $priority        Optional. Used to specify the order in which the functions
	 *                                  associated with a particular action are executed. Default 10.
	 *                                  Lower numbers correspond with earlier execution,
	 *                                  and functions with the same priority are executed
	 *                                  in the order in which they were added to the action.
	 */
	public static function addCssFilter(array $tags, callable $hook, $priority = 10) {
		if (!self::$_CssHooks) {
			self::$_CssHooks = [];
			
			add_filter(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '\Openmarco\Seriously\Plugins\VisualComposer::_cssFilter_', $priority, 3);
		}
		
		foreach ($tags as $tag) {
			if (!array_key_exists($tag, self::$_CssHooks)) {
				self::$_CssHooks[$tag] = [];
			}
			
			if (is_callable($hook)) {
				self::$_CssHooks[$tag][] = $hook;
			}
		}
	}
	
	/**
	 * Update specific Element's parameter
	 *
	 * @param string $shortcode Shortcode name
	 * @param string $name      Parameter name
	 * @param string $setting   Setting name
	 * @param mixed  $value     New setting value
	 */
	public static function updateParam($shortcode, $name, $setting, $value) {
		$param           = (array)\WPBMap::getParam($shortcode, $name);
		$param[$setting] = $value;
		vc_update_shortcode_param($shortcode, $param);
	}
	
	/**
	 * @param string $classes
	 * @param string $tag
	 *
	 * @return mixed
	 */
	public static function _cssFilter_($classes, $tag) {
		
		if (array_key_exists($tag, self::$_CssHooks)) {
			$arguments  = func_get_args();
			$attributes = array_key_exists(2, $arguments) ? $arguments[2] : [];
			$attributes = vc_map_get_attributes($tag, $attributes);
			
			$css = [];
			if (array_key_exists('css', $attributes) && is_string($attributes['css']) && $attributes['css'] !== '') {
				$styles = preg_replace('/\.vc_custom_\d+{|}|\!important/', '', $attributes['css']);
				$rules  = explode(';', trim($styles, ' ;'));
				
				foreach ($rules as $rule) {
					$pair = explode(':', $rule, 2);
					
					$css[trim($pair[0])] = trim($pair[1]);
				}
			}
			
			$classesArray = explode(' ', trim($classes));
			foreach ((array)self::$_CssHooks[$tag] as $hook) {
				$classesArray = $hook($classesArray, $attributes, $css);
			}
			$classesArray = array_unique($classesArray);
			$classes      = implode(' ', $classesArray);
		}
		
		return $classes;
	}
}