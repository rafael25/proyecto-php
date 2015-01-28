<?php namespace Rafael\Micro;
/**
 * @Author: rafael
 * @Date:   2015-01-27 15:10:48
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-01-27 15:55:34
 */

class ControladorBase {

	/**
	 * @var \Rafael\Micro\Contenedor
	 */
	protected $contenedor = NULL;

	/**
	 * Asigna el contenedor de servicios
	 * @param \Rafael\Micro\Contenedor $contenedor el contenedor
	 */
	public function setContenedor(Contenedor $contenedor) {
		$this->contenedor = $contenedor;
	}

	/**
	 * Proporciona el contenedor de servicios
	 * @return \Rafael\Micro\Contenedor el contenedor
	 */
	public function getContenedor() {
		return $this->contenedor;
	}

	/**
	 * Metodo magico __get
	 * @param  string $key nombre de la propiedad a buscar
	 * @return mixed valor de la propiedad
	 */
	public function __get($key) {
		return $this->contenedor->get($key);
	}
}
