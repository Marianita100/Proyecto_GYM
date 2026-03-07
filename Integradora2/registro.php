<?php
// 1. Incluimos la conexión. Como ambos están en la raíz, no se necesitan puntos extras.
include("conexion.php");

// 2. Recibimos los datos del formulario (asegúrate que los 'name' coincidan en tu HTML)
$nombre   = $_POST['nombre'];
$correo   = $_POST['correo'];
$password = $_POST['password']; 

// 3. Insertamos los datos en la tabla 'usuarios'
$sql = "INSERT INTO usuarios (nombre, correo, password) 
        VALUES ('$nombre', '$correo', '$password')";

if ($conexion->query($sql) === TRUE) {
    // 4. ÉXITO: Redirigimos al inicio de sesión. 
    // Como estamos en la raíz, entramos a las carpetas correspondientes.
    header("Location: html/htmlAndres/inicio_sesion.html"); 
    exit();
} else {
    // 5. ERROR: Mostramos qué salió mal
    echo "Error al registrar: " . $conexion->error;
}

$conexion->close();
?>