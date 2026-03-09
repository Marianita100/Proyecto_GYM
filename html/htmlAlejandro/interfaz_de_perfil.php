<?php 
session_start();
include("../../conexion.php"); 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

    if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../htmlAndres/inicio_sesion.html");
    exit();
}


$id_usuario = $_SESSION['id_usuario'];

// 1. Obtenemos datos del usuario
$consulta = $conexion->query("SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'");
$usuario = $consulta->fetch_assoc();

// 2. Buscamos si tiene un pago activo y qué membresía es (VIP o CLÁSICA)
// Asumo que tu tabla 'pagos' tiene una relación con una tabla 'membresias' o un campo 'tipo'
$consulta_membresia = $conexion->query("
    SELECT m.nombre
    FROM pagos p 
    INNER JOIN membresias m ON p.id_membresia = m.id_membresia 
    WHERE p.id_usuario = '$id_usuario' AND p.estado = 'Pagado' 
    LIMIT 1
");

if ($consulta_membresia->num_rows > 0) {
    $datos_m = $consulta_membresia->fetch_assoc();
    $estado_cuenta = "Membresía Activa";
    $tipo_membresia = $datos_m['nombre']; // Aquí saldrá 'VIP' o 'CLÁSICA'
} else {
    $estado_cuenta = "Membresía Desactivada";
    $tipo_membresia = "Ninguna";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/cssAlejandro/estilos.css?">
      <link rel="stylesheet" href="../css/cssAndres/estilo.css">
    <link rel="icon" href="../img/imgAndres/logogim.jpeg">
    <title>Perfil - Healthy Heart Gym</title>
     
        
</head>
<body>
    <img src="../../img/imgAndres/logogim.jpeg" class="logo-top" alt="Logo H2Gym">
<script src="../../js/jsAlejandro/javaScript.js"></script>
<link rel="stylesheet" href="../../css/cssAndres/estilo.css">
    <div class="contenedor-principal">
        
        <div class="stats-centro">
            <h3>HOY</h3>
            <div class="stat-item"><span>MOTIVACION</span><div class="barra"><div class="progreso" style="width: 65%;"></div></div></div>
            <div class="stat-item"><span>FUERZA</span><div class="barra"><div class="progreso" style="width: 77%;"></div></div></div>
            <div class="stat-item"><span>RESISTENCIA</span><div class="barra"><div class="progreso" style="width: 90%;"></div></div></div>
            <div class="info-adicional"><p>Rendirse jamas</p></div>
        </div>

        <div class="tarjeta">
            <h1>PERFIL</h1>
            <div class="foto-contenedor">
                <img src="../../img/imgAlejandro/iconorojosinfondo.png" alt="Avatar">
            </div>

            <div class="info-grupo">
                <label>Nombre del usuario</label>
                <span><?php echo htmlspecialchars($usuario['nombre']); ?></span>
            </div>

            <div class="info-grupo">
                <label>Correo electrónico</label>
                <span><?php echo htmlspecialchars($usuario['correo']); ?></span>
            </div>

            <div class="info-grupo">
                <label>Estado de cuenta</label>
                <span><?php echo $estado_cuenta; ?></span>
            </div>
            
            <div class="info-grupo">
                <label>Tipo de Membresia</label>
                <span><?php echo $tipo_membresia; ?></span>
            </div>

            <div class="seccion-enlaces">
               
               <a href="mis_pagos.php">Historial de pagos</a>
                <a href="cancelar_membresia.php">Cancelar membresia</a>
            </div>

            <a href="../InicioScreen.html">
                <button class="btn-regresar">REGRESAR AL INICIO</button>
            </a>
            <form action="../../cerrar_sesion.php" method="POST">
    <button type="submit" class="btn-regresar">Cerrar sesión</button>
</form>
        </div>

        <div class="stats-centro">
            <h3>MAÑANA</h3>
            <div class="stat-item"><span>MOTIVACION</span><div class="barra"><div class="progreso" style="width: 99%;"></div></div></div>
            <div class="stat-item"><span>FUERZA</span><div class="barra"><div class="progreso" style="width: 82%;"></div></div></div>
            <div class="stat-item"><span>RESISTENCIA</span><div class="barra"><div class="progreso" style="width: 90%;"></div></div></div>
            <div class="info-adicional"><p>Rendirse jamas</p></div>
        </div>

    </div>
    
</body>
</html>