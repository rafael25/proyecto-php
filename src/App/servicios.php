<?php
/**
 * @Author: rafael25
 * @Date:   2015-02-25 00:56:25
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-02-25 18:03:46
 */

$contenedor = new \Base\Micro\Contenedor;

$contenedor->set('router', function() {
	$router = include __DIR__ . DIRECTORY_SEPARATOR . 'rutas.php';
	return $router;
});

$contenedor->set('db', function () {
	try {
		$conn = new PDO("mysql:dbname=recetas;host=127.0.0.1", "root", "");
	} catch (PDOException $e) {
		echo "Fallo de conexion" . $e->getMessage();
	}
	return $conn;
});

return $contenedor;
