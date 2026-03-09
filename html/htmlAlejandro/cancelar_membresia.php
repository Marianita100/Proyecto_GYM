<?php
include("../../conexion.php"); // tu archivo de conexión

session_start();
$id_usuario = 1; // luego lo cambias por $_SESSION['id_usuario']

$sql = "SELECT 
            m.nombre,
            p.fecha_inicio,
            p.fecha_vencimiento,
            p.estado
        FROM pagos p
        JOIN membresias m ON p.id_membresia = m.id_membresia
        WHERE p.id_usuario = $id_usuario
        ORDER BY p.fecha_pago DESC
        LIMIT 1";

$resultado = mysqli_query($conexion, $sql);
$datos = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Heart Gym - Cancelar Membresía</title>
    <link rel="stylesheet" href="../../css/cssAlejandro/cancelar_membresia.css">
        <script src="../../js/jsAlejandro/javaScript.js"></script>
            <link rel="stylesheet" href="../../css/cssAndres/estilo.css">
     <link rel="icon" href="../../img/imgAndres/logogim.jpeg">

</head>
<body>
    <img src="../../img/imgAndres/logogim.jpeg" class="logo-top" alt="Logo H2Gym">

    <div class="container">
        <header>
            <h1>Healthy Heart Gym</h1>
            <h2>Cancelación de Membresía</h2>
        </header>

        <main class="form-card">
            <form action="CancelarMembresiaServlet" method="POST">
                
                <div class="input-group">
                    <label for="tipoMembresia">Tipo de membresía:</label>
                    <p class="helper-text">(Cancelar no elimina el acceso inmediatamente hasta que termine el mes pagado)</p>
                <select id="tipoMembresia" name="tipoMembresia" disabled>
    <option><?php echo $datos['nombre']; ?></option>
</select>
                </div>

                <div class="input-group">
                    <label for="fechaInicio">Fecha de inicio:</label>
                   <input type="date" 
       id="fechaInicio" 
       name="fechaInicio" 
       value="<?php echo $datos['fecha_inicio']; ?>" 
       readonly>
                </div>

                <div class="input-group">
                    <label for="fechaVencimiento">Fecha de vencimiento:</label>
                    <input type="date" 
       id="fechaVencimiento" 
       name="fechaVencimiento" 
       value="<?php echo $datos['fecha_vencimiento']; ?>" 
       readonly>
                </div>

                <div class="input-group">
                    <label for="estado">Estado:</label>
                   <input type="text" 
       id="estado" 
       name="estado" 
       value="<?php echo $datos['estado']; ?>" 
       readonly>
                </div>

                <div class="button-container">
           
            <button type="button" class="btn-cancel"
          onclick="confirmarCancelacion()='../inicioScreen.html'">
       Cancelar membresía
          </button>
      <button type="button" class="btn-back" onclick="window.location.href='interfaz_de_perfil.php'">Regresar</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>