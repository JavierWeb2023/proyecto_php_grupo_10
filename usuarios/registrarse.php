<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR USUARIO</title>
    <link rel="icon" href="../assets/images/favicon.webp" sizes="32x32">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <script src="https://kit.fontawesome.com/ba8d58fd8a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- =============== HEADER =============== -->
     
    <?php
    include '../assets/includes/header.php';
    ?>

    <!-- =============== FIN DEL HEADER =============== -->


    <div class="login">
        <h2>REGISTRARSE</h2>
        <form action="create-user.php" method="post" enctype="multipart/form-data">
            <label for="nombre"><i class="fa-solid fa-id-card"></i></label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>

            <label for="apellido"><i class="fa-solid fa-id-card"></i></label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>

            <label for="email"><i class="fa-solid fa-envelope"></i></label>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <label for="usuario"><i class="fa-solid fa-user"></i></label>
            <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>

            <label for="clave"><i class="fa-solid fa-lock"></i></label>
            <input type="password" id="clave" name="clave" placeholder="Contrse&ntilde;a" required>

            <input type="submit" value="CREAR USUARIO">
        </form>
    </div>

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
