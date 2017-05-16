

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

    <div class="container">

        <header class="main-header">

          <ul class="login">
            <?php if (isset($_SESSION['nickname'])): ?>
            <li><a id="none" href="">Registrarme</a></li>
            <li><a href="">Ingresar</a></li>
            <li><a href="HomeUser.php">Mi Cuenta</a></li>
            <li><a href="logout.php">Desloguear</a></li>


            <?php else:?>
            <li><a id="none" href="registro.php">Registrarme</a></li>
            <li><a href="ingresar.php">Ingresar</a></li>
            <li><a href="ingresar.php">Mi Cuenta</a></li>
            <?php endif; ?>
          </ul>
          <a href="home.php">
          <img class="imagen" src="img/autopool_v2_w200.png" alt="autopool">
          </a>
          <nav class="main-nav">
            <ul>
              <li><a href="#anchor_content_2">Qué es autopool</a></li>
              <li><a href="#anchor_content_3">Como funciona</a></li>
              <li><a href="#">Pasajeros</a></li>
              <li><a href="#">Conductores</a></li>
              <li><a href="faq.php">Preguntas Frecuentes</a></li>
            </ul>
          </nav>
        </header>
      </div>
  </body>
</html>
