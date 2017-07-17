<?php

/**
 * WP Estimation Form Support
 */
call_user_func(function () {
	global $jal_db_version;
	
	if ($jal_db_version !== null) {
		/** @var LFB_Core $lfbCore */
		$lfbCore = LFB_Core::instance();
		
		if ($lfbCore !== null && $lfbCore->dir && file_exists($lfbCore->dir . '/templates/lfb-preview.php')) {
			load_template($lfbCore->dir . '/templates/lfb-preview.php');
		}
	}
});