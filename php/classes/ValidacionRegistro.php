<?php

require_once 'Validador.php';
require_once 'SQLDB.php';

class ValidadorRegistro extends Validador {
	public static $errors = [];

	public function validar($usuario) {


	    //validar nombre
			  if(isset($usuario->nombre)){
						$nombre = $usuario->nombre;
						$nombre = trim($nombre);
			       if($nombre == NULL){
			        self::$errors['nombre'] = 'Falta completar campo';
			      }else if(strlen($nombre) > 20) {
			        self::$errors['nombre'] = "Es mayor a 20 caracteres";
			      }else if(strlen($nombre) <= 3) {
			        self::$errors['nombre'] = "Es Menor a 4 Caracteres";
			      }else if(!preg_match("/^[a-zA-ZñÑáÁéÉíÍÓóúÚÜÀ-Ö-ö-ÿ\s]+$/", $nombre)){
			        self::$errors['nombre'] = "No es un nombre valido";
			      } else if ($nombre != ''){
							$usuario->setNombre($nombre);
						}

			    }

					//validar apellido

					  if(isset($usuario->apellido)){
					    $apellido = $usuario->apellido;
					    $apellido = trim($apellido);

					      if($apellido == null){
					        self::$errors['apellido'] = 'Falta completar campo';
					      }else if(strlen($apellido) > 20) {
					        self::$errors['apellido'] = "Es mayor a 20 caracteres";
					      }else if(strlen($apellido) <= 3) {
					        self::$errors['apellido'] = "Es Menor a 4 Caracteres";
					      }else if(!preg_match("/^[a-zA-ZñÑáÁéÉíÍÓóúÚÜÀ-Ö-ö-ÿ\s]+$/", $apellido)){
					        self::$errors['apellido'] = "No es un nombre valido";
					      }else {
									$usuario->setApellido($apellido);
								}

					    };



	    //validar email

			  if(isset($usuario)){
							if(isset($usuario->email) && $usuario->email == NULL){
								self::$errors['email'] = "Falta completar campo";
							}elseif($usuario->email != NULL){
										$email = trim($usuario->email);
										$input = filter_var($email, FILTER_VALIDATE_EMAIL);
										$usuario->setEmail($input);
										$userDB = $usuario->find($input);
										if ($userDB != NULL) {
											self::$errors['email'] = 'El email registrado ya esta en uso';
										}else if ($input === false) {
			                self::$errors['email'] = "El email ingresado no es válido";
		              	}
						}
				};





		// validar PASSWORD

		  if(isset($usuario->password) && isset($_POST['password2'])){
		    if($usuario->password == NULL || $_POST['password2'] == NULL){
		        self::$errors['pass'] = "Falta completar campo";
		    } elseif ($usuario->password != $_POST['password2']) {
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
		      	$passOk = password_hash($usuario->password, PASSWORD_DEFAULT);
						$usuario->setPassword($passOk);
		    }
		  // }elseif(isset($_SESSION['email'])){
			// 	if($usuario->password == NULL || $usuario->password2 == NULL || $usuario->nuevaPassword == NULL){
		  //       self::$errors['pass'] = "Falta completar campo";
		  //   } elseif ($usuario->password != $usuario->password2) {
		  //       self::$errors['pass'] = 'Las contraseñas no coinciden';
		  //   } elseif(strlen($usuario->password) < 6){
		  //       self::$errors['pass'] = "es menor a 6 caracteres";
		  //   } elseif (!preg_match("/[a-z]/", $usuario->password)){
		  //       self::$errors['pass'] = "La clave debe tener al menos una Minuscula";
		  //   } elseif(!preg_match("/[A-Z]/", $usuario->password)) {
		  //       self::$errors['pass'] = "La clave debe tener al menos una Mayuscula";
		  //   } elseif (!preg_match("/[0-9]/", $usuario->password)) {
		  //       self::$errors['pass'] = "La clave debe tener al menos un Número";
		  //   } elseif(!isset(self::$errors['pass'])){
		  //     	$passOk = password_hash($usuario->password, PASSWORD_DEFAULT);
			// 			$usuario->setPassword($passOk);
		  //   }
			}

		//validad Edad


		  if(isset($usuario->edad)){
		    $edad = $usuario->edad;
		    $edad = trim($edad);
		    if($usuario->edad == null) {
		          self::$errors['edad'] = "Falta completar campo";
		    } else if(!is_numeric($edad)) {
		          self::$errors['edad']= "Tiene que ser númerico unicamente";
		    } elseif(strlen($edad) > 2) {
		          self::$errors['edad'] = "es mayor a 2 caracteres";
		    } elseif($edad > 70){
					 self::$errors['edad'] = "Usted es mayor de edad no puede usar esta aplicacion";
				} elseif($edad < 18){
					self::$errors['edad'] = "Usted es menor de edad";
				} else {
					$usuario->setEdad($edad);
				}
		  };

		  //validar sexo
			if (isset($_POST['submit'])){
					if(!isset($usuario->sexo)){
				     self::$errors['sexo'] = 'Tiene que elegir una opción';
				   } elseif(isset($usuario->sexo[0]) && isset($usuario->sexo[1])){
				     self::$errors['sexo'] = 'No puede elegir las dos opciones';
				   }
			}
			// validar accion;
			if (isset($_POST['submit'])){
				if(!isset($usuario->accion)){
				    self::$errors['accion'] = 'Tiene que elegir una opción';
					 }elseif(count($usuario->accion) != 2){
						 if(isset($usuario->accion['conductor'])){
							 	$usuario->setAccion($usuario->accion = [
									'conductor' => 'conductor',
									'acompanante' => '',
							]);

					 }else {
						 $usuario->setAccion($usuario->accion = [
							 'conductor' => '',
							 'acompanante' => 'acompanante',
						 ]);
					 }
				 }
			};


			// validar terminos y condiciones;
			if (isset($_POST['submit'])){
				if(!isset($usuario->terminos)){
			      self::$errors['terminos'] = 'Tiene que aceptar terminos y condiciones';
			    }
			}
			// validar imagen

			if (isset($usuario->imagen['imgPerfil']) && self::$errors == NULL){
	    if ($usuario->imagen['imgPerfil']['error'] == UPLOAD_ERR_OK) {
	      $filename = $usuario->imagen['imgPerfil']['tmp_name'];
	      $ext = $usuario->imagen["imgPerfil"]["name"];
	      $ext = pathinfo($ext, PATHINFO_EXTENSION); //jpg
				$nombre = $usuario->email . ".". $ext;
				$destination =  __DIR__ . "..\..\..\imagenperfil/" . $nombre;
	        if ($ext != "png" && $ext != "jpg") {
	          self::$errors['imagen'] = "La extensión es incorrecta";
	        } else {
	          move_uploaded_file($filename, $destination);
						$usuario->setImagen($nombre);
	        };

	    };

	  };

//////////////////////////// validar cambio de datos profile


 		return self::$errors;

	}
};
