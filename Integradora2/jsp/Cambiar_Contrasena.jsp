
<script src="password.js"></script>
<link rel="icon" href="imagenes/logo.jpeg">
<script>
function validarPasswords(event) {
    event.preventDefault(); // evita recarga

    const pass1Input = document.getElementById("password");
    const pass2Input = document.getElementById("confirmar");

    const pass1 = pass1Input.value;
    const pass2 = pass2Input.value;

    const mensajeError = document.getElementById("mensaje-error");
    const mensajeExito = document.getElementById("mensaje-exito");

    if (pass1 !== pass2 || pass1 === "") {
        mensajeError.style.display = "block";
        mensajeExito.style.display = "none";
        return;
    }

    // ✅ Si todo está correcto
    mensajeError.style.display = "none";
    mensajeExito.style.display = "block";

    // Limpiar campos automáticamente
    pass1Input.value = "";
    pass2Input.value = "";

    
}
</script>