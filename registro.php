<?php
// include ("php/controller-registro-php.php");
include 'php/controller-register.php';


if(isset($_SESSION['login'])){
  header('Location: ../trabajo-integrador/profile.php');
}


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

<?php include 'header.php' ?>

    <div class="registro_bienvenida">
      <h2>Registro de nuevo usuario</h2>
      <p class="registro_welcome_txt">¡Estás a solo un paso de ser parte de una Comunidad de héroes que luchan contra la congestión vial, los retrasos, la polución y los gastos redundantes!</p>
    </div>

    <div class="contenedor_formulario">
    		<div class="wrap">
    			<form action="" class="formulario" name="formulario_registro" method="post" enctype="multipart/form-data">
    				<div>
    					<div class="input_group ingresar_nombre_reg">
    						<input class="inputs" type="text" id="nombre" name="nombre" value="<?php echo $usuario->nombre; ?>">
    						<label class="label" for="nombre">Nombre:</label>
                            <span class="haserror" id="error_name"></span>

                   <?php if (isset($_POST['nombre'])): ?>
                    <?php if (isset($validador['nombre'])): ?>
                      <span id='register_name_errorloc' class='error'><?php echo $validador['nombre'];?>
                      </span>
                    <?php endif; ?>
                  <?php endif; ?>

    					</div>

              <div class="input_group ingresar_apellido_reg">
                <input class="inputs" type="text" id="apellido" name="apellido" value="<?php echo $usuario->apellido ;?>">
                <label class="label" for="apellido">Apellido:</label>
                <span class="haserror" id="error_surname"></span>
                <?php if (isset($_POST['apellido'])): ?>
                  <?php if (isset($validador['apellido'])): ?>
                    <span id='register_surname_errorloc' class='error'><?php echo $validador['apellido']; ?>
                    </span>
                  <?php endif; ?>
                <?php endif; ?>

              </div>

    					<div class="input_group ingresar_email_reg">
    						<input class="inputs" type="email" id="correo" name="correo" value="<?php echo $usuario->email ;?>">
    						<label class="label" for="correo">Correo:</label>
                            <span class="haserror" id="error_email"></span>

                  <?php if (isset($_POST['correo'])): ?>
                    <?php if (isset($validador['email'])): ?>
                      <span id='register_email_errorloc' class='error'><?php echo $validador['email'] ;?>
                      </span>
                    <?php endif; ?>
                  <?php endif; ?>

    					</div>


    					<div class="input_group ingresar_password_reg">
    						<input class="inputs" type="password" id="pass" name="password">
    						<label class="label" for="password">Contraseña:</label>
                            <span class="haserror" id="error_password"></span>

                <?php if (isset($_POST['password'])): ?>
                  <?php if (isset($validador['pass'])): ?>
                    <span id='register_password_errorloc' class='error'>
                    <?php  echo $validador['pass'] ;?>
                    </span>
                  <?php endif; ?>
                <?php endif; ?>

              </div>

    					<div class="input_group ingresar_password2_reg">
    						<input class="inputs" type="password" id="password2" name="password2">
    						<label class="label" for="password2">Repetir Contraseña:</label>
                            <span class="haserror" id="error_password2"></span>
    					</div>



            <div class="input_group ingresar_edad_reg">
                <input class="inputs" type="text" id="edad" name="edad" value="<?php echo $usuario->edad ; ?>">
                <label class="label" for="edad">Edad:</label>
                <span class="haserror" id="error_edad"></span>

                <?php if (isset($_POST['edad'])): ?>
                  <?php if (isset($validador['edad'])): ?>
                    <span id='register_password_errorloc' class='error'>
                    <?php  echo $validador['edad'] ;?>
                    </span>
                  <?php endif; ?>
                <?php endif; ?>

            </div>


                 <?php if (!isset($_POST['submit'])):?>
                    <div class="input_group checkbox">
                      <input type="radio" name="sexo" id="hombre" value="hombre">
                      <label for="hombre">Hombre</label>
                      <input type="radio" name="sexo" id="mujer" value="mujer">
                      <label for="mujer">Mujer</label><br>
                      <span class="haserror" id="error_sexo"></span>
                    </div>



                  <?php elseif ($usuario->sexo == NULL): ?>
                      <div class="input_group checkbox radio">
                        <input type="radio" name="sexo" id="hombre" value="hombre">
                        <label for="hombre">Hombre</label>
                        <input type="radio" name="sexo" id="mujer" value="mujer">
                        <label for="mujer">Mujer</label><br>
                        <span class="haserror" id="error_sexo"></span>
                        <span id='register_password_errorloc' class='error' ><?php echo $validador['sexo'] ; ?></span>
                      </div>

                  <?php elseif ($usuario->sexo): ?>
                    <div class="input_group checkbox">
                        <?php foreach ($usuario->sexo as $value): ?>
                          <?php  if($value == "hombre") :?>
                              <input type="radio" name="sexo" id="hombre" value="hombre" checked="">
                              <label for="hombre">Hombre</label>
                              <input type="radio" name="sexo" id="mujer" value="mujer">
                              <label for="mujer">Mujer</label><br>
                              <span class="haserror" id="error_sexo"></span>
                          <?php elseif ($value == "mujer") :?>
                            <input type="radio" name="sexo" id="hombre" value="hombre">
                            <label for="hombre">Hombre</label>
                              <input type="radio" name="sexo" id="mujer" value="mujer" checked="">
                              <label for="mujer">Mujer</label><br>
                              <span class="haserror" id="error_sexo"></span>
                          <?php endif; ?>
                        <?php endforeach ;?>
                    </div>

                  <?php endif; ?>





              <?php if (!isset($_POST['submit'])):?>
                <div class="input_group checkbox">
                  <input type="checkbox" name="accion[conductor]" id="conductor" value="conductor">
                  <label for="conductor">Conductor</label>
                  <input type="checkbox" name="accion[acompanante]" id="acompanante" value="acompanante">
                  <label for="acompanante">Acompanante</label><br>
                  <span class="haserror" id="error_conductor_acomp"></span>
                </div>
              <?php elseif ($usuario->accion == NULL): ?>
                <div class="input_group checkbox">
                  <input type="checkbox" name="accion[conductor]" id="conductor" value="conductor">
                  <label for="conductor">Conductor</label>
                  <input type="checkbox" name="accion[acompanante]" id="acompanante" value="acompanante">
                  <label for="acompanante">Acompanante</label><br>
                  <span class="haserror" id="error_conductor_acomp"></span>
                  <span id='register_password_errorloc' class='error' ><?php echo $validador['accion'] ;?></span>
                </div>


              <?php elseif ($usuario->accion): ?>
                <div class="input_group checkbox">
                <?php if ($usuario->accion['conductor'] == 'conductor' && $usuario->accion['acompanante'] == ''): ?>
                        <input type="checkbox" name="accion[conductor]" id="conductor" value="conductor" checked="">
                        <label for="conductor">Conductor</label>
                        <input type="checkbox" name="accion[acompanante]" id="acompanante" value="acompanante">
                        <label for="acompanante">Acompanante</label><br>
                        <span class="haserror" id="error_conductor_acomp"></span>
                  <?php elseif ($usuario->accion['conductor'] == '' && $usuario->accion['acompanante'] == 'acompanante') :?>
                        <input type="checkbox" name="accion[conductor]" id="conductor" value="conductor">
                        <label for="conductor">Conductor</label>
                        <input type="checkbox" name="accion[acompanante]" id="acompanante" value="acompanante" checked="">
                        <label for="acompanante">Acompanante</label><br>
                        <span class="haserror" id="error_conductor_acomp"></span>
                  <?php elseif ($usuario->accion['conductor'] == 'conductor' && $usuario->accion['acompanante'] == 'acompanante') :?>
                        <input type="checkbox" name="accion[conductor]" id="conductor" value="conductor" checked="">
                        <label for="conductor">Conductor</label>
                        <input type="checkbox" name="accion[acompanante]" id="acompanante" value="acompanante" checked="">
                        <label for="acompanante">Acompanante</label><br>
                        <span class="haserror" id="error_conductor_acomp"></span>
                  <?php endif; ?>

                </div>
              <?php endif; ?>



              <?php if (!isset($_POST['submit'])):?>
                <div class="input_group checkbox">
                  <input type="checkbox" name="terminos" id="terminos" value="terminos">
                  <label for="terminos">Acepto los Términos y Condiciones</label><br>
                  <span class="haserror" id="error_acepte"></span>
                </div>
              <?php elseif ($usuario->terminos) :?>
                <div class="input_group checkbox">
                  <input type="checkbox" name="terminos" id="terminos" value="terminos" checked="">
                  <label for="terminos">Acepto los Términos y Condiciones</label><br>
                  <span class="haserror" id="error_acepte"></span>
                </div>
              <?php elseif ($usuario->terminos == NULL) :?>
                <div class="input_group checkbox">
                  <input type="checkbox" name="terminos" id="terminos" value="terminos">
                  <label for="terminos">Acepto los Términos y Condiciones</label><br>
                  <span class="haserror" id="error_acepte"></span>
                  <span id='register_password_errorloc' class='error' ><?php echo $validador['terminos'] ;?></span>
                </div>


              <?php endif; ?>

            <div class="file-upload">
                  <label for="upload" class="file-upload__label">Subir Imagen</label>
                  <input id="upload" class="file-upload__input" type="file" name="imgPerfil">
                <?php if (isset($_FILES['imgPerfil'])) : ?>
                  <?php if ($usuario->imagen['imgPerfil'] && isset($validador['imagen'])) : ?>
                    <span id='register_password_errorloc' class='error' ><?php echo $validador['imagen'] ;?></span>
                  <?php endif; ?>
                <?php else: ?>
                  <span id='register_password_errorloc' class='permitido'> Solamente se permiten fotos .png o .jpg</span>
                <?php endif; ?>
            </div>

    					<input type="submit" id="btn_submit_reg" value="Enviar" name='submit'>
    				</div>
    			</form>
    		</div>
    	</div>

<?php include 'footer.html' ;?>
<script type="text/javascript" src="js/scripts.js"></script>
  </body>
</html>
