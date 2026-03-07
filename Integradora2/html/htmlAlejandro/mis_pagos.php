<?php
session_start();
include("../../conexion.php"); // ajusta si está en otra carpeta

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../htmlAndres/inicio_sesion.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Pagos - Healthy Heart Gym</title>
    <link rel="stylesheet" href="../../css/cssAlejandro/estilos.css">
     <link rel="stylesheet" href="../../css/cssAndres/estilo.css">
  <link rel="stylesheet" href="../css/cssAndres/estilo.css">
    <link rel="icon" href="../img/imgAndres/logogim.jpeg">
     
</head>
<body>
    
<img src="../../img/imgAndres/logogim.jpeg" class="logo-top" alt="Logo H2Gym">
    <div class="contenedor-pagos">
        <div class="contenedor-pagos">
    <a href="interfaz_de_perfil.html" class="enlace-volver">
        <button class="btn-regresar-pequeno">Volver</button>
    </a>

    <h1>Mis pagos</h1>
    <hr class="linea-roja">
    
    </div>
        
        
        

        <table class="tabla-pagos">
   <thead>
        <tr>
            <th>Fecha</th>
            <th>Membresía</th>
            <th>Precio</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        
           <?php
$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT pagos.fecha_pago, pagos.estado, 
               membresias.nombre, membresias.precio
        FROM pagos
        INNER JOIN membresias 
        ON pagos.id_membresia = membresias.id_membresia
        WHERE pagos.id_usuario = '$id_usuario'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['fecha_pago'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>$" . $fila['precio'] . "</td>";
        echo "<td>" . $fila['estado'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No tienes pagos registrados</td></tr>";
}
?>
        
    </tbody>
</table>

<br><br>

        <div class="seccion-boton">
        <a href="interfaz_de_perfil.php" class="btn-regresar">
    SALIR
</a>
        </div>
    </div>

</body>
</html>