<?php namespace App;
/**
 * @Author: rafael25
 * @Date:   2015-02-20 22:43:44
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-03-11 17:51:50
 */

use Base\Micro\Router;

$router = new Router;

/*--------- Recetas ---------*/
$router->agregar('get', '/', 'App\ControladorRecetas::index');
$router->agregar('get', '/recetas', 'App\ControladorRecetas::index');
$router->agregar('get', '/recetas/(\d+)', 'App\ControladorRecetas::buscarId');
$router->agregar('get', '/recetas-nueva', 'App\ControladorRecetas::ingresar');
$router->agregar('post', '/recetas', 'App\ControladorRecetas::guardar');

/*--------- Comentarios ---------*/
$router->agregar('post', '/comentarios', 'App\ControladorComentarios::guardar');

/*--------- Usuarios ---------*/
$router->agregar('get', '/login', 'App\ControladorUsuarios::loginForm');
$router->agregar('post', '/login', 'App\ControladorUsuarios::login');
$router->agregar('get', '/signin', 'App\ControladorUsuarios::signInForm');
$router->agregar('post', '/signin', 'App\ControladorUsuarios::signIn');

/*--------- Errores ---------*/
$router->setRuta404('App\ControladorErrores::error404');

return $router;
