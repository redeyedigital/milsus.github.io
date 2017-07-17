<?php

namespace Openmarco\Seriously\Service;

class Page {
	
	/**
	 * Retrieves ID for the current page
	 * @return int
	 */
	public static function getCurrentId() {
		if (is_post_type_archive('product') || is_tax(['product_cat', 'product_tag'])) {
			$id = (int)get_option('woocommerce_shop_page_id');
		} else if (is_home() || is_category() || is_tag() || is_author() || is_singular('post')) {
			$id = (int)get_option('page_for_posts');
		} else if (is_404()) {
			$id = null;
		} else {
			$id = (int)get_the_ID();
		}
		
		return $id ?: null;
	}
	
	/**
	 * Retrieve page title
	 *
	 * @param int $id Page id
	 *
	 * @return int
	 */
	public static function getTitle($id = null) {
		if ($id) {
			$title = get_the_title($id);
		} else if (is_home() || is_singular('post')) {
			$postsPageId = get_option('page_for_posts');
			
			$title = $postsPageId ? get_the_title($postsPageId) : esc_html__('Latest Posts', 'seriously');
		} else if (is_post_type_archive('product')) {
			$title = woocommerce_page_title(false);
		} else if (is_archive()) {
			$title = get_the_archive_title();
		} else if (is_404()) {
			$title = esc_html__('Not Found', 'seriously');
		} else {
			$title = get_the_title();
		}
		
		return $title ?: null;
	}
	
}