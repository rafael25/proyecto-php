<?php namespace App;
/**
 * @Author: rafael25
 * @Date:   2015-02-20 22:43:44
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-02-27 19:48:13
 */

$router = new \Base\Micro\Router;

$router->agregar('get', '/', 'App\ControladorRecetas::index');
$router->agregar('get', '/recetas', 'App\ControladorRecetas::index');
$router->agregar('get', '/recetas/(\d)+', 'App\ControladorRecetas::buscarId');

return $router;
