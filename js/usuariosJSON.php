<?php
// Agregar el controlador!!
require_once '../php/classes/SQLDB.php';


// $repoUsuarios = $repo->getRepositorioUsuarios();

$usuarios = SQLDB::findAll();


header('Content-type:application/json');
print json_encode(['count'=>count($usuarios)]);

 ?>
