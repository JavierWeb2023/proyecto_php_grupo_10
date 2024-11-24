<?php

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}

include('../assets/includes/conexion.php');

if ((isset($_POST['MODIFICAR']))) {
    
    extract($_POST);

    $sql = "UPDATE turnos SET tramite='$tramite', fecha='$fecha', horario='$horario' WHERE id='$id'";

    $result=mysqli_query($conn, $sql);

    header("Location: index.php");
}


$turno=$_REQUEST["id"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICACI&Oacute;N DE TURNO</title>
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
    include '../assets/includes/headerlog.php';
    ?>

    <!-- =============== FIN DEL HEADER =============== -->

    
    <div class="container centrado">
        <div class="row">
            <div class="col">
                <div class="login">
                    <h2>MODIFICAR TURNO</h2>
                    <?php
                    $sql = "SELECT * FROM turnos WHERE id=$turno";
                    $result=mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <form action="modificar-turno.php" method="POST" enctype="multipart/form-data">
                        <input name="id" type="hidden" value="<?php echo $row['id']; ?>">

                        <label for="tramite"><i class="fa-solid fa-user"></i></label>
                        <input type="text" name="tramite" id="tramite" value="<?php echo $row['tramite']; ?>" required>

                        <label for="fecha"><i class="fa-solid fa-lock"></i></label>
                        <input type="date" name="fecha" id="fecha" value="<?php echo $row['fecha']; ?>" required>

                        <label for="horario"><i class="fa-solid fa-lock"></i></label>
                        <input type="time" name="horario" id="horario" value="<?php echo $row['horario']; ?>" required>

                        <input type="submit" name="MODIFICAR" value="ENVIAR">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
