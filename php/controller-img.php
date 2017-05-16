<?php


$errorImg = '';
function validarImagen() {
    if (isset($_FILES['imgPerfil'])){
    if ($_FILES['imgPerfil']['error'] == UPLOAD_ERR_OK) {
      $filename = $_FILES['imgPerfil']['tmp_name'];
      $ext = $_FILES["imgPerfil"]["name"];
      $ext = pathinfo($ext, PATHINFO_EXTENSION); //jpg
        if ($ext != "png" && $ext != "jpg") {
          $GLOBALS['errorImg'] = "No acepto la extensión";
        } else {
          $nombre = $_POST['correo'] . ".". $ext;
          echo "$nombre";
          echo "<br>";
          $destination =  __DIR__ . "..\..\imagenperfil/" . $nombre;
          echo "$destination";
          echo "<br>";
          move_uploaded_file($filename, $destination);
          return true;
        };
    }else {
      $GLOBALS['errorImg'] = 'No se subio imagen correctamente';
      return false;
    };
  };
};
