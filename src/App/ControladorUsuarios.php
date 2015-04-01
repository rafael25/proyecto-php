<?php namespace App;
/**
 * @Author: rafael
 * @Date:   2015-03-11 17:45:23
 * @Last Modified by:   Rafael Viveros
 * @Last Modified time: 2015-03-31 14:08:58
 */

use \Base\Micro\ControladorBase;
use \Base\Micro\Vista;

class ControladorUsuarios extends ControladorBase {

	protected $nivelAcceso = self::TODOS;

	/**
	 * Muestra el formulario de inicio de sesión
	 * @ruta '/login'
	 * @metodo 'get'
	 * @return Vista
	 */
	public function loginForm() {
		if ($this->sesionActiva()) {
			$this->router->redireccionA('/');
		}
		
		$vista = new Vista('login-form.html');
		$vista->docTitle = 'Iniciar sesión';
		echo $vista;
	}

	/**
	 * @ruta '/login'
	 * @metodo 'post'
	 * @return Redirect /
	 */
	public function login() {
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$usuario = $this->db->query("SELECT * FROM usuarios WHERE email = '$email'");
		$usuario = $usuario->fetch(\PDO::FETCH_ASSOC);

		if(password_verify($pass, $usuario['password'])) {
			session_start();
			unset($usuario['password']);
			$_SESSION['usuario'] = $usuario;

			$this->router->redireccionA('/');
		}
	}

	/**
	 * Muestra el formulario de registro de usuario
	 * @ruta '/signin'
	 * @metodo 'get'
	 * @return Vista | Redirect /
	 */
	public function signInForm() {
		if ($this->sesionActiva()) {
			$this->router->redireccionA('/');
		}

		$vista = new Vista('signin-form.html');
		$vista->docTitle = 'Registro de nuevo usuario';
		echo $vista;
	}

	/**
	 * @ruta '/signin'
	 * @metodo 'post'
	 * @return Redirect /login
	 */
	public function signIn() {
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$this->db->query("INSERT INTO usuarios (nombre, apellidos, email, password) VALUES ('$nombre', '$apellidos', '$email', '$pass')");

		$this->router->redireccionA('/login');
	}

	/**
	 * Termina la sesión de usuario
	 * @ruta '/logout'
	 * @metodo 'get'
	 * @return Redirect /login
	 */
	public function logout() {
		if ($this->sesionActiva()) {
			session_unset();
			$cookie = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000, $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly']);
			session_destroy();
		}

		$this->router->redireccionA('/login');
	}

	/**
	 * @return bool true si existe una sesión, false en caso contrario
	 */
	private function sesionActiva() {
		return isset($_SESSION['usuario']);
	}
}
