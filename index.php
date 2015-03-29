<?php
/**
 * @Author: rafael
 * @Date:   2015-01-23 16:04:40
 * @Last Modified by:   Rafael Viveros
 * @Last Modified time: 2015-03-28 19:47:30
 */

/**
 * Se registra el cargador de clases
 */
include __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'cargador.php';

/**
 * Contenedor global de servicios para la aplicacion
 * @var \Base\Micro\Contenedor
 */
$contenedor = include __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR  . 'App' . DIRECTORY_SEPARATOR . 'servicios.php';


/**
 * Se crea la aplicación usando el contenedor de servicios
 * @var \Base\Micro\Aplicacion
 */
$app = new \Base\Micro\Aplicacion($contenedor);


/**
 * Arranca la aplicacion
 */

try {
	$app->run();
} catch (Exception $e) {
	header('HTTP/1.0 404 Not Found');
	echo $e->getMessage();
}

?>
