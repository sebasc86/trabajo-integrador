<?php
include ("php/controller-registro-php.php");


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

    <?php include 'header.html' ;?>

    <div class="registro_bienvenida">
      <h2>Registro de nuevo usuario</h2>
      <p class="registro_welcome_txt">¡Estás a solo un paso de ser parte de una Comunidad de héroes que luchan contra la congestión vial, los retrasos, la polución y los gastos redundantes!</p>
    </div>

    <div class="contenedor_formulario">
    		<div class="wrap">
    			<form action="" class="formulario" name="formulario-registro" method="post">
    				<div>
    					<div class="input_group">
    						<input class="inputs" type="text" id="nombre" name="nombre" value="<?php variable('nombre'); ?>">
    						<label class="label" for="nombre">Nombre:</label>
                  <?php if (isset($_POST['nombre'])): ?>
                    <?php if (validarNombre() == false): ?>
                      <span id='register_name_errorloc' class='error'><?php echo $nombreError ;?>
                      </span>
                    <?php endif; ?>
                  <?php endif; ?>
    					</div>

              <div class="input_group">
                <input class="inputs" type="text" id="apellido" name="apellido" value="<?php variable('apellido'); ?>">
                <label class="label" for="apellido">Apellido:</label>
                <?php if (isset($_POST['apellido'])): ?>
                  <?php if (validarApellido() == false): ?>
                    <span id='register_name_errorloc' class='error'><?php echo $apellidoError; ?>
                    </span>
                  <?php endif; ?>
                <?php endif; ?>
              </div>

    					<div class="input_group">
    						<input class="inputs" type="email" id="correo" name="correo" value="<?php variable('correo'); ?>">
    						<label class="label" for="correo">Correo:</label>
                  <?php if (isset($_POST['correo'])): ?>
                    <?php if (emailValidate() == false): ?>
                      <span id='register_email_errorloc' class='error'><?php echo $emailError ;?>
                      </span>
                    <?php endif; ?>
                  <?php endif; ?>
    					</div>
    					<div class="input_group">
    						<input class="inputs" type="password" id="pass" name="password">
    						<label class="label" for="password">Contraseña:</label>
                <?php if (isset($_POST['password'])): ?>
                  <?php if (validarPass() == false): ?>
                    <span id='register_password_errorloc' class='error'>
                    <?php  echo $passError ;?>
                    </span>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
    					<div class="input_group">
    						<input class="inputs" type="password" id="password2" name="password2">
    						<label class="label" for="password2">Repetir Contraseña:</label>
    					</div>

              <div class="input_group">
                <input class="inputs" type="text" id="edad" name="edad" value="<?php variable('edad'); ?>">
                <label class="label" for="edad">Edad:</label>

                <?php if (isset($_POST['edad'])): ?>
                  <?php if (validarEdad() == false): ?>
                    <span id='register_password_errorloc' class='error' >
                    <?php echo $edadError; ?>
                    </span>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
              <div class="input_group">
                  <label class="label">Foto</label>
                  <div class="cont_foto_usuario">
                      <input type="file" name="foto_usuario">
                  </div>
              </div>

                <?php if (!isset($_POST['submit'])):?>
                    <div class="input_group checkbox">
                      <input type="checkbox" name="sexo1[]" id="hombre" value="hombre">
                      <label for="hombre">Hombre</label>
                      <input type="checkbox" name="sexo1[]" id="mujer" value="mujer">
                      <label for="mujer">Mujer</label>
                    </div>
                <?php elseif (validarSexo() == false): ?>
                    <div class="input_group checkbox">
                      <input type="checkbox" name="sexo1[]" id="hombre" value="hombre">
                      <label for="hombre">Hombre</label>
                      <input type="checkbox" name="sexo1[]" id="mujer" value="mujer">
                      <label for="mujer">Mujer</label>
                      <span id='register_password_errorloc' class='error' ><?php echo $sexoError ?></span>
                    </div>
                <?php elseif (isset($_POST['sexo1'])): ?>
                  <div class="input_group checkbox">
                  <?php foreach ($_POST["sexo1"] as $value): ?>
                    <?php  if($value == "hombre") :?>
                        <input type="checkbox" name="sexo1[]" id="hombre" value="hombre" checked="">
                        <label for="hombre">Hombre</label>
                    <?php elseif ($value == "mujer") :?>
                        <input type="checkbox" name="sexo1[]" id="mujer" value="mujer" checked="">
                        <label for="mujer">Mujer</label>
                    <?php endif; ?>
                  <?php endforeach ;?>
                  </div>
                <?php endif; ?>






              <?php if (!isset($_POST['submit'])):?>
                <div class="input_group checkbox">
                  <input type="checkbox" name="accion[]" id="conductor" value="conductor">
                  <label for="conductor">Conductor</label>
                  <input type="checkbox" name="accion[]" id="acompaniante" value="acompaniante">
                  <label for="acompaniante">Acompañante</label>
                </div>
              <?php elseif (validarAccion() == false): ?>
                <div class="input_group checkbox">
                  <input type="checkbox" name="accion[]" id="conductor" value="conductor">
                  <label for="conductor">Conductor</label>
                  <input type="checkbox" name="accion[]" id="acompaniante" value="acompaniante">
                  <label for="acompaniante">Acompañante</label>
                  <span id='register_password_errorloc' class='error' ><?php echo $accionError ?></span>
                </div>


              <?php elseif (isset($_POST['accion'])): ?>
                <div class="input_group checkbox">
                <?php foreach ($_POST["accion"] as $value): ?>
                  <?php  if($value == "conductor") :?>
                      <input type="checkbox" name="accion[]" id="conductor" value="conductor" checked="">
                      <label for="conductor">Conductor</label>
                  <?php elseif ($value == "acompaniante") :?>
                      <input type="checkbox" name="accion[]" id="acompaniante" value="acompaniante" checked="">
                      <label for="acompaniante">Acompañante</label>
                  <?php endif; ?>
                <?php endforeach ;?>
                </div>
              <?php endif; ?>


              <?php if (!isset($_POST['submit'])):?>

      					<div class="input_group checkbox">
      						<input type="checkbox" name="terminos[]" id="terminos" value="true">
      						<label for="terminos">Acepto los Términos y Condiciones</label>
      					</div>
              <?php elseif (validarTerminos() == false): ?>
                <div class="input_group checkbox">
                  <input type="checkbox" name="terminos" id="terminos" value="true">
                  <label for="terminos">Acepto los Términos y Condiciones</label>
                  <span id='register_password_errorloc' class='error' ><?php echo $terminosError ?></span>
                </div>
              <?php elseif (isset($_POST['terminos'][0])): ?>
                <div class="input_group checkbox">
                  <input type="checkbox" name="terminos" id="terminos" value="true" checked="">
                  <label for="terminos">Acepto los Términos y Condiciones</label>
                </div>
              <?php endif; ?>

    					<input type="submit" id="btn_submit" value="Enviar" name='submit'>
    				</div>
    			</form>
    		</div>
    	</div>

      <?php include 'footer.html' ;?>
  </body>
</html>
