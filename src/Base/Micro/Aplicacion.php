<?php namespace Base\Micro;
/**
 * @Author: rafael
 * @Date:   2015-02-17 16:33:19
 * @Last Modified by:   Rafael Viveros
 * @Last Modified time: 2015-03-28 21:30:48
 */

class Aplicacion {
	public $contenedor;

	public function __construct(Contenedor $contenedor) {
		$this->contenedor = $contenedor;
	}

	public function run() {
		$this->reanudarSession();

		$requestURL = (isset($_GET['_url'])) ? $_GET['_url'] : '/';
		$ruta = $this->contenedor->router->resolverUrl($requestURL, strtolower($_SERVER['REQUEST_METHOD']));
		
		$accion = preg_split('/::/', $ruta->accion);
		
		$controlador = new $accion[0];

		if (!$this->validarPermisos($controlador)) {
			echo "Debes iniciar session";
			return;
		}

		$controlador->setContenedor($this->contenedor);
		
		if(is_array($ruta->parametros)) {
			unset($ruta->parametros[0]);
			$controlador->$accion[1](...$ruta->parametros);
		}
		else $controlador->$accion[1]();
	}

	private function reanudarSession() {
		if (isset($_COOKIE[session_name()])) {
			session_start();
		}
	}

	private function validarPermisos($controlador) {
		$nivel = $controlador->getNivelAccesos();

		switch ($nivel) {
			case ControladorBase::TODOS:
				return TRUE;
				break;
			case ControladorBase::SOLO_ANONIMOS:
				if(isset($_SESSION['usuario'])) return FALSE;
				return TRUE;
				break;
			case ControladorBase::SOLO_USUARIOS:
				if(isset($_SESSION['usuario'])) return TRUE;
				return FALSE;
				break;
		}
	}
}
