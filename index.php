<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cRegistrarse</title>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
    <header>
        <ul>
            <li><a href="index.php"> Registrarse </a> </li>
            <li><a href="inicio_sesion.php"> Inicio de Sesion </a> </li>
            <li><a href="img.php"> Galeria </a> </li>
            <li><a href="cerrar.php"> Cerrar </a> </li>
        </ul>
    </header>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="formato">
        <h1>Nuevo Usuario</h1>
        <br>
        <label for="email" id="referencia">Nuevo usuario:</label><br>
        <input type="text" id="cuadro" name="email"><br><br>
        <label for="password" id="referencia">Nueva contraseña:</label><br>
        <input type="password" id="cuadro" name="password"><br><br>
        <label for="password" id="referencia"> Confirma contraseña:</label><br>
        <input type="password" id="cuadro" name="password"><br><br>
        <input type="submit" name="registrar" value="Registrar" id="boton"><br>
        <?php
        if (isset($_POST['registrar'])) {
            if (empty($_POST['email']) || empty($_POST['password'])) {
                echo '<h3> Ingresa datos  </h3>';
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo '<h3> Ingresa email valido </h3>';
            } else {
                $archivo = 'usuario.json';
                $json = file_get_contents($archivo);
                $archivojson = (json_decode($json, true));
                $archivojson[$_POST['email']] = $_POST['password'];
                file_put_contents($archivo, json_encode($archivojson));
                echo '<h2> Guardado Exitoso </h2>';
            }
        }
        ?>
    </form>

</body>

</html>