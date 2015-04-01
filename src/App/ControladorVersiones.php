<?php namespace App;
/**
 * @Author: Rafael Viveros
 * @Date:   2015-03-28 21:10:14
 * @Last Modified by:   Rafael Viveros
 * @Last Modified time: 2015-03-28 21:27:55
 */

use \Base\Micro\ControladorBase;
use \Base\Micro\Vista;

class ControladorVersiones extends ControladorBase {
	
	public function index($id) {
		var_dump($id);
	}

	public function buscarId($idReceta, $idVersion) {
		var_dump($idReceta);
		var_dump($idVersion);
	}
}
