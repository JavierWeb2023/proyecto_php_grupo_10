<?php
include('../assets/includes/conexion.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, apellido, email, usuario, clave) VALUES ('$nombre', '$apellido', '$email', '$usuario', '$clave')";

$result=mysqli_query($conn, $sql);
header("Location: ../index.php?mensaje=Usuario creado correctamente");

?>