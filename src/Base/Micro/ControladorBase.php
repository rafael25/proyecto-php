<?php namespace Base\Micro;
/**
 * @Author: rafael
 * @Date:   2015-01-27 15:10:48
 * @Last Modified by:   rafael25
 * @Last Modified time: 2015-02-20 22:51:18
 */

class ControladorBase {

	/**
	 * @var \Base\Micro\Contenedor
	 */
	protected $contenedor = NULL;

	/**
	 * Asigna el contenedor de servicios
	 * @param \Base\Micro\Contenedor $contenedor el contenedor
	 */
	public function setContenedor(Contenedor $contenedor) {
		$this->contenedor = $contenedor;
	}

	/**
	 * Proporciona el contenedor de servicios
	 * @return \Base\Micro\Contenedor el contenedor
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
