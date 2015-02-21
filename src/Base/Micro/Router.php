<?php namespace Base\Micro;
/**
 * @Author: rafael
 * @Date:   2015-01-19 23:50:09
 * @Last Modified by:   rafael25
 * @Last Modified time: 2015-02-20 22:51:00
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
	 * @return \Base\Micro\Ruta
	 */
	public function resolverUrl($url, $metodo) {
		foreach ($this->rutas as $ruta) {
			if ($ruta->metodo == $metodo && preg_match($ruta->regex, $url, $matches)) {
				$ruta->parametros = (count($matches) > 1)? $matches[1] : NULL;
				return $ruta;
			}
		}
	}
}
