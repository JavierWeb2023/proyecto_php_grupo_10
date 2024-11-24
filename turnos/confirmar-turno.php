<?php

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}

include('../assets/includes/conexion.php');

extract($_POST);

$sql = "INSERT INTO turnos (nombre, apellido, tramite, fecha, horario, id_cliente) VALUES ('$nombre', '$apellido', '$tramite', '$fecha', '$horario', '$id_cliente')";

$result=mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONFIRMACI&Oacute;N DE TURNO</title>
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

    <div class="container-fluid confirm-turno">
        <div class="row">
            <div class="col">
                <h1 class="centrado">NUEVO TURNO</h1>
            </div>
        </div>
    </div>

    <div class="content">
        <div>
            <p>Se ha generado el siguiente turno</p>
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><?= $nombre ?></td>
                </tr>
                <tr>
                    <td>Apellido:</td>
                    <td><?= $apellido ?></td>
                </tr>
                <tr>
                    <td>Trámite:</td>
                    <td><?= $tramite ?></td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td><?= $fecha ?></td>
                </tr>
                <tr>
                    <td>Horario:</td>
                    <td><?= $horario ?></td>
                </tr>
            </table>
        </div>
    </div>

<?php 
$conn->close();
?>

    <div class="container centrado">
        <div class="row">
            <div class="col">
            <a href="index.php"><button class="btn btn-success">VOLVER</button></a>
            </div>
        </div>
    </div>

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>