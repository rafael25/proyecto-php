<?php namespace App;

use \Base\Micro\ControladorBase;
use \Base\Micro\Vista;

class ControladorRecetas extends ControladorBase {
	/**
	 * @ruta '/'
	 * @ruta '/recetas'
	 * @metodo 'get'
	 * @return Vista
	 */
	public function index() {
		$recetas = $this->db->query("SELECT * FROM recetas");
		$vista = new Vista("index.html");
		$vista->recetas = $recetas;
		echo $vista;
	}

	public function buscarId($id) {
		$receta = $this->db->query("SELECT * FROM recetas where id=$id");
		$vista = new Vista("receta.html");
		$vista->receta = $receta;
		echo $vista;
	}
}
