<?php

namespace Openmarco\Seriously\Meta;

use Openmarco\Seriously\Asset\Style;
use Openmarco\Seriously\Basic\Container;
use Openmarco\Seriously\Basic\UAccessory;
use Openmarco\Seriously\Service\Protocol;
use Openmarco\Seriously\std;
use RuntimeException;
use WP_Post;

/**
 * WordPress meta box.
 */
class Box extends Container {
	
	use UAccessory;
	
	/**
	 * @var string -- box title
	 */
	private $_title = null;
	
	/**
	 * @var string|NULL -- box description
	 */
	private $_description = null;
	
	/**
	 * @var string[] -- post types associated with box
	 */
	private $_postTypes = [];
	
	/**
	 * @var callable -- post types associated with box
	 */
	private $_postTypesCallback = null;
	
	/**
	 * @var boolean -- place box in side section
	 */
	private $_side = null;
	
	/**
	 * Constructor.
	 *
	 * @param string            $aTitle       -- box title
	 * @param string|NULL       $aDescription -- box description
	 * @param string[]|callable $aPostTypes   -- post types associated with box
	 * @param Field[]           $aFields      -- child fields
	 * @param boolean           $aSide        -- place box in side section
	 *
	 * @throws RuntimeException -- Invalid post types
	 * @throws RuntimeException -- Invalid fields
	 */
	public function __construct($aTitle, $aDescription = null, $aPostTypes, array $aFields = null, $aSide = false) {
		parent::__construct(__NAMESPACE__ . '\\Field', $aFields);
		
		$this->_title       = (string)$aTitle;
		$this->_description = $aDescription === null ? null : (string)$aDescription;
		
		if (is_array($aPostTypes)) {
			foreach ((array)$aPostTypes as $postType) {
				$this->_postTypes[] = (string)$postType;
			}
		} else if (is_callable($aPostTypes)) {
			$this->_postTypesCallback = $aPostTypes;
		} else {
			throw new RuntimeException('Invalid post types');
		}
		
		$this->_side = (boolean)$aSide;
	}
	
	/**
	 * Register box in WordPress.
	 *
	 * @param string $aId -- box identifier
	 */
	public function register($aId) {
		$aId = (string)$aId;
		
		add_action(std\ACTION_WP_ADD_META_BOXES, function () use ($aId) {
			$postTypes = $this->_postTypesCallback
				? call_user_func($this->_postTypesCallback, $aId)
				: $this->_postTypes;
			
			add_meta_box($aId, $this->_title, function (WP_Post $aPost) use ($aId) {
				$this->render($aId, $aPost);
			}, $postTypes, $this->_side ? 'side' : 'advanced');
			
			add_action(std\ACTION_WP_ADMIN_ENQUEUE_SCRIPTS, function () {
				$this->enqueue();
			}, 0);
		}, 10);
		
		add_action(std\ACTION_WP_SAVE_POST, function ($aPostId, WP_Post $aPost) use ($aId) {
			$this->save($aId, $aPost);
		}, 1, 2);
		
		foreach ($this as $id => $field) {
			$field->register($id);
		}
		
		$this->_publish($aId);
	}
	
	/**
	 * Publish box.
	 */
	public function enqueue() {
		$style = new Style('om-meta', Protocol::request('url:theme://assets/css/meta.css'));
		$style->register();
		$style->enqueue();
		
		foreach ($this as $field) {
			$field->enqueue();
		}
	}
	
	/**
	 * Render box.
	 *
	 * @param string  $aId   -- box identifier
	 * @param WP_Post $aPost -- current WordPress post
	 */
	public function render($aId, WP_Post $aPost) {
		echo '<div class="om-meta-box">';
		
		wp_nonce_field($aId, $aId . '_wpnonce', false);
		
		if ($this->_description !== null) {
			echo '<div class="om-meta-box-description">' . esc_html($this->_description) . '</div>';
		}
		
		foreach ($this as $id => $field) {
			$field->render($id, $aPost);
		}
		
		echo '</div>';
	}
	
	/**
	 * Save box metadata.
	 *
	 * @param string  $aId   -- box identifier
	 * @param WP_Post $aPost -- current WordPress post
	 */
	public function save($aId, WP_Post $aPost) {
		$nonceId = $aId . '_wpnonce';
		
		$postTypes = $this->_postTypesCallback
			? call_user_func($this->_postTypesCallback, $aId)
			: $this->_postTypes;
		
		if (
			array_key_exists($nonceId, $_POST) &&
			wp_verify_nonce($_POST[$nonceId], $aId) &&
			in_array($aPost->post_type, $postTypes, true) &&
			current_user_can('edit_post', $aPost->ID)
		) {
			foreach ($this as $id => $field) {
				$field->save($id, $aPost);
			}
		}
	}
}