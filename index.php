<?php
include('assets/includes/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIAR SESI&Oacute;N</title>
    <link rel="icon" href="assets/images/favicon.webp" sizes="32x32">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <script src="https://kit.fontawesome.com/ba8d58fd8a.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- =============== HEADER =============== -->
    <?php
    include 'assets/includes/header.php';
    ?>

    <!-- =============== FIN DEL HEADER =============== -->



    <!-- =============== SECCIÓN 1 =============== -->
    
    <div class="container centrado">
        <div class="row">
            <div class="col">
                <img class="logo" src="" alt="">
                <h1>BIENVENIDOS AL GENERADOR DE TURNOS</h1>
            </div>
        </div>
    </div>
    <div class="login">
        <h2>LOGIN</h2>
        <form action="usuarios/login.php" method="post" enctype="multipart/form-data">
            <label for="usuario"><i class="fa-solid fa-user"></i></label>
            <input type="text" name="usuario" placeholder="Usuario" id="usuario" required>

            <label for="clave"><i class="fa-solid fa-lock"></i></label>
            <input type="password" name="clave" placeholder="Contraseña" id="clave" required>
            <input type="submit" value="ACCEDER">
        </form>
    </div>
    <div class="row centrado">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="row">
                <div class="col-6"><p>¿No tienes una cuenta?</p></div>
                <div class="col-6"><a href="usuarios/registrarse.php"><button class="btn btn-success">REGISTRARSE</button></a></div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>


    <!-- =============== FIN DEL SECCIÓN 1 =============== -->



    <!-- =============== FOOTER =============== -->

    <?php include 'assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
