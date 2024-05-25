<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/interfaces.css" />
  <title>Notas</title>
</head>

<body>
  <div class="container">
    <div class="menu">
      <p class="logo">Urquiza <span>Alumnos</span></p>
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
          <p>Consultar calificaciones</p>
          <form action="" method="get">
            <select name="carrera" id="carrera">
              <option value="ds">Desarrollo de Software</option>
              <option value="af">Analista Funcional</option>
              <option value="iti">ITI</option>
            </select>
            <input type="text" id="dni" name="dni" placeholder="DNI" required>
            <button type="submit">Buscar</button>
          </form>

          <div class="tabla_consulta">
            <?php
            if (isset($_GET['dni'])) {
              require_once("../php/abm_notas.php");
              $consultarNotas = new NotasDB();
              $carrera = $_GET['carrera'];
              $dni = $_GET['dni'];
              if ($carrera == "ds") {$resultado = $consultarNotas->buscarNotasDS($dni);} else if ($carrera == "af") {$resultado = $consultarNotas->buscarNotasAf($dni);} else if ($carrera == "iti") {$resultado = $consultarNotas->buscarNotasIti($dni);}             
              echo $resultado;
            }
            ?>
          </div>
        </div>
      </div>
    </div>
</body>

</html>