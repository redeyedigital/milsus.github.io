<?php

namespace Openmarco\Seriously\Service;

class Hooks {
	
	/**
	 * Hooks a function on to a specific filter
	 *
	 * @param string[] $tags          The names of the action hook
	 * @param callback $fn            The name of the function you wish to be called
	 * @param int      $priority      Optional. Used to specify the order in which the functions
	 *                                associated with a particular action are executed
	 * @param int      $acceptedArgs  Optional. The number of arguments the function accepts. Default 1.
	 */
	public static function addFilters(array $tags, $fn, $priority = 10, $acceptedArgs = 1) {
		foreach ($tags as $tag) {
			add_filter($tag, $fn, $priority, $acceptedArgs);
		}
	}
	
	/**
	 * Hooks a function on to a specific actions
	 *
	 * @param string[] $tags          The names of the action hook
	 * @param callback $fn            The name of the function you wish to be called
	 * @param int      $priority      Optional. Used to specify the order in which the functions
	 *                                associated with a particular action are executed
	 * @param int      $acceptedArgs  Optional. The number of arguments the function accepts. Default 1.
	 */
	public static function addActions(array $tags, $fn, $priority = 10, $acceptedArgs = 1) {
		foreach ($tags as $tag) {
			add_action($tag, $fn, $priority, $acceptedArgs);
		}
	}
}