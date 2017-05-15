<?php


function variable($tiponame) {
  if(isset($_POST["$tiponame"])){
  echo $_POST["$tiponame"];
};
};

 // validacion nombre

$nombreError = '';
function validarNombre() {
  if(isset($_POST["nombre"])){
    $nombre = $_POST["nombre"];
    $nombre = trim($nombre);
       if($nombre == null){
        $GLOBALS['nombreError'] = 'Falta completar campo';
        return false;
      }else if(strlen($nombre) > 20) {
        $GLOBALS['nombreError'] = "Es mayor a 20 caracteres";
        return false;
      }else if(strlen($nombre) <= 3) {
        $GLOBALS['nombreError'] = "Es Menor a 4 Caracteres";
        return false;
      }else if(!preg_match("/^[a-zA-ZñÑáÁéÉíÍÓóúÚÜÀ-Ö-ö-ÿ\s]+$/", $nombre)){
        $GLOBALS['nombreError'] = "No es un nombre valido";
        return false;
      }else {
        return true;
      }

    };
};


//apellido
$apellidoError = '';
function validarApellido() {
  if(isset($_POST["apellido"])){
    $nombre = $_POST["apellido"];
    $nombre = trim($nombre);
      if($nombre == null){
        $GLOBALS['apellidoError'] = 'Falta completar campo';
        return false;
      }else if(strlen($nombre) > 20) {
        $GLOBALS['apellidoError'] = "Es mayor a 20 caracteres";
        return false;
      }else if(strlen($nombre) <= 3) {
        $GLOBALS['apellidoError'] = "Es Menor a 4 Caracteres";
        return false;
      }else if(!preg_match("/^[a-zA-ZñÑáÁéÉíÍÓóúÚÜÀ-Ö-ö-ÿ\s]+$/", $nombre)){
        $GLOBALS['apellidoError'] = "No es un nombre valido";
        return false;
      }else {
        return true;
      }

    };
};


//email
$emailError = '';
function emailValidate() {
  if(isset($_POST["correo"])) {
    $email = trim($_POST['correo']);
    $input = filter_var($email, FILTER_VALIDATE_EMAIL);
    if($_POST['correo'] == null){
      $GLOBALS['emailError'] = "Falta completar campo";
      return false;
    }else if ($input === false) {
      $GLOBALS['emailError'] = "El email ingresado no es válido";
      return false;
    } else {
      return true;
    }
  };
};

//contraseña

//validar pass
$passError = '';
$hashPass = '';
function validarPass(){
  if(isset($_POST['password']) && isset($_POST["password2"])){
    $pass = $_POST["password"];
    $pass2 = $_POST["password2"];
    if($pass == 0 && $pass2 == 0){
        $GLOBALS['passError'] = "Falta completar campo";
        return false;
    } elseif ($pass != $pass2) {
        $GLOBALS['passError'] = 'Las contraseñas no coinciden';
        return false;
    } elseif(strlen($pass) < 6){
        $GLOBALS['passError'] = "es menor a 6 caracteres";
        return false;
    } elseif (!preg_match("/[a-z]/", $pass)){
        $GLOBALS['passError'] = "La clave debe tener al menos una Minuscula";
        return false;
    } elseif(!preg_match("/[A-Z]/", $pass)) {
        $GLOBALS['passError'] = "La clave debe tener al menos una Mayuscula";
        return false;
    } elseif (!preg_match("/[0-9]/", $pass)) {
        $GLOBALS['passError'] = "La clave debe tener al menos un Número";
        return false;
    } else {
      $GLOBALS['hashPass'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
      return true;
    };
  };
};

$edadError = '';
function validarEdad(){
  if(isset($_POST['edad'])){
    $edad = $_POST["edad"];
    $edad = trim($edad);
    if($_POST['edad'] == null) {
          $GLOBALS['edadError'] = "Falta completar campo";
          return false;
    } else if(!is_numeric($_POST['edad'])) {
          $GLOBALS['edadError'] = "Tiene que ser númerico unicamente";
          return false;
    } elseif(strlen($edad) > 2) {
          $GLOBALS['edadError'] = "es mayor a 2 caracteres";
          return false;
    } else {
      return true;
    }
  };
};

$sexoError = '';
function validarSexo(){
   if(isset($_POST['submit']) && !isset($_POST['sexo1'])) {
     $GLOBALS['sexoError'] = 'Tiene que elegir una opción';
     return false;
   } elseif(isset($_POST['sexo1'][0]) && isset($_POST['sexo1'][1])) {
     $GLOBALS['sexoError'] = 'No puede elegir las dos opciones';
     return false;
   } else {
     return true;
   }
};


$accionError = '';
function validarAccion(){
   if(isset($_POST['submit']) && !isset($_POST['accion'])) {
     $GLOBALS['accionError'] = 'Tiene que elegir una opción';
     return false;
   }  else {
     return true;
   }
};

$terminosError = '';
function validarTerminos(){
   if(isset($_POST['submit']) && !isset($_POST['terminos'])) {
     $GLOBALS['terminosError'] = 'Tiene que aceptar terminos y condiciones';
     return false;
   }  else {
     return true;
   }
};

$miArray = [];
if (validarPass() == true && validarNombre() == true && emailValidate() == true && validarPass() == true && validarSexo() == true && validarAccion() == true && validarTerminos()){
  $miArray = [
    'nombre' => $_POST['nombre'],
    'apellido' => $_POST['apellido'],
    'correo' => $_POST['correo'],
    'password' => $hashPass,
    'edad' => $_POST['edad'],
    'sexo' => $_POST['sexo1'],
    'accion' => $_POST['accion'],
  ];
  $json = json_encode($miArray);
  file_put_contents('json/datos.json', $json . PHP_EOL, FILE_APPEND | LOCK_EX);
};

function guardarImagen($upload, $path) {
    $erroresImg = [];
    if ($_FILES[$upload]['error'] == UPLOAD_ERR_OK) {
          $nombre = $_FILES[$upload]['name'];

          $archivo = $_FILES[$upload]['tmp_name'];

          $ext = pathinfo($nombre, PATHINFO_EXTENSION);
          if ($ext != "png" && $ext != "jpg") {
              $erroresImg[] = "No acepto la extensión";
          }
          else {
              move_uploaded_file($archivo, $path . '/' .$nombre);
              $_SESSION['usuario']['img'] = '../tpi/img/' . $nombre;
          }
    }
    else {
        $erroresImg[] = "No pudo subirse la foto";
    }
    return $erroresImg;
}


?>
