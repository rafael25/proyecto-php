<?php namespace Base\Micro;
/**
 * @Author: rafael
 * @Date:   2015-02-19 14:00:34
 * @Last Modified by:   rafael
 * @Last Modified time: 2015-03-25 21:05:50
 */

class Vista {
	private $template;
	private $datos = array();

	public function __construct($template) {
		$this->datos['usuario'] = $_SESSION['usuario'];
		$this->template = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "App" . DIRECTORY_SEPARATOR . "vistas" . DIRECTORY_SEPARATOR . $template;
	}

	public function setDatos(array $datos) {
		$this->datos = $datos;
	}

	public function __toString() {
		extract($this->datos);
		chdir(dirname($this->template));

		ob_start();

		include basename($this->template);

		$vista = ob_get_clean();

		if(mb_detect_encoding($vista) == 'UTF-8') {
			return $vista;
		}
		return utf8_encode($vista);
	}

	public function __get($key) {
		return isset($datos[$key]) ? $datos[$key] : null;
	}

	public function __set($key, $value) {
		$this->datos[$key] = $value;
	}
}
