<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/interfaces.css" />
    <title>Asistencias DS</title>
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
                    <p>Consultar asistencias - DS</p>
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
                            $resultado = $consultarAsistencia->buscarAsistenciasDs($dni);
                            echo $resultado;
                        }
                        ?>
                    </div>
                </div>

                <div class="agregarAbm">
                    <p>Añadir asistencias - DS</p>
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
                        <input type="text" name="udi_i" required><br>

                        <label>Matemática</label>
                        <input type="text" name="matematica" required><br>

                        <label>Administración</label>
                        <input type="text" name="administracion" required><br>

                        <label>Sistemas Operativos</label>
                        <input type="text" name="sistemas_operativos" required><br>

                        <label>Inglés Técnico I</label>
                        <input type="text" name="ingles_tecnico_i" required><br>

                        <label>Tecnología de la Administración</label>
                        <input type="text" name="tecnologia_administracion" required><br>

                        <label>Lógica y Estructura de Datos</label>
                        <input type="text" name="logica_estructura_datos" required><br>

                        <label>Ingeniería de Software I</label>
                        <input type="text" name="ingenieria_software_i" required><br>

                        <label>Problemáticas Socio Contemporáneas</label>
                        <input type="text" name="problematicas_socio_contemporaneas" required><br>

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

                        <label>Programación I</label>
                        <input type="text" name="programacion_i" required><br>

                        <label>Ingeniería de Software II</label>
                        <input type="text" name="ingenieria_software_ii" required><br>

                        <label>Bases de Datos I</label>
                        <input type="text" name="bases_datos_i" required><br>

                        <label>Ética y Responsabilidad Social</label>
                        <input type="text" name="etica_responsabilidad_social" required><br>

                        <label>Derecho y Legislación Laboral</label>
                        <input type="text" name="derecho_legislacion_laboral" required><br>

                        <label>Práctica Profesionalizante II</label>
                        <input type="text" name="practica_profesionalizante_ii" required><br>

                        <label>Redes y Comunicaciones</label>
                        <input type="text" name="redes_comunicaciones" required><br>

                        <label>Programación II</label>
                        <input type="text" name="programacion_ii" required><br>

                        <label>Gestión de Proyectos de Software</label>
                        <input type="text" name="gestion_proyectos_software" required><br>

                        <label>Bases de Datos II</label>
                        <input type="text" name="bases_datos_ii" required><br>

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
                        $udii = $_GET['udi_i'];
                        $matematica = $_GET['matematica'];
                        $ingles_tecnico_i = $_GET['ingles_tecnico_i'];
                        $udi_ii = $_GET['udi_ii'];
                        $estadistica = $_GET['estadistica'];
                        $innovacion_desarrollo_emprendedor = $_GET['innovacion_desarrollo_emprendedor'];
                        $practica_profesionalizante_i = $_GET['practica_profesionalizante_i'];
                        $ingles_tecnico_ii = $_GET['ingles_tecnico_ii'];
                        $etica_responsabilidad_social = $_GET['etica_responsabilidad_social'];
                        $derecho_legislacion_laboral = $_GET['derecho_legislacion_laboral'];
                        $practica_profesionalizante_ii = $_GET['practica_profesionalizante_ii'];
                        $redes_y_comunicaciones = $_GET['redes_comunicaciones'];
                        $administracion = $_GET['administracion'];
                        $sistemas_operativos = $_GET['sistemas_operativos'];
                        $logica_estructura_datos = $_GET['logica_estructura_datos'];
                        $ingenieria_software_i = $_GET['ingenieria_software_i'];
                        $tecnologia_administracion = $_GET['tecnologia_administracion'];
                        $problematicas_socio_contemporaneas = $_GET['problematicas_socio_contemporaneas'];
                        $programacion_i = $_GET['programacion_i'];
                        $ingenieria_software_ii = $_GET['ingenieria_software_ii'];
                        $bases_datos_i = $_GET['bases_datos_i'];
                        $programacion_ii = $_GET['programacion_ii'];
                        $gestion_proyectos_software = $_GET['gestion_proyectos_software'];
                        $bases_datos_ii = $_GET['bases_datos_ii'];

                        $resultado = $crearAsistencia->crearAsistenciaDs(
                            $agregarDni,
                            $nombre,
                            $apellido,
                            $comunicacion,
                            $udii,
                            $matematica,
                            $ingles_tecnico_i,
                            $udi_ii,
                            $estadistica,
                            $innovacion_desarrollo_emprendedor,
                            $practica_profesionalizante_i,
                            $ingles_tecnico_ii,
                            $etica_responsabilidad_social,
                            $derecho_legislacion_laboral,
                            $practica_profesionalizante_ii,
                            $administracion,
                            $sistemas_operativos,
                            $logica_estructura_datos,
                            $ingenieria_software_i,
                            $tecnologia_administracion,
                            $problematicas_socio_contemporaneas,
                            $programacion_i,
                            $ingenieria_software_ii,
                            $bases_datos_i,
                            $redes_y_comunicaciones,
                            $programacion_ii,
                            $gestion_proyectos_software,
                            $bases_datos_ii
                        );
                    }
                    ?>
                </div>

                <div class="eliminarAbm">
                    <p>Eliminar asistencia - DS</p>
                    <form action="" method="get">
                        <input type="text" id="dni" name="eliminarDni" placeholder="DNI" required>
                        <button type="submit">Eliminar</button>
                    </form>
                    <?php
                    if (isset($_GET['eliminarDni'])) {
                        require_once("../php/abm_asistencias.php");
                        $eliminarAsistencia = new AsistenciasDB();
                        $eliminarDni = $_GET['eliminarDni'];
                        $resultado = $eliminarAsistencia->eliminarAsistenciaDs($eliminarDni);
                        echo $resultado;
                    }
                    ?>
                </div>
            </div>
        </div>
</body>

</html>