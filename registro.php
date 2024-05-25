<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Urquiza - Sistema de Gestión Académica</title>
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
    <div class="container">
        <nav class="menu">
            <p class="logo">Urquiza <span>Sistema</span></p>
            <ul>
                <li><a href="registro.php">Registrarse</a></li>
                <li><a class="login" href="index.php">Iniciar sesión</a></li>
            </ul>
        </nav>

        <div class="dashboard">
            <div class="abm">
                <div class="agregarAbm">
                    <p>Registro:</p>
                    <form action="" method="get">
                        <label>DNI</label>
                        <input type="number" name="dni" required><br>

                        <label>Nombre</label>
                        <input type="text" name="nombre" required><br>

                        <label>Apellido</label>
                        <input type="text" name="apellido" required><br>

                        <label>Usuario</label>
                        <input type="text" name="usuario" required><br>

                        <label>Contraseña</label>
                        <input type="password" name="contrasenia" required><br>

                        <label>Dirección</label>
                        <input type="text" name="direccion" required><br>

                        <label>Email</label>
                        <input type="text" name="email" required><br>

                        <label>Fecha Nacimiento</label>
                        <input type="text" name="fecha_nac" placeholder="Año-Mes-Día" required><br>

                        <select name="rol" id="rol">
                            <option value="1">Alumno</option>
                            <option value="2">Profesor</option>
                            <option value="3">Directivo</option>
                            <option value="4">Bedelía</option>
                        </select>

                        <button type="submit">¡Registrarse!</button>
                    </form>

                    <?php
                    if (isset($_GET['dni'])) {
                        require_once("php/abm_registro.php");
                        $registrarse = new RegistroDB();
                        $dni = $_GET['dni'];
                        $nombre = $_GET['nombre'];
                        $apellido = $_GET['apellido'];
                        $usuario = $_GET['usuario'];
                        $contraseña = $_GET['contrasenia'];
                        $direccion = $_GET['direccion'];
                        $email = $_GET['email'];
                        $fecha_nac = $_GET['fecha_nac'];
                        $rol = $_GET['rol'];

                        $resultado = $registrarse->registrarse(
                            $dni,
                            $nombre,
                            $apellido,
                            $usuario,
                            $contraseña,
                            $direccion,
                            $email,
                            $fecha_nac,
                            $rol
                        );
                    } ?>
                </div>

            </div>
        </div>

    </div>
</body>

</html>