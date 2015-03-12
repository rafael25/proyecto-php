<?php namespace App;
/**
 * @Author: rafael
 * @Date:   2015-03-11 17:45:23
 * @Last Modified by:   rafael25
 * @Last Modified time: 2015-03-12 02:33:51
 */

use \Base\Micro\ControladorBase;
use \Base\Micro\Vista;

class ControladorUsuarios extends ControladorBase {

	/**
	 * Muestra el formulario de inicio de sesión
	 * @ruta '/login'
	 * @metodo 'get'
	 * @return Vista
	 */
	public function loginForm() {
		$vista = new Vista('login-form.html');
		$vista->docTitle = 'Iniciar sesión';
		echo $vista;
	}

	/**
	 * @ruta '/login'
	 * @metodo 'post'
	 * @return Redirect
	 */
	public function login() {
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$usuario = $this->db->query("SELECT * FROM usuarios WHERE email = '$email'");
		$usuario = $usuario->fetch();

		if(password_verify($pass, $usuario['password'])) {
			session_start();
			$_SESSION['usuario'] = $usuario;
		}
	}

	/**
	 * Muestra el formulario de registro de usuario
	 * @ruta '/signin'
	 * @metodo 'get'
	 * @return Vista
	 */
	public function signInForm() {
		$vista = new Vista('signin-form.html');
		$vista->docTitle = 'Registro de nuevo usuario';
		echo $vista;
	}

	/**
	 * @ruta '/signin'
	 * @metodo 'post'
	 * @return Redirect
	 */
	public function signIn() {
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$this->db->query("INSERT INTO usuarios (nombre, apellidos, email, password) VALUES ('$nombre', '$apellidos', '$email', '$pass')");
	}

	/**
	 * Termina la sesión de usuario
	 * @ruta '/logout'
	 * @metodo 'get'
	 * @return Redirect
	 */
	public function logout() {
		var_dump($_SESSION);
		// TODO: Implementar cierre de sesión
	}
}
