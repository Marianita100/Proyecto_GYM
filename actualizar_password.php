<?php
include("conexion.php"); // Correcto: Ambos están en la raíz

$correo = $_POST['correo'];
$nueva_password = $_POST['password'];

// Usamos UPDATE para modificar el registro existente
$sql = "UPDATE usuarios SET password='$nueva_password' WHERE correo='$correo'";

if ($conexion->query($sql) === TRUE) {
    if ($conexion->affected_rows > 0) {
        // Redirige al login que está dentro de las carpetas desde la raíz
        header("Location: html/htmlAndres/inicio_sesion.html");
        exit();
    } else {
        echo "El correo no está registrado.";
    }
} else {
    echo "Error al actualizar: " . $conexion->error;
}
$conexion->close();
?>