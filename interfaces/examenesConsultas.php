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

        <div class="agregarAbm">
          <p>Inscripción a examenes</p>
          <form action="" method="get">
            <label>DNI</label>
            <input type="number" name="dni" required><br>

            <label>Nombre</label>
            <input type="text" name="nombre" required><br>

            <label>Apellido</label>
            <input type="text" name="apellido" required><br>

            <label>Unidad Curricular</label>
            <input type="text" name="uc" required><br>

            <label>Carrera</label>
            <input type="text" name="carreraInscripcion" required><br>

            <label>Correo</label>
            <input type="text" name="correo" required><br>

            <button type="submit">Guardar</button>
          </form>

          <?php
          if (isset($_GET['dni'])) {
            require_once("../php/abm_examenes.php");
            $inscripcionExamen = new ExamenesDB();
            $dni = $_GET['dni'];
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $carreraInscripcion = $_GET['carreraInscripcion'];
            $uc = $_GET['uc'];
            $correo = $_GET['correo'];

            $resultado = $inscripcionExamen->inscripcionExamenes(
              $dni,
              $nombre,
              $apellido,
              $carreraInscripcion,
              $uc,
              $correo
            );
          } ?>
        </div>

      </div>
    </div>
</body>

</html>