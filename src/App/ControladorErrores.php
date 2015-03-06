<?php namespace App;


use Base\Micro\ControladorBase;
use Base\Micro\Vista;

class ControladorErrores extends ControladorBase {

	/**
	 * Manejador del error 404 'not found'
	 */
	public function error404() {
		$vista = new Vista("error404.html");
		echo $vista;
	}
}
