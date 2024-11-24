<?php

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBIR FOTO DE PERFIL</title>
    <link rel="icon" href="../assets/images/favicon.webp" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="robots" content="noindex, nofollow">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/estilos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ba8d58fd8a.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <!-- =============== HEADER =============== -->
    <?php
    include '../assets/includes/headerlog.php';
    ?>

    <!-- =============== FIN DEL HEADER =============== -->

    <div class="login upimages">
        <h2>SUBIR IMAGEN</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" name="file" class="form-control" id="inputGroupFile01">
            </div>
            <input type="submit" value="SUBIR IMAGEN" name="submit">
        </form>
    </div>

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
