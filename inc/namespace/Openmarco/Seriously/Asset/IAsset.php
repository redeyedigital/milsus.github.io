<?php

namespace Openmarco\Seriously\Asset;

/**
 * Asset.
 */
interface IAsset {
	
	/**
	 *
	 */
	const TARGET_NONE = 0;
	
	/**
	 *
	 */
	const TARGET_PUBLIC = 1;
	
	/**
	 *
	 */
	const TARGET_DASHBOARD = 2;
	
	/**
	 * Enqueue asset.
	 */
	public function enqueue();
}