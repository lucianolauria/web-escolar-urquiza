<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Urquiza - Sistema de Gestión Académica</title>
  <link rel="stylesheet" href="css/index.css" />
</head>

<body>
  <div class="container">
    <nav class="menu">
      <p class="logo">Urquiza <span>Sistema</span></p>
      <ul>
        <li><a href="registro.php">Registrarse</a></li>
        <li><a class="login" href="index.php">Iniciar sesión</a></li>
      </ul>
    </nav>

    <div class="content">
      <div>
        <div class="form-body">
          <img src="img/logo_profesores.png" alt="login-logo" />
          <p class="texto">Ingresá tus datos</p>
          <form class="form" action="php/validarUsuario.php" method="post">
            <input type="text" class="campos" name="usuario" placeholder="Usuario" required /><br />
            <input type="password" class="campos" name="contraseña" placeholder="Contraseña" required /><br />
            <input type="submit" value="Ingresar" />
          </form>
          <p>¿No estas registrado? <a href="registro.php">Registrate.</a></p>
        </div>
      </div>
    </div>

    <div class="content2">
      <div class="info">
      <h1><i>TERCIARIO URQUIZA</i></h1><br>
        <img src="img/escuela.jpg" alt="">
      </div>

      <div class="dashboard">
        <div class="abm">
          <div class="consultarAbm">
            <p>Consultar carreras</p>
            <form method="get" action="">
              <select name="carrera" id="carrera">
                <option value="ds">Desarrollo de Software</option>
                <option value="af">Analista en Sistemas</option>
                <option value="iti">ITI</option>
              </select>
              <input type="submit" value="Mostrar Carrera">
            </form>

            <div class="tabla_consulta">
              <?php
              require_once("php/abm_carreras.php");
              $carreras = new Carreras();
              if (isset($_GET["carrera"])) {
                $carrera = $_GET["carrera"];
                $carreras->mostrarUc($carrera);
              }
              ?>
            </div>
          </div>

          <div class="consultarAbm">
            <p>Consultar correlativas</p>
            <form method="get" action="">
              <select name="correlativas" id="correlativas">
                <option value="ds">Desarrollo de Software</option>
                <option value="af">Analista en Sistemas</option>
                <option value="iti">ITI</option>
              </select>
              <input type="submit" value="Mostrar Correlativas">
            </form>

            <div class="tabla_consulta">
              <?php
              require_once("php/abm_carreras.php");
              $carreras = new Carreras();
              if (isset($_GET["correlativas"])) {
                $correlativas = $_GET["correlativas"];
                $carreras->mostrarCorrelativas($correlativas);
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>