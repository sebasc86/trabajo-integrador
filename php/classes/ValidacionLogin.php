<?php

require_once 'Validador.php';
require_once 'SQLDB.php';

class ValidadorLogin extends Validador {
	private static $errors = [];


	public function validar($usuario) {


		if(isset($usuario)){
					if($usuario->email == NULL || $usuario->password == NULL ){
						self::$errors['email'] = "Falta completar campo";
					}elseif($usuario->email != NULL){
								$email = trim($usuario->email);
								$usuario->setEmail($email);
								$input = filter_var($email, FILTER_VALIDATE_EMAIL);
								$userDB = $usuario->find($input);
								if($userDB == true){
									$usuario->setNombre($userDB->nombre);
									$accion = [
										'conductor' => $userDB->conductor,
										'acompañante' => $userDB->acompañante
									];
									$usuario->setAccion($accion);
									$hashPass = password_verify($usuario->password, $userDB->password);
								}
								if ($input === false) {
									self::$errors['email'] = 	"El password o el email ingresado no es correcto";
								}else if ($userDB == false || $hashPass == false) {
									self::$errors['email'] = "El password o el email ingresado no es correcto";
								}
				}
		};

		return self::$errors;
	}
}
