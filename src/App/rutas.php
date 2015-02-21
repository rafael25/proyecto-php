<?php namespace App;
/**
 * @Author: rafael25
 * @Date:   2015-02-20 22:43:44
 * @Last Modified by:   rafael25
 * @Last Modified time: 2015-02-21 15:56:16
 */

$router = new \Base\Micro\Router;

$router->agregar('get', '/', 'ControladorIndex::index');

return $router;
