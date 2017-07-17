<?php

namespace Openmarco\Seriously\Feature;

/**
 * WordPress custom feature renderer.
 */
class Renderer {

	/**
	 * @var callable|NULL -- callback for render in public
	 */
	private $_public = null;

	/**
	 * @var callable|NULL -- callback for render in customizer preview
	 */
	private $_customizer = null;

	/**
	 * @var callable|NULL -- callback for render in dashboard
	 */
	private $_dashboard = null;

	/**
	 * Constructor.
	 *
	 * @param callable|NULL $aPublic     -- callback for render in public
	 * @param callable|NULL $aCustomizer -- callback for render in customizer preview
	 * @param callable|NULL $aDashboard  -- callback for render in dashboard
	 */
	public function __construct(callable $aPublic = null, callable $aCustomizer = null, callable $aDashboard = null) {
		$this->_public     = $aPublic;
		$this->_customizer = $aCustomizer;
		$this->_dashboard  = $aDashboard;
	}

	/**
	 * Get callback for render in public.
	 * @return callable|NULL -- callback for render in public
	 */
	public function getPublic() {
		return $this->_public;
	}

	/**
	 * Get callback for render in customizer.
	 * @return callable|NULL -- callback for render in customizer
	 */
	public function getCustomizer() {
		return $this->_customizer;
	}

	/**
	 * Get callback for render in dashboard.
	 * @return callable|NULL -- callback for render in dashboard
	 */
	public function getDashboard() {
		return $this->_dashboard;
	}
}