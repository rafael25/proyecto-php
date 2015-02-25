<?php namespace App;
/**
 * @Author: rafael25
 * @Date:   2015-02-20 22:43:44
 * @Last Modified by:   rafael25
 * @Last Modified time: 2015-02-25 01:07:33
 */

$router = new \Base\Micro\Router;

$router->agregar('get', '/', 'App\ControladorIndex::index');
$router->agregar('get', '/recetas', 'App\ControladorRecetas::index');

return $router;
