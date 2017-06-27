<?php
require_once 'controller-login.php';
require_once 'classes/Usuario.php';
require_once 'classes/ValidacionRegistro.php';
require_once 'classes/ValidacionProfile.php';




$db = new SQLDB('localhost', 'autopool', 'root', '');
$usuario = new Usuario($db);
$usuario->toModel($_SESSION);
$usuario->toModel($_POST);
$validador = new ValidadorProfile();
$validador = $validador->validar($usuario);
$usuario->save($usuario);

















//
//















 ?>
