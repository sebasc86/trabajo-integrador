<?php
	include_once 'php/controller-profile.php';

		if (isset($_SESSION['nombre'])){
				$grabado ="Bienvenido".'  '.$_SESSION['nombre']."</strong><br/>";
		} else {
			header('Location: ../trabajo-integrador/registro.php');
		};

		if(isset($_SESSION['correo'])){
		  $avatar = 'imagenperfil/'.$_SESSION['correo']. '.' .'jpg';
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
    						<input class="inputs" type="password" id="nombre" name="passwordOld">

    						<label class="label" for="nombre">Tu contraseña:</label>

								 <?php if (isset($_POST['password'])): ?>
									<?php if (!isset($validador['pass'])): ?>
										<span id='register_password_errorloc' class='error'>
											 <?php echo 'Su contraseña fue cambiada con exito' ;?>
										</span>
									<?php endif; ?>
								<?php endif; ?>

								<?php if (isset($_POST['password'])): ?>
									<?php if (isset($validador['pass'])): ?>
										<span id='register_password_errorloc' class='error'>
										 <?php echo $validador['pass'] ;?>
										</span>
									 <?php endif; ?>
								<?php endif; ?>

    					</div>

              <div class="input_group">
                <input class="inputs" type="password" id="apellido" name="password">
                <label class="label" for="apellido">Nueva Contraseña:</label>

								<?php if (isset($_POST['password2'])): ?>
									<?php if (isset($validador['pass'])): ?>
										<span id='register_password_errorloc' class='error'>
										 <?php  echo $validador['pass'] ;?>
										</span>
									 <?php endif; ?>
								<?php endif; ?>

              </div>

							<div class="input_group">
                <input class="inputs" type="password" id="apellido" name="password2">
                <label class="label" for="apellido">Confirmar Contraseña:</label>

								 <?php if (isset($_POST['nuevapassword2'])): ?>
									<?php if (isset($validador['pass'])): ?>
										<span id='register_password_errorloc' class='error'>
										 <?php $validador['pass'] ;?>
										</span>
									 <?php endif; ?>
								<?php endif; ?>

              </div>




							<div class="input_group checkbox">
								<?php if ($_SESSION['accion']['conductor'] != NULL ): ?>
									<input type="checkbox" name="accion[conductor]" id="conductor" value="conductor" checked=''>
								<?php else: ?>
									<input type="checkbox" name="accion[conductor]" id="conductor" value="conductor">
								<?php endif; ?>
									<label for="conductor">Conductor</label>

								<?php if ($_SESSION['accion']['acompañante'] != NULL): ?>
									<input type="checkbox" name="accion[acompañante]" id="acompañante" value="acompañante" checked=''>
								<?php else: ?>
									<input type="checkbox" name="accion[acompañante]" id="acompañante" value="acompañante">
								<?php endif; ?>


								<label for="acompañante">Acompañante</label>
							</div>

							 <input type="submit" id="btn_submit" value="Enviar" name='submit'>
						</div>
					</form>
			</div>
		</div>







    <?php include 'footer.html' ?>
  </body>
</html>
