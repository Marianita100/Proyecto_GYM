<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO contactos (nombre, correo, mensaje)
VALUES ('$nombre','$correo','$mensaje')";

mysqli_query($conexion,$sql);

/* Redirige a la misma página con parámetro */
header("Location: html/htmlAlejandro/contactos.html?enviado=1");
exit();
?>