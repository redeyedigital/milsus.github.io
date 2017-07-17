<?php

namespace Openmarco\Seriously\Service;

class Context {
	
	/**
	 * Whether the current request is for an login page.
	 *
	 * @return bool
	 */
	public static function isLogin() {
		return $GLOBALS['pagenow'] === 'wp-login.php';
	}
	
	/**
	 * Whether the current request is for an public site page.
	 *
	 * @return bool
	 */
	public static function isPublic() {
		return !is_admin() && !self::isLogin();
	}
	
	/**
	 * Whether the current request is for an post edit page.
	 *
	 * @return bool
	 */
	public static function isPostEdit() {
		static $isPostEdit;
		
		if (null === $isPostEdit) {
			global $pagenow;
			
			$filtered_action = filter_input(INPUT_GET, 'action');
			$isPostEdit      = $pagenow === 'post-new.php' || $pagenow === 'post.php' && 0 === strcmp($filtered_action, 'edit');
		}
		
		return $isPostEdit;
	}
	
	/**
	 * Retrieve current theme version
	 *
	 * @return string
	 */
	public static function themeVersion() {
		static $themeVersion;
		
		if (!$themeVersion) {
			$theme = wp_get_theme();
			
			$themeVersion = is_child_theme() ? $theme->parent()->Version : $theme->Version;
		}
		
		return $themeVersion;
	}
}