<?php namespace Rafael\Micro;
/**
 * @Author: rafael
 * @Date:   2015-02-17 16:33:19
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-02-18 17:11:43
 */

class Aplicacion {
	public $contenedor;

	public function __construct(Contenedor $contenedor) {
		$this->contenedor = $contenedor;
	}

	public function run() {
		$requestURL = (isset($_GET['_url'])) ? $_GET['_url'] : '/';
		$ruta = $this->contenedor->router->resolverUrl($requestURL, strtolower($_SERVER['REQUEST_METHOD']));
		$accion = preg_split('/::/', $ruta->accion);
		$controlador = new $accion[0];
		$controlador->$accion[1]($ruta->parametros);
	}
}
