<?php namespace Rafael\Micro;
/**
 * @Author: rafael
 * @Date:   2015-02-17 14:02:14
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-02-17 16:36:15
 */

class Ruta {
	public $ruta;
	public $accion;
	public $regex;
	public $parametros;
	public $metodo;

	/**
	 * @param string $ruta
	 * @param mixed $accion
	 */
	public function __construct($metodo, $ruta, $accion) {
		$this->ruta = $ruta;
		$this->accion = $accion;

		$this->regex = '/' . preg_replace('/\//', '\/', $ruta) . '/';
	}
}
