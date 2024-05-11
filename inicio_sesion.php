<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
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
        <h1>Iniciar sesión</h1>
        <br>
        <label for="email" id="referencia">Usuario:</label><br>
        <input type="text" id="cuadro" name="email" required><br><br>
        <label for="password" id="referencia">Contraseña:</label><br>
        <input type="password" id="cuadro" name="password" required><br><br>
        <input type="submit" value="  Iniciar  " id="boton">

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $archivo = 'usuario.json';
            $json = file_get_contents($archivo);
            $archivojson = json_decode($json, true);
            if (array_key_exists($_POST['email'], $archivojson) && $archivojson[$_POST['email']] == $_POST['password']) {
                $_SESSION['loggedin'] = true;
                header("Location: img.php");
                exit;
               
            }

        }


        ?>



    </form>

</body>


</html>