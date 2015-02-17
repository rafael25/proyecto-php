<?php namespace Rafael\Micro;
/**
 * @Author: rafael
 * @Date:   2015-01-19 23:50:09
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-02-17 16:51:18
 */

class Router {

	/**
	 * @var array
	 */
	private $rutas = array();

	/**
	 * @param string $metodo
	 * @param string $ruta
	 * @param mixed $accion
	 */
	public function agregar($metodo, $ruta, $accion) {
		$this->rutas[] = new Ruta($metodo, $ruta, $accion);
	}

	/**
	 * @param  string $url
	 * @return \Rafael\Micro\Ruta
	 */
	public function resolverUrl($url) {
		foreach ($this->rutas as $ruta) {
			if (preg_match($ruta->regex, $url, $matches)) {
				$ruta->parametros = (count($matches) > 1)? $matches[1] : NULL;
				return $ruta;
			}
		}
	}
}
