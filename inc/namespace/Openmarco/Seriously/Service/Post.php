<?php

namespace Openmarco\Seriously\Service;

class Post {
	
	/**
	 * Check the content of the post to the 'more' link
	 *
	 * @param int|\WP_Post|null $postId
	 *
	 * @return bool
	 */
	public static function hasMoreLink($postId = null) {
		/**@var \WP_Post */
		$post = get_post($postId);
		
		return $post && strpos($post->post_content, '<!--more') !== false;
	}
	
	/**
	 * Check the content of the post is paginated
	 * @return bool
	 */
	public static function isMultipage() {
		return (bool)$GLOBALS['multipage'];
	}
	
	/**
	 * Whether the current post has comments section
	 */
	public static function hasCommentsSection() {
		return !post_password_required() && (comments_open() || get_comments_number());
	}
}