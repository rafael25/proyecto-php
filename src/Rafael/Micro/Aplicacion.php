<?php namespace Rafael\Micro;
/**
 * @Author: rafael
 * @Date:   2015-02-17 16:33:19
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-02-17 19:21:39
 */

class Aplicacion {
	public $contenedor;

	public function __construct(Contenedor $contenedor) {
		$this->contenedor = $contenedor;
	}

	public function run() {
		$requestURL = (isset($_GET['_url'])) ? $_GET['_url'] : '/';
		$ruta = $this->contenedor->router->resolverUrl($requestURL, strtolower($_SERVER['REQUEST_METHOD']));
		// TODO: Terminar metodo run
	}
}
