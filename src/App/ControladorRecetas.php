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
		$vista->docTitle = 'Lista de Recetas';
		echo $vista;
	}

	/**
	 * @ruta '/recetas/id'
	 * @metodo 'get'
	 * @param  int id
	 * @return Vista
	 */
	public function buscarId($id) {
		$receta = $this->db->query("SELECT * FROM recetas WHERE id=$id");
		$receta = $receta->fetch();
		$recetaId = $receta['id'];
		$comentarios = $this->db->query("SELECT * FROM comentarios WHERE receta_id = $recetaId");
		$vista = new Vista("receta.html");
		$vista->receta = $receta;
		$vista->comentarios = $comentarios;
		$vista->docTitle = 'Receta: ' . $receta['nombre'];
		echo $vista;
	}
}
