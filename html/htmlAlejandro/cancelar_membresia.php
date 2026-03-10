<?php
include("../../conexion.php");
session_start();

$id_usuario = 1; // Ajustar según tu sesión

// PARTE 1: Procesar la cancelación (Solo si se envió el formulario)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_cancelar'])) {
    $sql_update = "UPDATE pagos 
            SET estado = 'Cancelada' 
            WHERE id_usuario = $id_usuario 
            ORDER BY fecha_pago DESC 
            LIMIT 1";

    if (mysqli_query($conexion, $sql_update)) {
        header("Location: interfaz_de_perfil.php");
        exit();
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}

// PARTE 2: Consultar datos para mostrar en la interfaz
$sql_select = "SELECT m.nombre, p.fecha_inicio, p.fecha_vencimiento, p.estado
               FROM pagos p
               JOIN membresias m ON p.id_membresia = m.id_membresia
               WHERE p.id_usuario = $id_usuario
               ORDER BY p.fecha_pago DESC LIMIT 1";

$resultado = mysqli_query($conexion, $sql_select);
$datos = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Healthy Heart Gym - Cancelar Membresía</title>
    <link rel="stylesheet" href="../../css/cssAlejandro/cancelar_membresia.css">
    <script src="../../js/jsAlejandro/javaScript.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>Healthy Heart Gym</h1>
            <h2>Cancelación de Membresía</h2>
        </header>

        <main class="form-card">
            <form id="formCancelacion" action="cancelar_membresia.php" method="POST">
                
                <input type="hidden" name="confirmar_cancelar" value="1">

                <div class="input-group">
                    <label>Tipo de membresía:</label>
                    <select id="tipoMembresia" disabled>
                        <option><?php echo $datos['nombre']; ?></option>
                    </select>
                </div>

                <div class="input-group">
                    <label>Fecha de inicio:</label>
                    <input type="date" value="<?php echo $datos['fecha_inicio']; ?>" readonly>
                </div>

                <div class="input-group">
                    <label>Fecha de vencimiento:</label>
                    <input type="date" value="<?php echo $datos['fecha_vencimiento']; ?>" readonly>
                </div>

                <div class="input-group">
                    <label>Estado:</label>
                    <input type="text" value="<?php echo $datos['estado']; ?>" readonly>
                </div>

                <div class="button-container">
                    <button type="button" class="btn-cancel" onclick="confirmarCancelacion()">
                        Cancelar membresía
                    </button>
                    <button type="button" class="btn-back" onclick="window.location.href='interfaz_de_perfil.php'">Regresar</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>