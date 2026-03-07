<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo='$correo' AND password='$password'";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        
        // Redirige al inicio
     header("Location: html/htmlAlejandro/interfaz_de_perfil.php");
        exit();
    } else {
        echo "<script>alert('Correo o contraseña incorrectos'); window.history.back();</script>";
    }
}
?>
