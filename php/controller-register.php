<?php

require_once 'controller-login.php';
require_once 'classes/Usuario.php';
require_once 'classes/ValidacionRegistro.php';
require_once 'classes/ValidacionProfile.php';

// require_once("clases/validadorUsuario.php");
// require_once('classes/JSONDB.php');

// $include = $_SERVER['DOCUMENT_ROOT'].'/php/tm/oop/proyecto/';
//
//
//  $include = $_SERVER['DOCUMENT_ROOT'].'/php/tm/oop/proyecto/';


$db = new SQLDB('localhost', 'autopool', 'root', '');
$usuario = new Usuario($db);
$usuario->toModel($_POST);
$validador = new ValidadorRegistro();
$validador = $validador->validar($usuario);
$usuario->save($usuario);

 if(isset($usuario->save)){
  $_SESSION['login'] = true;
  $_SESSION['correo'] = $usuario->email;
  $_SESSION['nombre'] = $usuario->nombre;
 }





















// var_dump($datos);




// var_dump($validador->validar($datos, $usuario));
// $prueba = $validador->validar($datos, $tname);



// require_once("soporte.php");
// require_once("clases/validadorUsuario.php");
//
// $repoUsuarios = $repo->getRepositorioUsuarios();

// if ($auth->estaLogueado()) {
//     header("Location:inicio.php");exit;
// }
// $errores = [];
// $nombreDefault = "";
// $emailDefault = "";
//
// $paises = [
//     "arg" => "Argentina",
//     "per" => "Peru",
//     "col" => "Colombia",
//     "ven" => "Venezuela",
//     "ger" => "Alemania",
//     "fr" => "Francia",
//     "usa" => "Estados Unidos"
// ];
//
// if (!empty($_POST))
// {
//     $validador = new ValidadorUsuario();
//     //Se envió información
//     $errores = $validador->validar($_POST, $repo);
//
//     if (empty($errores))
//     {
//         //No hay Errores
//
//         //Primero: Lo registro
//         $usuario = new Usuario(
//             null,
//             $_POST["name"],
//             $_POST["email"],
//             $_POST["username"],
//             $_POST["password"],
//             $_POST["paises"]
//         );
//         $usuario->setPassword($_POST["password"]);
//         $usuario->guardar($repoUsuarios);
//         $usuario->setAvatar($_FILES["avatar"]);
//
//         //Segundo: Lo envio al exito
//         header("Location:exito2.php");exit;
//
//
//     }
//
//     if (!isset($errores["name"]))
//     {
//         $nombreDefault = $_POST["name"];
//     }
//     if (!isset($errores["email"]))
//     {
//         $emailDefault = $_POST["email"];
//     }
// }



 ?>
