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
		$receta = $this->db->query("SELECT * FROM recetas WHERE id = $id");
		$receta = $receta->fetch();
		$recetaId = $receta['id'];
		$autorId = $receta['autor_id'];

		$autor = $this->db->query("SELECT * FROM usuarios WHERE id = $autorId");
		$receta['autor'] = $autor->fetch();

		$usuarios = $this->db->query("SELECT usuarios.id, usuarios.nombre, usuarios.apellidos, usuarios.imagen,  comentarios.comentario FROM usuarios JOIN comentarios ON comentarios.usuario_id = usuarios.id WHERE comentarios.receta_id = $recetaId");

		$vista = new Vista("receta.html");
		$vista->receta = $receta;
		$vista->comentarios = $usuarios;

		$vista->docTitle = 'Receta: ' . $receta['nombre'];
		echo $vista;
	}

	/**
	 * Muestra el formulario para capturar los datos de una receta
	 * @ruta '/recetas-nueva'
	 * @metodo 'get'
	 * @return Vista
	 */
	public function ingresar() {
		$vista = new Vista("formulario-receta.html");
		$vista->docTitle = 'Nueva receta';
		echo $vista;
	}

	/**
	 * @ruta '/recetas'
	 * @metodo 'post'
	 * @return Vista
	 */
	public function guardar() {

		$nombre = $_POST["nombre"];
		$ingredientes = $_POST["ingredientes"];
		$preparacion = $_POST["preparacion"];
		$tiempo = $_POST["tiempo_prep"];
		$rendimiento = $_POST["rendimiento"];
		$imagen = $_POST["imagen"];
		$autor = $_SESSION["usuario"]["id"];

		$receta = $this->db->query("INSERT INTO recetas (nombre, ingredientes, preparacion, tiempo_prep, rendimiento, autor_id) VALUES ('$nombre', '$ingredientes', '$preparacion', $tiempo, '$rendimiento', $autor)");

		$this->router->redireccionA('/recetas/'.$this->db->lastInsertId());
	}

	/**
	 * Muestra el formulario con los datos de una receta para editarlos
	 * @ruta '/recetas/id/editar'
	 * @metodo 'get'
	 * @param  int $id
	 * @return Vista
	 */
	public function editForm($id) {
		$receta = $this->db->query("SELECT * FROM recetas WHERE id = $id");
		$receta = $receta->fetch(\PDO::FETCH_ASSOC);
		$vista = new Vista('receta-editar.html');
		$vista->docTitle = 'Editar receta '.$receta['nombre'];
		$vista->receta = $receta;
		echo $vista;
	}

	/**
	 * @ruta '/recetas/id/editar'
	 * @metodo 'post'
	 * @param  int $id
	 * @return Redirect /recetas/id
	 */
	public function editar($id) {
		$receta = $this->db->query("SELECT * FROM recetas WHERE id = $id");
		$receta = $receta->fetch(\PDO::FETCH_ASSOC);
		
		if ($receta['autor_id'] == $_SESSION['usuario']['id']) {
			$nombre = $_POST["nombre"];
			$ingredientes = $_POST["ingredientes"];
			$preparacion = $_POST["preparacion"];
			$tiempo = $_POST["tiempo_prep"];
			$rendimiento = $_POST["rendimiento"];
			$imagen = $_POST["imagen"];
			
			$this->db->query("UPDATE recetas SET nombre = '$nombre', ingredientes = '$ingredientes', preparacion = '$preparacion', tiempo_prep = $tiempo, rendimiento = '$rendimiento' WHERE id = $id");
		}

		$this->router->redireccionA('/recetas/'.$id);
	}

	/**
	 * Elimina la receta, con el id proporcionado, de la base de datos
	 * @ruta '/recetas/id/borrar'
	 * @metodo 'post'
	 * @param  int $id
	 * @return Redirect '/recetas'
	 */
	public function borrar($id) {
		$receta = $this->db->query("SELECT * FROM recetas WHERE id = $id");
		$receta = $receta->fetch(\PDO::FETCH_ASSOC);
		
		if ($receta['autor_id'] == $_SESSION['usuario']['id']) {
			$this->db->query("DELETE FROM recetas WHERE id = $id");
		}

		$this->router->redireccionA('/recetas');
	}
}
