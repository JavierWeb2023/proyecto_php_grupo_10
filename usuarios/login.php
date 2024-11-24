<?php
session_start();
include('../assets/includes/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usuario'];
    $password = $_POST['clave'];

    $sql = "SELECT id, nombre, apellido, clave FROM usuarios WHERE usuario = ? AND activo = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nombre, $apellido, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            session_name('home');
            $_SESSION['userid'] = $id;
            $_SESSION['username'] = $nombre;
            $_SESSION['surename'] = $apellido;
            header("Location: ../turnos/");
            exit();
        } else {
            header("Location: ../index.php?mensaje=Clave incorrecta");
        }
    } else {
        header("Location: ../index.php?mensaje=Usuario no encontrado");
    }

    $stmt->close();
}
$conn->close();
?>
