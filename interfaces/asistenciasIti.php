<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/interfaces.css" />
    <title>Asistencias ITI</title>
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
                    <p>Consultar asistencias - ITI</p>
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
                            $resultado = $consultarAsistencia->buscarAsistenciasIti($dni);
                            echo $resultado;
                        }
                        ?>
                    </div>
                </div>

                <div class="agregarAbm">
                    <p>Añadir asistencias - ITI</p>
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

                        <label>Física Aplicada a las Tecnologías de la Infor.</label>
                        <input type="text" name="fisica_aplicada" required><br>

                        <label>Administración</label>
                        <input type="text" name="administracion" required><br>

                        <label>Inglés Técnico</label>
                        <input type="text" name="ingles_tecnico" required><br>

                        <label>Arquitectura de las Computadoras</label>
                        <input type="text" name="arquitectura_computadoras" required><br>

                        <label>Lógica y Programación</label>
                        <input type="text" name="logica_programacion" required><br>

                        <label>Infraestructura de Redes I</label>
                        <input type="text" name="infraestructura_redes_i" required><br>

                        <label>Problemáticas Socio Contemporáneas</label>
                        <input type="text" name="problematicas_sociales" required><br>

                        <label>UDI II</label>
                        <input type="text" name="udi_ii" required><br>

                        <label>Estadística</label>
                        <input type="text" name="estadistica" required><br>

                        <label>Innovación y Desarrollo Emprendedor</label>
                        <input type="text" name="innovacion_desarrollo" required><br>

                        <label>Sistemas Operativos</label>
                        <input type="text" name="sistemas_operativos" required><br>

                        <label>Algoritmo y Estructura de Datos</label>
                        <input type="text" name="algoritmo_estructura_datos" required><br>

                        <label>Bases de Datos</label>
                        <input type="text" name="bases_datos" required><br>

                        <label>Infraestructura de Redes II</label>
                        <input type="text" name="infraestructura_redes_ii" required><br>

                        <label>Práctica Profesionalizante I</label>
                        <input type="text" name="practica_profesionalizante_i" required><br>

                        <label>Ética y Responsabilidad Social</label>
                        <input type="text" name="etica_responsabilidad_social" required><br>

                        <label>Derecho y Legislación Laboral</label>
                        <input type="text" name="derecho_legislacion_laboral" required><br>

                        <label>Administración de Bases de Datos</label>
                        <input type="text" name="admin_bases_datos" required><br>

                        <label>Seguridad de los Sistemas</label>
                        <input type="text" name="seguridad_sistemas" required><br>

                        <label>Integridad y Migración de Datos</label>
                        <input type="text" name="integridad_migracion_datos" required><br>

                        <label>Administración de Sistemas Operativos y Redes</label>
                        <input type="text" name="admin_sistemas_operativos_redes" required><br>

                        <label>Práctica Profesionalizante II</label>
                        <input type="text" name="practica_profesionalizante_ii" required><br>

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
                        $udi_i = $_GET['udi_i'];
                        $matematica = $_GET['matematica'];
                        $udi_ii = $_GET['udi_ii'];
                        $estadistica = $_GET['estadistica'];
                        $practica_profesionalizante_i = $_GET['practica_profesionalizante_i'];
                        $etica_responsabilidad_social = $_GET['etica_responsabilidad_social'];
                        $derecho_legislacion_laboral = $_GET['derecho_legislacion_laboral'];
                        $practica_profesionalizante_ii = $_GET['practica_profesionalizante_ii'];
                        $administracion = $_GET['administracion'];
                        $sistemas_operativos = $_GET['sistemas_operativos'];
                        $fisica_aplicada = $_GET['fisica_aplicada'];
                        $ingles_tecnico = $_GET['ingles_tecnico'];
                        $arquitectura_computadoras = $_GET['arquitectura_computadoras'];
                        $logica_programacion = $_GET['logica_programacion'];
                        $infraestructura_redes_i = $_GET['infraestructura_redes_i'];
                        $problematicas_sociales = $_GET['problematicas_sociales'];
                        $innovacion_desarrollo = $_GET['innovacion_desarrollo'];
                        $algoritmo_estructura_datos = $_GET['algoritmo_estructura_datos'];
                        $bases_datos = $_GET['bases_datos'];
                        $infraestructura_redes_ii = $_GET['infraestructura_redes_ii'];
                        $admin_bases_datos = $_GET['admin_bases_datos'];
                        $seguridad_sistemas = $_GET['seguridad_sistemas'];
                        $integridad_migracion_datos = $_GET['integridad_migracion_datos'];
                        $admin_sistemas_operativos_redes = $_GET['admin_sistemas_operativos_redes'];


                        $resultado = $crearAsistencia->crearAsistenciaIti(
                            $agregarDni,
                            $nombre,
                            $apellido,
                            $comunicacion,
                            $udi_i,
                            $matematica,
                            $udi_ii,
                            $estadistica,
                            $practica_profesionalizante_i,
                            $etica_responsabilidad_social,
                            $derecho_legislacion_laboral,
                            $practica_profesionalizante_ii,
                            $administracion,
                            $sistemas_operativos,
                            $fisica_aplicada,
                            $ingles_tecnico,
                            $arquitectura_computadoras,
                            $logica_programacion,
                            $infraestructura_redes_i,
                            $problematicas_sociales,
                            $innovacion_desarrollo,
                            $algoritmo_estructura_datos,
                            $bases_datos,
                            $infraestructura_redes_ii,
                            $admin_bases_datos,
                            $seguridad_sistemas,
                            $integridad_migracion_datos,
                            $admin_sistemas_operativos_redes
                        );
                    }
                    ?>
                </div>

                <div class="eliminarAbm">
                    <p>Eliminar asistencia - ITI</p>
                    <form action="" method="get">
                        <input type="text" id="dni" name="eliminarDni" placeholder="DNI" required>
                        <button type="submit">Eliminar</button>
                    </form>
                    <?php
                    if (isset($_GET['eliminarDni'])) {
                        require_once("../php/abm_asistencias.php");
                        $eliminarAsistencia = new AsistenciasDB();
                        $eliminarDni = $_GET['eliminarDni'];
                        $resultado = $eliminarAsistencia->eliminarAsistenciaIti($eliminarDni);
                        echo $resultado;
                    }
                    ?>
                </div>
            </div>
        </div>
</body>

</html>