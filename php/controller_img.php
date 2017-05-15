<?php session_start(); ?>
<?php include 'controller-registro-php.php'; ?>
<?php
$path = dirname(__FILE__) . '/../img';
$erroresImg = guardarImagen('foto_usuario', $path);
header('Location: ../home.php');
 ?>
