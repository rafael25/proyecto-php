<?php
/**
 * @Author: rafael25
 * @Date:   2015-02-25 00:56:25
 * @Last Modified by:   rafael25
 * @Last Modified time: 2015-02-25 01:06:39
 */

$contenedor = new \Base\Micro\Contenedor;

$contenedor->set('router', function() {
	$router = include __DIR__ . DIRECTORY_SEPARATOR . 'rutas.php';
	return $router;
});

return $contenedor;
