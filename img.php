<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: inicio_sesion.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style0.css">
    <title>Galería de Imágenes</title>
</head>



<body >
    <header>
        <ul>
            <li><a href="index.php"> Registrarse </a> </li>
            <li><a href="inicio_sesion.php"> Inicio de Sesion </a> </li>
            <li><a href="img.php"> Galeria </a> </li>
            <li><a href="cerrar.php"> Cerrar </a> </li>
        </ul>
    </header>
    <div class="header">
        <div class="titulo">
            <h1>Galería de Imágenes</h1>
        </div>
        <div class="archivo">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input class="file" type="file" name="file">
                <button type="submit" name="submit">Subir Imagen</button>
            </form>
        </div>
    </div>
    <div class="gallery">
        <?php
        $images = glob('images/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        foreach ($images as $image) {
            echo '<img src="' . $image . '" alt="' . basename($image) . '">';
            echo '<form action="delete.php" method="post">';
            echo '<input type="hidden" name="filename" value="' . $image . '">';
            echo '<button class="btn" type="submit" name="submit">Eliminar</button>';
            echo '</form>';
        }
        ?>
    </div>
    <footer>
        <p>Jose David Custodio Vega</p>
    </footer>
</body>

</html>