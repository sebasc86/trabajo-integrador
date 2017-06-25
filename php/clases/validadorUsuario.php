<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorUsuario extends Validador {
		public function validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$errores = [];
	        if (empty(trim($datos["name"])))
	        {
	            $errores["name"] = "Che amigo, no pusiste nada en el nombre";
	        }

	        if (empty(trim($datos["email"])))
	        {
	            $errores["email"] = "Por favor ingrese mail";
	        }
	        elseif (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
	            $errores["email"] = "Por favor ingrese un mail correcto";   
	        }
	        elseif ($repoUsuarios->existeElMail($datos["email"]))
	        {
	            $errores["email"] = "El email ya esta registrado";      
	        }

	        if ($datos["paises"] == "")
	        {
	            $errores["paises"] = "Ingrese un pais";      
	        }
	        if ($_FILES["avatar"]["error"] != UPLOAD_ERR_OK) {
	            $errores["avatar"] = "Hubo un error al subir la imagen, intentelo de nuevo más tarde";
	        }

	        return $errores;
		}
	}