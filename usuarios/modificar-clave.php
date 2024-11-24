<?php

session_start();

include('../assets/includes/conexion.php');

if (( isset($_POST['Modificar']))) {
    
    $password = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    $id=$_SESSION['userid'];

    $sql = "UPDATE usuarios SET clave='$password' WHERE id='$id'";

    $result=mysqli_query($conn, $sql);

    header("Location: perfil.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR CONTRASE&Ntilde;A</title>
    <link rel="icon" href="../assets/images/favicon.webp" sizes="32x32">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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


    <div class="container centrado">
        <div class="row">
            <div class="col">
                <img class="logo" src="" alt="">
                <h1>MODIFICAR CONTRASE&Ntilde;A</h1>
            </div>
        </div>
    </div>
    <div class="login">
        <h2>INGRESE LA NUEVA CONTRASE&Ntilde;A</h2>
        <form action="modificar-clave.php" method="POST" enctype="multipart/form-data">

            <label for="clave"><i class="fa-solid fa-lock"></i></label>
            <input type="password" id="clave" name="clave" placeholder="Contraseña" required>

            <input type="submit" name="Modificar" value="MODIFICAR">
        </form>
    </div>

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
