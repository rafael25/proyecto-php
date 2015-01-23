<?php namespace Rafael\Micro;
/**
 * @Author: rafael
 * @Date:   2015-01-23 01:50:58
 * @Last Modified by:   rafael
 * @Last Modified time: 2015-01-23 02:33:35
 */

class Contenerdor implements ArrayAccess {

	/**
	 * Contiene los objetos(servicios)
	 * @var array
	 */
	$deposito = array();

	/**
	 * Contiene las funciones constructoras de servicios
	 * @var array
	 */
	$construnctores = array();

	public function set($nombre, callable $closure) {
		// TODO: Implementar metodo set para registrar un servicio
	}

	public function get($nombre) {
		// TODO: Implementar metodo get para obtener un servicio
	}

	public function offsetExists($offset) {
		// TODO: Implemetar metodo abstracto offsetExists
	}

	public function offsetGet($offset) {
		// TODO: Implemetar metodo abstracto offsetGet
	}

	public function offsetSet($offset, $value) {
		// TODO: Implemetar metodo abstracto offsetSet
	}

	public function offsetUnset($offset) {
		// TODO: Implemetar metodo abstracto offsetUnset
	}

	public function __get($key) {
		// TODO: Implemetar metodo magico get
	}

	public function __set($key, $value) {
		// TODO: Implemetar metodo magico set
	}

	public function __isset($key) {
		// TODO: Implemetar metodo magico isset
	}

	public function __unset($key) {
		// TODO: Implemetar metodo magico unset
	}
}
