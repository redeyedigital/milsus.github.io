<?php

/**
 * Class autoloader.
 */
spl_autoload_register(function ($class) {
	if (file_exists($file = rtrim(str_replace('\\', '/', __DIR__), '/') . '/' . str_replace('\\', '/', $class) . '.php')) {
		require_once $file;
	}
}, true, true);

/**
 * Includes.
 */
require_once __DIR__ . '/Openmarco/Seriously/std.php';
