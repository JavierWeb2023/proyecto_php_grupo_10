<?php

session_start();

include('../assets/includes/conexion.php');

if (( isset($_POST['Modificar']))) {
    
    extract($_POST);

    $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email' WHERE id='$id'";

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
    <title>MODIFICAR USUARIO</title>
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
                <h1>MODIFICAR USUARIO</h1>
            </div>
        </div>
    </div>
    <div class="login">
        <h2>MODIFICAR</h2>
        <?php
        $id=$_REQUEST["id"];
        $sql="SELECT * FROM usuarios WHERE id='$id'";
        $result=mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        ?>
        <form action="modificar.php" method="POST" enctype="multipart/form-data">
            <label for="nombre"><i class="fa-solid fa-id-card"></i></label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row["nombre"]; ?>" required>

            <input name="id" type="hidden" value="<?php echo $row["id"]; ?>">

            <label for="apellido"><i class="fa-solid fa-id-card"></i></label>
            <input type="text" id="apellido" name="apellido" value="<?php echo $row["apellido"]; ?>" required>

            <label for="email"><i class="fa-solid fa-envelope"></i></label>
            <input type="text" id="email" name="email" value="<?php echo $row["email"]; ?>" required>

            <input type="submit" name="Modificar" value="MODIFICAR USUARIO">
        </form>
    </div>

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
