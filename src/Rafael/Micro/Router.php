<?php namespace Rafael\Micro;
/**
 * @Author: rafael
 * @Date:   2015-01-19 23:50:09
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-01-23 17:19:47
 */

class Router {

	/**
	 * @var array
	 */
	private $rutas = array();

	/**
	 * @param string $ruta
	 * @param mixed $accion
	 */
	public function agregar($ruta, $accion) {
		$this->rutas[$ruta] = $accion;
	}

	/**
	 * @param $ruta
	 */
	public function resolverRuta($ruta) {
		// TODO: Implementar metodo para resolver la ruta
	}
}
