<?php

require_once 'Validador.php';
require_once 'SQLDB.php';

class ValidadorProfile extends Validador {

	public static $errors = [];


	public function validar($usuario) {

		if(isset($usuario)){


						if(isset($usuario->password)){
							$userDB = $usuario->find($usuario->email);

							if($usuario->password == NULL || $_POST['password2'] == NULL || $_POST['passwordOld'] == NULL ){
									self::$errors['pass'] = "Falta un completar campo";
							} elseif ($usuario->password !=  $_POST['password2']) {
									self::$errors['pass'] = 'Las contraseñas no coinciden';
							} elseif(strlen($usuario->password) < 6){
									self::$errors['pass'] = "es menor a 6 caracteres";
							} elseif (!preg_match("/[a-z]/", $usuario->password)){
									self::$errors['pass'] = "La clave debe tener al menos una Minuscula";
							} elseif(!preg_match("/[A-Z]/", $usuario->password)) {
									self::$errors['pass'] = "La clave debe tener al menos una Mayuscula";
							} elseif (!preg_match("/[0-9]/", $usuario->password)) {
									self::$errors['pass'] = "La clave debe tener al menos un Número";
							} elseif(!isset(self::$errors['pass'])){
									$passOk = password_verify($_POST['passwordOld'], $userDB->password);
									if($passOk == true){
										$passHash = password_hash($usuario->password, PASSWORD_DEFAULT);
										$usuario->setPassword($passHash);
									}else {
										self::$errors['pass'] = 'la contraseña es incorrecta';
									}
							}
		}
	}

	// validar accion;

	// if (isset($_POST['submit'])){
	// 	if(!isset($usuario->accion)){
	// 			self::$errors['accion'] = 'Tiene que elegir una opción';
	// 		 }elseif(count($usuario->accion) != 2){
	// 			 if(isset($usuario->accion['conductor'])){
	// 					$usuario->setAccion($usuario->accion = [
	// 						'conductor' => 'conductor',
	// 						'acompanante' => '',
	// 				]);
	//
	// 		 }else {
	// 			 $usuario->setAccion($usuario->accion = [
	// 				 'conductor' => '',
	// 				 'acompanante' => 'acompanante',
	// 			 ]);
	// 		 }
	// 	 }
	// };


		return self::$errors;

	}



}
