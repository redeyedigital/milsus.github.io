<?php

namespace Openmarco\Seriously\Service;

class Image {
	
	/**
	 * Checks if the image with ID exists.
	 *
	 * @param int $id Image ID
	 *
	 * @return bool
	 */
	public static function exists($id) {
		return $id && wp_attachment_is_image($id);
	}
	
	/**
	 * Get the URL of an image attachment.
	 *
	 * @param int    $id   Image ID
	 * @param string $size Optional. Image size to retrieve. Accepts any valid image size, or an array
	 *                     of width and height values in pixels (in that order). Default 'thumbnail'.
	 *
	 * @return string
	 */
	public static function getUrl($id, $size = 'thumbnail') {
		$url = wp_get_attachment_image_url($id, $size);
		
		return $url ?: null;
	}
	
	/**
	 * Get image alt.
	 *
	 * @param int $id Image attachment ID.
	 *
	 * @return string
	 */
	public static function getAlt($id) {
		$alt = trim(strip_tags(get_post_meta($id, '_wp_attachment_image_alt', true)));
		
		if (!$alt) {
			$attachment = get_post($id);
			
			$alt = trim(strip_tags(($attachment->post_excerpt ?: $attachment->post_title)));
		}
		
		return $alt;
	}
	
	/**
	 * Retrieves single image thumbnail info
	 *
	 * @param int    $id
	 * @param string $size
	 *
	 * @return array Returns thumbnail data:
	 *                      [
	 *                      'size' => string|array,
	 *                      'url' => string,
	 *                      'width' => int,
	 *                      'height' => int,
	 *                      ]
	 */
	public static function getThumbnail($id, $size = 'full') {
		if ($info = self::_getAttachmentImageSrc($id, $size)) {
			return [
				'size'   => $size,
				'url'    => $info[0],
				'width'  => (int)$info[1],
				'height' => (int)$info[2]
			];
		}
		
		return null;
	}
	
	/**
	 * Retrieves image thumbnails info
	 *
	 * @param int          $id      Image ID
	 * @param array        $sizes
	 * @param string|int[] $primary Name of the image size or array of dimensions ([<width>, <height>]).
	 *                              If set then return thumbnails with same ratio only.
	 *
	 * @return array Returns list of thumbnails data:
	 *                      [
	 *                          [
	 *                          'size' => string|array,
	 *                          'url' => string,
	 *                          'width' => int,
	 *                          'height' => int,
	 *                          ],
	 *                      ...
	 *                      ]
	 */
	public static function getThumbnails($id, array $sizes = null, $primary = null) {
		if (!self::exists($id)) {
			return [];
		}
		
		static $allSizes;
		
		// Cache images sizes
		if (!$sizes) {
			if (!$allSizes) {
				$allSizes   = array_keys(self::_getAdditionalSizes());
				$allSizes[] = 'full';
			}
			
			$sizes = $allSizes;
		}
		
		$thumbnails = [];
		
		// Get current image sizes info
		foreach ($sizes as $size) {
			$thumbnails[] = self::getThumbnail($id, $size);
		}
		
		// Filter images sizes info by $primary size
		if ($primary) {
			$primarySize = null;
			
			if (is_string($primary)) {
				foreach ($thumbnails as $thumbnail) {
					if ($thumbnail['size'] === $primary) {
						$primarySize = $thumbnail;
						break;
					}
				}
				
				if (!$primarySize) {
					$primarySize = self::getThumbnail($id, $primary);
				}
			} else if (is_array($primary)) {
				$primarySize = [
					'width'  => (int)$primary[0],
					'height' => (int)$primary[1]
				];
			}
			
			if ($primarySize && $primarySize['width'] > 0) {
				$thumbnails = array_filter($thumbnails, function (array $thumbnail) use ($primarySize) {
					return (abs($thumbnail['height'] - $primarySize['height'] * $thumbnail['width'] / $primarySize['width']) <= 2);
				});
			}
		}
		
		// Sort images sizes info ascending
		usort($thumbnails, function (array $first, array $second) {
			$key = $first['width'] === $second['width'] ? 'height' : 'width';
			
			return $first[$key] - $second[$key];
		});
		
		return $thumbnails;
	}
	
	/**
	 * @param mixed $userId      The Gravatar to retrieve a URL for. Accepts a user_id, gravatar md5 hash,
	 *                           user email, WP_User object, WP_Post object, or WP_Comment object.
	 * @param int   $size        Height and width of the avatar in pixels. Default 96.
	 * @param array $args        Identical with the 'get_avatar()' args
	 *
	 * @return array Returns thumbnail data:
	 *                      [
	 *                      'size' => string|array,
	 *                      'url' => string,
	 *                      'width' => int,
	 *                      'height' => int,
	 *                      ]
	 */
	public static function getAvatar($userId, $size, array $args) {
		$data = [
			'size'   => $size,
			'width'  => $size,
			'height' => $size
		];
		
		$url = get_avatar_url($userId, array_merge($args, $data));
		
		if(strpos($url, 'gravatar.com')) {
			$url = preg_replace('/\?s=\d{1,4}/', '?s=' . $size, $url);
		}
		
		return array_merge($data, [
			'size' => [$size, $size],
			'url'  => $url
		]);
	}
	
