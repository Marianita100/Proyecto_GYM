function verPassword(inputId, span) {
    const input = document.getElementById(inputId);
    const icon = (typeof span === 'string') ? document.querySelector(`[onclick="verPassword('${inputId}','this')"]`) : span;

    if (icon.dataset.visible === "false") {
        input.type = "text";
        icon.textContent = "👁";
        icon.dataset.visible = "true";
    } else {
        input.type = "password";
        icon.textContent = "👁‍🗨";
        icon.dataset.visible = "false";
    }
}
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