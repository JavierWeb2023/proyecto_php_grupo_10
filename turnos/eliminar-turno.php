<?php

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}

include('../assets/includes/conexion.php');

$id=$_REQUEST["id"];
$sql = "DELETE FROM turnos WHERE id = '$id'";
$result=mysqli_query($conn, $sql);
header("Location: index.php?mensaje=El turno ha sido eliminado.");

?>