<?php
if(isset($_POST['submit'])){
    $file = $_FILES['file'];

    // Nombre y ubicación del archivo
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Manejo de errores
    if($fileError === 0){
        $fileDestination = 'images/' . $fileName;
        move_uploaded_file($fileTmpName, $fileDestination);
        header("Location: img.php?uploadsuccess");
    } else {
        echo "Hubo un error al subir el archivo.";
    }
}
?>
