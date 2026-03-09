<?php
session_start();
include("conexion.php"); 

if (!isset($_SESSION['id_usuario'])) {
    header("Location: html/htmlAndres/inicio_sesion.html");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$tipo_membresia = $_POST['membresia']; 
$id_membresia = ($tipo_membresia == "vip") ? 2 : 1;

$sql = "INSERT INTO pagos (id_usuario, id_membresia, fecha_pago, estado)
        VALUES ('$id_usuario', '$id_membresia', NOW(), 'Pagado')";

if ($conexion->query($sql) === TRUE) {
    // Redirige a DietaScreen que está en la carpeta html
    header("Location: html/DietaScreen.php");
    exit();
} else {
    echo "Error al procesar pago: " . $conexion->error;
}
?>