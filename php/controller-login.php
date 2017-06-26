<?php
session_start();
require_once 'classes/ValidacionLogin.php';
require_once 'classes/Usuario.php';
require_once 'classes/SQLDB.php';



$db = new SQLDB('localhost', 'autopool', 'root', '');
$usuario = new Usuario($db);
$usuario->toModel($_POST);
$validador = new ValidadorLogin();
$validador = $validador->validar($usuario);



if($validador == NULL){
  $_SESSION['login'] = true;
  $_SESSION['correo'] = $usuario->email;
  $_SESSION['nombre'] = $usuario->nombre;
  $_SESSION['accion'] = $usuario->accion;

	if(isset($_POST["recordar_user"])){
			setcookie("usuario", $_POST['correo'] ,time()+(60*60*24),'/');
	}
	else{
			setcookie("usuario", $_POST['correo'] ,time() - 3600,'/');
			unset($_COOKIE["usuario"]);
	};
};














 ?>
