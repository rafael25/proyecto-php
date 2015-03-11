<?php namespace App;
/**
 * @Author: rafael25
 * @Date:   2015-02-20 22:43:44
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-03-10 18:49:19
 */

use Base\Micro\Router;

$router = new Router;

$router->agregar('get', '/', 'App\ControladorRecetas::index');
$router->agregar('get', '/recetas', 'App\ControladorRecetas::index');
$router->agregar('get', '/recetas/(\d+)', 'App\ControladorRecetas::buscarId');
$router->agregar('get', '/recetas-nueva', 'App\ControladorRecetas::ingresar');
$router->agregar('post', '/recetas', 'App\ControladorRecetas::guardar');
$router->agregar('post', '/comentarios', 'App\ControladorComentarios::guardar');

$router->setRuta404('App\ControladorErrores::error404');

return $router;
