<?php
if(isset($_POST['submit'])){
    $filename = $_POST['filename'];

    if(file_exists($filename)){
        unlink($filename);
        header("Location: img.php?deletesuccess");
    } else {
        echo "El archivo no existe.";
    }
}
?>