
<?php
include 'php/controller-login.php';

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>autopool - Comparte tu viaje</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
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

    					<div class="input_group_ingresar">
    						<input type="email" id="correo" name="correo">
    						<label class="label" for="correo">Correo:</label>
    					</div>
    					<div class="input_group_ingresar">
    						<input type="password" id="pass" name="pass">
    						<label class="label" for="pass">Contraseña:</label>
                <?php if (isset($_POST['pass'])): ?>
                  <?php if (validarRegistro() == false): ?>
                    <span id='register_name_errorloc' class='error'><?php echo $registroError ;?>
                    </span>
                  <?php endif; ?>
                <?php endif; ?>
    					</div>
              <div class="input_group_ingresar checkbox">
    						<input type="checkbox" name="recordar_user" id="recordar_user" value="true">
    						<label for="recordar_user">Recordarme</label>
    					</div>

    					<input type="submit" id="btn_submit" value="Enviar">
    				</div>
    			</form>
          <br>
          <a href="#" class="recuperar">Recuperar contraseña</a>
    		</div>
    	</div>

      <?php include 'footer.html' ;?>

  </body>
</html>