	/**
	 * @param mixed $userId      The Gravatar to retrieve a URL for. Accepts a user_id, gravatar md5 hash,
	 *                           user email, WP_User object, WP_Post object, or WP_Comment object.
	 * @param int[] $sizes       List of width sizes of the squire avatar image file in pixels.
	 * @param array $args        Identical with the 'get_avatar()' args
	 *
	 * @return array Returns list of thumbnails data:
	 *                      [
	 *                          [
	 *                          'size' => string|array,
	 *                          'url' => string,
	 *                          'width' => int,
	 *                          'height' => int,
	 *                          ],
	 *                      ...
	 *                      ]
	 */
	public static function getAvatarThumbnails($userId, array $sizes, array $args) {
		$thumbnails = [];
		
		foreach ($sizes as $size) {
			$thumbnails[] = self::getAvatar($userId, $size, $args);
		}
		
		return $thumbnails;
	}
	
	/**
	 * Generate attributes for reactive images
	 *
	 * @param array $thumbnails list thumbnail data:
	 *                          [
	 *                          [
	 *                          'size' => string|array,
	 *                          'url' => string,
	 *                          'width' => int,
	 *                          'height' => int,
	 *                          ],
	 *                          ...
	 *                          ]
	 *
	 * @return array
	 */
	public static function getReactiveAttributes(array $thumbnails) {
		$attributes     = [];
		$thumbnailsData = [];
		$thumbnailSizes = [];
		
		foreach ($thumbnails as $thumbnail) {
			$size = $thumbnail['width'] . 'x' . $thumbnail['height'];
			if (!in_array($size, $thumbnailSizes, true)) {
				$thumbnailsData[] = [$size => $thumbnail['url']];
				$thumbnailSizes[] = $size;
			}
		}
		
		$attributes['data-reactive-image'] = json_encode($thumbnailsData);
		
		return $attributes;
	}
	
	/**
	 * Retrieve an image to represent an attachment.
	 * A mime icon for files, thumbnail or intermediate size for images.
	 * The returned array contains four values: the URL of the attachment image src,
	 * the width of the image file, the height of the image file, and a boolean
	 * representing whether the returned array describes an intermediate (generated)
	 * image size or the original, full-sized upload.
	 *
	 * @param int          $id            Image attachment ID.
	 * @param string|array $size          Optional. Image size. Accepts any valid image size, or an array of width
	 *                                    and height values in pixels (in that order). Default 'thumbnail'.
	 * @param bool         $icon          Optional. Whether the image should be treated as an icon. Default false.
	 *
	 * @return false|array Returns an array (url, width, height, is_intermediate), or false, if no image is available.
	 */
	private static function _getAttachmentImageSrc($id, $size = 'thumbnail', $icon = false) {
		$info = wp_get_attachment_image_src($id, $size, $icon);
		
		// JetPack Photon service removes image size, need to restore it from url:
		if ($info && (!array_key_exists(1, $info) || !array_key_exists(2, $info)) && $info[0]) {
			$location = parse_url($info[0]);
			
			if (array_key_exists('query', $location)) {
				$query = [];
				parse_str($location['query'], $query);
				
				if (array_key_exists('w', $query)) {
					$info[1] = $query['w'];
				}
				
				if (array_key_exists('h', $query)) {
					$info[2] = $query['h'];
				}
			}
		}
		
		return $info;
	}
	
	/**
	 * Get image sizes.
	 *
	 * @param bool|null $crop
	 *
	 * @return array
	 */
	private static function _getAdditionalSizes($crop = null) {
		global $_wp_additional_image_sizes;
		
		$sizes             = [];
		$intermediateSizes = get_intermediate_image_sizes();
		
		// Create the full array with sizes and crop info
		foreach ($intermediateSizes as $_size) {
			if (in_array($_size, ['thumbnail', 'medium', 'large'], null)) {
				$sizes[$_size]['width']  = get_option($_size . '_size_w');
				$sizes[$_size]['height'] = get_option($_size . '_size_h');
				$sizes[$_size]['crop']   = (bool)get_option($_size . '_crop');
			} else if (array_key_exists($_size, $_wp_additional_image_sizes)) {
				$sizes[$_size] = [
					'width'  => $_wp_additional_image_sizes[$_size]['width'],
					'height' => $_wp_additional_image_sizes[$_size]['height'],
					'crop'   => $_wp_additional_image_sizes[$_size]['crop']
				];
			}
		}
		
		if ($crop !== null) {
			$sizes = array_filter($sizes, function (array $size) use ($crop) {
				return $size['crop'] === $crop;
			});
		}
		
		return $sizes;
	}
}