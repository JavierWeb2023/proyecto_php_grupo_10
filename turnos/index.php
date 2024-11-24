<?php

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}

include('../assets/includes/conexion.php');

$idusuario=$_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TURNERA</title>
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
    include '../assets/includes/headerlog.php';
    ?>

    <!-- =============== FIN DEL HEADER =============== -->


    <!-- =============== SECCIÓN 1 =============== -->

    <section>
        <div class="container centrado">
            <div class="row">
                <div class="col">
                    <div class="login">
                        <h2>CREAR TURNO</h2>
                        <form action="confirmar-turno.php" method="POST" enctype="multipart/form-data">
                            <input name="nombre" type="hidden" value="<?php echo $_SESSION['username']; ?>">

                            <input name="apellido" type="hidden" value="<?php echo $_SESSION['surename']; ?>">

                            <label for="tramite"><i class="fa-solid fa-file-contract"></i></label>
                            <select name="tramite" id="tramite">
                                <?php
                                include '../assets/includes/funciones.php';
                                Tramites();
                                ?>
                            </select>

                            <label for="fecha"><i class="fa-solid fa-calendar-days"></i></label>
                            <input type="date" name="fecha" id="fecha" required>

                            <label for="horario"><i class="fa-regular fa-clock"></i></label>
                            <input type="time" name="horario" id="horario" required>

                            <input name="id_cliente" type="hidden" value="<?php echo $idusuario; ?>">

                            <input type="submit" value="ENVIAR">
                        </form>
                    </div>
                    <a href="../api/read.php?id=<?php echo $idusuario; ?>"><button class="btn btn-success">VER TURNOS EN FORMATO JSON</button></a>
                </div>
            </div>
        </div>
    </section>

    <!-- =============== FIN DE SECCIÓN 1 =============== -->


    <!-- =============== SECCIÓN 2 =============== -->

    <section>
        <div class="container centrado">
            <div class="row encabezado">
                <div class="col-2"><p>TR&Aacute;MITE</p></div>
                <div class="col-2"><p>FECHA</p></div>
                <div class="col-2"><p>HORARIO</p></div>
                <div class="col-2"><p>MODIFICAR</p></div>
                <div class="col-2"><p>ELIMINAR</p></div>
                <div class="col-2"></div>
            </div>
            <?php
            $sql = "SELECT * FROM turnos WHERE id_cliente=$idusuario";
            $result=mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
            ?>
            <div class="row turno">
                <div class="col-2"><?php echo $row['tramite']; ?></div>
                <div class="col-2"><?php echo $row['fecha']; ?></div>
                <div class="col-2"><?php echo $row['horario']; ?></div>
                <div class="col-2"><a href="modificar-turno.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success">MODIFICAR</button></a></div>
                <div class="col-2"><a href="eliminar-turno.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success">ELIMINAR</button></a></div>
                <div class="col-2"></div>
            </div>
            <?php
            }
            ?>
        </div>
    </section>

    <!-- =============== FIN DE SECCIÓN 2 =============== -->



    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->


    <script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
