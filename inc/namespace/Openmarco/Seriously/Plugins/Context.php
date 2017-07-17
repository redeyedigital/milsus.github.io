<?php

namespace Openmarco\Seriously\Plugins;

use WP_Post;

class Context {

	/**
	 * Check if Creative Content Blocks is activated
	 * @return bool
	 */
	public static function isCreativeBackgroundLayers() {
		return defined('OMP_CONTAINER_VERSION');
	}

	/**
	 * Check if Creative Content Blocks is activated
	 * @return bool
	 */
	public static function isCreativeContentBlocks() {
		return defined('OMP_CONTENT_BLOCKS_VERSION');
	}

	/**
	 * Check if Contact Form 7 is activated
	 * @return bool
	 */
	public static function isContactForm7() {
		return defined('WPCF7_VERSION');
	}

	/**
	 * Check if Jetpack is activated
	 * @return bool
	 */
	public static function isJetpack() {
		return class_exists('Jetpack');
	}

	/**
	 * Check if Master Slider is activated
	 * @return bool
	 */
	public static function isMaterSlider() {
		return defined('MSWP_AVERTA_VERSION');
	}

	/**
	 * Check if Ninja Forms is activated
	 * @return bool
	 */
	public static function isNinjaForms() {
		return class_exists('Ninja_Forms');
	}

	/**
	 * Check if Visual Composer is activated
	 * @return bool
	 */
	public static function isVisualComposer() {
		return defined('WPB_VC_VERSION');
	}

	/**
	 * Check if WP Job Manager is activated
	 * @return bool
	 */
	public static function isWPJobManager() {
		return defined('JOB_MANAGER_VERSION');
	}

	/**
	 * Check if Visual Composer is activated and used on current or specific page
	 *
	 * @param int|WP_Post|null $postId
	 *
	 * @return bool
	 */
	public static function isVisualComposerPostContent($postId = null) {
		if (!self::isVisualComposer()) {
			return false;
		}

		static $isVisualComposerPostContent;

		if (!$isVisualComposerPostContent) {
			$post = get_post($postId);

			$isVisualComposerPostContent = $post && (strpos($post->post_content, 'vc_row') !== false);
		}

		return $isVisualComposerPostContent;
	}

	/**
	 * Check if WooCommerce is activated
	 * @return bool
	 */
	public static function isWooCommerce() {
		return class_exists('WooCommerce');
	}

	/**
	 * Whether the current request is for an WooCommerce public page
	 * @return bool
	 */
	public static function isWooCommercePage() {
		return self::isWooCommerce() && (is_shop() || is_product() || is_product_category() || is_product_tag() || is_product_taxonomy() || is_cart() || is_checkout() || is_account_page());
	}

	/**
	 * Check if WPML is activated
	 * @return bool
	 */
	public static function isWPML() {
		return defined('ICL_SITEPRESS_VERSION') && !((bool)get_option('_wpml_inactive') === true);
	}
}