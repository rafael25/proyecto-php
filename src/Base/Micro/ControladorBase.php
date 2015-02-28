<?php namespace Base\Micro;
/**
 * @Author: rafael
 * @Date:   2015-01-27 15:10:48
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-02-27 18:54:46
 */

class ControladorBase {

	const TODOS = 0;
	const SOLO_ANONIMOS = 1;
	const SOLO_USUARIOS = 2;

	/**
	 * Define el nivel de acceso de todoso los metodos del controlador
	 * @var int
	 */
	protected $nivelAcceso = self::TODOS;

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
	 * Devuelve el nivel de acceso del controlador
	 * @return int
	 */
	public function getNivelAccesos() {
		return $this->nivelAcceso;
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
