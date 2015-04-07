<?php namespace App;
/**
 * @Author: rafael25
 * @Date:   2015-02-20 22:43:44
 * @Last Modified by:   Rafael Viveros
 * @Last Modified time: 2015-03-31 20:52:19
 */

use Base\Micro\Router;

$router = new Router;

/*--------- Recetas ---------*/
$router->agregar('get', '/', 'App\ControladorRecetas::index');
$router->agregar('get', '/recetas', 'App\ControladorRecetas::index');
$router->agregar('get', '/recetas/(\d+)', 'App\ControladorRecetas::buscarId');
$router->agregar('get', '/recetas-nueva', 'App\ControladorRecetas::ingresar');
$router->agregar('post', '/recetas', 'App\ControladorRecetas::guardar');
$router->agregar('get', '/recetas/(\d+)/editar', 'App\ControladorRecetas::editForm');
$router->agregar('post', '/recetas/(\d+)/editar', 'App\ControladorRecetas::editar');
$router->agregar('post', '/recetas/(\d+)/borrar', 'App\ControladorRecetas::borrar');

/*--------- Versiones ---------*/
$router->agregar('get', '/recetas/(\d+)/versiones', 'App\ControladorVersiones::index');
$router->agregar('get', '/recetas/(\d+)/versiones/(\d+)', 'App\ControladorVersiones::buscarId');

/*--------- Comentarios ---------*/
$router->agregar('post', '/comentarios', 'App\ControladorComentarios::guardar');

/*--------- Usuarios ---------*/
$router->agregar('get', '/login', 'App\ControladorUsuarios::loginForm');
$router->agregar('post', '/login', 'App\ControladorUsuarios::login');
$router->agregar('get', '/signin', 'App\ControladorUsuarios::signInForm');
$router->agregar('post', '/signin', 'App\ControladorUsuarios::signIn');
$router->agregar('get', '/logout', 'App\ControladorUsuarios::logout');

/*--------- Errores ---------*/
$router->setRuta404('App\ControladorErrores::error404');

return $router;
