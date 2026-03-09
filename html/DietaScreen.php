<?php
session_start();
include("../conexion.php"); 

// 1. Verificar si inició sesión
if (!isset($_SESSION['id_usuario'])) {
    header("Location: htmlAndres/inicio_sesion.html");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

// 2. Verificar si tiene un pago registrado como 'Pagado'
$sql = "SELECT * FROM pagos WHERE id_usuario='$id_usuario' AND estado='Pagado'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows == 0) {
    // Si no hay registro de pago, lo mandamos a pagar
    header("Location: htmlAndres/pago.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dietas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/EstiloDieta.css">
    <link rel="stylesheet" href="../css/cssAndres/estilo.css">
     <link rel="icon" href="../img/imgAndres/logogim.jpeg">
    
</head>

<body>
<img src="../img/imgAndres/logogim.jpeg" class="logo-top" alt="Logo H2Gym">
    <div class="container">

        
        <div class="section">
            <div class="img-box">
                <img src="../img/cuerpo1.jpg" alt="Cuerpo Delgado">
            </div>

            <div class="text-box">
                <h2>Cuerpo Delgado</h2>

                <p class="intro">
                    Las personas con cuerpo delgado suelen tener un metabolismo acelerado,
                    lo que les dificulta ganar peso y masa muscular.
                </p>

                <h3>🍽 Alimentación</h3>
                <ul>
                    <li>Consumir más calorías de las que se gastan.</li>
                    <li>Proteínas: pollo, pescado, carne, huevos y legumbres.</li>
                    <li>Carbohidratos complejos: arroz, pasta, avena y papa.</li>
                    <li>Grasas saludables: aguacate, nueces y aceite de oliva.</li>
                    <li>Comer 4 a 6 veces al día.</li>
                    <li>Beber suficiente agua.</li>
                </ul>

                <h3>🏋️ Entrenamiento de fuerza</h3>
                <ul>
                    <li>Ejercicios compuestos: sentadillas, press de banca y peso muerto.</li>
                    <li>Pesos moderados a altos.</li>
                    <li>8 a 12 repeticiones.</li>
                    <li>Priorizar peso libre.</li>
                </ul>

                <h3>📅 Frecuencia</h3>
                <ul>
                    <li>Entrenar 3 a 5 veces por semana.</li>
                    <li>Trabajar cada grupo muscular 2 veces por semana.</li>
                </ul>

                <h3>😴 Descanso</h3>
                <ul>
                    <li>Dormir 7 a 9 horas.</li>
                    <li>Descansar 48 horas el mismo grupo muscular.</li>
                </ul>
            </div>
        </div>


        
        <div class="section reverse">
            <div class="img-box">
                <img src="../img/cuerpo2.jpg" alt="Cuerpo Normal">
            </div>

            <div class="text-box">
                <h2>Cuerpo Normal</h2>

                <p class="intro">
                    Las personas con cuerpo normal suelen mantener un equilibrio entre masa muscular y grasa corporal.
                    El objetivo principal es conservar una buena composición corporal y mejorar el rendimiento físico.
                </p>

                <h3>🍽 Alimentación</h3>
                <ul>
                    <li>Mantener una dieta balanceada y variada.</li>
                    <li>Consumir proteínas magras.</li>
                    <li>Incluir verduras y frutas diariamente.</li>
                    <li>Preferir carbohidratos integrales.</li>
                    <li>Evitar exceso de procesados y azúcares.</li>
                    <li>Beber suficiente agua.</li>
                </ul>

                <h3>🏋️ Entrenamiento de fuerza</h3>
                <ul>
                    <li>Combinar ejercicios de fuerza y resistencia.</li>
                    <li>8 a 15 repeticiones por serie.</li>
                    <li>Incorporar entrenamiento funcional.</li>
                    <li>Trabajar todos los grupos musculares.</li>
                </ul>

                <h3>📅 Frecuencia</h3>
                <ul>
                    <li>3 a 4 días de fuerza por semana.</li>
                    <li>Agregar cardio 2 o 3 veces por semana.</li>
                </ul>

                <h3>😴 Descanso</h3>
                <ul>
                    <li>Dormir 7 a 8 horas.</li>
                    <li>1 o 2 días de descanso semanal.</li>
                </ul>
            </div>
        </div>


        
        <div class="section">
            <div class="img-box">
                <img src="../img/cuerpo3.jpg" alt="Cuerpo Obeso">
            </div>

            <div class="text-box">
                <h2>Cuerpo Obeso</h2>

                <p class="intro">
                    Las personas con obesidad deben enfocarse en mejorar su salud general,
                    reducir el porcentaje de grasa corporal y fortalecer masa muscular progresivamente.
                </p>

                <h3>🍽 Alimentación</h3>
                <ul>
                    <li>Déficit calórico moderado.</li>
                    <li>Reducir azúcares y ultraprocesados.</li>
                    <li>Priorizar proteínas magras.</li>
                    <li>Aumentar verduras y fibra.</li>
                    <li>Controlar porciones.</li>
                    <li>Evitar refrescos.</li>
                </ul>

                <h3>🏋️ Entrenamiento de fuerza</h3>
                <ul>
                    <li>Iniciar con peso corporal.</li>
                    <li>Sentadillas y desplantes básicos.</li>
                    <li>Progresar gradualmente a pesas.</li>
                    <li>12 a 15 repeticiones moderadas.</li>
                </ul>

                <h3>📅 Frecuencia</h3>
                <ul>
                    <li>3 a 5 días de actividad física.</li>
                    <li>Combinar fuerza con cardio moderado.</li>
                </ul>

                <h3>😴 Descanso</h3>
                <ul>
                    <li>Dormir 7 a 9 horas.</li>
                    <li>Respetar días de recuperación.</li>
                </ul>
            </div>
        </div>

        <button class="btn" onclick="window.location.href='InicioScreen.html'">Regresar al Inicio</button>

    </div>

</body>
</html>