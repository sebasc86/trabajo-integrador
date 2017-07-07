<?php
// Agregar el controlador!!
require_once '';

$repoUsuarios = $repo->getRepositorioUsuarios();

$usuarios = $repoUsuarios->findAll();

header('Content-type:application/json');
print json_encode(['count'=>count($usuarios)]);

 ?>
