<?php

class RegistroDB
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

    public function registrarse(
        $dni,
        $nombre,
        $apellido,
        $usuario,
        $contraseña,
        $direccion,
        $email,
        $fecha_nac,
        $rol
    ) {

        $query = "INSERT INTO usuarios (
            dni, nombre, apellido, usuario, contraseña, direccion, email, fecha_nac, rol
        ) VALUES ('$dni', '$nombre', '$apellido', '$usuario', '$contraseña', '$direccion', '$email', '$fecha_nac', '$rol')";

        if ($this->conexion->query($query) == TRUE) {
            echo "<p>Registrado correctamente.<p>";
        } else {
            echo "Error al registrarse: " . $this->conexion->error;
        }
    }
}
