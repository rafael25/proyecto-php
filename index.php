<?php
/**
 * @Author: rafael
 * @Date:   2015-01-23 16:04:40
 * @Last Modified by:   rafael25
 * @Last Modified time: 2015-02-25 01:15:00
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
$app->run();

?>
