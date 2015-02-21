<?php namespace Base\Micro;
/**
 * @Author: rafael
 * @Date:   2015-02-17 14:02:14
 * @Last Modified by:   rafael25
 * @Last Modified time: 2015-02-20 22:49:10
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
		$this->metodo = strtolower($metodo);
		$this->ruta = $ruta;
		$this->accion = $accion;

		$this->regex = '/^' . preg_replace('/\//', '\/', $ruta) . '$/';
	}
}
