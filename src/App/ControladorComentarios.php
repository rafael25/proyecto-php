<?php namespace App;
/**
 * @Author: Harumi
 * @Date:   2015-03-10 18:49:51
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-03-10 19:28:35
 */

use \Base\Micro\ControladorBase;

class ControladorComentarios extends ControladorBase {

	/**
	 * @ruta '/comentarios'
	 * @metodo 'post'
	 * @return
	 */
	public function guardar()
	{
		$recetaId = $_POST["recetaId"];
		$comentario =$_POST["comentario"];
		$usuarioId = 1;

		$comentario = $this->db->query("INSERT INTO comentarios(receta_id, usuario_id, comentario) VALUES ($recetaId, $usuarioId, '$comentario')");

	}
}
