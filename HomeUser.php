<?php
	include 'php/controller-registro-php.php';



		if (isset($_SESSION['nickname'])){
				$grabado ="Bienvenido".'  '.$nombreUsuario ."</strong><br/>";
		} else {
			header('Location: ../trabajo-integrador/registro.php');
		};

		if(isset($correo)){
		  $avatar = 'imagenperfil/'.$correo. '.' .'jpg';
		      if (file_exists($avatar)){
		          $avatar;
		      } else{
		          //echo 'la imagen no existe';
		      }
		  };

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home Usuario</title>
  </head>
  <body>
    <?php include 'header.php' ?>

		<div class="registro_bienvenida">
				<h1><?php echo $grabado ;?></h1>
		</div>

		<?php if (file_exists($avatar)): ?>
			<div class="img">
			<img src='<?php echo $avatar ?>' alt="Perfil" />
			</div>
		<?php endif; ?>



		<div class="contenedor_formulario">
    		<div class="wrap">
					<div class="">
						<p>Cambia tu contraseña</p>

					</div>
    			<form action="" class="formulario" name="formulario-registro" method="post">
    				<div>
    					<div class="input_group">
    						<input class="inputs" type="password" id="nombre" name="password2">
    						<label class="label" for="nombre">Tu contraseña:</label>
								<?php if (isset($_POST['password2'])): ?>
									<?php if (validarCambioPass() == true): ?>
										<span id='register_password_errorloc' class=''>
										<?php  echo 'Su contraseña fue cambiada con exito' ;?>
										</span>
									<?php endif; ?>
								<?php endif; ?>
								<?php if (isset($_POST['password2'])): ?>
									<?php if (validarCambioPass() == false && $passwordError3 != null): ?>
										<span id='register_password_errorloc' class='error'>
										<?php  echo $passwordError3 ;?>
										</span>
									<?php endif; ?>
								<?php endif; ?>
    					</div>

              <div class="input_group">
                <input class="inputs" type="password" id="apellido" name="nuevaPassword">
                <label class="label" for="apellido">Nueva Contraseña:</label>
								<?php if (isset($_POST['password2'])): ?>
									<?php if (validarCambioPass() == false & $passwordError3 == null): ?>
										<span id='register_password_errorloc' class='error'>
										<?php  echo $passwordError2 ;?>
										</span>
									<?php endif; ?>
								<?php endif; ?>
              </div>




							<!--<div class="input_group checkbox">
								<input type="checkbox" name="accion2[]" id="conductor" value="conductor">
								<label for="conductor">Conductor</label>
								<input type="checkbox" name="accion2[]" id="acompañante" value="acompañante">
								<label for="acompañante">Acompañante</label>
							</div>-->

							<input type="submit" id="btn_submit" value="Enviar" name='submit'>
						</div>
					</form>
			</div>
		</div>







    <?php include 'footer.html' ?>
  </body>
</html>
