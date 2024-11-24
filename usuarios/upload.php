<?php

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}

$id = $_SESSION['userid'];

include('../assets/includes/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo es una imagen real
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            header("Location: subir_foto.php?mensaje=El archivo no es una imagen.");
        }
    }

    // Verificar si el archivo ya existe
    if (file_exists($target_file)) {
        $uploadOk = 0;
        header("Location: subir_foto.php?mensaje=Lo siento, el archivo ya existe.");
    }

    // Verificar el tamaño del archivo
    if ($_FILES["file"]["size"] > 500000) { // 500 KB
        $uploadOk = 0;
        header("Location: subir_foto.php?mensaje=Lo siento, tu archivo es demasiado grande.");
    }

    // Permitir ciertos formatos de archivo
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uploadOk = 0;
        header("Location: subir_foto.php?mensaje=Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF..");
    }

    // Verificar si $uploadOk es 0 debido a un error
    if ($uploadOk == 0) {
        header("Location: subir_foto.php?mensaje=Lo siento, tu archivo no fue subido.");
    // Intentar subir el archivo
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $sql = "UPDATE usuarios SET imagen = '$target_file' WHERE id = '$id'";

            $result=mysqli_query($conn, $sql);
            header("Location: perfil.php");
        } else {
            header("Location: subir_foto.php?mensaje=Lo siento, hubo un error al subir tu archivo.");
        }
    }
}
?>
