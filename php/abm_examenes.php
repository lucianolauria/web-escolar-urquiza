<?php
class ExamenesDB
{
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

    public function buscarExamenes($carrera)
    {
        $query = "SELECT * FROM examenes_$carrera ORDER BY Año";
        $resultado = $this->conexion->query($query);

        if ($carrera == "ds") {
            echo "<h3>Desarrollo de Software</h3>";
        } else if ($carrera == "af") {
            echo "<h3>Analista Funcional</h3>";
        } else if ($carrera == "iti") {
            echo "<h3>ITI</h3>";
        }

        if ($resultado->num_rows > 0) {
            echo "<table style='width: 500px; border-collapse: collapse; overflow: hidden; box-shadow: 0 0 20px #0000001a; margin: 20px auto;'>";
            echo "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>
                    <th style='background-color: #3e5064; border: 2px solid black;'>Año</th>
                    <th style='background-color: #3e5064; border: 2px solid black;'>Fecha</th>
                    <th style='background-color: #3e5064; border: 2px solid black;'>Materia</th>
                  </tr>";

            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>";
                echo "<td style='background-color: #ffffff33; padding: 13px; color: black; border: 2px solid black;'>" . $fila['Año'] . "</td>";
                echo "<td style='background-color: #ffffff33; padding: 13px; color: black; border: 2px solid black;'>" . $fila['Fecha'] . "</td>";
                echo "<td style='background-color: #ffffff33; padding: 13px; color: black; border: 2px solid black;'>" . $fila['Materia'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron registros en la tabla.";
        }
    }

    public function inscripcionExamenes(
        $dni,
        $nombre,
        $apellido,
        $carreraInscripcion,
        $uc,
        $correo
    ) {

        $query = "INSERT INTO inscripcion_examenes (
            dni, nombre, apellido, uc, carrera, correo
        ) VALUES ('$dni', '$nombre', '$apellido', '$uc', '$carreraInscripcion', '$correo')";

        if ($this->conexion->query($query) == TRUE) {
            echo "<p>Se ha inscripto correctamente.<p>";
        } else {
            echo "Error al inscribirse: " . $this->conexion->error;
        }
    }

    public function enviarNotificaciones($examenes)
    {
        $fechaActual = date('Y-m-d');

        while ($fila = $examenes->fetch_assoc()) {
            $fechaExamen = $fila['Fecha'];
            $fechaLimiteNotificacion = $fila['fecha_limite_notificacion'];
            $materia = $fila['Materia'];

            if ($fechaLimiteNotificacion >= $fechaActual && $fechaLimiteNotificacion <= $fechaExamen) {

                $query = "SELECT correo FROM inscripcion_examenes";
                $result = $this->conexion->query($query);

                if ($result->num_rows > 0) {
                    while ($alumno = $result->fetch_assoc()) {
                        $destinatario = $alumno['correo'];
                        $asunto = "Recordatorio de Examen - $materia";
                        $mensaje = "Estimado alumno, el examen de $materia está programado para el $fechaExamen. ¡Prepárate bien!";

                        if (mail($destinatario, $asunto, $mensaje)) {
                            echo "Correo enviado correctamente a $destinatario para el examen de $materia.";
                        } else {
                            echo 'Error al enviar el correo.';
                        }
                    }
                } else {
                    echo "No hay alumnos registrados para la carrera actual.";
                }
            }
        }
    }
}
