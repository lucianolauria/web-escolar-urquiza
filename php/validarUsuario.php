<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

session_start();

$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "urquiza");

$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' and contraseña = '$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas !== null && isset($filas['rol'])) {
    if ($filas['rol'] == 1) {
        header("location: ../interfaces/notasConsultas.php");
    } else if ($filas['rol'] == 2 or $filas['rol'] == 3 or $filas['rol'] == 4) {
        header("location: ../interfaces/infoAlumnos.php");
    }
} else {
    echo "<h1>Error: el usuario o contraseña es incorrecto.</h1>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>