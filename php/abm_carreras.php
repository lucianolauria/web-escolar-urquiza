<?php
class Carreras {
    private static $host = "localhost";
    private static $usuario = "root";
    private static $contrasena = "";
    protected $baseDatos = "urquiza";
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli(self::$host, self::$usuario, self::$contrasena, $this->baseDatos);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }
    
    public function mostrarUc($carrera) {
        $query = "SELECT * FROM ucs_$carrera ORDER BY año_uc";
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
                    <th style='background-color: #3e5064; border: 2px solid black;'>ID</th>
                    <th style='background-color: #3e5064; border: 2px solid black;'>Nombre</th>
                    <th style='background-color: #3e5064; border: 2px solid black;'>Año</th>
                    <th style='background-color: #3e5064; border: 2px solid black;'>Tipo</th>
                    <th style='background-color: #3e5064; border: 2px solid black;'>FS</th>
                  </tr>";
    
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>";
                echo "<td style='background-color: #ffffff33; padding: 13px; color: black; border: 2px solid black;'>" . $fila['id_uc'] . "</td>";
                echo "<td style='background-color: #ffffff33; padding: 13px; color: black; border: 2px solid black;'>" . $fila['nombre_uc'] . "</td>";
                echo "<td style='background-color: #ffffff33; padding: 13px; color: black; border: 2px solid black;'>" . $fila['año_uc'] . "</td>";
                echo "<td style='background-color: #ffffff33; padding: 13px; color: black; border: 2px solid black;'>" . $fila['tipo_uc'] . "</td>";
                echo "<td style='background-color: #ffffff33; padding: 13px; color: black; border: 2px solid black;'>" . $fila['fs_uc'] . "</td>";
                echo "</tr>";
            }
    
            echo "</table>";
        } else {
            echo "No se encontraron registros en la tabla ucs_af.";
        }
    }

    public function mostrarCorrelativas($correlativas) {
        $query = "SELECT * FROM correlativas_$correlativas";
        $resultado = $this->conexion->query($query);

        if ($correlativas == "ds") {
            echo "<h3>Desarrollo de Software</h3>";
        } else if ($correlativas == "af") {
            echo "<h3>Analista Funcional</h3>";
        } else if ($correlativas == "iti") {
            echo "<h3>ITI</h3>";
        }

        if ($resultado->num_rows > 0) {
            echo "<table style='width: 500px; border-collapse: collapse; overflow: hidden; box-shadow: 0 0 20px #0000001a; margin: 20px auto;'>";
            echo "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>
                    <th style='background-color: #3e5064; border: 2px solid black;'>Para rendir:</th>
                    <th style='background-color: #3e5064; border: 2px solid black;'>Debe aprobar:</th>
                  </tr>";
    
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr style='color: #e0e1dd; border: 2px solid black;'><th style='background-color: #3e5064; border: 2px solid black;'>";
                echo "<td style='background-color: #ffffff33; padding: 13px; color: black; border: 2px solid black;'>" . $fila['para_rendir'] . "</td>";
                echo "<td style='background-color: #ffffff33; padding: 13px; color: black; border: 2px solid black;'>" . $fila['debe_aprobar'] . "</td>";
                echo "</tr>";
            }
    
            echo "</table>";
        } else {
            echo "No se encontraron registros.";
        }
    }
}
?>