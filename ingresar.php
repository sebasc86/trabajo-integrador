
<?php
include 'php/controller-login.php';
if(isset($_SESSION['login'])){
  header('Location: ../trabajo-integrador/profile.php');
};



 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>autopool - Comparte tu viaje</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/paleta.css" id="paleta">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://use.fontawesome.com/d83e440824.js"></script>
    <link rel="icon"
      type="img/ico"
      href="img/favicon_autopool_16x16.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>

    <?php include 'header.php' ;?>

    <div class="registro_bienvenida">
      <h2>Ingresá a tu cuenta</h2>
    </div>

    <div class="contenedor_ingresar">
    		<div class="wrap">
    			<form action="" class="ingresar" name="formulario_ingreso" method="post">
    				<div>

    					<div class="input_group_ingresar ingresar_email">
                <?php if (isset($_COOKIE["nombreUsuario"])): ?>
                  <input type="email" id="email" name="email" value="<?php echo $_COOKIE["nombreUsuario"] ?>">

      						<label class="label" for="correo">Correo:</label>
                  <?php else: ?>
                    <input type="email" id="correo" name="correo">
                    <label class="label" for="correo">Correo:</label>
                    <span class="haserror" id="error_email"></span>
                <?php endif; ?>
    					</div>
    					<div class="input_group_ingresar ingresar_password">
    						<input type="password" id="pass" name="password">
    						<label class="label" for="pass">Contraseña:</label>
                            <span class="haserror" id="error_password"></span>
                <?php if (isset($_POST['password'])): ?>
                  <?php if ($validador != NULL): ?>
                    <span id='register_name_errorloc' class='error'><?php echo $validador['email'] ;?>
                    </span>
                  <?php endif; ?>
                <?php endif; ?>
    					</div>
              <div class="input_group_ingresar checkbox">

                <?php if (isset($_COOKIE["nombreUsuario"])): ?>
                  <input type="checkbox" name="recordar_user" id="recordar_user" value="" checked="">
                  <label for="recordar_user">Recordarme</label>
                  <?php else: ?>
                    <input type="checkbox" name="recordar_user" id="recordar_user" value="">
                    <label for="recordar_user">Recordarme</label>
                <?php endif; ?>
    					</div>

    					<input type="submit" id="btn_submit_login" value="Enviar">
    				</div>
    			</form>
          <br>
          <a href="#" class="recuperar">Recuperar contraseña</a>
    		</div>
    	</div>

      <?php include 'footer.html' ;?>
    <script type="text/javascript" src="js/scripts.js"></script>
  </body>
</html>
