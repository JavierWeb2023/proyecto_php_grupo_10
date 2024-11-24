<?php

include('../assets/includes/conexion.php');

$id=$_REQUEST["id"];
$sql = "UPDATE usuarios SET activo = 0 WHERE id = '$id'";
$result=mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELIMINACI&Oacute;N DE USUARIO</title>
    <link rel="icon" href="../assets/images/favicon.webp" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="robots" content="noindex, nofollow">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/estilos.css" rel="stylesheet">
</head>

<body>
    
    <!-- =============== HEADER =============== -->
    <?php
    include '../assets/includes/header.php';
    ?>

    <!-- =============== FIN DEL HEADER =============== -->

    <div class="container centrado">
        <div class="row">
            <div class="col">
                <img class="logo" src="" alt="">
                <h1>ELIMINACI&Oacute;N DE USUARIO</h1>
            </div>
        </div>
    </div>
    <div class="content centrado">
        <div class="row">
            <div class="col">
                <p>USUARIO ELIMINADO</p>
            </div>
        </div>
    </div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
