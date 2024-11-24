<?php

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}

$id = $_SESSION['userid'];

include('../assets/includes/conexion.php');

$sql = "SELECT imagen FROM usuarios WHERE id = $id";

$result=mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$archivo = $row['imagen'];

unlink($archivo);

$sql2 = "UPDATE usuarios SET imagen = 'http://localhost/tf-php-avanzado/assets/images/pngtree-users.png' WHERE id = '$id'";

$result2=mysqli_query($conn, $sql2);
header("Location: perfil.php");
?>