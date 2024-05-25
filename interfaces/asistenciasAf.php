<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/interfaces.css" />
  <title>Asistencias AF</title>
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
              <li><a href="../php/cerrarSesion.php">Cerra sesión</a></li>
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
          <p>Consultar asistencias - AF</p>
          <form action="" method="get">
            <input type="text" id="dni" name="dni" placeholder="DNI" required>
            <button type="submit">Buscar</button>
          </form>

          <div class="tabla_consulta">
            <?php
            if (isset($_GET['dni'])) {
              require_once("../php/abm_asistencias.php");
              $consultarAsistencia = new AsistenciasDB();
              $dni = $_GET['dni'];
              $resultado = $consultarAsistencia->buscarAsistenciasAf($dni);
              echo $resultado;
            }
            ?>
          </div>
        </div>

        <div class="agregarAbm">
          <p>Añadir asistencias - AF</p>
          <form action="" method="get">
            <label>DNI</label>
            <input type="number" name="agregar_dni" required><br>

            <label>Nombre</label>
            <input type="text" name="agregar_nombre" required><br>

            <label>Apellido</label>
            <input type="text" name="agregar_apellido" required><br>

            <label>Comunicación</label>
            <input type="text" name="comunicacion" required><br>

            <label>UDI I</label>
            <input type="text" name="udii" required><br>

            <label>Matemática</label>
            <input type="text" name="matematica" required><br>

            <label>Arquitectura de las Computadoras</label>
            <input type="text" name="arquitectura" required><br>

            <label>Inglés Técnico I</label>
            <input type="text" name="ingles_tecnico_i" required><br>

            <label>Psicosociología de las Organizaciones</label>
            <input type="text" name="psicosociologia" required><br>

            <label>Modelos de Negocios</label>
            <input type="text" name="modelos_negocios" required><br>

            <label>Gestión de Software I</label>
            <input type="text" name="gestion_software_i" required><br>

            <label>Análisis de Sistemas Organizacionales</label>
            <input type="text" name="analisis_sistemas" required><br>

            <label>Problemas Socio Contemporáneo</label>
            <input type="text" name="problemas_socio_contemporaneo" required><br>

            <label>UDI II</label>
            <input type="text" name="udi_ii" required><br>

            <label>Estadística</label>
            <input type="text" name="estadistica" required><br>

            <label>Innovación y Desarrollo Emprendedor</label>
            <input type="text" name="innovacion_desarrollo_emprendedor" required><br>

            <label>Práctica Profesionalizante I</label>
            <input type="text" name="practica_profesionalizante_i" required><br>

            <label>Inglés Técnico II</label>
            <input type="text" name="ingles_tecnico_ii" required><br>

            <label>Gestión de Software II</label>
            <input type="text" name="gestion_software_ii" required><br>

            <label>Estrategia de Negocios</label>
            <input type="text" name="estrategia_negocios" required><br>

            <label>Desarrollo de Sistemas</label>
            <input type="text" name="desarrollo_sistemas" required><br>

            <label>Bases de Datos</label>
            <input type="text" name="bases_datos" required><br>

            <label>Ética y Responsabilidad Social</label>
            <input type="text" name="etica_responsabilidad_social" required><br>

            <label>Derecho y Legislación Laboral</label>
            <input type="text" name="derecho_legislacion_laboral" required><br>

            <label>Seguridad de los Sistemas</label>
            <input type="text" name="seguridad_sistemas" required><br>

            <label>Práctica Profesionalizante II</label>
            <input type="text" name="practica_profesionalizante_ii" required><br>

            <label>Redes y Comunicaciones</label>
            <input type="text" name="redes_comunicaciones" required><br>

            <label>Sistema de Información Organizacional</label>
            <input type="text" name="sistema_informacion_organizacional" required><br>

            <label>Desarrollo de Sistemas Web</label>
            <input type="text" name="desarrollo_sistemas_web" required><br>

            <button type="submit">Guardar Asistencias</button>
          </form>

          <?php
          if (isset($_GET['agregar_dni'])) {
            require_once("../php/abm_asistencias.php");
            $crearAsistencia = new AsistenciasDB();
            $agregarDni = $_GET['agregar_dni'];
            $nombre = $_GET['agregar_nombre'];
            $apellido = $_GET['agregar_apellido'];
            $comunicacion = $_GET['comunicacion'];
            $udii = $_GET['udii'];
            $matematica = $_GET['matematica'];
            $arquitectura = $_GET['arquitectura'];
            $ingles_tecnico_i = $_GET['ingles_tecnico_i'];
            $psicosociologia = $_GET['psicosociologia'];
            $modelos_negocios = $_GET['modelos_negocios'];
            $gestion_software_i = $_GET['gestion_software_i'];
            $analisis_sistemas = $_GET['analisis_sistemas'];
            $problemas_socio_contemporaneo = $_GET['problemas_socio_contemporaneo'];
            $udi_ii = $_GET['udi_ii'];
            $estadistica = $_GET['estadistica'];
            $innovacion_desarrollo_emprendedor = $_GET['innovacion_desarrollo_emprendedor'];
            $practica_profesionalizante_i = $_GET['practica_profesionalizante_i'];
            $ingles_tecnico_ii = $_GET['ingles_tecnico_ii'];
            $gestion_software_ii = $_GET['gestion_software_ii'];
            $estrategia_negocios = $_GET['estrategia_negocios'];
            $desarrollo_sistemas = $_GET['desarrollo_sistemas'];
            $bases_datos = $_GET['bases_datos'];
            $etica_responsabilidad_social = $_GET['etica_responsabilidad_social'];
            $derecho_legislacion_laboral = $_GET['derecho_legislacion_laboral'];
            $seguridad_sistemas = $_GET['seguridad_sistemas'];
            $practica_profesionalizante_ii = $_GET['practica_profesionalizante_ii'];
            $redes_comunicaciones = $_GET['redes_comunicaciones'];
            $sistema_informacion_organizacional = $_GET['sistema_informacion_organizacional'];
            $desarrollo_sistemas_web = $_GET['desarrollo_sistemas_web'];

            $resultado = $crearAsistencia->crearAsistenciaAf(
              $agregarDni,
              $nombre,
              $apellido,
              $comunicacion,
              $udii,
              $matematica,
              $arquitectura,
              $ingles_tecnico_i,
              $psicosociologia,
              $modelos_negocios,
              $gestion_software_i,
              $analisis_sistemas,
              $problemas_socio_contemporaneo,
              $udi_ii,
              $estadistica,
              $innovacion_desarrollo_emprendedor,
              $practica_profesionalizante_i,
              $ingles_tecnico_ii,
              $gestion_software_ii,
              $estrategia_negocios,
              $desarrollo_sistemas,
              $bases_datos,
              $etica_responsabilidad_social,
              $derecho_legislacion_laboral,
              $seguridad_sistemas,
              $practica_profesionalizante_ii,
              $redes_comunicaciones,
              $sistema_informacion_organizacional,
              $desarrollo_sistemas_web
            );
          }
          ?>
        </div>

        <div class="eliminarAbm">
          <p>Eliminar asistencia - AF</p>
          <form action="" method="get">
            <input type="text" id="dni" name="eliminarDni" placeholder="DNI" required>
            <button type="submit">Eliminar</button>
          </form>
          <?php
          if (isset($_GET['eliminarDni'])) {
            require_once("../php/abm_asistencias.php");
            $eliminarAsistencia = new AsistenciasDB();
            $eliminarDni = $_GET['eliminarDni'];
            $resultado = $eliminarAsistencia->eliminarAsistenciaAf($eliminarDni);
            echo $resultado;
          }
          ?>
        </div>
      </div>
    </div>
</body>

</html>