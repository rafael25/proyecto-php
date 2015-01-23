<?php namespace Rafael\Micro;
/**
 * @Author: rafael
 * @Date:   2015-01-23 01:50:58
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-01-23 17:27:06
 */

class Contenedor implements \ArrayAccess {

	/**
	 * Contiene los objetos(servicios)
	 * @var array
	 */
	private $deposito = array();

	/**
	 * Contiene las funciones constructoras de servicios
	 * @var array
	 */
	private $construnctores = array();

	public function set($nombre, callable $closure) {
		$this->construnctores[$nombre] = $closure;
	}

	public function get($nombre) {
		if (!isset($this->deposito[$nombre])) {
			$closure = $this->construnctores[$nombre];
			$obj = $closure();
			$this->deposito[$nombre] = $obj;
			return $obj;
		} else {
			return $this->deposito[$nombre];
		}
	}

	public function offsetExists($offset) {
		return isset($this->deposito[$offset]);
	}

	public function offsetGet($offset) {
		return isset($this->deposito[$offset]) ? $this->deposito[$offset] : null;
	}

	public function offsetSet($offset, $value) {
		if (is_null($offset)) {
			$this->deposito[] = $value;
		} else {
			$this->deposito[$offset] = $value;
		}
	}

	public function offsetUnset($offset) {
		unset($this->deposito[$offset]);
	}

	public function __get($key) {
		return $this->deposito[$key];
	}

	public function __set($key, $value) {
		$this->deposito[$key] = $value;
	}

	public function __isset($key) {
		return isset($this->deposito[$key]);
	}

	public function __unset($key) {
		unset($this->deposito[$key]);
	}
}
