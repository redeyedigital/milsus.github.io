<?php

namespace Openmarco\Seriously\Service;

class Posts {
	
	/**
	 * Get posts page url
	 *
	 * @param string $postType Post type
	 *
	 * @return string
	 */
	public static function getUrl($postType = 'post') {
		$url = get_post_type_archive_link($postType);
		
		return $url ?: null;
	}
	
	/**
	 * Check paginated navigation is applicable.
	 *
	 * @return bool
	 */
	public static function hasPagination() {
		return $GLOBALS['wp_query']->max_num_pages > 1;
	}
	
	/**
	 * Retrieve paginated navigation items
	 *
	 * @param array $args Array of arguments for generating paginated links for archives.
	 *                    Description of the arguments match the function paginate_links
	 *
	 * @link                https://codex.wordpress.org/Function_Reference/paginate_links
	 * @return array      List of array items with keys:
	 *                      'text' - string, page item text
	 *                      'url' - optional, string, page item link url
	 *                      'current' - optional, boolean, true if this is current page
	 *                      'type' - optional, string ('prev', 'next', 'dots' or 'default')
	 */
	public static function getPaginationItems(array $args = []) {
		$args['type'] = 'array';
		
		$links = (array)paginate_links($args);
		
		$items = [];
		
		foreach ($links as $link) {
			$item = [];
			
			if (preg_match('/<a class=\'page-numbers\' href=\'([^"^>]+)\'>([^<]+)/', $link, $matches)) {
				$item['url']  = $matches[1];
				$item['text'] = $matches[2];
			} else if (preg_match('/<span class=\'page-numbers current\'>([^<]+)/', $link, $matches)) {
				$item['current'] = true;
				$item['text']    = $matches[1];
			} else if (preg_match('/<a class="(next|prev) page-numbers" href="([^"^>]+)">([^<]+)/', $link, $matches)) {
				$item['type'] = $matches[1];
				$item['url']  = $matches[2];
				$item['text'] = $matches[3];
			} else if (preg_match('/<span class="page-numbers dots">([^<]+)/', $link, $matches)) {
				$item['type'] = 'dots';
				$item['text'] = $matches[1];
			}
			
			$items[] = $item;
		}
		
		return $items;
	}
}