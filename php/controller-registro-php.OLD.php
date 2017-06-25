<?php
include 'controller-login.php';
include 'controller-img.php';


// function variable($tiponame) {
//   if(isset($_POST["$tiponame"])){
//   echo $_POST["$tiponame"];
// };
// };

 // validacion nombre

// $nombreError = '';
// function validarNombre() {
//   if(isset($_POST["nombre"])){
//     $nombre = $_POST["nombre"];
//     $nombre = trim($nombre);
//        if($nombre == null){
//         $GLOBALS['nombreError'] = 'Falta completar campo';
//         return false;
//       }else if(strlen($nombre) > 20) {
//         $GLOBALS['nombreError'] = "Es mayor a 20 caracteres";
//         return false;
//       }else if(strlen($nombre) <= 3) {
//         $GLOBALS['nombreError'] = "Es Menor a 4 Caracteres";
//         return false;
//       }else if(!preg_match("/^[a-zA-ZñÑáÁéÉíÍÓóúÚÜÀ-Ö-ö-ÿ\s]+$/", $nombre)){
//         $GLOBALS['nombreError'] = "No es un nombre valido";
//         return false;
//       }else {
//         return true;
//       }
//
//     };
// };


// //apellido
// $apellidoError = '';
// function validarApellido() {
//   if(isset($_POST["apellido"])){
//     $nombre = $_POST["apellido"];
//     $nombre = trim($nombre);
//       if($nombre == null){
//         $GLOBALS['apellidoError'] = 'Falta completar campo';
//         return false;
//       }else if(strlen($nombre) > 20) {
//         $GLOBALS['apellidoError'] = "Es mayor a 20 caracteres";
//         return false;
//       }else if(strlen($nombre) <= 3) {
//         $GLOBALS['apellidoError'] = "Es Menor a 4 Caracteres";
//         return false;
//       }else if(!preg_match("/^[a-zA-ZñÑáÁéÉíÍÓóúÚÜÀ-Ö-ö-ÿ\s]+$/", $nombre)){
//         $GLOBALS['apellidoError'] = "No es un nombre valido";
//         return false;
//       }else {
//         return true;
//       }
//
//     };
// };



// $emailError = '';
// function emailValidate() {
//   if(isset($_POST["correo"])) {
//     $email = trim($_POST['correo']);
//     $input = filter_var($email, FILTER_VALIDATE_EMAIL);
//     if($_POST['correo'] == null){
//       $GLOBALS['emailError'] = "Falta completar campo";
//       return false;
//     }else if ($input === false) {
//       $GLOBALS['emailError'] = "El email ingresado no es válido";
//       return false;
//     } else {
//       return true;
//     }
//   };
// };


// $errorEmail = '';
// function emailValidate5(){
//   if(isset($_POST['correo'])){
//         $email = trim($_POST['correo']);
//         $input = filter_var($email, FILTER_VALIDATE_EMAIL);
// 		    $recurso = fopen("json\datos.json", 'r');
//         if($recurso){
//           while(($linea = fgets($recurso)) !== false){
//           $usuarios = json_decode($linea, true);
//               if(in_array($_POST['correo'], $usuarios)){
//                  $GLOBALS['emailError'] = 'El email registrado ya esta en uso';
//                  return false;
//               }elseif($_POST['correo'] == null){
//                 $GLOBALS['emailError'] = "Falta completar campo";
//                 return false;
//               }else if ($input === false) {
//                 $GLOBALS['emailError'] = "El email ingresado no es válido";
//                 return false;
//               }else {
//                 return true;
//               };
//           };
//         };
//       };
//   };








//contraseña

//validar pass
// $passError = '';
// $hashPass = '';
// function validarPass(){
//   if(isset($_POST['password']) && isset($_POST["password2"])){
//     $pass = $_POST["password"];
//     $pass2 = $_POST["password2"];
//     if($pass == 0 || $pass2 == 0){
//         $GLOBALS['passError'] = "Falta completar campo";
//         return false;
//     } elseif ($pass != $pass2) {
//         $GLOBALS['passError'] = 'Las contraseñas no coinciden';
//         return false;
//     } elseif(strlen($pass) < 6){
//         $GLOBALS['passError'] = "es menor a 6 caracteres";
//         return false;
//     } elseif (!preg_match("/[a-z]/", $pass)){
//         $GLOBALS['passError'] = "La clave debe tener al menos una Minuscula";
//         return false;
//     } elseif(!preg_match("/[A-Z]/", $pass)) {
//         $GLOBALS['passError'] = "La clave debe tener al menos una Mayuscula";
//         return false;
//     } elseif (!preg_match("/[0-9]/", $pass)) {
//         $GLOBALS['passError'] = "La clave debe tener al menos un Número";
//         return false;
//     } else {
//       $GLOBALS['hashPass'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
//       return true;
//     };
//   };
// };

