<?php

namespace Openmarco\Seriously\Html;

use Openmarco\Seriously\Service\Image;
use Openmarco\Seriously\Service\Page;
use Openmarco\Seriously\std;

class Helpers {
	
	private static $_devicePixelRatios = [1, 1.5, 2, 3];
	
	/**
	 * Convert attributes list to string
	 *
	 * @param array $attributes List of attributes, keys is attributes' names
	 *
	 * @return string attributes as string
	 */
	public static function getAttributes(array $attributes) {
		$strings = [];
		
		foreach ($attributes as $name => $value) {
			if ($name === 'class' && is_array($value)) {
				$value = implode(' ', array_filter(array_map(function ($class) {
					return sanitize_html_class($class);
				}, $value)));
			}
			
			$attribute = esc_attr($name);
			
			if($value !== null) {
				$attribute .= '="' . esc_attr($value) . '"';
			}
			
			$strings[] = $attribute;
		}
		
		return implode(' ', $strings);
	}
	
	/**
	 * Print attributes list with leading space
	 *
	 * @param array $attributes List of attributes, keys is attributes' names
	 */
	public static function attributes(array $attributes) {
		echo ' ', self::getAttributes($attributes);
	}
	
	/**
	 * Print class attribute
	 *
	 * @param string[]|string $class Classes list
	 */
	public static function classes($class) {
		$classes = is_string($class) ? explode(' ', $class) : (array)$class;
		
		self::attributes(['class' => $classes]);
	}
	
	/**
	 * Print attribute with url
	 *
	 * @param string $attribute
	 * @param string $url
	 */
	public static function url($attribute, $url) {
		self::attributes([$attribute => esc_url($url)]);
	}
	
	/**
	 * Print page title
	 *
	 * @param int $id Page id
	 */
	public static function pageTitle($id = null) {
		echo balanceTags(wp_kses_post(Page::getTitle($id)), true);
	}
	
	/**
	 * Generate pagination HTML
	 * Applicable as wp_link_pages() and paginate_links()
	 *
	 * @param array $items    - List of array items with keys:
	 *                        'text' - string, page item text
	 *                        'url' - optional, string, page item link url
	 *                        'current' - optional, boolean, true if this is current page
	 *                        'type' - optional, string ('prev', 'next', 'dots' or 'default')
	 * @param array $settings - Array of additional options:
	 *                        'classes'            => optional, array, container classes
	 *                        'itemClasses'        => optional, array, item classes
	 *                        'itemPrevClasses'    => optional, array, previous item classes
	 *                        'itemNextClasses'    => optional, array, next item classes
	 *                        'itemDotsClasses'    => optional, array, dots item classes
	 *                        'itemCurrentClasses' => optional, array, current item classes
	 *                        'linkClasses'        => optional, array, link classes
	 *
	 * @return string Pagination HTML
	 */
	public static function getPagination(array $items, array $settings = []) {
		$settings = array_merge([
			'classes'            => [],
			'itemClasses'        => [],
			'itemPrevClasses'    => [],
			'itemNextClasses'    => [],
			'itemDotsClasses'    => [],
			'itemCurrentClasses' => [],
			'linkClasses'        => [],
		], apply_filters(std\FILTER_OMT_GLOBAL_PAGINATION_SETTINGS, $settings));
		
		$html = HtmlWriter::init();
		
		$html->ul(['class' => $settings['classes']]);
		
		foreach ($items as $item) {
			
			$type    = array_key_exists('type', $item) ? $item['type'] : null;
			$current = array_key_exists('current', $item) && $item['current'];
			
			if ($type === 'prev') {
				$itemClasses = $settings['itemPrevClasses'];
			} else if ($type === 'next') {
				$itemClasses = $settings['itemNextClasses'];
			} else if ($type === 'dots') {
				$itemClasses = $settings['itemDotsClasses'];
			} else {
				$itemClasses = $settings['itemClasses'];
				
				if ($current) {
					$itemClasses = array_merge($itemClasses, $settings['itemCurrentClasses']);
				}
			}
			
			$linkAtts = ['class' => $settings['linkClasses']];
			
			if (array_key_exists('url', $item) && !$current) {
				$linkAtts['href'] = esc_url($item['url']);
				
				$tag = 'a';
			} else {
				$tag = 'span';
			}
			
			$html->li(['class' => $itemClasses])
			     ->$tag($linkAtts, array_key_exists('text', $item) ? $item['text'] : '', true)
			     ->end();
		}
		
		return (string)$html;
	}
	
	public static function getPostPagination() {
		$linkFilter = function ($link, $number) {
			global $page;
			
			$link = $number === $page
				? '<li class="page-item page-number active"><span class="page-link">' . $link . '</span></li>'
				: '<li class="page-item page-number">' . substr_replace($link, ' class="page-link"', 2, 0) . '</li>';
			
			return $link;
		};
		
		add_filter('wp_link_pages_link', $linkFilter, 20, 2);
		
		$content = wp_link_pages([
			'before'    => '<ul class="pagination pagination-sm hidden-xs-down">',
			'after'     => '</ul>',
			'separator' => '',
			'echo'      => false
		]);
		
		remove_filter('wp_link_pages_link', $linkFilter, 20);
		
		return $content;
	}
	
