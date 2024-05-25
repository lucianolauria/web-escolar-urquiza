<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/interfaces.css" />
  <title>Notas</title>
</head>

<body>
  <div class="container">
    <div class="menu">
      <p class="logo">Urquiza <span>Alumnos</span></p>
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
          <li><a href="notasConsultas.php">Notas</a></li>
          <li><a href="carreras.php">Carreras</a></li>
          <li><a href="horarios.php">Horarios</a></li>
          <li><a href="examenesConsultas.php">Examenes</a></li>
        </ul>
      </nav>

      <div class="abm">

          <div class="imgDS">
            <h2><i>Desarrollo de Software</i></h2>
            <p>Al pasar el mouse se hará zoom.</p>
            <img src="../img/ds_1.png" class="imagen" alt="">
            <img src="../img/ds_2.png" class="imagen" alt="">
          </div>

          <div class="imgAF">
            <h2><i>Analista Funcional</i></h2>
            <p>Al pasar el mouse se hará zoom.</p>
            <img src="../img/af_1.png" class="imagen" alt="">
            <img src="../img/af_2.png" class="imagen" alt="">
          </div>

          <div class="imgITI">
            <h2><i>ITI</i></h2>
            <p>Al pasar el mouse se hará zoom.</p>
            <img src="../img/iti_1.png" class="imagen" alt="">
            <img src="../img/iti_2.png" class="imagen" alt="">
          </div>

      </div>
    </div>

    <script>
      const imagenes = document.querySelectorAll('.imagen');

      imagenes.forEach((imagen) => {
        imagen.addEventListener('mouseenter', () => {
          imagen.classList.add('imagen-ampliada');
        });

        imagen.addEventListener('mouseleave', () => {
          imagen.classList.remove('imagen-ampliada');
        });
      });
    </script>
</body>

</html>