<?php
session_start();

$registroError = '';
function validarRegistro() {
		$recurso = fopen("json/datos.json", 'r');

		if($recurso){
			while(($linea = fgets($recurso)) !== false ){
			    $usuarios = json_decode($linea, true);
			    if(isset($_POST['correo']) && (isset($_POST['pass']))) {
			      $hashPass2 = password_verify($_POST['pass'], $usuarios['password']);
			      if(in_array($_POST['correo'], $usuarios) && (in_array($hashPass2, $usuarios))){
							$_SESSION['nickname'] = $_POST['correo'];
			        header("Location: ../trabajo-integrador/HomeUser.php");
							return true;
			        exit;
			      } else {
			        $GLOBALS['registroError'] = 'El usuario y la contraseña no coinciden o no existen';
			      }
			    };
			};
		};
};


if(validarRegistro() == true){
	if(isset($_POST["recordar_user"])){
			setcookie("usuario", $_POST['correo'] ,time()+(60*60*24),'/');
	}
	else{
			setcookie("usuario", $_POST['correo'] ,time() - 3600,'/');
			unset($_COOKIE["usuario"]);
	};
};














 ?>
