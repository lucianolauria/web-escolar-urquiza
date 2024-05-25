<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/interfaces.css" />
  <title>Carreras</title>
</head>

<body>
  <div class="container">
    <div class="menu">
      <p class="logo">Urquiza <span>Sistema</span></p>
      <ul class="menu_iconos">
        <li><img class="iconos" src="../img/notificacion.png" alt="" /></li>
        <li><img class="iconos" src="../img/mensaje.png" alt="" /></li>
        <li><img class="iconos" src="../img/user.png" alt="" /></li>
        <li><a href="../php/cerrarSesion.php">Cerrar sesión</a></li>
      </ul>
    </div>

    <div class="dashboard">
      <nav class="actions">
        <ul>
          <li><a href="notasConsultas.php">Notas</a></li>
          <li><a href="carreras.php">Carreras</a></li>
          <li><a href="horarios.php">Horarios</a></li>
          <li><a href="examenesConsultas.php">Examenes</a></li>
        </ul>
      </nav>

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
            require_once("../php/abm_carreras.php");
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
            require_once("../php/abm_carreras.php");
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
</body>

</html>