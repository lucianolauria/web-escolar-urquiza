<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/interfaces.css" />
  <title>Examenes</title>
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
          <li><a href="#">Notas</a>
            <ul class="menu_oculto">
              <li><a href="notasAf.php">Analista Funcional</a></li>
              <li><a href="notasDs.php">Desarrollo de Software</a></li>
              <li><a href="notasIti.php">ITI</a></li>
            </ul>
          </li>
          <li><a href="#">Asistencias</a>
            <ul class="menu_oculto">
              <li><a href="asistenciasAf.php">Analista Funcional</a></li>
              <li><a href="asistenciasDs.php">Desarrollo de Software</a></li>
              <li><a href="asistenciasIti.php">ITI</a></li>
            </ul>
          </li>
          <li><a href="infoAlumnos.php">Info Alumnos</a></li>
          <li><a href="examenes.php">Examenes</a></li>
        </ul>
      </nav>


      <div class="abm">
        <div class="consultarAbm">
          <p>Consultar examenes</p>
          <form action="" method="get">
            <select name="carrera" id="carrera">
              <option value="ds">Desarrollo de Software</option>
              <option value="af">Analista en Sistemas</option>
              <option value="iti">ITI</option>
            </select>
            <button type="submit">Buscar</button>
          </form>

          <div class="tabla_consulta">
            <?php
            if (isset($_GET['carrera'])) {
              require_once("../php/abm_examenes.php");
              $consultarExamen = new ExamenesDB();
              $carrera = $_GET["carrera"];
              $resultado = $consultarExamen->buscarExamenes($carrera);
              echo $resultado;
            }
            ?>
          </div>
        </div>
      </div>

    </div>
</body>

</html>