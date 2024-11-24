<?php

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}

include('../assets/includes/conexion.php');

$stmt = $conn->prepare('SELECT nombre, apellido, email, usuario, imagen FROM usuarios WHERE id = ?');

$stmt->bind_param('i', $_SESSION['userid']);
$stmt->execute();
$stmt->bind_result($nombre, $apellido, $email, $usuario, $imagen);
$stmt->fetch();
$stmt->close();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERFIL DEL USUARIO</title>
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

    <div class="content">
        <h2>Informaci&oacute;n del Usuario</h2>
        <div>
            <p>La siguiente es la informaci&oacute;n registrada de tu cuenta</p>
            <table>
                <tr>
                    <td>
                        <table class="centrado">
                            <tr>
                                <td>
                                    <img class="foto-perfil" src="<?= $imagen ?>" alt="Perfil">
                                </td>
                            </tr>
                            <tr>
                                <td><a href="subir_foto.php"><button type="button" class="btn btn-success">A&Ntilde;ADIR FOTO</button></a></td>
                            </tr>
                            <tr>
                                <td><a href="eliminar_foto.php"><button type="button" class="btn btn-success">ELIMINAR FOTO</button></a></td>
                            </tr>
                        </table>  
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>Variable de sesi&oacute;n:</td>
                                <td><?= session_id() ?></td>
                            </tr>
                            <tr>
                                <td>Nombre:</td>
                                <td><?= $nombre ?></td>
                            </tr>
                            <tr>
                                <td>Apellido:</td>
                                <td><?= $apellido ?></td>
                            </tr>
                            <tr>
                                <td>Usuario:</td>
                                <td><?= $usuario ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?= $email ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <a href="modificar.php?id=<?= $_SESSION['userid']; ?>"><button type="button" class="btn btn-success">MODIFICAR DATOS</button></a>
                                    <a href="modificar-clave.php"><button type="button" class="btn btn-success">MODIFICAR CONTRASE&Ntilde;A</button></a>
                                    <a href="eliminar.php?id=<?= $_SESSION['userid']; ?>"><button type="button" class="btn btn-success">ELIMINAR USUARIO</button></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
