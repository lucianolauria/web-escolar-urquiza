<?php
class infoAlumnosDB {
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

    public function buscarAlumnos($dni)
    {
        $query = "SELECT * FROM alumnos WHERE dni = ?";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $dni);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $alumnos = $result->fetch_all(MYSQLI_ASSOC);
            return $this->generarTablaAlumnos($alumnos);
        } else {
            return "<p>No se encontraron alumnos para el DNI proporcionado.</p>";
        }
    }

    private function generarTablaAlumnos($alumnos)
    {
        $html = "<table style='width: 500px; border-collapse: collapse; overflow: hidden; box-shadow: 0 0 20px #0000001a; margin: 20px auto;'>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>DNI</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $alumnos[0]['dni'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Nombre</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $alumnos[0]['nombre'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Apellido</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $alumnos[0]['apellido'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Carrera</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $alumnos[0]['carrera'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Direccion</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $alumnos[0]['direccion'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Email</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $alumnos[0]['email'] . "</td></tr>";
        $html .= "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>Fecha Nacimiento</th><td style='background-color: #ffffff33; padding: 13px; color: black;'>" . $alumnos[0]['fecha_nac'] . "</td></tr>";

        $html .= "</table>";
        return $html;
    }

    public function crearAlumno(
        $agregarDni,
        $nombre,
        $apellido,
        $carrera,
        $direccion,
        $email,
        $fecha_nac
    ) {

        $query = "INSERT INTO alumnos (
            dni, nombre, apellido, carrera, direccion, email, fecha_nac
        ) VALUES ('$agregarDni', '$nombre', '$apellido', '$carrera', '$direccion', '$email', '$fecha_nac')";

        if ($this->conexion->query($query) == TRUE) {
            echo "<p>Alumnos agregados correctamente.<p>";
        } else {
            echo "Error al agregar alumnos: " . $this->conexion->error;
        }
    }

    public function eliminarAlumnos($eliminarDni)
    {
        $query = "DELETE FROM alumnos WHERE dni = ?";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $eliminarDni);

        if ($stmt->execute()) {
            echo "<p>Alumno eliminado correctamente.</p>";
        } else {
            echo "Error al eliminar alumno: " . $stmt->error;
        }

        $stmt->close();
    }
}






?>