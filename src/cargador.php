<?php
/**
 * @Author: rafael
 * @Date:   2015-01-23 15:56:54
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-01-23 17:52:58
 */

spl_autoload_register(function ($class) {
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	include __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
});