	public static function _postPaginationItem_($link, $number) {
		global $page;
		
		if ($number === $page) {
			$link = '<li class="page-item page-number active"><span class="page-link">' . $link . '</span></li>';
		} else {
			$link = '<li class="page-item page-number">' . substr_replace($link, ' class="page-link"', 2, 0) . '</li>';
		}
		
		return $link;
	}
	
	/**
	 * Retrieve an HTML img element representing an image attachment.
	 *
	 * @param int          $id         Image ID
	 * @param array        $attributes (Optional) Image element additional attributes
	 * @param string|int[] $primary    (Optional) IName of the image size or array of dimensions ([<width>, <height>]).
	 *                                 If set then return thumbnails with same ratio only.
	 *
	 * @return string
	 */
	public static function getImage($id, array $attributes = [], $primary = null) {
		if (Image::exists($id)) {
			$sizes = get_post_mime_type($id) === 'image/gif' ? ['full'] : null;
			
			$thumbnails = Image::getThumbnails($id, $sizes, $primary);
			
			$first = reset($thumbnails);
			$last  = end($thumbnails);
			
			$attributes['src']   = $first['url'];
			$attributes['alt']   = Image::getAlt($id);
			$attributes['width'] = $last['width'];
			
			if ($primary) {
				$attributes['height'] = $last['height'];
			}
			
			$attributes = array_merge($attributes, Image::getReactiveAttributes($thumbnails));
			
			return '<img ' . self::getAttributes($attributes) . '/>';
		}
		
		return '';
	}
	
	/**
	 * Retrieve the avatar HTML img element for a user, email address, MD5 hash, comment, or post.
	 *
	 * @param mixed $userId      The Gravatar to retrieve. Accepts a user_id, gravatar md5 hash,
	 *                           user email, WP_User object, WP_Post object, or WP_Comment object.
	 * @param int[] $sizes       List of width sizes of the squire avatar image file in pixels
	 * @param array $args        Identical with the 'get_avatar()' args
	 *
	 * @return string
	 */
	public static function getAvatar($userId, array $sizes, array $args) {
		$mainSize = $sizes[0];
		
		$args['size'] = $mainSize;
		
		$args = get_avatar_data($userId, $args);
		
		$url = $args['url'];
		
		if (!$url || is_wp_error($url)) {
			return null;
		}
		
		// Classes
		
		$classes = ['avatar', 'avatar-' . (int)$args['size'], 'photo'];
		
		if (!$args['found_avatar'] || $args['force_default']) {
			$classes[] = 'avatar-default';
		}
		
		if ($class = $args['class']) {
			if (!is_array($class)) {
				$class = explode(' ', $class);
			}
			
			$classes = array_merge($classes, $class);
		}
		
		// Thumbnails
		
		$realSizes = [];
		
		foreach ($sizes as $size) {
			foreach (self::$_devicePixelRatios as $ratio) {
				$realSizes[] = $ratio * $size;
			}
		}
		
		$realSizes  = array_unique($realSizes);
		$thumbnails = Image::getAvatarThumbnails($userId, $realSizes, $args);
		
		// Attributes
		
		$attributes = [
			'alt'    => $args['alt'],
			'src'    => esc_url($url),
			'class'  => $classes,
			'width'  => $mainSize,
			'height' => $mainSize
		];
		
		$attributes = array_merge($attributes, Image::getReactiveAttributes($thumbnails));
		
		return '<img ' . self::getAttributes($attributes) . ' ' . $args['extra_attr'] . '/>';
	}
	
	/**
	 * Print img element representing an image attachment.
	 *
	 * @param int          $id         Image ID
	 * @param array        $attributes (Optional) Image element additional attributes
	 * @param string|int[] $primary    (Optional) Name of the image size or array of dimensions ([<width>, <height>]).
	 *                                 If set then return thumbnails with same ratio only.
	 */
	public static function image($id, array $attributes = [], $primary = null) {
		echo self::getImage($id, $attributes, $primary);
	}
	
	/**
	 * Retrieve an HTML img element representing the post featured image (thumbnail).
	 *
	 * @param int          $postId     Post ID
	 * @param array        $attributes (Optional) Image element additional attributes
	 * @param string|int[] $primary    (Optional) Name of the image size or array of dimensions ([<width>, <height>]).
	 *                                 If set then return thumbnails with same ratio only.
	 *
	 * @return string
	 */
	public static function getFeaturedImage($postId, array $attributes = [], $primary = null) {
		$id = get_post_thumbnail_id($postId);
		
		return self::getImage($id, $attributes, $primary);
	}
	
	/**
	 * Print the post featured image (thumbnail).
	 *
	 * @param int          $postId     Post ID
	 * @param array        $attributes (Optional) Image element additional attributes
	 * @param string|int[] $primary    (Optional) Name of the image size or array of dimensions ([<width>, <height>]).
	 *                                 If set then return thumbnails with same ratio only.
	 */
	public static function featuredImage($postId, array $attributes = [], $primary = null) {
		echo self::getFeaturedImage($postId, $attributes, $primary);
	}
	
	/**
	 * Sanitize CSS
	 *
	 * @param string $css
	 *
	 * @return string
	 */
	public static function sanitizeCSS($css) {
		return (string)str_replace(['<', '-moz-binding', 'expression', 'javascript', 'vbscript'], '', $css);
	}
}