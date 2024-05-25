<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/interfaces.css" />
  <title>Información Alumnos</title>
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
          <p>Consultar alumnos</p>
          <form action="" method="get">
            <input type="text" id="dni" name="dni" placeholder="DNI" required>
            <button type="submit">Buscar</button>
          </form>

          <div class="tabla_consulta">
            <?php
            if (isset($_GET['dni'])) {
              require_once("../php/abm_infoAlumnos.php");
              $consultarAlumno = new infoAlumnosDB();
              $dni = $_GET['dni'];
              $resultado = $consultarAlumno->buscarAlumnos($dni);
              echo $resultado;
            }
            ?>
          </div>
        </div>

        <div class="agregarAbm">
          <p>Añadir alumno</p>
          <form action="" method="get">
            <label>DNI</label>
            <input type="number" name="agregar_dni" required><br>

            <label>Nombre</label>
            <input type="text" name="agregar_nombre" required><br>

            <label>Apellido</label>
            <input type="text" name="agregar_apellido" required><br>

            <label>Carrera</label>
            <input type="text" name="carrera" required><br>

            <label>Dirección</label>
            <input type="text" name="direccion" required><br>

            <label>Email</label>
            <input type="text" name="email" required><br>

            <label>Fecha Nacimiento</label>
            <input type="text" name="fecha_nac" placeholder="Año-Mes-Día" required><br>

            <button type="submit">Guardar</button>
          </form>

          <?php
          if (isset($_GET['agregar_dni'])) {
            require_once("../php/abm_infoAlumnos.php");
            $crearAlumno = new infoAlumnosDB();
            $agregarDni = $_GET['agregar_dni'];
            $nombre = $_GET['agregar_nombre'];
            $apellido = $_GET['agregar_apellido'];
            $carrera = $_GET['carrera'];
            $direccion = $_GET['direccion'];
            $email = $_GET['email'];
            $fecha_nac = $_GET['fecha_nac'];

            $resultado = $crearAlumno->crearAlumno(
              $agregarDni,
              $nombre,
              $apellido,
              $carrera,
              $direccion,
              $email,
              $fecha_nac
            );
          } ?>
        </div>

        <div class="eliminarAbm">
          <p>Eliminar alumno</p>
          <form action="" method="get">
            <input type="text" id="dni" name="eliminarDni" placeholder="DNI" required>
            <button type="submit">Eliminar</button>
          </form>
          <?php
          if (isset($_GET['eliminarDni'])) {
            require_once("../php/abm_infoAlumnos.php");
            $eliminarAlumno = new infoAlumnosDB();
            $eliminarDni = $_GET['eliminarDni'];
            $resultado = $eliminarAlumno->eliminarAlumnos($eliminarDni);
            echo $resultado;
          }
          ?>
        </div>
      </div>
    </div>
</body>

</html>