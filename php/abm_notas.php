<?php
class NotasDB {
    private static $host = "localhost";
    private static $usuario = "root";
    private static $contrasena = "";
    protected $baseDatos = "urquiza";
    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli(self::$host, self::$usuario, self::$contrasena, $this->baseDatos);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function buscarNotasAf($dni)
    {
        $query = "SELECT * FROM notas_af WHERE dni = ?";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $dni);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $notas = $result->fetch_all(MYSQLI_ASSOC);
            return $this->generarTablaNotasAf($notas);
        } else {
            return "<p>No se encontraron calificaciones para el DNI proporcionado.</p>";
        }
    }

    private function generarTablaNotasAf($notas)
    {
        $html = "<table style='width: 500px; border-collapse: collapse; overflow: hidden; box-shadow: 0 0 20px #0000001a; margin: 20px auto;'>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>DNI</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['dni'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Nombre</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['nombre'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Apellido</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['apellido'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Carrera</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['carrera'] . "</td></tr>";

        $materias = array(
            "Comunicación", "UDI_I", "Matemática", "Arquitectura_de_las_Computadoras",
            "Inglés_Técnico_I", "Psicosociología_de_las_Organizaciones", "Modelos_de_Negocios",
            "Gestión_de_Software_I", "Análisis_de_Sistemas_Organizacionales", "Problemas_Socio_Contemporáneos",
            "UDI_II", "Estadística", "Innovación_y_Desarrollo_Emprendedor", "Práctica_Profesionalizante_I",
            "Inglés_Técnico_II", "Gestión_de_Software_II", "Estrategia_de_Negocios", "Desarrollo_de_Sistemas",
            "Bases_de_Datos", "Ética_y_Responsabilidad", "Derecho_y_Legislación_Laboral",
            "Seguridad_de_los_Sistemas", "Práctica_Profesionalizante_II", "Redes_y_Comunicaciones",
            "Sistema_de_Información_Organizacional", "Desarrollo_de_Sistemas_Web"
        );

        $materiasNombres = array(
            "Comunicación", "UDI I", "Matemática", "Arquitectura de las Computadoras",
            "Inglés Técnico I", "Psicosociología de las Organizaciones", "Modelos de Negocios",
            "Gestión de Software I", "Análisis de Sistemas Organizacionales", "Problemas Socio Contemporáneo",
            "UDI II", "Estadística", "Innovación y Desarrollo Emprendedor", "Práctica Profesionalizante I",
            "Inglés Técnico II", "Gestión de Software II", "Estrategia de Negocios", "Desarrollo de Sistemas",
            "Bases de Datos", "Ética y Responsabilidad Social", "Derecho y Legislación Laboral",
            "Seguridad de los Sistemas", "Práctica Profesionalizante II", "Redes y Comunicaciones",
            "Sistema de Información Organizacional", "Desarrollo de Sistemas Web"
        );

        for ($i = 0; $i < count($materiasNombres); $i++) {
            $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>$materiasNombres[$i]</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0][$materias[$i]] . "</td></tr>";
        }
        $html .= "</table>";
        return $html;
    }

    public function crearNotasAf(
        $agregarDni,
        $nombre,
        $apellido,
        $carrera,
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
    ) {

        $query = "INSERT INTO notas_af (
            dni, nombre, apellido, carrera, Comunicación, UDI_I, Matemática, Arquitectura_de_las_Computadoras,
            Inglés_Técnico_I, Psicosociología_de_las_Organizaciones, Modelos_de_Negocios, Gestión_de_Software_I,
            Análisis_de_Sistemas_Organizacionales, Problemas_Socio_Contemporáneos, UDI_II, Estadística,
            Innovación_y_Desarrollo_Emprendedor, Práctica_Profesionalizante_I, Inglés_Técnico_II,
            Gestión_de_Software_II, Estrategia_de_Negocios, Desarrollo_de_Sistemas, Bases_de_Datos,
            Ética_y_Responsabilidad, Derecho_y_Legislación_Laboral, Seguridad_de_los_Sistemas,
            Práctica_Profesionalizante_II, Redes_y_Comunicaciones, Sistema_de_Información_Organizacional,
            Desarrollo_de_Sistemas_Web
        ) VALUES ('$agregarDni', '$nombre', '$apellido', '$carrera', '$comunicacion', '$udii', '$matematica', '$arquitectura', 
            '$ingles_tecnico_i', '$psicosociologia', '$modelos_negocios', '$gestion_software_i', '$analisis_sistemas', 
            '$problemas_socio_contemporaneo', '$udi_ii', '$estadistica', '$innovacion_desarrollo_emprendedor', 
            '$practica_profesionalizante_i', '$ingles_tecnico_ii', '$gestion_software_ii', '$estrategia_negocios', 
            '$desarrollo_sistemas', '$bases_datos', '$etica_responsabilidad_social', '$derecho_legislacion_laboral', 
            '$seguridad_sistemas', '$practica_profesionalizante_ii', '$redes_comunicaciones', 
            '$sistema_informacion_organizacional', '$desarrollo_sistemas_web')";

        if ($this->conexion->query($query) == TRUE) {
            echo "<p>Calificaciones agregadas correctamente.<p>";
        } else {
            echo "Error al agregar calificaciones: " . $this->conexion->error;
        }
    }

    public function eliminarNotasAf($eliminarDni)
    {
        $query = "DELETE FROM notas_af WHERE dni = ?";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $eliminarDni);

        if ($stmt->execute()) {
            echo "<p>Calificaciones eliminadas correctamente.</p>";
        } else {
            echo "Error al eliminar calificaciones: " . $stmt->error;
        }

        $stmt->close();
    }

    public function buscarNotasDs($dni)
    {
        $query = "SELECT * FROM notas_ds WHERE dni = ?";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $dni);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $notas = $result->fetch_all(MYSQLI_ASSOC);
            return $this->generarTablaNotasDs($notas);
        } else {
            return "<p>No se encontraron calificaciones para el DNI proporcionado.</p>";
        }
    }

    private function generarTablaNotasDs($notas)
    {
        $html = "<table style='width: 500px; border-collapse: collapse; overflow: hidden; box-shadow: 0 0 20px #0000001a; margin: 20px auto;'>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>DNI</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['dni'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Nombre</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['nombre'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Apellido</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['apellido'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Carrera</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['carrera'] . "</td></tr>";

        $materias = array(
            "Comunicación", "UDI_I", "Matemática", "Administración",
            "Sistemas_Operativos", "Inglés_Técnico_I", "Tecnología_de_la_Administración",
            "Lógica_y_Estructura_de_Datos", "Ingeniería_de_Software_I", "Problemáticas_Socio_Contemporáneas",
            "UDI_II", "Estadística", "Innovación_y_Desarrollo_Emprendedor", "Práctica_Profesionalizante_I",
            "Inglés_Técnico_II", "Programación_I", "Ingeniería_de_Software_II", "Bases_de_Datos_I",
            "Ética_y_Responsabilidad_Social", "Derecho_y_Legislación_Laboral",
            "Práctica_Profesionalizante_II", "Redes_y_Comunicación",
            "Programación_II", "Gestión_de_Proyectos_de_Software", "Bases_de_Datos_II"
        );

        $materiasNombres = array(
            "Comunicación", "UDI I", "Matemática", "Administración",
            "Sistemas Operativos", "Inglés Técnico I", "Tecnología de la Administración",
            "Lógica y Estructura de Datos", "Ingeniería de Software I", "Problemáticas Socio Contemporáneas",
            "UDI II", "Estadística", "Innovación y Desarrollo Emprendedor", "Práctica Profesionalizante I",
            "Inglés Técnico II", "Programación I", "Ingeniería de Software II", "Bases de Datos I",
            "Ética y Responsabilidad Social", "Derecho y Legislación Laboral",
            "Práctica Profesionalizante II", "Redes y Comunicaciones",
            "Programación II", "Gestión de Proyectos de Software", "Bases de Datos II"
        );

        for ($i = 0; $i < count($materiasNombres); $i++) {
            $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>$materiasNombres[$i]</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0][$materias[$i]] . "</td></tr>";
        }
        $html .= "</table>";
        return $html;
    }

    public function crearNotasDs(
        $agregarDni,
        $nombre,
        $apellido,
        $carrera,
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
    ) {

        $query = "INSERT INTO notas_ds (
            dni, nombre, apellido, carrera, Comunicación, UDI_I, Matemática, Administración,
            Sistemas_Operativos, Inglés_Técnico_I, Tecnología_de_la_Administración,
            Lógica_y_Estructura_de_Datos, Ingeniería_de_Software_I, Problemáticas_Socio_Contemporáneas,
            UDI_II, Estadística, Innovación_y_Desarrollo_Emprendedor, Práctica_Profesionalizante_I,
            Inglés_Técnico_II, Programación_I, Ingeniería_de_Software_II, Bases_de_Datos_I,
            Ética_y_Responsabilidad_Social, Derecho_y_Legislación_Laboral,
            Práctica_Profesionalizante_II, Redes_y_Comunicación,
            Programación_II, Gestión_de_Proyectos_de_Software, Bases_de_Datos_II
        ) VALUES ('$agregarDni','$nombre','$apellido','$carrera','$comunicacion', '$udii', '$matematica', '$administracion',
           '$sistemas_operativos', '$ingles_tecnico_i', '$tecnologia_administracion',
           '$logica_estructura_datos', '$ingenieria_software_i', '$problematicas_socio_contemporaneas',
           '$udi_ii', '$estadistica', '$innovacion_desarrollo_emprendedor', '$practica_profesionalizante_i',
           '$ingles_tecnico_ii', '$programacion_i', '$ingenieria_software_ii', '$bases_datos_i',
           '$etica_responsabilidad_social', '$derecho_legislacion_laboral',
           '$practica_profesionalizante_ii', '$redes_y_comunicaciones',
           '$programacion_ii', '$gestion_proyectos_software', '$bases_datos_ii')";

        if ($this->conexion->query($query) == TRUE) {
            echo "<p>Calificaciones agregadas correctamente.<p>";
        } else {
            echo "Error al agregar calificaciones: " . $this->conexion->error;
        }
    }

    public function eliminarNotasDs($eliminarDni)
    {
        $query = "DELETE FROM notas_ds WHERE dni = ?";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $eliminarDni);

        if ($stmt->execute()) {
            echo "<p>Calificaciones eliminadas correctamente.</p>";
        } else {
            echo "Error al eliminar calificaciones: " . $stmt->error;
        }

        $stmt->close();
    }

    public function buscarNotasIti($dni)
    {
        $query = "SELECT * FROM notas_iti WHERE dni = ?";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $dni);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $notas = $result->fetch_all(MYSQLI_ASSOC);
            return $this->generarTablaNotasIti($notas);
        } else {
            return "<p>No se encontraron calificaciones para el DNI proporcionado.</p>";
        }
    }

    private function generarTablaNotasIti($notas)
    {
        $html = "<table style='width: 500px; border-collapse: collapse; overflow: hidden; box-shadow: 0 0 20px #0000001a; margin: 20px auto;'>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>DNI</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['dni'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Nombre</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['nombre'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Apellido</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['apellido'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Carrera</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0]['carrera'] . "</td></tr>";

        $materias = array(
            "Comunicación", "UDI_I", "Matemática", "Física_Aplicada_a_las_Tecnologías_de_la_Infor",
            "Administración", "Inglés_Técnico", "Arquitectura_de_las_Computadoras",
            "Lógica_y_Programación", "Infraestructura_de_Redes_I", "Problemáticas_Socio_Contemporáneas",
            "UDI_II", "Estadística", "Innovación_y_Desarrollo_Emprendedor", "Sistemas_Operativos",
            "Algoritmo_y_Estructura_de_Datos", "Bases_de_Datos", "Infraestructura_de_Redes_II", "Práctica_Profesionalizante_I",
            "Ética_y_Responsabilidad_Social", "Derecho_y_Legislación_Laboral",
            "Administración_de_Bases_de_Datos", "Seguridad_de_los_Sistemas",
            "Integridad_y_Migración_de_Datos", "Administración_de_Sistemas_Operativos_y_Redes", "Práctica_Profesionalizante_II"
        );

        $materiasNombres = array(
            "Comunicación", "UDI I", "Matemática", "Física Aplicada a las Tecnologías de la Infor",
            "Administración", "Inglés Técnico", "Arquitectura de las Computadoras",
            "Lógica y Programación", "Infraestructura de Redes I", "Problemáticas Socio Contemporáneas",
            "UDI II", "Estadística", "Innovación y Desarrollo Emprendedor", "Sistemas Operativos",
            "Algoritmo y Estructura de Datos", "Bases de Datos", "Infraestructura de Redes II", "Práctica Profesionalizante I",
            "Ética y Responsabilidad Social", "Derecho y Legislación Laboral",
            "Administración de Bases de Datos", "Seguridad de los Sistemas",
            "Integridad y Migración de Datos", "Administración de Sistemas Operativos y Redes", "Práctica Profesionalizante II"
        );

        for ($i = 0; $i < count($materiasNombres); $i++) {
            $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>$materiasNombres[$i]</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $notas[0][$materias[$i]] . "</td></tr>";
        }
        $html .= "</table>";
        return $html;
    }

    public function crearNotasIti(
        $agregarDni,
        $nombre,
        $apellido,
        $carrera,
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
    ) {

        $query = "INSERT INTO notas_iti (
            dni, nombre, apellido, carrera, Comunicación, UDI_I, Matemática, Física_Aplicada_a_las_Tecnologías_de_la_Infor,
            Administración, Inglés_Técnico, Arquitectura_de_las_Computadoras,
            Lógica_y_Programación, Infraestructura_de_Redes_I, Problemáticas_Socio_Contemporáneas,
            UDI_II, Estadística, Innovación_y_Desarrollo_Emprendedor, Sistemas_Operativos,
            Algoritmo_y_Estructura_de_Datos, Bases_de_Datos, Infraestructura_de_Redes_II, Práctica_Profesionalizante_I,
            Ética_y_Responsabilidad_Social, Derecho_y_Legislación_Laboral,
            Administración_de_Bases_de_Datos, Seguridad_de_los_Sistemas,
            Integridad_y_Migración_de_Datos, Administración_de_Sistemas_Operativos_y_Redes, Práctica_Profesionalizante_II
        ) VALUES ('$agregarDni',
            '$nombre','$apellido','$carrera','$comunicacion', '$udi_i', '$matematica', '$fisica_aplicada', '$administracion', '$ingles_tecnico', '$arquitectura_computadoras', 
            '$logica_programacion', '$infraestructura_redes_i', '$problematicas_sociales', '$udi_ii', '$estadistica', '$innovacion_desarrollo', '$sistemas_operativos', 
            '$algoritmo_estructura_datos', '$bases_datos', '$infraestructura_redes_ii', '$practica_profesionalizante_i', '$etica_responsabilidad_social', 
            '$derecho_legislacion_laboral', '$admin_bases_datos', '$seguridad_sistemas', '$integridad_migracion_datos', '$admin_sistemas_operativos_redes', 
            '$practica_profesionalizante_ii')";

        if ($this->conexion->query($query) == TRUE) {
            echo "<p>Calificaciones agregadas correctamente.<p>";
        } else {
            echo "Error al agregar calificaciones: " . $this->conexion->error;
        }
    }

    public function eliminarNotasIti($eliminarDni)
    {
        $query = "DELETE FROM notas_iti WHERE dni = ?";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $eliminarDni);

        if ($stmt->execute()) {
            echo "<p>Calificaciones eliminadas correctamente.</p>";
        } else {
            echo "Error al eliminar calificaciones: " . $stmt->error;
        }

        $stmt->close();
    }

}
?>