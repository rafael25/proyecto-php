<?php namespace App;
/**
 * @Author: Administrador
 * @Date:   2015-02-25 14:20:44
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-02-25 15:22:59
 */

use \Base\Micro\ControladorBase;
use \Base\Micro\Vista;

class ControladorIndex extends ControladorBase {

	/**
	 * @ruta '/'
	 * @return Vista
	 */
	public function index() {
		$recetas = $this->db->query("SELECT * FROM recetas");
		$vista = new Vista("index.html");
		$vista->recetas = $recetas;
		echo $vista;
	}
}