// $edadError = '';
// function validarEdad(){
//   if(isset($_POST['edad'])){
//     $edad = $_POST["edad"];
//     $edad = trim($edad);
//     if($_POST['edad'] == null) {
//           $GLOBALS['edadError'] = "Falta completar campo";
//           return false;
//     } else if(!is_numeric($_POST['edad'])) {
//           $GLOBALS['edadError'] = "Tiene que ser númerico unicamente";
//           return false;
//     } elseif(strlen($edad) > 2) {
//           $GLOBALS['edadError'] = "es mayor a 2 caracteres";
//           return false;
//     } else {
//       return true;
//     }
//   };
// };

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
if (validarPass() == true && validarNombre() == true && emailValidate5() == true && validarPass() == true && validarSexo() == true && validarAccion() == true && validarTerminos()){
    if(validarImagen() == true || $_FILES['imgPerfil']['name'] == null){
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
    header("Location: ../trabajo-integrador/HomeUser.php");
    $_SESSION['nickname'] = $_POST['correo'];
    $_SESSION['nombre'] = $_POST['nombre'];
    file_put_contents('json/datos.json', $json . PHP_EOL, FILE_APPEND | LOCK_EX);
  };
};








$nickname = '';
$password = '';
if(isset($_SESSION['nickname'])) {
  $recurso = fopen("json/datos.json", 'r');
  if ($recurso) {
    while(($linea = fgets($recurso)) !== false ){
        $usuarios = json_decode($linea, true);
        if(in_array($_SESSION['nickname'], $usuarios)){
          $nombreUsuario = $usuarios['nombre'];
          $GLOBALS['password'] = $usuarios['password'];
          $correo = $usuarios['correo'];
        };
      };
    };
  };








  $passwordError2 = '';
  $passwordError3 = '';

  function validarCambioPass(){
    $nrosLineas = '';
    $passwordError2 = '';
    $passwordError3 = '';
    if(isset($_POST['nuevaPassword']) && isset($_POST["password2"])){
      $pass = $_POST["password2"];
      $pass2 = $_POST["nuevaPassword"];
      if($pass == null || $pass2 == null){
          $GLOBALS['passwordError2'] = "Falta completar al menos un campo";
          return false;
      } elseif(strlen($pass2) < 6){
          $GLOBALS['passwordError2'] = "es menor a 6 caracteres";
          return false;
      } elseif (!preg_match("/[a-z]/", $pass2)){
          $GLOBALS['passwordError2'] = "La clave debe tener al menos una Minuscula";
          return false;
      } elseif(!preg_match("/[A-Z]/", $pass2)) {
          $GLOBALS['passwordError2'] = "La clave debe tener al menos una Mayuscula";
          return false;
      } elseif (!preg_match("/[0-9]/", $pass2)) {
          $GLOBALS['passwordError2'] = "La clave debe tener al menos un Número";
          return false;
      }else {

              if(isset($_SESSION['nickname'])) {
                if(isset($_POST['password2']) && isset($_POST['nuevaPassword']) && (password_verify($_POST['password2'], $GLOBALS['password']))== true){
                $recurso = fopen("json/datos.json", 'a+');
                $archivo = file('json/datos.json');
                if ($recurso) {
                  while(($linea = fgets($recurso)) !== false ){
                      $usuarios = json_decode($linea, true);
                      $nrosLineas++;
                      if(in_array($_SESSION['nickname'], $usuarios)){
                        unset($archivo[$nrosLineas-1]);
                        file_put_contents('json/datos.json', join('', $archivo));
                        $hashPass3 = password_hash($_POST['nuevaPassword'], PASSWORD_DEFAULT);
                        $reemplazos = array('password' => "$hashPass3");
                        $usuarioModificado = array_replace($usuarios, $reemplazos);
                        $usuarioModificado =  json_encode($usuarioModificado);
                        fwrite($recurso, $usuarioModificado . PHP_EOL);
                        return true;
                      }
                    };
                  };
                }else {
                  $GLOBALS['passwordError3'] = 'Su contraseña no coincide';
                  return false;
                };
              };
            };

          };
        };


?>
