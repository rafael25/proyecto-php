<?php namespace App;
/**
 * @Author: Harumi
 * @Date:   2015-03-10 18:49:51
 * @Last Modified by:   rafael
 * @Last Modified time: 2015-03-26 21:30:09
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
		$usuarioId = $_SESSION['usuario']['id'];

		$comentario = $this->db->query("INSERT INTO comentarios(receta_id, usuario_id, comentario) VALUES ($recetaId, $usuarioId, '$comentario')");

	}
}
